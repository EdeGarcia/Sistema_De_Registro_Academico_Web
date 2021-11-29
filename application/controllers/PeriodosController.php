<?php

class PeriodosController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('PeriodosModel');
    }

    public function index()
    {
        $data = array("titulo" => "Periodos");

        $this->load->view('shared/header', $data);
        $this->load->view('PeriodosView');
        $this->load->view('shared/footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('ins_periodo', 'Periodo', 'required');
            $this->form_validation->set_rules('ins_fecha_inicio', 'Periodo', 'required');
            $this->form_validation->set_rules('ins_fecha_fin', 'Periodo', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['Periodo'] =  $ajax_data["ins_periodo"];
                $data_['Fecha_inicio'] =  $ajax_data["ins_fecha_inicio"];
                $data_['Fecha_fin'] =  $ajax_data["ins_fecha_fin"];

                if ($this->PeriodosModel->insert_entry($data_)) {
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
            $posts = $this->PeriodosModel->get_entries();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {
            $del_id = $this->input->post('del_id');

            if ($this->PeriodosModel->delete_entry($del_id)) {
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

            if ($post = $this->PeriodosModel->single_entry($edit_id)) {
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
            $this->form_validation->set_rules('edit_periodo', 'Periodo', 'required');
            $this->form_validation->set_rules('edit_fecha_inicio', 'Periodo', 'required');
            $this->form_validation->set_rules('edit_fecha_fin', 'Periodo', 'required');
            $this->form_validation->set_message('required', 'El campo %s es requerido.');

            if ($this->form_validation->run()) {
                $data_['IDPeriodo'] = $this->input->post('edit_id');
                $data_['Periodo'] = $this->input->post('edit_periodo');
                $data_['Fecha_inicio'] = $this->input->post('edit_fecha_inicio');
                $data_['Fecha_fin'] = $this->input->post('edit_fecha_fin');

                if ($this->PeriodosModel->update_entry($data_)) {
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

    public function report_periodos()
    {

        $this->load->library("table");

        $this->load->library('Report');

        $pdf = new Report(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->titulo = "Periodos";

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Author');
        $pdf->SetTitle('Periodos');
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

        $this->table->set_heading('ID', 'Periodo', 'Inicio', 'Fin');

        $periodos = $this->PeriodosModel->get_entries();

        foreach ($periodos as $periodo) :
            $this->table->add_row($periodo->IDPeriodo, $periodo->Periodo, $periodo->Fecha_inicio, $periodo->Fecha_fin);
        endforeach;


        $html = $this->table->generate();

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->lastPage();

        $pdf->Output(md5(time()) . '.pdf', 'I');
    }
}
