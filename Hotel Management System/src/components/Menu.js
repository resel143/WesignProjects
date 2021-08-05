import React from 'react'
import { Link } from 'react-router-dom';

const Menu = () => {
    return (
        <div className="container-fluid"
        style ={{textAlign:"center"}}
        >
            <div className="row" style={{textAlign:"center"}}>
                <div className="col-sm" style={{backgroundColor:"#F5F5F5"}}>
                    <p style={{fontFamily:"Hind Vadodara, sans-serif",fontSize:"16px", lineHeight:"24px",paddingTop:"15px"}}><Link to="/">Home</Link></p>
                </div>
                <div className="col-sm" style={{backgroundColor:"#F5F5F5"}}>
                    <p style={{fontFamily:"Hind Vadodara, sans-serif",fontSize:"16px", lineHeight:"24px",paddingTop:"15px"}}><Link to="/about">About</Link></p>
                </div>
                <div className="col-sm" style={{backgroundColor:"#F5F5F5"}}>
                    <p style={{fontFamily:"Hind Vadodara, sans-serif",fontSize:"16px", lineHeight:"24px",paddingTop:"15px"}}><Link to="/contact">Contact</Link></p>
                </div>
            </div>
        </div>
    )
}

export default Menu;
