<?php
class UsuariosController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('UsuariosModel');
        $this->load->model('MaestrosModel');
    }

    public function index()
    {
        $data = array("titulo" => "Usuarios");

        $this->load->view('shared/header', $data);
        $this->load->view('UsuariosView');
        $this->load->view('shared/footer');
    }

    public function fetch()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->UsuariosModel->get_entries();
            header('Content-type: application/json');
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function fetchbyId()
    {
        if ($this->input->is_ajax_request()) {

            $editId = $this->input->get('id');
            $usuario = $this->UsuariosModel->single_entry($editId);
            header('Content-type: application/json');
            echo json_encode($usuario);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('ins_contrasena', 'Clave', 'required');
            $this->form_validation->set_rules('ins_rol', 'Rol', 'required');
            $this->form_validation->set_rules('ins_idEmpleado', 'IDEmpleado', 'required');


            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('min_length', 'El campo %s debe tener como minimo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['Usuario'] =  $ajax_data["ins_usuario"];
                $data_['Clave'] =  sha1($ajax_data["ins_contrasena"]);
                $data_['Rol'] =  $ajax_data["ins_rol"];
                $data_['IDEmpleado'] =  $ajax_data["ins_idEmpleado"];

                //Maestro
                if($data_['Rol'] == "Maestro"){
                    $data['IDEmpleado'] = $data_['IDEmpleado'];
                    $this->MaestrosModel->insert_entry($data);
                }
                //

                if ($this->UsuariosModel->insert_entry($data_)) {
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



    public function edit()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_IDUsuario', 'IDUsuario', 'required');
            $this->form_validation->set_rules('ins_usuario', 'Usuario', 'required');

            $this->form_validation->set_rules('ins_rol', 'Rol', 'required');
            $this->form_validation->set_rules('ins_idEmpleado', 'IDEmpleado', 'required');


            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('min_length', 'El campo %s debe tener como minimo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['IDUsuario']     =  $ajax_data["ins_IDUsuario"];
                $data_['Usuario']       =  $ajax_data["ins_usuario"];

                $data_['Rol']           =  $ajax_data["ins_rol"];
                $data_['IDEmpleado']    =  $ajax_data["ins_idEmpleado"];

                if (array_key_exists('cambiarClave', $ajax_data)) {
                    $data_['Clave']     =  sha1($ajax_data["ins_contrasena"]);
                } else {
                    $user = $this->UsuariosModel->single_entry($ajax_data["ins_IDUsuario"]);
                    $data_['Clave']     =  $user->Clave;
                }



                if ($this->UsuariosModel->update_entry($data_)) {
                    $data = array('response' => "success", 'message' => "¡Registro modificado correctamente!");
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

    public function delete()
    {
        if ($this->input->is_ajax_request()) {

            $del_id = $this->input->post('id');

            if ($this->UsuariosModel->delete_entry($del_id)) {
                $data = array('response' => "success");
            } else {
                $data = array('response' => "error");
            }

            echo json_encode($data);
        }
    }
}
