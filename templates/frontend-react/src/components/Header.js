import React, { Component } from "react";
import "./styles/Header.css";

class Header extends Component {
  render() {
    return (
      <header className="App-header">
        <h1 className="App-title">React Random Beer App!</h1>
        <button onClick={this.props.onChangeBeerClick}>
          Show another beer
        </button>
      </header>
    );
  }
}

export default Header;
