import React from "react";
import { Route, Routes, BrowserRouter } from "react-router-dom";
import LoginScreen from "../pages/loginScreen";

const LoginRouter = () => {
  return (
    <BrowserRouter>
      <Routes>
        <Route exact path="/login" element={<LoginScreen />} />
      </Routes>
    </BrowserRouter>
  );
};

export default LoginRouter;
