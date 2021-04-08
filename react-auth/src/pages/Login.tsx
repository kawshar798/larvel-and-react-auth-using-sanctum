import React from "react";

const login = () => {
    return (
        <div>
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
            <button className="bnt btn-success">submit</button>
        </div>
    );
};
export default login;
