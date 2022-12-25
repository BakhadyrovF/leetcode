<?php



/**
 * Range Sum Query - Immutable
 * @link - https://leetcode.com/problems/range-sum-query-immutable
 *
 * Approach:
 * We know that constructor will be called only once,
 * so we store given integers using Prefix Sum technique,
 * after this we can simply calculate the sum of given range without looping through each element.
 *
 * @link https://en.wikipedia.org/wiki/Prefix_sum (Prefix Sum technique)
 *
 * Time complexity:
 * Constructor: O(n) (called only once)
 * sumRange: O(1)
 *
 * Space complexity:
 * Constructor: O(n) (called only once)
 * sumRange: O(1)
 */
class NumArray {
    private array $nums;

    function __construct($nums) {
        for ($i = 1; $i < count($nums); $i++) {
            $nums[$i] = $nums[$i - 1] + $nums[$i];
        }

        $this->nums = $nums;
    }

    function sumRange($left, $right) {
        if ($left === 0) {
            return $this->nums[$right];
        }

        return $this->nums[$right] - $this->nums[$left - 1];
    }
}