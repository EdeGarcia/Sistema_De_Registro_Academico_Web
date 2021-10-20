<?php

class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('LoginView');
    }

    public function authe()
    {
        //recibo los datos enviados desde el form
        $user = $this->input->post('user');
        $password = $this->input->post('password');

        //Encriptar para validar
        $password = sha1($password);

        //Cargo LoginModel
        $this->load->model('LoginModel');

        //Valido si existe el usuario
        $validate = $this->LoginModel->validate($user, $password);

        //Valido si hubo resultados de la consulta
        if ($validate->num_rows() > 0) {
            $data = $validate->row_array();

            $idusuario = $data['IDUsuario'];
            $usuario = $data['Usuario'];
            $contrasena = $data['Contrasena'];
            $rol = $data['Rol'];
            $idempleado = $data['IDEmpleado'];

            $datasesion = array(
                'idusuario' => $idusuario,
                'usuario' => $usuario,
                'contrasena' => $contrasena,
                'rol' => $rol,
                'idempleado' => $idempleado,
                'logeado' => TRUE
            );

            $this->session->set_userdata($datasesion);

            if ($rol == 'Director') {
                redirect('PageController');
            } else if ($rol == 'Sub-Director') {
                redirect('PageController/sub_director');
            } else if ($rol == 'Secretaria') {
                redirect('PageController/secretaria');
            } else {
                redirect('PageController/maestro');
            }
        } else {
            $f = '';
            $a = '<div class="col-12">' . PHP_EOL;
            $b = '<div class="alert alert-danger" role="alert">' . PHP_EOL;
            $c = '¡Credenciales incorrectas!' . PHP_EOL;
            $d = '</div>' . PHP_EOL;
            $e = '</div>';

            $f .= $a .= $b .= $c .= $d .= $e;

            $data['error'] = $f;
            $this->load->view('LoginView', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        redirect('LoginController');
    }
}
