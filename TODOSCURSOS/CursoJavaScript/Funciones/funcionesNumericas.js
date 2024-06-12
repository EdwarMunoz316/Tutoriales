var numero = 50;
var numero1 = "51";
var numero2 = 50.123456789;

var res = Number.isInteger(numero); // Dice si es entero o no

var res1 = Number.parseInt(numero1); // Convierte un String a Int

var res2 = Number.parseFloat(numero2).toFixed(3); // Pone el toFixed la cantidad de decimales que quiere

console.log(res);
console.log(res1);
console.log(res2);
