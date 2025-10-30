<?php
require_once './Data_Libro.php'; //Importar archivo \
require_once 'Biblioteca.php';

//Objetos de tipo Data_libro
$libro1 = new Data_Libro(1, "Six of crows", "Novela", "Leigh Bardugo");
$libro2 = new Data_Libro(2, "La nación de las bestias: El Señor del Sabbath", "Novela", "Mariana Palova");
$libro3 = new Data_Libro(3, "Assistant of the Villain", "Novela", "Hannah Nicole Maehrer");

//Se crea la biblioteca
$biblioteca = new Biblioteca();

//Se agregan los libros
$biblioteca->agregarLibro($libro1);
$biblioteca->agregarLibro($libro2);
$biblioteca->agregarLibro($libro3);

echo "<hr>";
$biblioteca->mostrarLibros(); //mostrándolos


//Buscar libro por titulo-------------------------------------
echo "<hr>";
echo "<h3> Búsqueda de libro: </h3>";
$biblioteca->buscarLibroPorTitulo("Six of crows");

//Aplicando modificaciones--------------------------------------------
$libro2->setCategoria(
    "Novela-Saga"
);

echo "<hr>";
echo "<h3>Después de editar categoría del libro 2</h3>";
$libro2->mostrarInformacion();

//Eliminar libro por titulo--------------------------------------
echo "<hr>";
echo "<h3> Eliminando libro </h3>";
$biblioteca->eliminarLibroPorId(1);

echo "<hr>";
$biblioteca->mostrarLibros(); //mostrándolos

?>