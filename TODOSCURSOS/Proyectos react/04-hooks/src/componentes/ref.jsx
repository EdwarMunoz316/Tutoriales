import React, { useRef } from "react";

const Ref = () => {
  const ref = useRef(null);

  const handleRef = () => {
    ref.current.placeholder = "Escribe un mensaje...";
  };

  return (
    <>
      <h1 onClick={handleRef}>useRef</h1>
      <hr />
      <textarea ref={ref}></textarea>
    </>
  );
};

export default Ref;
