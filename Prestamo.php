<?php
require_once 'Data_Libro.php';

class Prestamo{
    private $libro;
    private $usuario;
    private $fechaPrestamo;
    private $fechaDevolucion;

    public function __construct(Data_Libro $libro, $usuario)
    {
        $this->libro = $libro;
        $this->usuario = $usuario;
        $this->fechaPrestamo = date('d-m-Y');//reperesenta la fecha actual al generar el préstamo
        $this->fechaDevolucion = null;//No se devuelve al inicio sino que se completa al devolver el libro
    }

    public function getLibro()
    {
        return $this->libro;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getFechaPrestamo()
    {
        return $this->fechaPrestamo;
    }

    public function getFechaDevolucion()
    {
        return $this->fechaDevolucion;
    }

    //metodo de registrar devolucion
    public function devolverLibro(){

        //Cambia el estado del libro a disponible
        $this->fechaDevolucion = date('d-m-Y');
        $this->libro->setDisponible(true); //Marcar el libro como disponible nuevamente
        echo "Libro '{$this->libro->getTitulo()}' ha sido devuelto por '{$this->usuario}' <br>";
    }

    //metodo mostrar info del prestamo
    public function mostrarDatosPrestamo(){
        echo "Usuario: {$this->usuario}<br>";
        echo "Libro: {$this->libro->getTitulo()}<br>";
        echo "Fecha de préstamo: {$this->fechaPrestamo}<br>";
        echo "Fecha de devolución: " . ($this->fechaDevolucion ?? "Pendiente") . "<br><hr>";

    }
}

?>