<?php

class MatriculasModel extends CI_Model
{
    //Secciones de un grado
    public function secciones_de_un_grado($idGrado)
    {
        $query = $this->db->query("SELECT IDSeccion, Descripcion FROM secciones WHERE IDGrado = '". $idGrado . "'");
        return $query->result();
    }

    
}
