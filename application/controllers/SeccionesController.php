<?php
class SeccionesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('SeccionesModel');
        $this->load->model('GradosModel');
    }

    public function index()
    {

        $grados = $this->GradosModel->get_entries();

        $data = array("titulo" => "Secciones", "grados" => $grados);

        $this->load->view('shared/header', $data);
        $this->load->view('SeccionesView');
        $this->load->view('shared/footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_descripcion', 'Descripción', 'required|min_length[1]');
            $this->form_validation->set_rules('ins_turno', 'Turno', 'required');
            $this->form_validation->set_rules('ins_aula', 'Aula', 'required');
            $this->form_validation->set_rules('ins_cupo', 'Cupo', 'required');
            $this->form_validation->set_rules('ins_grado', 'Grado', 'required');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('min_length', 'El campo %s debe tener como minimo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['Descripcion'] =  $ajax_data["ins_descripcion"];
                $data_['Turno'] =  $ajax_data["ins_turno"];
                $data_['Aula'] =  $ajax_data["ins_aula"];
                $data_['Cupo'] =  $ajax_data["ins_cupo"];
                $data_['IDGrado'] =  $ajax_data["ins_grado"];

                if ($this->SeccionesModel->insert_entry($data_)) {
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
            $posts = $this->SeccionesModel->get_entries();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {

            $del_id = $this->input->post('del_id');

            if ($this->SeccionesModel->delete_entry($del_id)) {
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

            if ($post = $this->SeccionesModel->single_entry($edit_id)) {
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

            $this->form_validation->set_rules('edit_descripcion', 'Descripción', 'required|min_length[1]');
            $this->form_validation->set_rules('edit_turno', 'Turno', 'required');
            $this->form_validation->set_rules('edit_aula', 'Aula', 'required');
            $this->form_validation->set_rules('edit_cupo', 'Cupo', 'required');
            $this->form_validation->set_rules('edit_grado', 'Grado', 'required');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('min_length', 'El campo %s debe tener como minimo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                
                $data_['IDSeccion'] =  $ajax_data["edit_id"];
                $data_['Descripcion'] =  $ajax_data["edit_descripcion"];
                $data_['Turno'] =  $ajax_data["edit_turno"];
                $data_['Aula'] =  $ajax_data["edit_aula"];
                $data_['Cupo'] =  $ajax_data["edit_cupo"];
                $data_['IDGrado'] =  $ajax_data["edit_grado"];

                if ($this->SeccionesModel->update_entry($data_)) {
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
