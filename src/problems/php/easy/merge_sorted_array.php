<?php


$nums1 = [1, 2, 3, 0, 0, 0];
$nums2 = [2, 5, 6];
$m = 3;
$n = 3;

/**
 * Merge Sorted Array
 * @link https://leetcode.com/problems/merge-sorted-array
 *
 * Note: $nums1 array contain zeros that should be ignored,
 * zeros added for not being worried about memory that array take - $nums1 has exact length of result (merged arrays)
 */


/**
 * Approach:
 * Initialize two pointers for two arrays,
 * start iterating from the end of arrays,
 * iterate until both pointers are less than 0,
 * check which array value is higher and push value to result array starting from the end.
 *
 * Time complexity - O(n)
 * Space complexity - O(1)
 */
function merge(&$nums1, $m, $nums2, $n)
{
    if ($m === 0) {$nums1 = $nums2; return;}
    if ($n === 0) {return;}

    $firstPointer = $m - 1;
    $secondPointer = $n - 1;
    $countdown = count($nums1) - 1;

    while ($firstPointer >= 0 || $secondPointer >= 0) {
        $firstItem = $nums1[$firstPointer] ?? null;
        $secondItem = $nums2[$secondPointer] ?? null;

        if ($secondItem === null || $firstItem !== null && $firstItem > $secondItem) {
            $nums1[$countdown--] = $firstItem;
            $firstPointer--;
        } else {
            $nums1[$countdown--] = $secondItem;
            $secondPointer--;
        }
    }
}


/**
 *
 * Approach:
 * Initialize two pointers for two arrays,
 * start iterating from the beginning of arrays,
 * iterate through until both pointers are equal to length of arrays,
 * check which array value is less and push this value to result array starting from the beginning
 * copy result to $nums1.
 *
 * Time complexity - O(n)
 * Space complexity - O(n)
 */
function mergeAnotherApproach(&$nums1, $m, $nums2, $n)
{
    if ($m === 0) {
        $nums1 = $nums2;
        return;
    } elseif ($n === 0) {
        return;
    }

    $firstPointer = 0;
    $secondPointer = 0;
    $result = [];

    while ($firstPointer < $m || $secondPointer < $n) {
        $firstItem = $firstPointer < $m ? $nums1[$firstPointer] : false;
        $secondItem = $nums2[$secondPointer] ?? false;

        if ($secondItem === false || $firstItem !== false && $firstItem < $secondItem) {
            $result[] = $firstItem;
            $firstPointer++;
        } else {
            $result[] = $secondItem;
            $secondPointer++;
        }
    }

    $nums1 = $result;
}
