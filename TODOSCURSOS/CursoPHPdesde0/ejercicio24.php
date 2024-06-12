<?php

class persona{

    public $nombre; // Propiedades 
    private $edad;
    protected $altura;

    public function asignarNombre($nuevoNombre){ // Accion o metodos
        $this->nombre = $nuevoNombre;
    }

    public function imprimirNombre(){
        echo "Hola soy " . $this->nombre;
    }

    public function mostrarEdad() {
        $this->edad=20;
        return $this->edad;
    }
}

$objAlumno= new persona(); // Instancia o creacion de un objeto
$objAlumno->asignarNombre("Edwar"); // Llamando un metodo

$objAlumno2= new persona(); 
$objAlumno2->asignarNombre("Laura");
$objAlumno2->imprimirNombre();

echo $objAlumno->nombre; // Imprimir una propiedad

echo $objAlumno2->nombre;
echo $objAlumno2->mostrarEdad();

?>