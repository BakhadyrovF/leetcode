<?php


/**
 * Longest Palindromic Substring
 * @link https://leetcode.com/problems/longest-palindromic-substring
 *
 * Approach:
 * 1. For each character compare it's left and right characters, if they are equal, sub-string is palindromic.
 * Approach above will work only for odd palindromic substrings (bab, cdc),
 * but it will not work for even palindromic sub-strings (bb, deed), so we have to use little different logic like described below.
 * 2. For each character take it's right character and compare it with current one, if they are equal,
 * sub-string is also palindromic.
 * So, for proper work of our algorithm, we have to combine both approaches above.
 * First check for odd sub-strings, and then check for even sub-strings.
 *
 * Time Complexity - O(n^2)
 * Space Complexity - O(1)
 */
class Solution {

    private string $string;
    private int $ansLength = 0;
    private array $ans = [];

    function longestPalindrome($s)
    {
        if (strlen($s) === 1 || strrev($s) === $s) {
            return $s;
        }

        $this->string = $s;

        for ($i = 0; $i < strlen($s); $i++) {
            $this->findLongestPalindrome($i - 1, $i + 1);
            $this->findLongestPalindrome($i, $i + 1);
        }

        return empty($this->ans) ? $s[0] : substr($s, $this->ans[0], $this->ans[1] - $this->ans[0] + 1);
    }

    protected function findLongestPalindrome($left, $right): void
    {
        $leftChar = substr($this->string, $left, 1);
        $rightChar = substr($this->string, $right, 1);
        while ($left >= 0 && $right < strlen($this->string) && $leftChar === $rightChar) {
            if (($right - $left + 1) > $this->ansLength) {
                $this->ansLength = $right - $left + 1;
                $this->ans = [$left, $right];
            }

            $left--;
            $right++;
        }
    }
}