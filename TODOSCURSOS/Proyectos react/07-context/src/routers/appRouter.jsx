import React from "react";
import { Route, Routes, BrowserRouter } from "react-router-dom";

import Header from "../components/header";
import Home from "../pages/home";
import About from "../pages/about";
import NotFound from "../pages/notFound";

const AppRouter = () => {
  return (
    <BrowserRouter>
      <Header />

      <Routes>
        <Route exact path="/" element={<Home />} />
        <Route exact path="/about" element={<About />} />
        <Route path="*" element={<NotFound />} />
      </Routes>
    </BrowserRouter>
  );
};

export default AppRouter;
