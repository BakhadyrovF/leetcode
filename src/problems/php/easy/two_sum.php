<?php


/**
 * Two Sum
 * @link - https://leetcode.com/problems/two-sum
 *
 * Approach:
 * Using auxiliary space for reducing Time Complexity of algorithm.
 *
 * Time complexity - O(n)
 * Space complexity - O(n)
 */
function twoSum($nums, $target) {
    $cache = [];

    for ($i = 0; $i < count($nums); $i++) {
        $neededNumber = $target - $nums[$i];
        if (isset($cache[$nums[$i]])) {
            return [$cache[$nums[$i]], $i];
        }

        $cache[$neededNumber] = $i;
    }

    return [];
}