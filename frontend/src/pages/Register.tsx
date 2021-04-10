import axios from "axios";
import React, { SyntheticEvent, useState } from "react";
import { Redirect } from "react-router-dom";

const Register = () => {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [confirm_password, setConfirm_password] = useState("");

  const [redirect, setRedirect] = useState(false);
  const submit = async (e: SyntheticEvent) => {
    e.preventDefault();
    await axios.post("register", {
      name: name,
      email: email,
      password: password,
      confirm_password: confirm_password,
    });

    setRedirect(true);
  };

  if (redirect) {
    return <Redirect to="/login" />;
  }
  return (
    <div className="container">
      <form onSubmit={submit}>
        <div className="form-group row">
          <label htmlFor="name" className="col-md-4">
            Name
          </label>
          <input
            type="text"
            name="name"
            id="name"
            placeholder="Name"
            className="form-control"
            onChange={(e) => setName(e.target.value)}
          />
        </div>
        <div className="form-group">
          <label htmlFor="email">Email</label>
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email"
            className="form-control"
            onChange={(e) => setEmail(e.target.value)}
          />
        </div>
        <div className="form-group">
          <label htmlFor="password">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="password"
            className="form-control"
            onChange={(e) => setPassword(e.target.value)}
          />
        </div>
        <div className="form-group">
          <label htmlFor="confirm_password">Password</label>
          <input
            type="password"
            name="confirm_password"
            id="confirm_password"
            placeholder="Confirm Password"
            className="form-control"
            onChange={(e) => setConfirm_password(e.target.value)}
          />
        </div>
        <button className="btn btn-success">submit</button>
      </form>
    </div>
  );
};
export default Register;
