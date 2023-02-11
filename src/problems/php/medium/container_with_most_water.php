<?php


/**
 * Container With Most Water
 * @link https://leetcome.com/problems/container-with-most-water
 *
 * Approach:
 * Initialize two pointers - left and right.
 * Based comparison of both pointers value - move one of them (the lowest pointer - moves)
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {

    public function maxArea(array $height): int
    {
        $l = 0;
        $r = count($height) - 1;
        $ans = $this->calculateAmount($height, $l, $r);

        if (count($height) === 2) {
            return $ans;
        }

        while ($l < $r) {
            if ($height[$l] < $height[$r]) {
                $l++;
            } else {
                $r--;
            }

            $ans = max($ans, $this->calculateAmount($height, $l, $r));
        }

        return $ans;
    }

    protected function calculateAmount(array $height, int $l, int $r): int
    {
        return min($height[$l], $height[$r]) * ($r - $l);
    }
}

$height = [2, 4, 3, 2];