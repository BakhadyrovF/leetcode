<?php


/**
 * Squares of a Sorted Array
 * @link https://leetcode.com/problems/squares-of-a-sorted-array
 *
 * Approach:
 * There are 3 cases:
 * 1. Only negative integers - just start pushing from the end, because highest negative int will be smallest after squaring
 * 2. Only positive integers - just start pushing from the start, because array is sorted
 * 3. Mix of negative and positive integers - find first positive integer's index using Binary Search,
 * then start comparing last negative integer with first positive integer and push smaller one,
 * because again last (highest) negative integer is smallest when squaring, so we are just comparing two smallest elements
 *
 * Time Complexity - O(log n + n) = O(n)
 * Space Complexity - O(n)
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function sortedSquares($nums)
    {
        $start = 0;
        $end = count($nums) - 1;
        $sortedArray = [];

        // Only negative integers
        if ($nums[$end] < 0) {
            for ($i = $end; $i >= 0; $i--) {
                $sortedArray[] = pow($nums[$i], 2);
            }

            return $sortedArray;
        }

        // Only positive integers
        if ($nums[$start] >= 0) {
            for ($i = 0; $i <= $end; $i++) {
                $sortedArray[] = pow($nums[$i], 2);
            }

            return $sortedArray;
        }

        // mix of negative and positive integers
        $positiveStart = null;
        while ($start <= $end) {
            $mid = floor(($start + $end) / 2);

            if ($nums[$mid] >= 0) {
                $positiveStart = $mid;
                $end = $mid - 1;
            } else {
                $start = $mid + 1;
            }
        }
        $negativeStart = $positiveStart - 1;

        while ($negativeStart >= 0 || $positiveStart < count($nums)) {
            $negative = isset($nums[$negativeStart]) ? pow($nums[$negativeStart], 2) : null;
            $positive = isset($nums[$positiveStart]) ? pow($nums[$positiveStart], 2) : null;

            if (is_null($negative) || isset($positive) && $positive < $negative) {
                $sortedArray[] = $positive;
                $positiveStart++;
            } else {
                $sortedArray[] = $negative;
                $negativeStart--;
            }
        }

        return $sortedArray;
    }
}