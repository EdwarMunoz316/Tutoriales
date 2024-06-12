import React from 'react'
import Calculadora from './componentes/calculadora'
import State from './componentes/state'
import Effect from './componentes/effect'
import LayauotEffect from './componentes/layauotEffect'
import Ref from './componentes/ref'
import Memorize from './componentes/memos/memorize'
import "./componentes/calculadora.css"
import Custom from './componentes/custom'

const App = () => {
  return (

    <div className='container text-center'>
      <Memorize />
    </div>
    
    // <State />

    /* <div className="container text-center">
      <h1 className="titulo">Calculadora - PWA</h1>
      <hr />

      <Calculadora />
    </div> */
  )
}

export default App