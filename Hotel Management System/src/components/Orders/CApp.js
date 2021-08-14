import "./styles.css";
import { useState } from "react";
import { Header } from "./Header";
import { Main } from "./Main";
import { Basket } from "./Basket";
import { DATA } from "./DATA";

export default function App() {
  const [cartItem, setCartItem] = useState([]);
  const { products } = DATA;

  const onAdd = (product) => {
    const exist = cartItem.find((x) => x.id === product.id);
    if (exist) {
      setCartItem(
        cartItem.map((x) =>
          x.id === product.id ? { ...exist, qty: exist.qty + 1 } : x
        )
      );
    } else {
      setCartItem([...cartItem, { ...product, qty: 1 }]);
    }
  };

  const onRemove = (product) => {
    const exist = cartItem.find((x) => x.id === product.id);
    if (exist.qty === 1) {
      setCartItem(cartItem.filter((x) => x.id !== product.id));
    } else {
      setCartItem(
        cartItem.map((x) =>
          x.id === product.id ? { ...exist, qty: exist.qty - 1 } : x
        )
      );
    }
  };

  return (
    <div className="container">
      <div className="row">
        <div className="col-sm">
          <Header countCartItems={cartItem.length} />
        </div>
      </div>
      <div className="row">
        <div className="col-sm">
          <Main products={products} onAdd={onAdd} />
        </div>
        <div className="col-sm">
          <Basket cartItem={cartItem} onAdd={onAdd} onRemove={onRemove} />
        </div>
      </div>
    </div>
  );
}
