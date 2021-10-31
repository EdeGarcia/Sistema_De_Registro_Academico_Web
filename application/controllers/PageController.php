<?php

class PageController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');


        //Agregar en cada controlador
        if ($this->session->userdata('logeado') !== TRUE) {
            redirect('LoginController');
        }
    }

    function index()
    {
        //Director
        $data = array('titulo' => 'Inicio - Director');

        if ($this->session->userdata('rol') == 'Director') {
            $this->load->view('shared/header', $data);
            $this->load->view('home');
            $this->load->view('shared/footer');
        } else {
            echo "¡Acceso denegado!";
        }
    }

    function sub_director()
    {
        //Sub-Director
        if ($this->session->userdata('rol') == 'Sub-Director') {
            $this->load->view('shared/header');
            $this->load->view('home');
            $this->load->view('shared/footer');
        } else {
            echo "¡Acceso denegado!";
        }
    }

    function secretaria()
    {
        //Secretaria
        if ($this->session->userdata('rol') == 'Secretaria') {
            $this->load->view('shared/header');
            $this->load->view('home');
            $this->load->view('shared/footer');
        } else {
            echo "¡Acceso denegado!";
        }
    }

    function maestro()
    {
        $data = array('titulo' => 'Inicio Maestro' );
        //Maestro
        if ($this->session->userdata('rol') == 'Maestro') {
            $this->load->view('shared/header', $data);
            $this->load->view('home');
            $this->load->view('shared/footer');
        } else {
            echo "¡Acceso denegado!";
        }
    }
}
