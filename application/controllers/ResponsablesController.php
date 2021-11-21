<?php

class ResponsablesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('ResponsablesModel');
    }

    public function index()
    {
        $data = array("titulo" => "Responsables");

        $this->load->view('shared/header', $data);
        $this->load->view('ResponsablesView');
        $this->load->view('shared/footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_nombres', 'Nombres', 'required|max_length[45]');
            $this->form_validation->set_rules('ins_apellidos', 'Apellidos', 'required|max_length[45]');
            $this->form_validation->set_rules('ins_fecha', 'Fecha de nacimiento', 'required');
            $this->form_validation->set_rules('ins_sexo', 'Sexo', 'required');
            $this->form_validation->set_rules('ins_tipo', 'Tipo', 'required');
            $this->form_validation->set_rules('ins_dui', 'DUI', 'required|max_length[10]');
            $this->form_validation->set_rules('ins_nit', 'NIT', 'required|max_length[17]');
            $this->form_validation->set_rules('ins_telefono', 'Telefono', 'required|max_length[9]');


            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['Nombres'] =  $ajax_data["ins_nombres"];
                $data_['Apellidos'] =  $ajax_data["ins_apellidos"];
                $data_['FechaNacimiento'] =  $ajax_data["ins_fecha"];
                $data_['Sexo'] =  $ajax_data["ins_sexo"];
                $data_['TipoDeParentesco'] =  $ajax_data["ins_tipo"];
                $data_['DUI'] =  $ajax_data["ins_dui"];
                $data_['NIT'] =  $ajax_data["ins_nit"];
                $data_['Telefono'] =  $ajax_data["ins_telefono"];

                if ($this->ResponsablesModel->insert_entry($data_)) {
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
            $posts = $this->ResponsablesModel->get_entries();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {

            $del_id = $this->input->post('del_id');

            if ($this->ResponsablesModel->delete_entry($del_id)) {
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

            if ($post = $this->ResponsablesModel->single_entry($edit_id)) {
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
            $this->form_validation->set_rules('edit_nombres', 'Nombres', 'required|max_length[45]');
            $this->form_validation->set_rules('edit_apellidos', 'Apellidos', 'required|max_length[45]');
            $this->form_validation->set_rules('edit_fecha', 'Fecha de nacimiento', 'required');
            $this->form_validation->set_rules('edit_sexo', 'Sexo', 'required');
            $this->form_validation->set_rules('edit_tipo', 'Tipo de parentesco', 'required');
            $this->form_validation->set_rules('edit_dui', 'DUI', 'required|max_length[10]');
            $this->form_validation->set_rules('edit_nit', 'NIT', 'required|max_length[17]');
            $this->form_validation->set_rules('edit_telefono', 'Telefono', 'required|max_length[9]');


            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['IDResponsable'] = $this->input->post('edit_id');
                $data_['Nombres'] =  $ajax_data["edit_nombres"];
                $data_['Apellidos'] =  $ajax_data["edit_apellidos"];
                $data_['FechaNacimiento'] =  $ajax_data["edit_fecha"];
                $data_['Sexo'] =  $ajax_data["edit_sexo"];
                $data_['TipoDeParentesco'] =  $ajax_data["edit_tipo"];
                $data_['DUI'] =  $ajax_data["edit_dui"];
                $data_['NIT'] =  $ajax_data["edit_nit"];
                $data_['Telefono'] =  $ajax_data["edit_telefono"];

                if ($this->ResponsablesModel->update_entry($data_)) {
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

    public function fetchbyId()
    {
        if ($this->input->is_ajax_request()) {

            $editId = $this->input->get('id');
            $responsable = $this->ResponsablesModel->single_entry($editId);
            header('Content-type: application/json');
            echo json_encode($responsable);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }
}
