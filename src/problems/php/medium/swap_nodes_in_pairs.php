<?php


/**
 * Swap Nodes in Pairs
 * @link https://leetcode.com/problems/swap-nodes-in-pairs
 *
 * Approach:
 * Take current,next nodes and just swap them, before swap store pointer to the next node of next node in temp variable
 * Also keep track of previous node, so after swap we can point it to the swapped one
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {
    public function swapPairs($head) {
        if (!$head || !$head->next) {
            return $head;
        }

        $previous = null;
        $newHead = $head->next;
        $current = $head;
        $next = $head->next;

        while ($next) {
            $tmp = $next->next;
            $next->next = $current;
            $current->next = $tmp;

            if ($previous) {
                $previous->next = $next;
            }

            $previous = $current;
            $current = $current->next;
            $next = $current->next;
        }

        return $newHead;
    }
}