import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Divisions extends Component {
  constructor(props) {
    super(props);
    this.state = {
      fetched: false,
      divisions: null,
    }
  }

  componentDidMount() {
    var url = this.props.url;
    fetch(url, {
      headers: {Accept: 'application/json'},
      credentials: 'same-origin',
    })
    .then(response => {
      if (response.ok) return response.json();
      else throw Error([response.status, response.statusText].join(' '));
    })
    .then(divisions => {
      this.setState({ fetched: true });
      this.setState({ divisions });
    })
    .catch(error => alert(error));
  }

  renderHeadings() {
    return (
      <thead>
        <tr>
          <th>No.</th>
          <th>Code</th>
          <th>Name</th>
          <th>City</th>
          <th>State</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>
    )
  }

  renderDivision() {
    return this.state.divisions.map((division, i) => {
      return (
        <tr key={ division.id }>
          <td className="table-text">
            <div>{ i + 1 }</div>
          </td>
          <td className="table-text">
            <div>
              <a href={ ['division', division.id].join('/') }>
                { division.code }
              </a>
            </div>
          </td>
          <td className="table-text">
            <div>{ division.name }</div>
          </td>
          <td className="table-text">
            <div>{ division.city }</div>
          </td>
          <td className="table-text">
            <div>{ division.state_name }</div>
          </td>
          <td className="table-text">
            <div>{ division.created_at }</div>
          </td>
          <td className="table-text">
            <div>
              <a href={ ['division', division.id, 'edit'].join('/') }>
                Edit
              </a>
            </div>
          </td>
        </tr>
      );
    });
  }

  renderTable() {
    return (
      <table className="table table-striped">
        { this.renderHeadings() }
        <tbody>
          { this.renderDivision() }
        </tbody>
      </table>
    );
  }

  renderEmpty() {
    return (
      <div>
        No records found
      </div>
    );
  }

  renderLoader() {
    return (
      <div>
        Loading divisions...
      </div>
    );
  }

  render() {
    if(this.state.fetched && this.state.divisions) {
      if(this.state.divisions.length) {
        return this.renderTable();
      }
      else {
        return this.renderEmpty();
      }
    }
    else {
      return this.renderLoader();
    }
  }
}

(() => {
  var element = document.getElementById('division-index');
  if(__props && element) {
    ReactDOM.render(<Divisions {...__props} />, element);
  }
})();
