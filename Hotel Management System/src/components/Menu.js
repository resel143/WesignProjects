import React from 'react'

const Menu = () => {
    return (
        <div className="container-fluid"
        style ={{textAlign:"center"}}
        >
            <div className="row" style={{textAlign:"center"}}>
                <div className="col-sm" style={{backgroundColor:"#F5F5F5"}}>
                    <p style={{fontFamily:"Hind Vadodara, sans-serif",fontSize:"16px", lineHeight:"24px",paddingTop:"15px"}}>Home</p>
                </div>
                <div className="col-sm" style={{backgroundColor:"#F5F5F5"}}>
                    <p style={{fontFamily:"Hind Vadodara, sans-serif",fontSize:"16px", lineHeight:"24px",paddingTop:"15px"}}>About Us</p>
                </div>
                <div className="col-sm" style={{backgroundColor:"#F5F5F5"}}>
                    <p style={{fontFamily:"Hind Vadodara, sans-serif",fontSize:"16px", lineHeight:"24px",paddingTop:"15px"}}>Contact</p>
                </div>
            </div>
        </div>
    )
}

export default Menu;
