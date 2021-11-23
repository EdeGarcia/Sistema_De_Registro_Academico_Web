<?php

class NotasModel extends CI_Model
{
    public function notas_grado_seccion($idMateria, $idPeriodo, $idGrado, $idSeccion)
    {
        $query = $this->db->query("SELECT b.NIE, b.Apellidos, b.Nombres,
        (SELECT FechaNota FROM Notas WHERE IDEstudiante = a.IDEstudiante AND IDMateria = '" . $idMateria . "' AND IDPeriodo = '" . $idPeriodo . "') AS FechaNota,
        (SELECT Nota FROM Notas WHERE IDEstudiante = a.IDEstudiante AND IDMateria = '" . $idMateria . "' AND IDPeriodo = '" . $idPeriodo . "') AS Nota,
        (SELECT IDNota FROM Notas WHERE IDEstudiante = a.IDEstudiante AND IDMateria = '" . $idMateria . "' AND IDPeriodo = '" . $idPeriodo . "') AS IDNota,
        a.IDEstudiante
        FROM Matriculas a, Estudiantes b
        WHERE a.IDEstudiante = b.IDEstudiante AND IDGrado = '" . $idGrado . "' AND IDSeccion = '" . $idSeccion . "'  ");

        return $query->result();
    }

    public function insert_entry($data)
    {
        return $this->db->insert('Notas', $data);
    }

    public function update_entry($data)
    {
        return $this->db->update('Notas', $data, array('IDNota' => $data['IDNota']));
    }
}
