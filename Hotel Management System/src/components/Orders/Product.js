import React from "react";

export const Product = (props) => {
  const { product, onAdd } = props;
  return (
    <div className="container">
      <div className="row">
        <div className="col">
          <p>{product.id}</p>
        </div>
        <div className="col">
          <h4>{product.title}</h4>
        </div>
        <div className="col">
          <p>{product.price}</p>
        </div>
        <div className="col">
          <button className="btn-primary" onClick={() => onAdd(product)}>
            Add to Cart
          </button>
        </div>
      </div>
      <hr />
    </div>
  );
};
