import React, { Component } from "react";
import "./styles/BeerContainer.css";

class BeerContainer extends Component {
  render() {
    const { beer } = this.props;
    return (
      <div className="beer-data">
        <div className="beer-name">
          <h2>{beer.name}</h2>
        </div>
        <div className="beer-details">
          <label>Description:</label>
          <p className="description">{beer.description}</p>
          <label>Abv:</label>
          <p className="abv">{beer.abv}</p>
          <label>Producer Location:</label>
          <p className="producer-location">{beer.producerLocation}</p>
        </div>
      </div>
    );
  }
}

export default BeerContainer;
