<?php


/**
 * Longest Substring Without Repeating Characters
 * @link https://leetcode.com/problems/longest-substring-without-repeating-characters
 *
 * Approach:
 * Naive approach will be start counting from the first letter and if duplicate occurs,
 * then start counting from the second element and then third element and so on so far until we end all letters.
 * This approach TS will be - O(n^2).
 *
 * Actually we can improve it to O(n) using Sliding Window technique:
 * Same as naive approach, start counting letter from the first letter and store index of each letter,
 * if duplicate occurs, just take index of early added letter and compute count of letter that stays before this duplicate,
 * and remove this computed number from current counter, because we can't use these letters anymore.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    public function lengthOfLongestSubstring($s)
    {
        if (strlen($s) === 0) {
            return 0;
        }

        $letterIndices = [];
        $currentLength = 0;
        $maxLength = 0;
        $substringStartIndex = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($letterIndices[$s[$i]]) && $letterIndices[$s[$i]] >= $substringStartIndex) {
                if ($currentLength > $maxLength) {
                    $maxLength = $currentLength;
                }

                $currentLength -= $letterIndices[$s[$i]] - $substringStartIndex + 1;
                $substringStartIndex = $letterIndices[$s[$i]] + 1;
            }
            $letterIndices[$s[$i]] = $i;
            $currentLength++;
        }

        if ($currentLength > $maxLength) {
            return $currentLength;
        }

        return $maxLength;
    }
}