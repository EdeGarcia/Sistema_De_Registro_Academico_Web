<?php
class MatriculasController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('GradosModel');
        $this->load->model('MatriculasModel');
    }

    public function index()
    {

        $data = array("titulo" => "Matricula");

        $this->load->view('shared/header', $data);
        $this->load->view('matriculas/MatriculasHomeView');
        $this->load->view('shared/footer');
    }

    public function matricular()
    {
        $grados = $this->GradosModel->get_entries();

        $data = array("titulo" => "Matricular Estudiantes", "grados" => $grados);

        $this->load->view('shared/header', $data);
        $this->load->view('matriculas/MatriculasView');
        $this->load->view('shared/footer');
    }

    public function listado_matriculas()
    {
        $grados = $this->GradosModel->get_entries();

        $data = array("titulo" => "Listado de Matriculas", "grados" => $grados);

        $this->load->view('shared/header', $data);
        $this->load->view('matriculas/MatriculasListadoView');
        $this->load->view('shared/footer');
    }

    public function secciones_grado()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();

            $secciones = $this->MatriculasModel->secciones_de_un_grado($data["id"]);

            header('Content-type: application/json');
            echo json_encode($secciones);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function cargar_estudiantes()
    {
        $output = '';
        $query = '';

        if ($this->input->post('query')) {
            $query = $this->input->post('query');

            $data = $this->MatriculasModel->cargar_estudiantes_($query);

            $output .= '
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>NIE</th>
                    <th>Acciones</th>
                </tr>
            ';

            if ($data->num_rows() > 0) {
                foreach ($data->result() as $row) {
                    $output .= '
                        <td>' . $row->Nombres . '</td>
                        <td>' . $row->Apellidos . '</td>
                        <td>' . $row->NIE . '</td>
                        <td>' . '<button type="button" class="btn btn-outline-success" onclick="seleccionarEstudiante(' . $row->IDEstudiante . ')">Seleccionar</button>' . '</td>
                    </tr>';
                }
            } else {
                $output .= '<tr>
                                <td colspan="5">No se encontraron datos</td>
                            </tr>';
            }

            $output .= '</table>';
            echo $output;
        } else {
            $output .= '<tr>
                                <td colspan="5">No se encontraron datos</td>
                            </tr>';
        }
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_grados', 'Grado', 'required');
            $this->form_validation->set_rules('ins_secciones', 'Seccion', 'required');
            $this->form_validation->set_rules('ins_idEstudiante', 'Estudiante', 'required');
            $this->form_validation->set_rules('ins_fecha', 'Fecha', 'required');


            $this->form_validation->set_message('required', 'El campo %s es requerido.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['IDEstudiante'] =  $ajax_data["ins_idEstudiante"];
                $data_['IDGrado'] =  $ajax_data["ins_grados"];
                $data_['IDSeccion'] =  $ajax_data["ins_secciones"];
                $data_['FechaMatricula'] =  $ajax_data["ins_fecha"];

                if ($this->MatriculasModel->insert_entry($data_)) {
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
            $idGrado = $this->input->post('idGrado');
            $idSeccion = $this->input->post('idSeccion');

            $posts = $this->MatriculasModel->all_matriculas($idGrado, $idSeccion);
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {

            $del_id = $this->input->post('del_id');

            if ($this->MatriculasModel->delete_entry($del_id)) {
                $data = array('response' => "success");
            } else {
                $data = array('response' => "error");
            }

            echo json_encode($data);
        }
    }
}
