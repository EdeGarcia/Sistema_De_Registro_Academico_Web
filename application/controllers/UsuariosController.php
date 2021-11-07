<?php
class UsuariosController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('UsuariosModel');
    }

    public function index()
    {
        $data = array("titulo" => "Usuarios");

        $this->load->view('shared/header', $data);
        $this->load->view('UsuariosView');
        $this->load->view('shared/footer');
    }
}
