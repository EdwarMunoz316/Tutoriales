import React from 'react'
import PropTypes from "prop-types";
import "./card.css"

const card = ({lang, img, fcolor, scolor}) => {
  return (
    <div className="card" style={{
      background: `linear-gradient(to left, ${fcolor}, ${scolor})`,
    }}>
        <img src={img} alt="lang.svg" />
        <h3>{lang}</h3>
    </div>
  )
}

card.propTypes = {
    lang: PropTypes.string,
    img: PropTypes.string,
    fcolor: PropTypes.string,
    scolor: PropTypes.string,
}

export default card