<?php

class Data_Libro
{
    //Atributos privados (encapsulación), y solo pueden ser modificados mediante métodos (getters y setters).
    private $id;
    private $titulo;
    private $categoria;
    private $autor;

    //se ejecuta automáticamente cuando se crea un objeto de esta clase
    function __construct($id, $titulo, $categoria, $autor)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->autor = $autor;
    }

    //GET y SET (Encapsulación), métodos para acceder y modificar atributos privados
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }


    public function mostrarInformacion() //Método adicional
    {
        echo "ID: {$this->id}<br>";
        echo "Título: {$this->titulo}<br>";
        echo "Categoría: {$this->categoria}<br>";
        echo "Autor: {$this->autor}<br>";
    }
}
