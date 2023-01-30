<?php


/**
 * Koko Eating Bananas
 * @link https://leetcode.com/problems/koko-eating-bananas
 *
 * Approach:
 * Use binary search in range of minimum and maximum possible values (k).
 * If koko eats all bananas faster than or equal to given h hours, it is our possible solution, so store it and try to eat less bananas
 * (maybe we can eat less bananas and still be on time).
 * Otherwise, we have to eat more bananas per hour, so we can eat all bananas in given h hours.
 *
 * k = max value in the given array (it is our initially solution)
 * n = length of the given array (number of piles)
 * Time Complexity - O(log k * n)
 * Space Complexity - O(1)
 */
class Solution {

    public function minEatingSpeed($piles, $h)
    {
        if (count($piles) === $h) {
            return max($piles);
        }

        $min = 1;
        $max = max($piles);
        $ans = $max;

        // try each solution from minimum to maximum
        while ($min <= $max) {
            $hours = 0;
            // k - number of bananas we will eat per hour
            $k = floor(($min + $max) / 2);

            // calculate number of hours we needed to eat all bananas with current speed
            for ($i = 0; $i < count($piles); $i++) {
                $hours += ceil($piles[$i] / $k);
            }

            // if ate all bananas in given h hours or faster than given h hours, store solution and try to eat less bananas
            if ($hours <= $h) {
                $ans = $k;
                $max = $k - 1;
            } else {
                // otherwise we have to eat more bananas
                $min = $k + 1;
            }
        }

        return $ans;
    }
}