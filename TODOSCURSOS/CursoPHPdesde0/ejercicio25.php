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

class trabajador extends persona{

    public $puesto;

    public function presentarComoTrabajador(){
        echo "Hola soy $this->nombre y soy un $this->puesto";
    }

}

$objTrabajador= new trabajador(); // Instancia o creacion de un objeto
$objTrabajador->asignarNombre("Edwar"); // Llamando un metodo

$objTrabajador->puesto="Profesor";

$objTrabajador->presentarComoTrabajador();

?>