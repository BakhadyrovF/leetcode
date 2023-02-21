<?php


/**
 * Single Element In a Sorted Array
 * @link https://leetcode.com/problems/single-element-in-a-sorted-array
 *
 * Approach:
 * Forget about values of array, focus on indices.
 * Length of array partitions is what we need.
 *
 * 1. Determine which one is this element of number (first/left, second/right).
 * 2. Based on the result of first step, check the length of left/right partition.
 * If the length of partition is even, our exception is not there.
 * Because each element appears exactly twice and the length of array with this property always will be even.
 *
 * Time Complexity - O(log n)
 * Space Complexity - O(1)
 */
class Solution {

    public function singleNonDuplicate($nums)
    {

        $l = 0;
        $r = count($nums) - 1;

        while (true) {
            $mid = floor(($l + $r) / 2);

            // second/right element
            if ($nums[$mid] !== $nums[$mid + 1]) {
                if ($nums[$mid] !== $nums[$mid - 1]) {
                    return $nums[$mid];
                }

                if (($r - $mid) % 2 !== 0) {
                    $l = $mid + 1;
                } else {
                    $r = $mid - 2;
                }
            } else {
                // first/left element
                if ($nums[$mid] !== $nums[$mid + 1]) {
                    return $nums[$mid];
                }

                if (($mid - $l) % 2 !== 0) {
                    $r = $mid - 1;
                } else {
                    $l = $mid + 2;
                }
            }
        }
    }
}