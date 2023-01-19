<?php


/**
 * Remove Nth Node From End of List
 * @link https://leetcode.com/problems/remove-nth-node-from-end-of-list
 *
 * Approach:
 * Traverse through each node and push them to array, also keep track of length of the Linked List
 * Calculate element's index that must be deleted, and using array of nodes remove pointer to this node
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {
    function removeNthFromEnd($head, $n)
    {
        if ($head === null || $head->next === null) {
            return $head->next;
        }

        $list = [];
        $length = 0;
        $node = $head;

        while ($node) {
            $list[] = $node;
            $node = $node->next;
            $length++;
        }

        $targetIndex = $length - $n;

        if (empty($list[$targetIndex - 1])) {
            return $list[$targetIndex]->next;
        }

        $list[$targetIndex - 1]->next = $list[$targetIndex + 1];

        return $head;
    }
}