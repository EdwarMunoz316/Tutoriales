import React, { useState, useMemo, useCallback } from "react";
import Dato from "./dato";
import Btn from "./btn";
import { UseMemorize } from "../../hooks/useMemorize";

const Memorize = () => {
  const [counter, pesadoMemo, add, hide] = UseMemorize();

  return (
    <>
      <h1>
        Memorizes: <Dato value={counter} />
      </h1>
      <hr />

      <pre>{pesadoMemo}</pre>

      <Btn add={add} />
      <button onClick={hide}>Ver/Quitar</button>
    </>
  );
};

export default Memorize;
