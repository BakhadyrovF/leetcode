<?php


/**
 * 3Sum
 * @link https://leetcode.com/problems/3sum
 *
 * Approach:
 * sort input array, take abs value of each negative element (it will be our target from sum of two elements)
 * and search with two pointers like in Two Sum II problem,
 * also skip duplicates with additional conditions.
 *
 * Time Complexity - O(n^2)
 * Space Complexity - O(log n)
 */
class Solution {

    public function threeSum($nums) {
        // sort the given array, O(n log n)
        sort($nums);

        $ans = [];

        // iterate through each negative element (if it's positive, we can't get 0 with sum of 3 elements)
        for ($i = 0; $i < count($nums) && $nums[$i] <= 0; $i++) {
            // if current element is equal to previous one, it means that, we already took it, or at least checked it
            if ($i !== 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }

            // initialize left and right pointers, left must be +1 because i,left,right must be different
            $left = $i + 1;
            $right = count($nums) - 1;
            // current value is 100% negative, so we should find it's opposite to make our triplet's sum equal to 0
            $target = abs($nums[$i]);

            while ($left < $right) {
                // if sum of left and right pointers are equal to target, push values to the answer
                if ($nums[$left] + $nums[$right] === $target) {
                    $ans[] = [$nums[$i], $nums[$left], $nums[$right]];
                    $left++;
                    // keep updating left pointer until adjacency values are the same because, we already pushed it to our answer
                    while ($nums[$left] === $nums[$left - 1] && $left < $right) {
                        $left++;
                    }
                }

                if ($nums[$left] + $nums[$right] > $target) {
                    $right--;
                } else {
                    $left++;
                }
            }
        }

        return $ans;
    }
}