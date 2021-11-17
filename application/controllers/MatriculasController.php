<?php
class MatriculasController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('GradosModel');
    }

    public function index()
    {
        $grados = $this->GradosModel->get_entries();

        $data = array("titulo" => "Matriculas", "grados" => $grados);

        $this->load->view('shared/header', $data);
        $this->load->view('MatriculasView');
        $this->load->view('shared/footer');
    }

    public function secciones_grado($idGrado)
    {
        if($this->input->is_ajax_request()){
            
        }
    }
}
