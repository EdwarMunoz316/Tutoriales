import React from "react";

const Dato = ({ value }) => {
  console.log("Otra");
  return <p>{value}</p>;
};

export default React.memo(Dato);
