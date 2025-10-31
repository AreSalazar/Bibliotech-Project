<?php
require_once './Data_Libro.php';
require_once 'Prestamo.php';

class Biblioteca
{
    private $libros = []; //array de libros
    private $prestamos = [];//array de prestamos

    //Método agregar un nuevo libro a biblioteca
    public function agregarLibro(Data_Libro $libro)
    {
        $this->libros[] = $libro;
        echo "Libro agregado a la biblioteca: " . $libro->getTitulo() . "<br>";
    }

    //Método para mostrar resultado
    public function mostrarLibros()
    {
        if (empty($this->libros)) {
            echo "Biblioteca sin libros registrados <br>";
            return;
        }

        echo "<h3> Lista de libros disponibles: </h3>";

        //$this->libros es el array de libros
        //as es para recorrer cada libro en el array, significa "como" y sirve para asignar un nombre temporal a cada elemento del array
        //$libro es el nombre temporal para cada libro en el array
        foreach ($this->libros as $libro) {
            $libro->mostrarInformacion();
            echo "<hr>";
        }
    }

    //Método para buscar un libro por titulo
    public function buscarLibroPorTitulo($titulo)
    {

        foreach ($this->libros as $libro) {
            //strcasecmp es para comparar cadenas sin importar mayúsculas o minúsculas
            //$libro->getTitulo() obtiene el título del libro actual en el bucle
            //get se utiliza para acceder al atributo privado titulo del objeto Data_Libro 
            //mientras que set se utiliza para modificarlo
            //$titulo es el título que se está buscando
            if (strcasecmp($libro->getTitulo(), $titulo) === 0) {
                
                echo "Libro encontrado: <br>";
                $libro->mostrarInformacion();
                return $libro;
            }
        }

        echo "Sin resultado de búsqueda por título<br>";
        return null; //retorna null si no se encuentra el libro
    }

    //método para prestar un libro
    public function prestarLibro($titulo, $usuario){

        //Buscar el libro por título
        $libro = $this->buscarLibroPorTitulo($titulo);

        if($libro === null){
            echo "Sin resultado del libro '$titulo' . <br>";
            return;
        }

        if(!$libro->isDisponible()){
            echo "El libro '{$libro->getTitulo()}' ya está prestado <br>";
            return;
        }

        //Se crea el préstamo y se marca el libro como no disponible
        $prestamo = new Prestamo($libro, $usuario);//crear objeto préstamo que asocia el libro y el usuario
        //un objeto Prestamo contiene un objeto Data_Libro y el nombre del usuario que lo pidió prestado
        
        $libro->setDisponible(false);//marcar el libro como no disponible
        $this->prestamos[] = $prestamo; //agregar el préstamo al array de préstamos

        echo "El libro '{$libro->getTitulo()}' fue prestado a {$usuario} <br>";

    }

    //Método para mostrae todos los preatamos registrados
    public function mostrarListaPrestamos(){
        if(empty($this->prestamos)){
            echo "No hay prestamos registrados . <br>";
            return;
        }

        echo "<h3> Lista de préstamos: </h3>";
        foreach($this->prestamos as $prestamo){//recorrer cada préstamo en el array
            $prestamo->mostrarDatosPrestamo();
        }
    }

    //Método para eliminar un libro por su ID
    public function eliminarLibroPorId($id)
    {
        //$this->libros es el array de libros
        //as es para recorrer cada libro en el array, significa "como" y sirve para asignar un nombre temporal a cada elemento del array
        //$index es el índice actual en el array, es el nombre temporal para el índice
        //=> es el operador que asocia el índice con el valor en el array
        //$libro es el nombre temporal para cada libro en el array
        foreach ($this->libros as $index => $libro) {

            //$libro->getId() obtiene el ID del libro actual en el bucle
            //get se utiliza para acceder al atributo privado id del objeto Data_Libro
            //$id es el ID que se está buscando para eliminar
            if ($libro->getId() == $id) {
                

                //unset elimina el libro del array en la posición $index
                unset($this->libros[$index]);
                echo "Libro con ID $id eliminado correctamente <br>";

                //Se organiza el array para evitar huecos
                //array_values reindexa el array para que los índices sean consecutivos
                $this->libros = array_values($this->libros);
                return;
            }
        }

        echo "Sin resultados de libros con el id $id para eliminar<br>";
    }
}
