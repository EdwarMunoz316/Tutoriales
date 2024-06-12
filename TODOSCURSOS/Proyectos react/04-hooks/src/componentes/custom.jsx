import React, { useState } from "react";
import { UseCounter } from "../hooks/useCounter";

const Custom = () => {
  const [counter, increment, decrement] = UseCounter(23, 5);

  return (
    <>
      <h1>CustomHook: {counter}</h1>
      <hr />

      <button onClick={increment}>+1</button>
      <button onClick={decrement}>-1</button>
    </>
  );
};

export default Custom;
