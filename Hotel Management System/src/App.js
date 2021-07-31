import React from 'react';
import Menu from './components/Menu';
import Header from './components/Header';
import Card from './components/Card';
import Footer from './components/Footer';


const App = ()=>{
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



export default App;