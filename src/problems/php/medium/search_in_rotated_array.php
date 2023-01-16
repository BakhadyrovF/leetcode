<?php

/**
 * Search in Rotated Array
 * @link https://leetcode.com/problems/search-in-rotated-sorted-array
 *
 * Approach:
 * Determine in which portion is middle value and depending on this, set conditions.
 * L = left, M = middle, R = right, T = target
 * Left portion:
 * 1. T > M. We must move to the right, because since we are in left portion and array is sorted,
 * on the left side all values are less than middle.
 * 2. L <= T < M. We must move to the left, because target is between left and middle.
 * 3. T < M. We must move to the right, because target is not between left and middle, so only the right remains.
 * Right portion:
 * 1. T < M. We must move to the right, because since we are in right portion and array is sorted,
 * on the right side all values are greater than middle.
 * 2. M < T <= R. We must move to the right, because target is between middle and right.
 * 3. T > M. We must move to left, because target is not between middle and right, so only the left remains.
 *
 * Time Complexity - O(log n)
 * Space Complexity - O(1)
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target)
    {
        $first = 0;
        $last = count($nums) - 1;

        while ($first <= $last) {
            $middle = floor(($first + $last) / 2);

            if ($nums[$middle] === $target) {
                return $middle;
            }

            // left portion
            if ($nums[$middle] >= $nums[$first]) {
                if ($target > $nums[$middle]) {
                    $first = $middle + 1;
                } elseif ($target >= $nums[$first]) {
                    $last = $middle - 1;
                } else {
                    $first = $middle + 1;
                }
            } else {
                // right portion
                if ($target < $nums[$middle]) {
                    $last = $middle - 1;
                } elseif ($target <= $nums[$last]) {
                    $first = $middle + 1;
                } else {
                    $last = $middle - 1;
                }
            }
        }

        return -1;
    }
}


