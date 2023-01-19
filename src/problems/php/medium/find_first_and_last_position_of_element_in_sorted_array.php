<?php


/**
 * Find Firs and Last Postion of Element in Sorted Array
 * @link https://leetcode.com/problems/find-first-and-last-position-of-element-in-sorted-array
 *
 * Approach:
 * Modified Binary Search
 * Run 2 Binary Searches:
 * 1. Find start index - Find target and then check if previous one has the same value, then go left till we have the same value on left.
 * 2. Find end index - Find target and then check if next one has the same value, then go right till we have the same value on right.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {

    private array $nums;
    private int $target;
    function searchRange($nums, $target)
    {
        $this->nums = $nums;
        $this->target = $target;

        $startIndex = $this->findStart();
        $endIndex = $this->findEnd($startIndex ?? 0);

        return [$startIndex ?? -1, $endIndex ?? -1];
    }

    private function findStart()
    {
        $left = 0;
        $right = count($this->nums) - 1;
        $startIndex = null;

        while ($left <= $right) {
            $middle = floor(($left + $right) / 2);

            if ($this->nums[$middle] === $this->target) {
                if (($this->nums[$middle - 1] ?? null) !== $this->target) {
                    $startIndex = $middle;
                    break;
                }

                $right = $middle - 1;
            } elseif ($this->nums[$middle] < $this->target) {
                $left = $middle + 1;
            } else {
                $right = $middle - 1;
            }
        }

        return $startIndex;
    }

    private function findEnd($left)
    {
        $right = count($this->nums) - 1;
        $endIndex = null;

        while ($left <= $right) {
            $middle = floor(($left + $right) / 2);

            if ($this->nums[$middle] === $this->target) {
                if (($this->nums[$middle + 1] ?? null) !== $this->target) {
                    $endIndex = $middle;
                    break;
                }

                $left = $middle + 1;
            } elseif ($this->nums[$middle] < $this->target) {
                $left = $middle + 1;
            } else {
                $right = $middle - 1;
            }
        }

        return $endIndex;
    }
}