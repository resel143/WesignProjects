import React from 'react';
import Order from './components/Order'
import Home from './components/Home';
import {Route, BrowserRouter as Router, Switch} from "react-router-dom";  
import About from './components/AboutUS/About';
import Contact from './components/Contact';

const App = ()=>{
  return (
    <Router>
    <Switch>
      <Route exact path="/" component={Home}/>
      <Route path="/order" component={Order}/>
      <Route path="/about" component={About}/>
      <Route path="/contact" component={Contact} />
    </Switch>
    </Router>
  );
}



export default App;