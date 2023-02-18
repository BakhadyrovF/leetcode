<?php


/**
 * Valid Parenthesis String
 * @link https://leetcode.com/problems/valid-parenthesis-string
 *
 * Approach:
 * Use of 2 stacks, 1 for open-brackets and 1 for wildcards.
 * If open brackets count === close brackets count, then open brackets stack will be empty anyway, so we can return true.
 * If open brackets count < close brackets count, then we will assume wildcards as an open brackets.
 * If open brackets count > close brackets count, then we will assume wildcards as a close brackets, also we will check their position.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    public function checkValidString($s) {

        $openStack = [];
        $wildcardStack = [];

        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] === '(') {
                $openStack[] = $i;
            } elseif($s[$i] === '*') {
                $wildcardStack[] = $i;
            } else {
                if (!empty($openStack)) {
                    array_pop($openStack);
                } elseif (!empty($wildcardStack)) {
                    array_pop($wildcardStack);
                } else {
                    return false;
                }
            }
        }

        while (!empty($openStack) && !empty($wildcardStack)) {
            if (array_pop($openStack) > array_pop($wildcardStack)) {
                return false;
            }
        }

        return empty($openStack);
    }
}