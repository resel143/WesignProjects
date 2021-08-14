import React from "react";

export const Header = (props) => {
  const { countCartItems } = props;
  return (
    <header>
      <div className="container bg-light rounded">
        <div className="row">
          <div className="col-10">
            <h1>Shopping Cart</h1>
          </div>
          <div className="col pt-2">
            <a href="#">
              <h6>Cart</h6>{" "}
              {countCartItems ? (
                <button className="btn-dark text-white">
                  {countCartItems}
                </button>
              ) : (
                ""
              )}
            </a>
          </div>
        </div>
      </div>
    </header>
  );
};
