import React from "react";

export const Basket = (props) => {
  const { cartItem, onAdd, onRemove } = props;
  const itemPrice = cartItem.reduce((a, c) => a + c.price * c.qty, 0);
  const taxPrice = itemPrice * 0.14;
  const totalPrice = itemPrice + taxPrice;
  console.log(itemPrice);
  return (
    <div className="container">
      <div className="row bg-light rounded">
        <div className="col">
          <h3 style={{ textDecoration: "underline" }}>Your Order</h3>
        </div>
      </div>
      <div className="row bg-light rounded">
        {cartItem.length === 0 && <div>Cart is Empty</div>}
        {cartItem.map((item) => (
          <div key={item.id} className="row">
            <div className="col">{item.title}</div>
            <div className="col">
              <button onClick={() => onAdd(item)} className="btn-primary">
                +
              </button>
              {/* </div>
            <div className="col"> */}
              <button onClick={() => onRemove(item)} className="btn-danger">
                -
              </button>
            </div>
            <div className="col text-right">
              {item.qty} x ${item.price}
            </div>
            <hr />
          </div>
        ))}
        {cartItem.length !== 0 && (
          <>
            <div className="row">
              <div className="col-9">Item Price</div>
              <div className="col">{itemPrice.toFixed(2)}</div>
            </div>
            <div className="row">
              <div className="col-9">Tax Price</div>
              <div className="col">{taxPrice.toFixed(2)}</div>
            </div>
            <div className="row">
              <div className="col-9">Total</div>
              <div className="col">{totalPrice.toFixed(2)}</div>
            </div>
          </>
        )}
      </div>
    </div>
  );
};
