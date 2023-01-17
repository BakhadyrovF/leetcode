<?php


/**
 * Linked List Cycle II
 * @link https://leetcode.com/problems/linked-list-cycle-ii
 * Approach:
 * Detect cycle using two pointers (slow and fast)
 * Take the node where slow and fast meets and iterate until head does not meet that node
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {
    function detectCycle($head)
    {
        if ($head === null || $head->next === null) {
            return null;
        }

        $slow = $head;
        $fast = $head;

        // simple find cycle using slow and fast pointers
        while ($fast) {
            $slow = $slow->next;
            $fast = $fast->next->next;

            if ($slow === $fast) {
                break;
            }
        }

        // iterate until head and slow is not in the same node, it's proved mathematically that it will work
        while ($head !== $slow) {
            $head = $head->next;
            $slow = $slow->next;
        }

        return $slow;
    }
}