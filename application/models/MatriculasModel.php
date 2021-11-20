<?php

class MatriculasModel extends CI_Model
{
    //Secciones de un grado
    public function secciones_de_un_grado($idGrado)
    {
        $query = $this->db->query("SELECT IDSeccion, Descripcion FROM secciones WHERE IDGrado = '" . $idGrado . "'");
        return $query->result();
    }

    //Cargar estudiantes segun la busqueda
    public function cargar_estudiantes_($query)
    {
        $this->db->select("*");
        $this->db->from("Estudiantes");
        if ($query != '') {
            $this->db->like('Nombres', $query);
            $this->db->or_like('Apellidos', $query);
            $this->db->or_like('NIE', $query);
        }
        $this->db->order_by('IDEstudiante', 'DESC');
        return $this->db->get();
    }

    public function insert_entry($data)
    {
        return $this->db->insert('Matriculas', $data);
    }

    public function all_matriculas($idGrado, $idSeccion)
    {
        $query = $this->db->query("SELECT a.IDMatricula, b.NIE, b.Apellidos, b.Nombres 
                                  FROM matriculas a, estudiantes b
                                  WHERE a.IDEstudiante = b.IDEstudiante AND a.IDGrado =" . $idGrado . " AND a.IDSeccion = " . $idSeccion);

        return $query->result();
    }

    public function delete_entry($id)
    {
        return $this->db->delete('Matriculas', array('IDMatricula' => $id));
    }
}
