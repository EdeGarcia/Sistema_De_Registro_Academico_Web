<?php
class SeccionesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('SeccionesModel');
        $this->load->model('GradosModel');
    }

    public function index()
    {

        $grados = $this->GradosModel->get_entries();

        $data = array("titulo" => "Secciones", "grados" => $grados);

        $this->load->view('shared/header', $data);
        $this->load->view('SeccionesView');
        $this->load->view('shared/footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request()) {

            $this->form_validation->set_rules('ins_descripcion', 'Descripción', 'required|min_length[1]');
            $this->form_validation->set_rules('ins_turno', 'Turno', 'required');
            $this->form_validation->set_rules('ins_aula', 'Aula', 'required');
            $this->form_validation->set_rules('ins_cupo', 'Cupo', 'required');
            $this->form_validation->set_rules('ins_grado', 'Grado', 'required');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('min_length', 'El campo %s debe tener como minimo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();

                $data_['Descripcion'] =  $ajax_data["ins_descripcion"];
                $data_['Turno'] =  $ajax_data["ins_turno"];
                $data_['Aula'] =  $ajax_data["ins_aula"];
                $data_['Cupo'] =  $ajax_data["ins_cupo"];
                $data_['IDGrado'] =  $ajax_data["ins_grado"];

                if ($this->SeccionesModel->insert_entry($data_)) {
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
            $posts = $this->SeccionesModel->get_entries();
            echo json_encode($posts);
        } else {
            echo "'¡Acceso directo al script no permitido!'";
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {

            $del_id = $this->input->post('del_id');

            if ($this->SeccionesModel->delete_entry($del_id)) {
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

            if ($post = $this->SeccionesModel->single_entry($edit_id)) {
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

            $this->form_validation->set_rules('edit_descripcion', 'Descripción', 'required|min_length[1]');
            $this->form_validation->set_rules('edit_turno', 'Turno', 'required');
            $this->form_validation->set_rules('edit_aula', 'Aula', 'required');
            $this->form_validation->set_rules('edit_cupo', 'Cupo', 'required');
            $this->form_validation->set_rules('edit_grado', 'Grado', 'required');

            $this->form_validation->set_message('required', 'El campo %s es requerido.');
            $this->form_validation->set_message('min_length', 'El campo %s debe tener como minimo %s caracteres.');

            if ($this->form_validation->run()) {
                $ajax_data = $this->input->post();


                $data_['IDSeccion'] =  $ajax_data["edit_id"];
                $data_['Descripcion'] =  $ajax_data["edit_descripcion"];
                $data_['Turno'] =  $ajax_data["edit_turno"];
                $data_['Aula'] =  $ajax_data["edit_aula"];
                $data_['Cupo'] =  $ajax_data["edit_cupo"];
                $data_['IDGrado'] =  $ajax_data["edit_grado"];

                if ($this->SeccionesModel->update_entry($data_)) {
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

    public function report_secciones()
    {

        $this->load->library("table");

        $this->load->library('Report');

        $pdf = new Report(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->titulo = "Listado de Secciones";

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Author');
        $pdf->SetTitle('Listado de Secciones');
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

        $this->table->set_heading('ID', 'Sección', 'Turno', 'Aula', 'Cupo', 'Grado');

        $seciones = $this->SeccionesModel->get_entries();

        foreach ($seciones as $seccion) :
            $this->table->add_row($seccion->ID, $seccion->Seccion, $seccion->Turno, $seccion->Aula, $seccion->Cupo, $seccion->Grado);
        endforeach;


        $html = $this->table->generate();

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->lastPage();

        $pdf->Output(md5(time()) . '.pdf', 'I');
    }
}
