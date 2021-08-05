import React from 'react';
import Menu from './Menu';
import Header from './Header';
import Card from './Card';
import Footer from './Footer';

function Home() {
    return (
        <div className="container-fluid" >
        <div className="row">
          <div className="col">
          <Menu />
          </div>
        </div>
        <div className="row">
          <div className="col">
            <Header />
          </div>
        </div>
        <div className="row mt-2">
          <div className="col">
            <Card />
          </div>
        </div>
        <div className="row" > 
        <div className="col"> 
            <Footer />
          </div>
        </div>  
      </div>
    );
}

export default Home;
