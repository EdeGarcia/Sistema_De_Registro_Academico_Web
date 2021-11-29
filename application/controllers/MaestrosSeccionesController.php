<?php

class MaestrosSeccionesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('MaestrosSeccionesModel');
        $this->load->model('GradosModel');
        $this->load->model('MaestrosModel');
    }

    public function index()
    {
        $grados = $this->GradosModel->get_entries();

        $data = array("titulo" => "Maestros por sección", "grados" => $grados);

        $this->load->view('shared/header', $data);
        $this->load->view('MaestrosSeccionesView');
        $this->load->view('shared/footer');
    }

    public function fetch()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->MaestrosSeccionesModel->get_entries();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {

            $del_id = $this->input->post('del_id');

            if ($this->MaestrosSeccionesModel->delete_entry($del_id)) {
                $data = array('response' => "success");
            } else {
                $data = array('response' => "error");
            }

            echo json_encode($data);
        }
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_maestro', 'Maestro', 'required');
            $this->form_validation->set_rules('ins_seccion', 'Sección', 'required');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['IDMaestro'] =  $ajax_data["ins_maestro"];
                $data_['IDSeccion'] =  $ajax_data["ins_seccion"];

                if ($this->MaestrosSeccionesModel->insert_entry($data_)) {
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

    public function fetch_masters()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->MaestrosModel->all_masters();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function report_maestros()
    {

        $this->load->library("table");

        $this->load->library('Report');

        $pdf = new Report(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->titulo = "Maestros encargados de secciones";

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Author');
        $pdf->SetTitle('Maestros por sección');
        $pdf->SetSubject('Report generado usando Codeigniter y TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(15);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->SetFont('Helvetica', '', 10);

        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">',
            'heading_cell_start' => '<th style="font-weight: bold; color:white; background-color: #959EB2">',
        );

        $this->table->set_template($template);

        $this->table->set_heading('Maestro', 'Grado', 'Sección', 'Turno');

        $maestros = $this->MaestrosSeccionesModel->get_entries();

        foreach ($maestros as $maestro) :
            $this->table->add_row($maestro->Maestro, $maestro->Grado, $maestro->Seccion, $maestro->Turno);
        endforeach;


        $html = $this->table->generate();

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->lastPage();

        $pdf->Output(md5(time()) . '.pdf', 'I');
    }
}
