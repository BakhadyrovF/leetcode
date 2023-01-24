<?php


/**
 * Group Anagrams
 * @link https://leetcode.com/problems/group-anagrams
 *
 * Approach:
 * Count numbers of letter for each word (use array with 26 zeros), 26 because there is only 26 six letters in english alphabet.
 * After counting, convert that array to string separated with some symbol (doesn't matter).
 * (Without this symbol, we may have duplicate hashes for not anagrams).
 *
 * n = strs.length
 * m = strs[i].length
 * Time Complexity - O(n * m)
 * Space Complexity - O(n * m)
 */
class Solution {

    public function groupAnagrams($strs)
    {
        $ans = [];

        for ($i = 0; $i < count($strs); $i++) {
            $counter = array_fill(0, 26, 0);
            for ($j = 0; $j < strlen($strs[$i]); $j++) {
                $counter[ord(substr($strs[$i], $j, 1)) - ord('a')]++;
            }

            $hash = implode('#', $counter);
            if (empty($ans[$hash])) {
                $ans[$hash] = [$strs[$i]];
            } else {
                $ans[$hash][] = $strs[$i];
            }
        }

        return $ans;
    }
}

$solution = new Solution();
$strs = ["ddddddddddg","dgggggggggg"];
print_r($solution->groupAnagrams($strs));
