<?php
class SeccionesModel extends CI_Model
{
    public function get_entries()
    {
        $query = $this->db->query("SELECT a.IDSeccion, a.Descripcion, a.Turno, a.Aula, a.Cupo, b.IDGrado, b.Descripcion FROM Secciones a, Grados b WHERE a.IDGrado = b.IDGrado;");
        return $query->result();
    }

    public function insert_entry($data)
    {
        return $this->db->insert('Secciones', $data);
    }

    public function delete_entry($id)
    {
        return $this->db->delete('Secciones', array('IDSeccion' => $id));
    }

    public function single_entry($id)
    {
        $this->db->select('*');
        $this->db->from('Secciones');
        $this->db->where('IDSeccion', $id);
        $query = $this->db->get();

        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update_entry($data)
    {
        return $this->db->update('Secciones', $data, array('IDSeccion' => $data['IDSeccion']));
    }
}
