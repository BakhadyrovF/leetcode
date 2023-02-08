<?php


/**
 * Substrings of Size Three With Distinct Characters
 * @link https://leetcode.com/problems/substrings-of-size-three-with-distinct-characters
 *
 * Approach:
 * Common Sliding Window with fixed size of 3.
 * Initialize left and right pointers and start iterating.
 * Check if current letter is exist in our window, then increment left pointer till there is duplicate in our window,
 * after skipping duplicate (window length is less now), check if length of window is equal to 3,
 * then it is unique substring with length of 3, so increment result counter.
 * Also increment left pointer of window, because there is no duplicate so, we can just move our window of size 3.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    function countGoodSubstrings($s)
    {
        $l = 0;
        $hashMap = [];
        $res = 0;

        for ($r = 0; $r < strlen($s); $r++) {
            if (($hashMap[$s[$r]] ?? 0) !== 0) {
                while ($hashMap[$s[$r]] !== 0) {
                    $hashMap[$s[$l]]--;
                    $l++;
                }
            }

            $hashMap[$s[$r]] = ($hashMap[$s[$r]] ?? 0) + 1;

            if ($r - $l !== 2) {
                continue;
            }

            $hashMap[$s[$l]]--;
            $res++;
            $l++;
        }

        return $res;
    }
}
