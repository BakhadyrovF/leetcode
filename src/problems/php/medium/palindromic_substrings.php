<?php


/**
 * Palindromic Substrings
 * @link https://leetcode.com/problems/palindromic-substrings
 *
 * Approach:
 * 1. For each character compare it's left and right characters, if they are equal, sub-string is palindromic.
 * Approach above will work only for odd palindromic substrings (bab, cdc),
 * but it will not work for even palindromic sub-strings (bb, deed), so we have to use little different logic like described below.
 * 2. For each character take it's right character and compare it with current one, if they are equal,
 * sub-string is also palindromic.
 * So, for proper work of our algorithm, we have to combine both approaches above.
 * First check for odd sub-strings, and then check for even sub-strings.
 * Summary - count odd palindromic substrings + count even palindromic substrings, for each character,
 * and finally before return, add length of given string to total numbers of palindromic substring (each char is palindromic).
 *
 * Time Complexity - O(n^2)
 * Space Complexity - O(1)
 */
class Solution {

    public function countSubstrings($s)
    {
        $ans = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            $ans += $this->countPalindrome($i - 1, $i + 1, $s) + $this->countPalindrome($i, $i + 1, $s);
        }

        return $ans + strlen($s);
    }

    protected function countPalindrome($left, $right, $s)
    {
        $counter = 0;
        while ($left >= 0 && $right < strlen($s)) {
            $leftChar = substr($s, $left, 1);
            $rightChar = substr($s, $right, 1);
            if ($leftChar !== $rightChar) {
                break;
            }

            $counter++;
            $left--;
            $right++;
        }

        return $counter;
    }
}