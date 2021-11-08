<?php

class PeriodosController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('PeriodosModel');
    }

    public function index()
    {
        $data = array("titulo" => "Periodos");
        
        $this->load->view('shared/header', $data);
        $this->load->view('PeriodosView');
        $this->load->view('shared/footer');
    }

    public function insert()
    {
        if($this->input->is_ajax_request()){
            $this->form_validation->set_rules('ins_periodo', 'Periodo', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['Periodo'] =  $ajax_data["ins_periodo"];

                if ($this->PeriodosModel->insert_entry($data_)) {
                    $data = array('response' => "success", 'message' => "¡Registro ingresado correctamente!");
                }
                else {
                    $data = array('response' => "error", 'message' => "¡Ocurrió un error!");
                }
                
            }else {

                $data = array('response' => "error", 'message' => validation_errors());
            }
            echo json_encode($data);
        }else {
			echo "'¡Acceso directo al script no permitido!'";
		}
    }

    public function fetch()
    {
        if($this->input->is_ajax_request()){
            $posts = $this->PeriodosModel->get_entries();
            echo json_encode($posts);
        }
        else{
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if($this->input->is_ajax_request()){
            $del_id = $this->input->post('del_id');

            if($this->PeriodosModel->delete_entry($del_id)){
                $data = array('response' => "success");
            }else{
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

            if ($post = $this->PeriodosModel->single_entry($edit_id)) {
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
            $this->form_validation->set_rules('edit_periodo', 'Periodo', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido.');

            if ($this->form_validation->run()) {
                $data_['IDPeriodo'] = $this->input->post('edit_id');
                $data_['Periodo'] = $this->input->post('edit_periodo');

                if ($this->PeriodosModel->update_entry($data_)) {
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
?>