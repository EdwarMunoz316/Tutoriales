var acceso = true;

var accesoU = (a) => a; // Retorna solo un valor

var accesoU = (a, nombre) => {
  console.log(`Usuario ${nombre}`);
  return a;
};

accesoU(acceso, "Edwar") == true
  ? console.log("Permitido")
  : console.log("Denegado");
