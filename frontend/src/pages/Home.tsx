import axios from "axios";
import React, { useEffect } from "react";

const Home = () => {
  useEffect(() => {
    (async () => {
      try {
        const response = await axios.get("user");
        console.log(response);
      } catch (e) {}
    })();
  }, []);

  return (
    <div>
      <h2>Home</h2>
    </div>
  );
};
export default Home;
