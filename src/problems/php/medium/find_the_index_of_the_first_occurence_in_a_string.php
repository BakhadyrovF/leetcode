<?php


/**
 * Find the Index of the First Occurrence in a String
 * @link https://leetcode.com/problems/find-the-index-of-the-first-occurrence-in-a-string
 *
 * Approach:
 * Take the length of the needle and start iterating through each substring until we find needle one.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {

    function strStr($haystack, $needle) {
        $start = 0;
        $end = strlen($needle);

        while ($start + $end <= strlen($haystack)) {
            if (substr($haystack, $start, $end) === $needle) {
                return $start;
            }

            $start++;
        }

        return -1;
    }
}