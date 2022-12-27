<?php

/**
 * Valid Parentheses
 * link - https://leetcode.com/problems/valid-parentheses
 *
 * Approach:
 * Iterate through each parenthesis and if it is opening parenthesis, then push it to our stack
 * Else (closing parenthesis), then take top from our stack (LILO) and if stack's top is not our pair, return false
 * If it is our pair - remove it from stack and continue iterating
 *
 * Time complexity - O(n)
 * Space complexity - O(n)
 */
function isValid($s) {
    $parentheses = [ "(" => ")", "[" => "]", "{" => "}", ];
    $stack = [];
    $length = strlen($s);

    for ($i = 0; $i < $length; $i++) {
        $bracket = substr($s, $i, 1);

        if (isset($parentheses[$bracket])) {
            $stack[] = $bracket;
        } else {
            $stackTop = array_pop($stack);

            if ($bracket !== $parentheses[$stackTop]) {
                return false;
            }
        }
    }

    return $stack === [];
}

$s = "[()]{}";
echo isValid($s);
