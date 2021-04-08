import React from "react";
import { BrowserRouter, Route } from "react-router-dom";
import "./App.css";
import Home from "./pages/Home";
import Login from "./pages/Login";
import Register from "./pages/Register";
function App() {
    return (
        <div>
            <BrowserRouter>
                <Route path="/" exact component={Home} />
                <Route path="/login" component={Login} />
                <Route path="/register" component={Register} />
            </BrowserRouter>
        </div>
    );
}

export default App;
