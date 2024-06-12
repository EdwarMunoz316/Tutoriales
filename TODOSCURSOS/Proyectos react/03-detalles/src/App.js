import React from 'react'
import Calculadora from './componentes/calculadora'
import "./componentes/calculadora.css"

const App = () => {
  return (
    <div className="container text-center">
      <h1 className="titulo">Calculadora - PWA</h1>
      <hr />

      <Calculadora />
    </div>
  )
}

export default App