import React from 'react'

function Footer() {
    return (
            <div className="container-fluid bg-dark mt-5">
            <div className="row text-white" style={{fontFamily:"Hind Vadodara"}}>
                <div className="col-sm">
                        <div className="row"><h3 style={{fontSize:"4vm"}}>About the Company</h3></div>
                        <div className="row"><p style={{fontSize:"2vm"}}>Lorem ipsum</p></div>
                </div>
                <div className="col-sm">
                    <div className="row"><p style={{fontSize:"2vm"}}>Address</p></div>
                    <div className="row"><p style={{fontSize:"2vm"}}>+00-XXXXXXXXXX</p></div>
                    <div className="row"><p style={{fontSize:"2vm"}}>Email@.com</p></div>
                </div>
                <div className="col-sm">
                    <div className="row"><h3 style={{fontSize:"6vm"}}>Company Logo</h3></div>
                    <div className="row"><p style={{fontSize:"2vm"}}>Home | About | Cuisine</p></div>
                    <div className="row"><p style={{fontSize:"2vm"}}>All Rights Reserved</p></div>
                </div>
            </div>
        </div>
    )
}

export default Footer;
