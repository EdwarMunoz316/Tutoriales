var usuario = "Sneider";

var miObjeto = {
  //clave : valor  "Se separan por un : "
  nombre: "Edwar",
  edad: 18,
  importante: true,
  texto: `Usuario ${usuario}`,
  miFuncion: (a, b) => a + b,
  otroObjeto: {
    nombre: "Laura",
    Genero: "Femenino",
  },
  fecha: new Date(),
};

console.log(miObjeto.miFuncion(5, 8));
console.log(miObjeto.otroObjeto.nombre);
console.log(miObjeto.fecha.getFullYear());

var { nombre, edad } = miObjeto; //Esto es la desestructuración de un objecto

console.log(nombre);
