<?php


/**
 * Reverse Integer
 * @link - https://leetcode.com/problems/reverse-integer
 *
 * Approach:
 * 1. Take the last digit from input digits ($x % 10)
 * 2. Multiply $reversed to 10 and add $lastDigit ($reversed * 10 + $lastDigit)
 * 3. Remove last digit from input digits
 * 4. Do steps above while $positiveInt is greater than 0
 *
 * Time complexity - O(n)
 * Space complexity - O(n);
 */
function reverse($x) {

    $reversed = 0;
    $positiveInt = abs($x);

    while ($positiveInt > 0) {
        $lastDigit = $x % 10;
        $reversed = ($reversed * 10) + $lastDigit;

        if ($reversed < -2147483648 || $reversed > 2147483648) {
            return 0;
        }

        $x = intval($x / 10);
        $positiveInt = intval($positiveInt / 10);
    }

    return $reversed;
}

echo reverse(-123);