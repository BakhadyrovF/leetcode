<?php


/**
 * Maximum Subarray
 * @link https://leetcode.com/problems/maximum_subarray.php
 *
 * Approach:
 * Since it is optimization and greedy problem - we can build optimal solution based on local choices
 * If current num is negative we have to check should we include this negative number or ignore it with clearing our sum.
 * For this we can do sum + negative number and if this adding gives us a positive number,
 * it means that maybe we find more positive numbers after this current negative, so we can try to include it.
 * Otherwise, just ignore it and clear the sum.
 * If current sum is positive then just add it to our sum.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {

    public function maxSubArray($nums)
    {
        $maxSum = 0;
        $currentSum = 0;

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] < 0) {
                if ($currentSum + $nums[$i] > 0) {
                    $currentSum += $nums[$i];
                } else {
                    $currentSum = 0;
                }
            } else {
                $currentSum += $nums[$i];
                $maxSum = max($maxSum, $currentSum);
            }
        }

        return $maxSum === 0 ? max($nums) : $maxSum;
    }
}