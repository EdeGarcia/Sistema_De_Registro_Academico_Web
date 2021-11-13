<?php
class ResponsablesModel extends CI_Model
{
    public function get_entries()
    {
        $query = $this->db->get('Responsables');
        return $query->result();
    }

    public function insert_entry($data)
    {
        return $this->db->insert('Responsables', $data);
    }

    public function delete_entry($id)
    {
        return $this->db->delete('Responsables', array('IDResponsable' => $id));
    }

    public function single_entry($id)
    {
        $this->db->select('*');
        $this->db->from('Responsables');
        $this->db->where('IDResponsable', $id);
        $query = $this->db->get();

        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update_entry($data)
    {
        return $this->db->update('Responsables', $data, array('IDResponsable' => $data['IDResponsable']));
    }
}
