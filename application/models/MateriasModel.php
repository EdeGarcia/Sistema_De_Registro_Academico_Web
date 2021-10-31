<?php
class MateriasModel extends CI_Model
{
    public function get_entries()
    {
        $query = $this->db->get('Materias');
        return $query->result();
    }

    public function insert_entry($data)
    {
        return $this->db->insert('Materias', $data);
    }

    public function delete_entry($id)
    {
        return $this->db->delete('Materias', array('IDMateria' => $id));
    }

    public function single_entry($id)
    {
        $this->db->select('*');
        $this->db->from('Materias');
        $this->db->where('IDMateria', $id);
        $query = $this->db->get();

        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update_entry($data)
    {
        return $this->db->update('Materias', $data, array('IDMateria' => $data['IDMateria']));
    }
}
