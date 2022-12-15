<?php

/**
 * Remove Duplicates from Sorted List
 * @link https://leetcode.com/problems/remove-duplicates-from-sorted-list
 *
 * Approach:
 * Initialize two pointers (two nodes - current, next)
 * Traverse through each node until second pointer (second node) is not null
 * Check if first node and second node values are the same,
 * then just drop the second node (assign reference of the second node's next node to the first node's next property)
 * Else (values are not the same), then continue traverse (first node references to the second node, second node reference to the next node)
 *
 * Time complexity - O(n)
 * Space complexity - O(1)
 */
function deleteDuplicates($head)
{
    $firstPointer = $head;
    $secondPointer = $head->next;

    if (!$secondPointer) {
        return $firstPointer;
    }

    while ($secondPointer) {
        if ($firstPointer->val === $secondPointer->val) {
            $secondPointer = $secondPointer->next;
            $firstPointer->next = $secondPointer;
        } else {
            $firstPointer = $secondPointer;
            $secondPointer = $secondPointer->next;
        }
    }

    return $head;
}