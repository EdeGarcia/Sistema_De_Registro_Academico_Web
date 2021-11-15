<?php
class EstudiantesModel extends CI_Model
{
    public function get_entries()
    {
        $query = $this->db->get('Estudiantes');
        return $query->result();
    }

    public function insert_entry($data)
    {
        return $this->db->insert('Estudiantes', $data);
    }

    public function delete_entry($id)
    {
        return $this->db->delete('Estudiantes', array('IDEstudiante' => $id));
    }

    public function single_entry($id)
    {
        $this->db->select('*');
        $this->db->from('Estudiantes');
        $this->db->where('IDEstudiante', $id);
        $query = $this->db->get();

        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update_entry($data)
    {
        return $this->db->update('Estudiantes', $data, array('IDEstudiante' => $data['IDEstudiante']));
    }
}
