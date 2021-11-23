<?php

class GradosMateriasModel extends CI_Model
{
    //Materias de un grado
    public function subjects_of_grade($idGrado)
    {
        $query = $this->db->query("SELECT a.IDGrado_Materia, c.Nombre, C.Descripcion, a.IDMateria 
                                   FROM grados_materias a, grados b, materias c 
                                   WHERE a.IDGrado = b.IDGrado AND a.IDMateria = c.IDMateria AND a.IDGrado = " . $idGrado);
        return $query->result();
    }

    public function insert_entry($data)
	{
		return $this->db->insert('Grados_Materias', $data);
	}

    public function delete_entry($id)
    {
        return $this->db->delete('Grados_Materias', array('IDGrado_Materia' => $id));
    }
}
