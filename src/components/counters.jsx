import React, { Component } from "react";
import Counter from "./counter";

class Counters extends Component {
  render() {
    const { onIncrement, onDelete, counters, onDecrement } = this.props;

    return (
      <div>
        {counters.map((counter) => (
          <Counter
            key={counter.id}
            onDelete={onDelete}
            counter={counter}
            onIncrement={onIncrement}
            onDecrement={onDecrement}
          />
        ))}
      </div>
    );
  }
}

export default Counters;
