<?php 
class PeriodosModel extends CI_Model
{
    PUBLIC function get_entries()
    {
        $query = $this->db->get('Periodo');
        return $query->result();
    }
    public function insert_entry($data)
    {
        return $this->db->insert('Periodo', $data);
    }
    public function delete_entry($id)
    {
        return $this->db->delete('Periodo', array('IDPeriodo' => $id));
    }
    public function single_entry($id)
    {
        $this->db->select('*');
        $this->db->from('Periodo');
        $this->db->where('IDPeriodo', $id);
        $query = $this->db->get();

        if(count($query->result())>0){
            return $query->row();
        }
    }
    public function update_entry($data)
    {
        return $this->db->update('Periodo', $data, array('IDPeriodo' => $data['IDPeriodo']));
    }
}
?>