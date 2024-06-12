<?php

class persona{

    public $nombre; // Propiedades 
    private $edad;
    protected $altura;

    function __construct($nuevoNombre){
        $this->nombre = $nuevoNombre;
    }

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

$objAlumno= new persona("QWE"); // Instancia o creacion de un objeto
/* $objAlumno->asignarNombre("Edwar"); // Llamando un metodo */
$objAlumno->imprimirNombre(); 

?>