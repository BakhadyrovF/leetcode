<?php


/**
 * N-th Tribonacci Number
 * @link https://leetcode.com/problems/n-th-tribonacci-number
 *
 * Approach:
 * Iterative approach using Dynamic Programming technique (store computed result and access it later)
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n) - we can improve it to O(1) if we use three variables instead of array.
 */
class Solution {
    function tribonacci($n)
    {
        $dp = [0, 1, 1];

        if ($n <= 2) {
            return $dp[$n];
        }

        for ($i = 3; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2] + $dp[$i - 3];
        }

        return $dp[$n];
    }
}