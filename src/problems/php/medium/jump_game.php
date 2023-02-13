<?php


/**
 * Jump Game
 * @link https://leetcode.com/problems/jump-game
 *
 * Approach:
 * 1. Take each element where we can jump from current position and find optimal one,
 * in this case optimal one is the one that can jump further than others.
 * 2. After this, jump to this optimal position and then repeat 1st step,
 * note that for the algorithm work linearly we start checking each element where we can jump,
 * from element that stays after the last element where we could jump from previous position.
 * (All elements that we access early and that stays after the optimal one are not require to check,
 * because they are stay after optimal one and still can't jump further)
 */
class Solution {

    public function canJump($nums)
    {
        $start = 1;
        $end = $nums[0];

        for ($i = 0; $i < count($nums) - 1; $i++) {
            if ($nums[$i] === 0) {
                return false;
            }

            if ($end >= count($nums) - 1) {
                return true;
            }

            $optimalValue = 0;
            $optimalIdx = 0;
            while ($start <= $end) {
                if ($nums[$start] + $start >= $optimalValue) {
                    $optimalIdx = $start;
                    $optimalValue = $nums[$start] + $start;
                }
                $start++;
            }

            $end = $optimalValue;
            $i = $optimalIdx - 1;
        }

        return true;
    }

    /**
     * Keep track of max index where we can jump,
     * if current index is greater than max index, then we can't access the top.
     */
    public function canJumpReadable($nums) {
        $maxJump = 0;

        for ($i = 0; $i < count($nums); $i++) {
            if ($maxJump < $i) {
                return false;
            }

            $maxJump = max($maxJump, ($i + $nums[$i]));
        }

        return true;
    }
}

