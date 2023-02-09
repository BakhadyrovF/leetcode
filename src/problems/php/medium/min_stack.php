<?php


/**
 * Min Stack
 * @link https://leetcode.com/problems/min-stack
 *
 * Approach:
 * Each node of the stack holds minimum value.
 *
 * We can keep track of minimum value and before pushing element to second stack,
 * we check is current value less than our minimum that we took from deep, if it is,
 * then just push current value to the second stack, because when we are at the current level, minimum value is current value.
 * What values will be pushed later does not matter, because to reach this current level,
 * we have to pop those elements that will come later.
 *
 * Time Complexity - O(1)
 * Space Complexity - O(n)
 */
class MinStack {

    protected array $stack = [];
    protected array $minStack = [];

    public function push($val) {
        $this->stack[] = $val;

        if (($this->minStack[count($this->minStack) - 1] ?? PHP_INT_MAX) > $val) {
            $this->minStack[] = $val;
        } else {
            $this->minStack[] = $this->minStack[count($this->minStack) - 1];
        }
    }

    public function pop() {
        array_pop($this->stack);
        array_pop($this->minStack);
    }

    public function top() {
        return $this->stack[count($this->stack) - 1];
    }

    public function getMin() {
        return $this->minStack[count($this->minStack) - 1];
    }
}
