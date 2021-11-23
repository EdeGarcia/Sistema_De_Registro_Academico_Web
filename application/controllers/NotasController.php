<?php

class NotasController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('GradosModel');
        $this->load->model('NotasModel');
    }

    public function index()
    {
        $grados = $this->GradosModel->get_entries();
        $data = array("titulo" => "Notas", "grados" => $grados);

        $this->load->view("shared/header", $data);
        $this->load->view("NotasView");
        $this->load->view("shared/footer");
    }

    public function notas_grado()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->input->post();

            $posts = $this->NotasModel->notas_grado_seccion($data["idMateria"], $data["idPeriodo"], $data["idGrado"], $data["idSeccion"]);
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {
            $data_ = $this->input->post();

            $notas_ = json_decode($data_['notas_']);
            $estudiantes_ = json_decode($data_['estudiantes_']);
            $id_ = json_decode($data_['id_']);
            $ins_fecha = $data_['ins_fecha'];
            $ins_materia = $data_['ins_materia'];
            $ins_periodo = $data_['ins_periodo'];

            $tam = count($estudiantes_);
            $res = 0;

            for ($i = 0; $i < $tam; $i++) {
                if ($id_[$i] == '-1') {

                    $datos["Nota"] = $notas_[$i];
                    $datos["FechaNota"] = $ins_fecha;
                    $datos["IDEstudiante"] = $estudiantes_[$i];
                    $datos["IDMateria"] = $ins_materia;
                    $datos["IDPeriodo"] = $ins_periodo;

                    if ($this->NotasModel->insert_entry($datos)) {
                        $res = $res + 1;
                    }
                } else {

                    $datos["IDNota"] = $id_[$i];
                    $datos["Nota"] = $notas_[$i];
                    $datos["FechaNota"] = $ins_fecha;
                    $datos["IDEstudiante"] = $estudiantes_[$i];
                    $datos["IDMateria"] = $ins_materia;
                    $datos["IDPeriodo"] = $ins_periodo;

                    if ($this->NotasModel->update_entry($datos)) {
                        $res = $res + 1;
                    }
                }
            }


            if ($res == $tam) {

                $data = array('response' => "success", 'message' => "¡Operación realizada con exito!");
            } else {
                $data = array('response' => "error", 'message' => "Error");
            }

            echo json_encode($data);
        }
    }
}
