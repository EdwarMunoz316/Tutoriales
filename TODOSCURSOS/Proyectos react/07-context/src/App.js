import React, { useState } from "react";
import AppRouter from "./routers/appRouter";
import { UserContext } from "./contexts/userContext";

const App = () => {
  const [user, setUser] = useState(null);

  return (
    <UserContext.Provider value={{ user, setUser }}>
      <AppRouter />
    </UserContext.Provider>
  );
};

export default App;
