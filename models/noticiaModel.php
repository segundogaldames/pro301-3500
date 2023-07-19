<?php

class noticiaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getNoticias()
    {
        $noticias = $this->_db->query("SELECT n.id, n.titulo, n.vigente, u.nombre as autor FROM noticias n INNER JOIN usuarios u ON n.usuario_id = u.id ORDER BY n.id DESC");
        return $noticias->fetchall();
    }

    public function getNoticiaId($id)
    {
        $id = (int) $id;
        $rol = $this->_db->prepare("SELECT n.id, n.titulo, n.descripcion, n.vigente, n.created_at, n.updated_at, u.nombre as autor FROM noticias n INNER JOIN usuarios u ON n.usuario_id = u.id WHERE n.id = ?");
        $rol->bindParam(1, $id);
        $rol->execute();

        return $rol->fetch();
    }

    public function getNoticiaTitulo($titulo)
    {
        $titulo = ucfirst(strtolower($titulo));
        
        $noticia = $this->_db->prepare("SELECT id FROM noticias WHERE titulo = ?");
        $noticia->bindParam(1, $titulo);
        $noticia->execute();

        return $noticia->fetch();
    }

    public function addNoticia($titulo, $descripcion)
    {
        $titulo = ucfirst(strtolower($titulo));
        
        $noticia = $this->_db->prepare("INSERT INTO noticias(titulo, descripcion, vigente, usuario_id, created_at, updated_at) VALUES(?,?, 2, ?, now(), now())");
        $noticia->bindParam(1, $titulo);
        $noticia->bindParam(2, $descripcion);
        $noticia->bindParam(3, Session::get('user_id'));
        $noticia->execute();

        $row = $noticia->rowCount();
        return $row;
    }

    public function editNoticia($id, $titulo, $descripcion, $vigente)
    {
        $id = (int) $id;

        $noticia = $this->_db->prepare("UPDATE noticias SET titulo = ?, descripcion = ?, vigente = ?, updated_at = now() WHERE id = ?");
        $noticia->bindParam(1, $titulo);
        $noticia->bindParam(2, $descripcion);
        $noticia->bindParam(3, $vigente);
        $noticia->bindParam(4, $id);
        $noticia->execute();

        $row = $noticia->rowCount();
        return $row;
    }
}
