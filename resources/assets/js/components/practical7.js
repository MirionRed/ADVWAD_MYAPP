import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class practical7 extends Component {
  constructor(props){
    super(props);
    this.state = {
      fetched: false,
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
  var element = document.getElementById('practical7-index');
  if(__props && element){
    ReactDOM.render(<practical7 {...__props} />, element);
  }
})();

(()=>{
  var data = {
    email: document.getElementById('input-email').value,
    name: document.getElementById('input-name').value,
  };

  var status = null;
  var statusText = null;

  fetch(url, {
    method: 'POST',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
    },
    credentials: 'same-origin',
    body: JSON.stringify(data),
  })
  .then(
    response => {
      status = response.status;
      statusText = response.statusText;
      return response.json();
    }
  )
  .then(
    response => {
      if(status === 200){

      } else if (status === 422){

      } else {
        throw Error([status, statusText].join(' '));
      }
    }
  )
  .catch(error=>alert(error));
})();
