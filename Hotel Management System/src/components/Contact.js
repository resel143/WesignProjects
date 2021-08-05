import React from 'react';
import Header from './Header';
import Footer from './Footer';
import Menu from './Menu';

function Contact() {
    return (
        <div className="container-fluid">
            <div className="row"><div className="col"><Menu /></div></div>
            <div className="row"><div className="col"><Header /></div></div>
            <div className="row p-5 mt-5" style={{border:"1px solid grey"}}>
                <div className="row">
                    <div className="col"><h1>Contact Us</h1></div>
                </div>
                <div className="row">
                    <div className="col"><p>Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.</p></div>
                </div>
                <div className="row">
                    <div className="col">
                        <form className="contact-form">
                            <div className="row">
                                <div className="col"><input type="text" placeholder="First Name" /></div>
                                <div className="col"><input type="text" placeholder="Last Name" /></div>
                            </div>
                            <div className="row"><input type="text" placeholder="Subject" /></div>
                            <div className="row"><input type="text" placeholder="Message" /></div>
                            <div className="row"><button>Submit</button></div>
                        </form>
                    </div>
                    <div className="col">
                        <div className="row">
                            <div className="col"><p>Location: India</p></div>
                        </div>
                        <div className="row"><div className="col"><p>+00-XXXXXXXXXX</p></div></div>
                        <div className="row"><div className="col"><p>restaurant@contact.com</p></div></div>
                    </div>
                </div>
            </div>
            <div className="row">
                <div className="col"><Footer /></div>
            </div>
        </div>
    )
}

export default Contact
