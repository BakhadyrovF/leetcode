<?php


/**
 * Min Cost Climbing Stairs
 * @link https://leetcode.com/problems/min-cost-climbing-stairs
 *
 * Top-Down Approach:
 * Check each option and take optimal one for each sub-problem recursively and use dynamic programming for better TC.
 * Initially we have 2 options - start from 0-th or 1-st index,
 * also we have 2 options on each position - climb 1 or 2 steps,
 * Just draw decisions tree with these options and solution will come.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    private int $top;
    private array $stairs;
    private array $dp = [];

    public function minCostClimbingStairs($cost)
    {
        $this->stairs = $cost;
        $this->top = count($cost);

        // try to start from both indices, so we can pick optimal one
        return min($this->climb(0), $this->climb(1));
    }

    protected function climb($position)
    {
        // if already computed, just take it
        if (isset($this->dp[$position])) {
            return $this->dp[$position];
        }

        // we are on the top, so we can return 0 (without payment)
        if ($position >= $this->top) {
            return 0;
        }

        // take optimal one for both options (climb 1 or 2) and add it current position's price
        $this->dp[$position] = $this->stairs[$position] + min($this->climb($position + 1), $this->climb($position + 2));

        return $this->dp[$position];
    }
}

/**
 * Bottom Up Approach:
 * Start from the last element of the array, take optimal one from one step and two steps options,
 * computed result store as one step, because from the next element if we do one step, we already computed it.
 * Again, just draw down given array, and start from the end, try to take both options (1 step or 2 steps),
 * take optimal one and store it, so we can use it later.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution2 {

    public function minCostClimbingStairs($cost)
    {
        $top = count($cost);
        $oneStep = 0;
        $twoStep = 0;

        for ($i = $top - 1; $i >= 0; $i--) {
            $temp = $cost[$i] + min($oneStep, $twoStep);
            $twoStep = $oneStep;
            $oneStep = $temp;
        }

        return min($oneStep, $twoStep);
    }
}