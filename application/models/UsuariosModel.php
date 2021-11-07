<?php

class UsuariosModel extends CI_Model
{
    //Obtener todos los registros de la tabla
    public function get_entries()
    {
        $query = $this->db->get('Usuarios');
        return $query->result();
    }

    // Ingresar un registro a la base de datos
    public function insert_entry($data)
    {
        return $this->db->insert('Usuarios', $data);
    }

    // Eliminar un registro de la base de datos
    public function delete_entry($id)
    {
        return $this->db->delete('Usuarios', array('IDUsuario' => $id));
    }

    //Obtener un solo registro para cargar al Modal la información
    public function single_entry($id)
    {
        $this->db->select('*');
        $this->db->from('Usuarios');
        $this->db->where('IDUsuario', $id);
        $query = $this->db->get();

        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    //Actualizar un registro de la tabla
    public function update_entry($data)
    {
        return $this->db->update('Usuarios', $data, array('IDUsuario' => $data['IDUsuario']));
    }
}
