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
            $this->load->view('home/HomeDirector');
            $this->load->view('shared/footer');
        } else {
            echo "¡Acceso denegado!";
        }
    }

    function sub_director()
    {
        $data = array('titulo' => 'Inicio Sub-Director' );
        //Sub-Director
        if ($this->session->userdata('rol') == 'Sub-Director') {
            $this->load->view('shared/header', $data);
            $this->load->view('home/HomeSubDirector');
            $this->load->view('shared/footer');
        } else {
            echo "¡Acceso denegado!";
        }
    }

    function secretaria()
    {
        $data = array('titulo' => 'Inicio Secretaria' );
        //Secretaria
        if ($this->session->userdata('rol') == 'Secretaria') {
            $this->load->view('shared/header', $data);
            $this->load->view('home/HomeSecretaria');
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
            $this->load->view('home/HomeMaestro');
            $this->load->view('shared/footer');
        } else {
            echo "¡Acceso denegado!";
        }
    }
}
