<?php

class GradosMateriasController extends CI_Controller
{

    //constructor
    public function __construct()
    {
        //uso del constructor de la clase base, padre, superclase
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('GradosMateriasModel');
        $this->load->model('GradosModel');
    }

    //Metodo para cargar las vistas correspondientes de Grados
    public function index()
    {
        //datos usados para mostrar el title de la página
        $grados = $this->GradosModel->get_entries();

        $data = array("titulo" => "Materias por grados", "grados" => $grados);

        //carga de las vistas
        $this->load->view('shared/header', $data);
        $this->load->view('GradosMateriasView');
        $this->load->view('shared/footer');
    }

    public function grado_materia()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();

            $materias = $this->GradosMateriasModel->subjects_of_grade($data["id"]);

            header('Content-type: application/json');
            echo json_encode($materias);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {
            $ajax_data = $this->input->post();

            $data_['IDGrado'] =  $ajax_data["idGrado"];
            $data_['IDMateria'] =  $ajax_data["idMateria"];

            if ($this->GradosMateriasModel->insert_entry($data_)) {
                $data = array('response' => "success", 'message' => "¡Registro ingresado correctamente!");
            } else {
                $data = array('response' => "error", 'message' => "¡Ocurrió un error!");
            }

            echo json_encode($data);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {
            $del_id = $this->input->post('del_id');

            if ($this->GradosMateriasModel->delete_entry($del_id)) {
                $data = array('response' => "success");
            } else {
                $data = array('response' => "error");
            }
            echo json_encode($data);
        }
    }
}
