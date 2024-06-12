import React, { useContext } from "react";
import { UserContext } from "../contexts/userContext";

const About = () => {
  const { user } = useContext(UserContext);

  return (
    <div className="container text-center mt-5">
      <h1>About</h1>
      {!user ? (
        <h2 className="text-danger">Por Favor Ingrese</h2>
      ) : (
        <div>
          <h3>
            Nombre: {user.data.first_name} {user.data.last_name}
          </h3>
          <h3>Email: {user.data.email}</h3>
          <img
            src={user.data.avatar}
            alt={user.data.id}
            width="100px"
            height="100px"
          />
        </div>
      )}
    </div>
  );
};

export default About;
