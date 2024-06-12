<?php

    #Array tipo escalar
    $estudiantes = ['Carlos', 'Edwar', "Vanessa", "Katy",7];

    $estudiantes[3] = 'Claudia';

    echo $estudiantes[4]."<br>";

    #Array tipo asociativo
    $tutor=[
        "nombre"=>"Jose",
        "apelido"=>"Muñoz",
        "edad"=>22
    ];

    $tutor["edad"]=19;

    echo $tutor["edad"]."<br>";

    #Array de multiples dimensiones
    $tutor2=[
        "nombre"=>"Vanesa",
        "apellido"=>"Calles",
        "edad"=>20,
        "cursos"=>["PHP","Python","CSS"]
    ];

    $tutor2["cursos"][2]="JAVA";

    echo $tutor2["cursos"][2]."<br>";

    #Contar cuantos datos tiene un Array
    echo count($estudiantes)."<br>";
    echo count($tutor)."<br>";
    echo count($tutor2,COUNT_RECURSIVE)."<br>";
?>