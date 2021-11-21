<?php

class MaestrosSeccionesModel extends CI_Model
{

    public function get_entries()
    {
        $query = $this->db->query("SELECT a.IDMaestro_Seccion, CONCAT(d.Nombres, ' ', d.Apellidos) AS Maestro, e.Descripcion AS Grado ,c.Descripcion AS Seccion, c.Turno
                                    FROM maestros_secciones a, maestros b, secciones c, empleados d, grados e
                                    WHERE a.IDMaestro = b.IDMaestro AND a.IDSeccion = c.IDSeccion AND b.IDEmpleado = d.IDEmpleado AND c.IDGrado = e.IDGrado");
        return $query->result();
    }

    //Insertando registro
    public function insert_entry($data)
    {
        return $this->db->insert('Maestros_Secciones', $data);
    }

    //Eliminando registro
    public function delete_entry($id)
    {
        return $this->db->delete('Maestros_Secciones', array('IDMaestro_Seccion' => $id));
    }
}
