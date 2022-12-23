<?php

$nums = [1, 3, 5, 6];
$target = 4;

/**
 * Search Insert Position - O(log n)
 * @link https://leetcode.com/problems/search-insert-position
 *
 * Approach - Simple binary search and additional variable to keep tracking index where target can be inserted if target is not found.
 * Explaining $insertableIndex logic - we can be sure that if our target value is greater than middle value of array,
 * target's index would be $middle + 1 because on the left side all values are less than target.
 * Also, we can be sure that if our target is less than middle value of array, target's index is would be $middle
 * because on the right side all values are greater than target and $nums[$middle] can be moved to $middle + 1.
 *
 * Time complexity - O(log n)
 * Space complexity - O(1)
 */
function searchInsert($nums, $target): int
{
    $start = 0;
    $end = count($nums) - 1;
    $insertableIndex = 0;

    while ($start <= $end) {
        $middle = floor(($start + $end) / 2);

        if ($nums[$middle] === $target) {
            return $middle;
        }

        if ($nums[$middle] < $target) {
            $start = $middle + 1;
            $insertableIndex = $middle + 1;
        } else {
            $end = $middle - 1;
            $insertableIndex = $middle;
        }
    }

    return $insertableIndex;
}

echo searchInsert($nums, $target);
