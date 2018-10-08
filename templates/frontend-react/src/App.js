import React, { Component } from "react";
import beerIcon from "./assets/beer-icon.png";
import Header from "./components/Header";
import BeerContainer from "./components/BeerContainer";
import axios from "axios";
import "./App.css";

class App extends Component {
  state = {
    token: "",
    beer: {
      name: "",
      description: "",
      abv: "",
      producerLocation: ""
    }
  };

  getToken = () => {
    var config = {
      auth: {
        username: "apiuser",
        password: "apipwd"
      }
    };
    var context = this;
    return axios
      .get("http://localhost/v1/auth/token", config)
      .then(function(response) {
        context.setState({ token: response.data.data.token });
      });
  };

  getRandomBeer = () => {
    var context = this;
    if (!this.state.token.length) {
      this.getToken().then(() => {
        context.getRandomBeer();
      });
      return false;
    }
    var config = {
      headers: { Authorization: "Bearer " + this.state.token }
    };
    axios
      .get("http://localhost/v1/beer/random", config)
      .then(function(response) {
        context.setState({
          beer: {
            name: response.data.data.name,
            description: response.data.data.description,
            abv: response.data.data.abv,
            producerLocation: response.data.data.producerLocation
          }
        });
      });
  };

  componentDidMount = () => {
    this.getRandomBeer();
  };

  render() {
    return (
      <div className="App">
        <Header onChangeBeerClick={this.getRandomBeer} />
        <div className="App-body">
          <div className="left-container">
            <img src={beerIcon} alt="Beer Icon" />
          </div>
          <div className="right-container">
            <BeerContainer beer={this.state.beer} />
          </div>
        </div>
      </div>
    );
  }
}

export default App;
