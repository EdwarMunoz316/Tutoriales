//For normal

for (let i = 1; i <= 10; i++) {
  if (i == 1) {
    console.log(`Hola ${i} vez`);
  } else {
    console.log(`Hola ${i} veces`);
  }
}

//For con Array

var miArray = ["Hola", 2024, "Adios"];

for (let e = 0; e < miArray.length; e++) {
  const element = miArray[e];
  console.log(element);
}

//For con Object

var persona1 = {
  nombre: "Edwar",
  edad: 18,
};
var persona2 = {
  nombre: "Laura",
  edad: 20,
};
var persona3 = {
  nombre: "Jefferson",
  edad: 18,
};

var personas = [persona1, persona2, persona3];

for (let x = 0; x < personas.length; x++) {
  console.log(personas[x].nombre);
}

//For Each

personas.forEach((element) => console.log(element.edad));
