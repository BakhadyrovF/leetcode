<?php


/**
 * Climbing Stairs
 * @link https://leetcode.com/problems/climbing-stairs
 *
 * Top-Down Approach:
 * On each position (initially it's 0) we have 2 options:
 * 1. Climb 1 steps
 * 2. Climb 2 steps
 * We have to compute for each of them, so to get distinct ways on each position,
 * we compute for both options and store result.
 * If you get confused with this "bad" explanation, just draw down decisions tree with 2 options until you top (n).
 * n = 3
 * Decisions tree:
 *             0
 *          /    \
 *        1        2
 *       / \       / \
 *      2   (3)   (3)  4
 *     / \
 *    (3)  4
 *
 * output = 3 (distinct ways)
 */
class Solution {

    private array $dp = [];
    public function climbStairs($n)
    {
        // start climbing from n to down (top-down approach)
        return $this->climb($n);
    }

    protected function climb($position)
    {
        if (isset($this->dp[$position])) {
            return $this->dp[$position];
        }

        // jumped over
        if ($position < 0) {
            return 0;
        }

        // we are exactly on the top
        if ($position === 0) {
            return 1;
        }

        // compute distinct ways for the current position and store it (caching)
        $this->dp[$position] = $this->climb($position - 1) + $this->climb($position - 2);

        return $this->dp[$position];
    }
}