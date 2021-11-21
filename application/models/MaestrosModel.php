<?php

class MaestrosModel extends CI_Model
{
    public function all_masters()
    {
        $query = $this->db->query("SELECT a.IDMaestro, CONCAT(b.Nombres, ' ', b.Apellidos) AS Maestro,b.Titulo ,b.DUI 
                                  FROM maestros a, empleados b
                                  WHERE a.IDEmpleado = b.IDEmpleado"); 
        return $query->result();
    }

    //Insertando registro
    public function insert_entry($data)
    {
        return $this->db->insert('Maestros', $data);
    }

    //Eliminando registro
    public function delete_entry($id)
    {
        return $this->db->delete('Maestros', array('IDMaestro' => $id));
    }
}
