<?php
class MateriasController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('MateriasModel');
    }

    public function index()
    {
        $data = array("titulo" => "Materias");

        $this->load->view('shared/header', $data);
        $this->load->view('MateriasView');
        $this->load->view('shared/footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_nombre', 'Nombre', 'required|max_length[45]');
            $this->form_validation->set_rules('ins_descripcion', 'Descripción', 'required|max_length[45]');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['Nombre'] =  $ajax_data["ins_nombre"];
                $data_['Descripcion'] =  $ajax_data["ins_descripcion"];

                if ($this->MateriasModel->insert_entry($data_)) {
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

    public function fetch()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->MateriasModel->get_entries();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {

            $del_id = $this->input->post('del_id');

            if ($this->MateriasModel->delete_entry($del_id)) {
                $data = array('response' => "success");
            } else {
                $data = array('response' => "error");
            }

            echo json_encode($data);
        }
    }

    public function edit()
    {
        if ($this->input->is_ajax_request()) {
            $this->input->post('edit_id');

            $edit_id = $this->input->post('edit_id');

            if ($post = $this->MateriasModel->single_entry($edit_id)) {
                $data = array('response' => "success", 'post' => $post);
            } else {
                $data = array('response' => "error", 'message' => "¡Ocurrio un error!");
            }

            echo json_encode($data);
        }
    }

    public function update()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('edit_nombre', 'Nombre', 'required|max_length[45]');
            $this->form_validation->set_rules('edit_descripcion', 'Descripción', 'required|max_length[45]');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres.');

            if ($this->form_validation->run()) {
                $data_['IDMateria'] = $this->input->post('edit_id');
                $data_['Nombre'] = $this->input->post('edit_nombre');
                $data_['Descripcion'] = $this->input->post('edit_descripcion');

                if ($this->MateriasModel->update_entry($data_)) {
                    $data = array('response' => "success", 'message' => "¡Registro actualizado correctamente!");
                } else {
                    $data = array('response' => "error", 'message' => "¡La actualización fallo!");
                }
            } else {

                $data = array('response' => "error", 'message' => validation_errors());
            }

            echo json_encode($data);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }
}
