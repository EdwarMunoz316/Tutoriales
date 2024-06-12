import React, { useEffect, useReducer, useState } from "react";
import TablaContactos from "./tablaContactos";
import FormularioAdd from "./formularioAdd";
import { ContactosReducer } from "../reducers/contactosReducer";

const init = () => {
  const contactos = localStorage.getItem("contactos");
  return contactos ? JSON.parse(contactos) : [];
};

const Contactos = () => {
  const [state, dispatch] = useReducer(ContactosReducer, [], init);

  useEffect(() => {
    localStorage.setItem("contactos", JSON.stringify(state));
  }, [state]);

  const [formView, setFormView] = useState(false);

  const handleAparecer = () => {
    !formView ? setFormView(true) : setFormView(false);
  };

  return (
    <div className="container mt-3">
      <button onClick={handleAparecer} className="btn btn-success">
        {!formView ? "Agregar Contacto" : "Cerrar Formulario"}
      </button>
      {formView && <FormularioAdd dispatch={dispatch} />}

      <TablaContactos contactos={state} dispatch={dispatch} />
    </div>
  );
};

export default Contactos;
