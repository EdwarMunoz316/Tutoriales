import React from "react";

const Btn = ({ add }) => {
  console.log("add se agrego");

  return <button onClick={add}>+1</button>;
};

export default React.memo(Btn);
