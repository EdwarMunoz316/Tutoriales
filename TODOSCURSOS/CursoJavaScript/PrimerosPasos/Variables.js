//var, variables globales

var saludo = "Hola mundo";
if (saludo) {
  var saludo = "HOlA";
  console.log(saludo);
}
console.log(saludo);

//let, variables limitadas al alcance del bloque donde las definimos

let nombre = "Edwar";
if (nombre) {
  let nombre = "Laura";
  console.log(nombre);
}

console.log(nombre);

//const, varibales inmutables

const pi = 3.14;
console.log(pi);
