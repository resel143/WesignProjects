import React from 'react';
import Menu from './Menu';
import Header from './Header';
import Footer from './Footer';
import CApp from './Orders/CApp';

const Order = () =>{
    return (
        <div className="container-fluid">
            <div className="row"><div className="col"><Menu /></div></div>
            <div className="row"><div className="col"><Header /></div></div>
            <div className="row"><div className="col"><CApp /></div></div>
            <div className="row"><div className="col"><Footer /></div></div>
        </div>
    );
}


export default Order;