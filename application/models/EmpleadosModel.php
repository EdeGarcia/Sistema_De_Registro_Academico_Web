<?php
class EmpleadosModel extends CI_Model
{
	public function get_entries()
	{
		$query = $this->db->get('Empleados');
		return $query->result();
	}

	public function insert_entry($data)
	{
		return $this->db->insert('Empleados', $data);
	}

	public function delete_entry($id)
	{
		return $this->db->delete('Empleados', array('IDEmpleado' => $id));
	}

	public function single_entry($id)
	{
		$this->db->select('*');
		$this->db->from('Empleados');
		$this->db->where('IDEmpleado', $id);
		$query = $this->db->get();

		if (count($query->result()) > 0) {
			return $query->row();
		}
	}

	public function update_entry($data)
	{
		return $this->db->update('Empleados', $data, array('IDEmpleado' => $data['IDEmpleado']));
	}
}
