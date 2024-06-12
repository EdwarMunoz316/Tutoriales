import React, { useState } from "react";
import { v4 as uuid } from "uuid";

const FormularioAdd = ({ dispatch }) => {
  const [data, setData] = useState({ nombre: "", numero: "" });
  const [error, setError] = useState("");

  const handleChange = (e) => {
    setData({
      ...data,
      [e.target.name]: e.target.value,
    });
  };

  const actionAdd = {
    type: "add",
    payload: {
      id: uuid(),
      nombre: data.nombre,
      numero: data.numero,
    },
  };

  const handleAdd = () => {
    const nombreValue = data.nombre.trim();
    const numeroValue = data.numero.trim();

    if (nombreValue === "" || numeroValue === "") {
      setError("Error: Los campos no pueden estar vacíos");
    } else {
      setError("");
      dispatch(actionAdd);
    }
  };

  const limpiar = () => {
    document.getElementById("nombre").value = "";
    document.getElementById("numero").value = "";
    setData({ nombre: "", numero: "" });
  };

  return (
    <>
      <div className="container">
        <label className="mx-1 d-grid gap-2">
          Nombre:{" "}
          <input
            id="nombre"
            onChange={handleChange}
            name="nombre"
            value={data.nombre}
            type="text"
            className="form-control"
            autoComplete="off"
            placeholder="Ingrese su nombre"
          />
        </label>
        <label className="mx-1 d-grid gap-2">
          Numero:{" "}
          <input
            id="numero"
            onChange={handleChange}
            name="numero"
            value={data.numero}
            type="text"
            className="form-control"
            autoComplete="off"
            placeholder="Ingrese su Numero"
          />
        </label>
        {error && <div className="alert alert-danger my-3">{error}</div>}
        <div className="mx-1 d-grid gap-2">
          <button onClick={handleAdd} className="btn btn-info mt-3">
            Agregar
          </button>
          <button onClick={limpiar} className="btn btn-info mt-3">
            Limpiar
          </button>
        </div>
      </div>
    </>
  );
};

export default FormularioAdd;
