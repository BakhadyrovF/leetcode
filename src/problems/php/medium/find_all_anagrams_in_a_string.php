<?php


/**
 * Find All Anagrams in a String
 * @link https://leetcode.com/problems/find-all-anagrams-in-a-string
 *
 * Approach:
 * Count letters for initial sub-string.
 * Start incrementing first and last pointer of sub-string.
 * Since we are changing only first and last letter of our sub-string, we do not need to count again all sub-string letters,
 * we can change only first and last letter counter in constant time.
 * Compare each sub-string counter with given target string counter, if they are equal, push current index to the result array.
 *
 * Time Complexity - O(n) - we are comparing two arrays in each iteration, but size of arrays is fixed(26).
 * Space Complexity - O(1) - we are not using any additional space except for result array.
 */
class Solution {

    public function findAnagrams($s, $p)
    {
        $pLength = strlen($p);
        $sLength = strlen($s);

        if ($sLength < $pLength) {
            return [];
        }

        $result = [];

        $alphabet = 'abcdefghilkmnopqrstuvwxyz';
        $targetHash = $this->countLetters($p, $alphabet);
        $currentHash = $this->countLetters(substr($s, 0, $pLength), $alphabet);

        if ($currentHash === $targetHash) {
            $result[] = 0;
        }

        for ($i = 1; ($i + $pLength - 1) < $sLength; $i++) {
            $currentHash[strpos($alphabet, $s[$i - 1])]--;
            $currentHash[strpos($alphabet, $s[$i + ($pLength - 1)])]++;

            if ($currentHash === $targetHash) {
                $result[] = $i;
            }
        }

        return $result;
    }

    protected function countLetters($subString, $alphabet)
    {
        $letters = array_fill(0, 26, 0);

        for ($i = 0; $i < strlen($subString); $i++) {
            $letters[strpos($alphabet, $subString[$i])]++;
        }

        return $letters;
    }
}