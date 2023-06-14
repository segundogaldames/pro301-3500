<?php

class usuarioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios()
    {
        $usuarios = $this->_db->query("SELECT u.id, u.run, u.nombre, u.activo, r.nombre as rol FROM usuarios u INNER JOIN roles r ON u.rol_id = r.id ORDER BY u.id DESC");
        return $usuarios->fetchall();
    }

    public function getUsuarioId($id)
    {
        $id = (int) $id;
        $usuario = $this->_db->prepare("SELECT u.id, u.run, u.nombre, u.email, u.activo, r.nombre as rol, u.created_at, u.updated_at FROM usuarios u INNER JOIN roles r ON u.rol_id = r.id WHERE u.id = ?");
        $usuario->bindParam(1, $id);
        $usuario->execute();

        return $usuario->fetch();
    }

    public function getUsuarioRun($run)
    {
        
        $usuario = $this->_db->prepare("SELECT id FROM usuarios WHERE run = ?");
        $usuario->bindParam(1, $run);
        $usuario->execute();

        return $usuario->fetch();
    }

    public function addUsuario($run, $nombre, $email, $password, $rol)
    {
        $nombre = ucfirst(strtolower($nombre));
        $password = Hash::getHash('sha256', $password, HASH_KEY);
        
        $usuario = $this->_db->prepare("INSERT INTO usuarios(run, nombre, email, password, activo, rol_id, created_at, updated_at) VALUES(?, ?, ?, ?, 1, ?, now(), now())");
        $usuario->bindParam(1, $run);
        $usuario->bindParam(2, $nombre);
        $usuario->bindParam(3, $email);
        $usuario->bindParam(4, $password);
        $usuario->bindParam(5, $rol);
        $usuario->execute();

        $row = $usuario->rowCount();
        return $row;
    }

    public function editUsuario($id, $run, $nombre, $email, $activo, $rol)
    {
        $id = (int) $id;

        $usuario = $this->_db->prepare("UPDATE usuarios SET run = ?, $nombre = ?, email = ?, activo = ?, rol_id = ?, updated_at = now() WHERE id = ?");
        $usuario->bindParam(1, $run);
        $usuario->bindParam(2, $nombre);
        $usuario->bindParam(3, $email);
        $usuario->bindParam(4, $activo);
        $usuario->bindParam(5, $rol);
        $usuario->bindParam(6, $id);
        $usuario->execute();

        $row = $usuario->rowCount();
        return $row;
    }

    function editPassword($id, $password)
    {
        $password = Hash::getHash('sha256', $password, HASH_KEY);

        $usuario = $this->_db->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
        $usuario->bindParam(1, $password);
        $usuario->bindParam(2, $id);
        $usuario->execute();

        $row = $usuario->rowCount();
        return $row;
    }
}
