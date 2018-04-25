import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Division extends Component {
  constructor(props){
    super(props);
    this.state = {
      fetched: false,
      division: null,
    }
  }

  componentDidMount(){
    var url = this.props.url;
    fetch(url, {
      headers: {Accept: 'application/json'},
      credentials: 'same-origin',
    })
    .then(response=>{
      if(response.ok) return response.json();
      else throw Error([response.status, response.statusText].join(' '));
    })
    .then(division =>{
      this.setState({fetched:true});
      this.setState({division});
    })
    .catch(error=>alert(error));
  }

  renderHeadings(){
    return(
      <thead>
        <tr>
          <th>Attribute</th>
          <th>Value</th>
        </tr>
      </thead>
    )
  }

  renderDivision(){
    return(
      <table className="table table-striped">
        { this.renderHeadings() }
        <tbody>
          <tr>
            <td>Code</td>
            <td>{this.state.division.code}</td>
          </tr>
          <tr>
            <td>Name</td>
            <td>{this.state.division.name}</td>
          </tr>
          <tr>
            <td>Address</td>
            <td style={{
              whiteSpace: 'pre-line',
            }}>{this.state.division.address}</td>
          </tr>
          <tr>
            <td>Postcode</td>
            <td>{this.state.division.postcode}</td>
          </tr>
          <tr>
            <td>City</td>
            <td>{this.state.division.city}</td>
          </tr>
          <tr>
            <td>State</td>
            <td>{this.state.division.state_name}</td>
          </tr>
          <tr>
            <td>Created</td>
            <td>{this.state.division.created_at}</td>
          </tr>
        </tbody>
      </table>
    );
  }

  renderLoader(){
    return(
      <div>
        Loading division . . .
      </div>
    );
  }

  render(){
    if(this.state.fetched && this.state.division){
      return this.renderDivision();
    } else {
      return this.renderLoader();
    }
  }
}

(()=>{
  var element = document.getElementById('division-show');
  if(__props && element){
    ReactDOM.render(<Division {...__props} />, element);
  }
})();
