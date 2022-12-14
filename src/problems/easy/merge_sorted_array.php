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
 *
 * Approach - initialize two pointers, iterate through arrays until both pointer are equal to the number of elements.
 * Check if $firstPointer is greater than $m ($nums1 length) take false, because we should ignore all zeros that start at index $m.
 * Rest is simple: check if $firstElement exists and less than $secondItem - push $firstItem to $result array
 * and increment $firstPointer, else do the same thing for $secondItem.
 *
 */
function merge(&$nums1, $m, $nums2, $n)
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

merge($nums1, $m, $nums2, $n); // [1, 2, 2, 3, 5, 6]
