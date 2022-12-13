<?php



/**
 * Length of Last Word
 * @link https://leetcode.com/problems/length-of-last-word
 *
 * Approach - start iterating through each element from the end of string,
 * if letter equals to ' ' (space) and before this space we have any english letter ($wordLength !== 0) return $wordLength
 * else increment $wordLength because it is the word we want.
 *
 * Time complexity - O(n)
 * Space complexity - O(1)
 */
function lengthOfLastWord($s): int
{
    $wordLength = 0;
    $length = strlen($s);

    for ($i = $length - 1; $i >= 0; $i--) {
        if ($s[$i] === ' ') {
            if ($wordLength) {
                return $wordLength;
            }
        } else {
            $wordLength++;
        }
    }

    return $wordLength;
}