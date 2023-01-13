<?php


/**
 * Two Sum II - Input Array is Sorted
 * @link - https://leetcode.com/problems/two-sum-ii-input-array-is-sorted
 *
 * Approach:
 * Using two pointers approach.
 * If sum of two pointer is greater than our target, decrement second pointer that starts from the end of array.
 * Otherwise, increment first pointer that starts from the beginning of array.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($numbers, $target)
    {
        $first = 0;
        $last = count($numbers) - 1;

        while (true) {
            $total = $numbers[$first] + $numbers[$last];

            if ($total === $target) {
                return [$first + 1, $last + 1];
            }

            if ($total < $target) {
                $first++;
            } else {
                $last--;
            }
        }
    }
}