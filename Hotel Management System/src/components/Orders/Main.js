import React, { useState } from "react";
import { Product } from "./Product";

export const Main = (props) => {
  let { products, onAdd } = props;
  return (
    <div className="container">
      <div className="row bg-light rounded">
        <h3>Products</h3>
      </div>
      <div className="row bg-light rounded">
        {products.map((product) => (
          <Product key={product.id} product={product} onAdd={onAdd} />
        ))}
      </div>
    </div>
  );
};
