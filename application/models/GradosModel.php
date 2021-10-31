<?php

class GradosModel extends CI_Model
{
    //Obtener todos los registros de la tabla
    public function get_entries()
    {
        $query = $this->db->get('Grados');
        return $query->result();
    }

    // Ingresar un registro a la base de datos
    public function insert_entry($data)
    {
        return $this->db->insert('Grados', $data);
    }

    // Eliminar un registro de la base de datos
    public function delete_entry($id)
    {
        return $this->db->delete('Grados', array('IDGrado' => $id));
    }

    //Obtener un solo registro para cargar al Modal la información
    public function single_entry($id)
    {
        $this->db->select('*');
        $this->db->from('Grados');
        $this->db->where('IDGrado', $id);
        $query = $this->db->get();

        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    //Actualizar un registro de la tabla
    public function update_entry($data)
    {
        return $this->db->update('Grados', $data, array('IDGrado' => $data['IDGrado']));
    }
}
