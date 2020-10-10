import React, { Component } from "react";
class Counter extends Component {
  state = {
    value: this.props.counter.value,
  };

  styles = {
    fontSize: 17,
    fontWeight: "bold",
  };

  render() {
    //console.log("props", this.props);
    return (
      <React.Fragment>
        <div>
          <span style={this.styles} className={this.getBadgeClasses()}>
            {this.formatCount()}
          </span>
          <button
            className="btn  btn-secondary btn-sm"
            onClick={() => this.props.onIncrement(this.props.counter)}
          >
            Increment
          </button>
          <button
            className="btn  btn-secondary btn-sm decrementButton"
            onClick={() => this.props.onDecrement(this.props.counter)}
          >
            Decrement
          </button>
          <button
            className="btn  btn-danger btn-sm m-2"
            onClick={() => this.props.onDelete(this.props.counter.id)}
          >
            Delete
          </button>
        </div>
      </React.Fragment>
    );
  }

  /*handleIncrement = () => {
    this.setState({ value: this.state.value + 1 });
  };*/

  // = () => {};

  /* renderTags() {
    if (this.state.tags.length === 0) return <p>No Tags Available</p>;
    return (
      <ul>
        {this.state.tags.map(tag => (
          <li key={tag}>{tag}</li>
        ))}
      </ul>
    );
  }*/

  getBadgeClasses() {
    let classes = "badge m-2 badge-";
    classes += !this.props.counter.value ? "warning" : "primary";
    return classes;
  }

  formatCount() {
    const { value: count } = this.props.counter;
    return count === 0 ? "Zero" : count;
  }
}

export default Counter;
