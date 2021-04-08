import React from "react";

const Register = () => {
    return (
        <div>
            <div className="form-group">
                <label htmlFor="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" />
            </div>
            <div className="form-group">
                <label htmlFor="email">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                />
            </div>
            <div className="form-group">
                <label htmlFor="password">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="password"
                />
            </div>
            <div className="form-group">
                <label htmlFor="confirm_password">Password</label>
                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    placeholder="Confirm Password"
                />
            </div>
            <button className="bnt btn-success">submit</button>
        </div>
    );
};
export default Register;
