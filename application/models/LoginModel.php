<?php

class LoginModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function validate($user, $password)
    {
        $this->db->where('Usuario', $user);
        $this->db->where('Clave', $password);
        $query = $this->db->get('Usuarios', 1);

        return $query;
    }
}
