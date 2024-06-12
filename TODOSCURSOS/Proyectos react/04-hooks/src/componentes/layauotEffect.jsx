import React, { useState, useLayoutEffect } from "react";
import { useEffect } from "react";

const LayauotEffect = () => {
  const [data, setData] = useState([]);

  const [length, setLength] = useState(0);

  const newData = [
    {
      name: "Edwar",
      email: "edwar@email.com",
    },
    {
      name: "Edwar",
      email: "edwar@email.com",
    },
    {
      name: "Edwar",
      email: "edwar@email.com",
    },
  ];

  useEffect(() => {
    setTimeout(() => {
      setData(newData);
    }, 5000);
  }, [newData]);

  useLayoutEffect(() => {
    const tam = data.length;
    setLength(tam);
  }, []);

  return (
    <>
      <h1>useLayoutEffect</h1>
      <hr />
      <p>Valores: {length}</p>
    </>
  );
};

export default LayauotEffect;
