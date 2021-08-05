import React from 'react';
import Menu from './Menu';
import Header from './Header';
import Footer from './Footer';
import OrderMenu from './OrderMenu';

const Order = () =>{
    return (
        <div className="container-fluid">
            <div className="row"><div className="col"><Menu /></div></div>
            <div className="row"><div className="col"><Header /></div></div>
            <div className="row"><div className="col"><OrderMenu /></div></div>
            <div className="row"><div className="col"><Footer /></div></div>
        </div>
    );
}


export default Order;