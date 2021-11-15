<?php

class EstudiantesController extends CI_Controller
{

    //constructor
    public function __construct()
    {
        //uso del constructor de la clase base, padre, superclase
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('EstudiantesModel');
    }

    //Metodo para cargar las vistas correspondientes de Grados
    public function index()
    {
        //datos usados para mostrar el title de la página
        $data = array("titulo" => "Estudiantes");

        //carga de las vistas
        $this->load->view('shared/header', $data);
        $this->load->view('EstudiantesView');
        $this->load->view('shared/footer');
    }

    public function fetch()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->EstudiantesModel->get_entries();
            header('Content-type: application/json');
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_nombres', 'Nombres', 'required');
            $this->form_validation->set_rules('ins_apellidos', 'Apellidos', 'required');
            $this->form_validation->set_rules('ins_direccion', 'Dirección', 'required');
            $this->form_validation->set_rules('ins_fecha', 'Fecha nacimiento', 'required');
            $this->form_validation->set_rules('ins_sexo', 'Sexo', 'required');
            $this->form_validation->set_rules('ins_nie', 'NIE', 'required');
            $this->form_validation->set_rules('ins_idResponsable', 'Responsable', 'required');
            

            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('min_length', 'El campo %s debe tener como minimo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['Nombres'] =  $ajax_data["ins_nombres"];
                $data_['Apellidos'] =  $ajax_data["ins_apellidos"];
                $data_['Direccion'] =  $ajax_data["ins_direccion"];
                $data_['FechaNacimiento'] =  $ajax_data["ins_fecha"];
                $data_['Sexo'] =  $ajax_data["ins_sexo"];
                $data_['NIE'] =  $ajax_data["ins_nie"];
                $data_['IDResponsable'] =  $ajax_data["ins_idResponsable"];
                

                if ($this->EstudiantesModel->insert_entry($data_)) {
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
}
