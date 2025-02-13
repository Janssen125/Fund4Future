require('./bootstrap');
import React from "react";
import ReactDOM from "react-dom/client";

function App() {
    return <h1>Hello, Fund4Future!</h1>;
}

ReactDOM.createRoot(document.getElementById("app")!).render(<App />);
