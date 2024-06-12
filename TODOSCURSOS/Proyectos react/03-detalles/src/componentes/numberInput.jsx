import React from 'react'
import { useState } from 'react'
import PropTypes from 'prop-types'
import Resultado from './resultado'
import "./calculadora.css"

const NumberInput = () => {

  const [numeros, setNumeros] = useState({
    numero1: 0,
    numero2: 0,
  });

  const { numero1, numero2 } = numeros;

  const handleChange = (e) => {
    setNumeros({
        ...numeros,
        [e.target.name]: parseFloat(e.target.value),
    });
  }

  const suma = () => numero1 + numero2
  const resta = () => numero1 - numero2
  const multiplicacion = () => numero1 * numero2
  const division = () => numero1 / numero2

  return (
    <>
        <label className="mx-2">
            Numero 1: {""}
            <input name="numero1" value={numero1} onChange={handleChange} type="number" />
        </label>
        <label>
            Numero 2: {""}
            <input name="numero2" value={numero2} onChange={handleChange} type="number" />
        </label>

        <div>
          <section className="suma">
            <Resultado operacion="Suma" calculo={suma()}/>
          </section>
          <section className="resta">
            <Resultado operacion="Resta" calculo={resta()}/>
          </section>
          <section className="multi">
            <Resultado operacion="Multiplicacion" calculo={multiplicacion()}/>
          </section>
          <section className="div">
            <Resultado operacion="Division" calculo={division()}/>
          </section>
        </div>
    </>
  )
}

NumberInput.propTypes = {
    name: PropTypes.string,
}

export default NumberInput