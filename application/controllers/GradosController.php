<?php

class GradosController extends CI_Controller
{

    //constructor
    public function __construct()
    {
        //uso del constructor de la clase base, padre, superclase
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('GradosModel');
    }

    //Metodo para cargar las vistas correspondientes de Grados
    public function index()
    {
        //datos usados para mostrar el title de la página
        $data = array("titulo" => "Grados");

        //carga de las vistas
        $this->load->view('shared/header', $data);
        $this->load->view('GradosView');
        $this->load->view('shared/footer');
    }

    //metodo para ingresar registros
    public function insert()
    {
        //validar si es una peticion ajax
        if ($this->input->is_ajax_request()) {

            //reglas de validación
            $this->form_validation->set_rules('ins_descripcion', 'Descripción', 'required|max_length[45]');

            //establecer mensajes a las validaciones
            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres.');

            //Verificar que se cumplan las validaciones
            if ($this->form_validation->run()) {
                //recibir la data
                $ajax_data = $this->input->post();

                //Hacer un array con los nombres de los campos de la base de datos y su respectivo dato enviado desde el form
                $data_['Descripcion'] =  $ajax_data["ins_descripcion"];

                //Si se ingresa el registro con exito
                if ($this->GradosModel->insert_entry($data_)) {
                    $data = array('response' => "success", 'message' => "¡Registro ingresado correctamente!");
                }
                //si ocurre un error al ingresar el registro
                else {
                    $data = array('response' => "error", 'message' => "¡Ocurrió un error!");
                }
            }
            //si no se cumplen las reglas de validacion, enviar los errores
            else {

                $data = array('response' => "error", 'message' => validation_errors());
            }

            echo json_encode($data);
        }
        //si no es una petición ajax
        else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    //metodo para enviar todos los datos a la vista
    public function fetch()
    {
        //validar si es una peticion ajax
        if ($this->input->is_ajax_request()) {
            $posts = $this->GradosModel->get_entries();
            echo json_encode($posts);
        }
        //si no es una peticion ajax 
        else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    //metodo para eliminar registros
    public function delete()
    {
        //validar si es una peticion ajax
        if ($this->input->is_ajax_request()) {

            //obtener el id del registro a eliminar
            $del_id = $this->input->post('del_id');

            //verificar si se puede eliminar, y enviar mensaje correpodiente
            if ($this->GradosModel->delete_entry($del_id)) {
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

            if ($post = $this->GradosModel->single_entry($edit_id)) {
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
            $this->form_validation->set_rules('edit_descripcion', 'Descripción', 'required|max_length[45]');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres.');

            if ($this->form_validation->run()) {
                $data_['IDGrado'] = $this->input->post('edit_id');
                $data_['Descripcion'] = $this->input->post('edit_descripcion');

                if ($this->GradosModel->update_entry($data_)) {
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
