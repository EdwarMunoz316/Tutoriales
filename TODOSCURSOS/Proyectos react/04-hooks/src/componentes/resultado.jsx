import React from "react";
import PropTypes from "prop-types";

const Resultado = ({ operacion, calculo }) => {
  return (
    <div>
      <br />
      <span>
        {operacion}:{" "}
        <h1 className={calculo < 0 ? "menor" : "mayor"}>{calculo}</h1>
      </span>
    </div>
  );
};

Resultado.propTypes = {
  operacion: PropTypes.string,
  calculo: PropTypes.number,
};

export default Resultado;
