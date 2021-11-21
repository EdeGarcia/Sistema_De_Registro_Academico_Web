<?php

class MaestrosSeccionesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('MaestrosSeccionesModel');
        $this->load->model('GradosModel');
        $this->load->model('MaestrosModel');
    }

    public function index()
    {
        $grados = $this->GradosModel->get_entries();

        $data = array("titulo" => "Maestros por sección", "grados" => $grados);

        $this->load->view('shared/header', $data);
        $this->load->view('MaestrosSeccionesView');
        $this->load->view('shared/footer');
    }

    public function fetch()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->MaestrosSeccionesModel->get_entries();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {

            $del_id = $this->input->post('del_id');

            if ($this->MaestrosSeccionesModel->delete_entry($del_id)) {
                $data = array('response' => "success");
            } else {
                $data = array('response' => "error");
            }

            echo json_encode($data);
        }
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_maestro', 'Maestro', 'required');
            $this->form_validation->set_rules('ins_seccion', 'Sección', 'required');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['IDMaestro'] =  $ajax_data["ins_maestro"];
                $data_['IDSeccion'] =  $ajax_data["ins_seccion"];

                if ($this->MaestrosSeccionesModel->insert_entry($data_)) {
                    $data = array('response' => "success", 'message' => "¡Registro ingresado correctamente!");
                } else {
                    $data = array('response' => "error", 'message' => "¡Ocurrió un error!");
                }
            } else {

                $data = array('response' => "error", 'message' => validation_errors());
            }

            echo json_encode($data);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function fetch_masters()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->MaestrosModel->all_masters();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }
}
