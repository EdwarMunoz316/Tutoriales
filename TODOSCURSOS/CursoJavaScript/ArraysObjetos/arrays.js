var persona = {
  nombre: "Laura",
  miAuto: [
    (pintura = {
      marca: "Audi",
      modelo: 2024,
      color: "verde",
    }),
    (vendedor = {
      nombre: "Juan",
      edad: 30,
      ayudante: {
        nombre: "Felipe",
      },
    }),
  ],
};

var miArray = [
  "Edwar",
  2024,
  34.9,
  true,
  ["Otro Array", "Sneider", 316],
  persona,
];

console.log(miArray[0]); //Los Array empiezan desde 0
console.log(miArray[4][0]); //Para acceder a otro Array dentro de miArray
console.log(miArray[5].nombre); //para acceder al Objecto

console.log(miArray[5].miAuto[1].ayudante.nombre);
