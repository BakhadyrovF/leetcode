


/**
 * Length of Last Word
 * link - https://leetcode.com/problems/length-of-last-word
 *
 * Approach - start iterating through each element from the end of string.
 * if character equals to ' ' (space) and before this space we have any english letter (lastWordLength !== 0) return wordLength
 * else increment wordLength because it is the word we want.
 *
 * Time complexity - O(n)
 * Space complexity - O(1)
 */
const lengthOfLastWord = function(s) {
    let lastWordLength = 0;
    const length = s.length;

    for (i = length - 1; i >= 0 ; i--) {
        if (s[i] === ' ') {
            if (lastWordLength) {
                return lastWordLength;
            }
        } else {
            lastWordLength++;
        }
    }

    return lastWordLength;
};