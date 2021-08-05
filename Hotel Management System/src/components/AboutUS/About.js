import React from 'react';
import Menu from '../Menu';
import Header from '../Header';
import Footer from '../Footer';

function About() {
    return (
        <div className="container-fluid">
            <div className="row"><div className="col"><Menu /></div></div>
            <div className="row"><div className="col"><Header /></div></div>
            <div className="row">
                <div className="col bg-light">
                    <h1>Image Carousel</h1>
                </div>
            </div>  
            <div className="row">
                <div className="col-lg-4">
                    <div className="row">
                        <div className="col">
                            <center><img className="rounded-circle p-auto" alt="Responsive Image" style={{padding:"10px",maxWidth:"100%",height:"auto"}}src="https://domf5oio6qrcr.cloudfront.net/medialibrary/6000/8c38e37d-e8b9-48dd-a9a8-65083a6115e5.jpg"/></center>
                        </div>
                    </div>
                </div>
                <div className="col bg-light">
                    <div className="row">
                        <div className="col">
                            <h3>Our Idea:</h3>
                            <p>Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.</p>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col">
                        <h3>How we began:</h3>
                        <p>Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.Lorem ipsum the best ipsum in the whole world.</p>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col">
                            <ol>
                                <li>Restaurants</li>
                                <li>Braches</li>
                                <li>Party</li>
                                <li>Lorem ipsum</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div className="row"><Footer /></div>
        </div>
    )
}

export default About
