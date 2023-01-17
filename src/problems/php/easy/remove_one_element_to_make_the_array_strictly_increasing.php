<?php


/**
 * Remove One Element To Make The Array Strictly Increasing
 * @link  https://leetcode.com/problems/remove-one-element-to-make-the-array-strictly-increasing
 *
 * Approach:
 * Find removable element and if it is previous element, then take pre-previous value and assign it to previous.
 * Otherwise, just increment current, these operations needed because we have to skip removable element instead of deleting it physically.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {
    function canBeIncreasing($nums) {
        $isRemoved = false;

        $prev = 0;
        $current = 1;
        while ($current < count($nums)) {
            if (($nums[$prev] ?? null) >= $nums[$current]) {
                if ($isRemoved) {
                    return false;
                }

                $isRemoved = true;
                if (isset($nums[$current + 1]) && $nums[$prev] >= $nums[$current + 1]) {
                    $prev = $prev - 1;
                } else {
                    $current++;
                }
            } else {
                $prev = $current;
                $current++;
            }
        }

        return true;
    }
}

$solution = new Solution();
echo $solution->canBeIncreasing([10, 2, 3]) ? 'true' : 'false';