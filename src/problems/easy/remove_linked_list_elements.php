<?php


/**
 * Remove Linked List Elements
 * @link https://leetcode.com/problems/remove-linked-list-elements
 *
 * Approach:
 * Traverse through each node,
 * check if current node value equals to target value (removable) and check if current node is head,
 * if it is head, then remove head (assign reference of the next node to $head variable, garbage collector will remove this object),
 * if it is not, then drop this node (take its parent node and assign reference of the next node to parentNode's next property),
 * else (node value is not equals to target value), then just continue traverse.
 *
 * Time complexity - O(n)
 * Space complexity - O(1)
 */
function removeElements($head, $val)
{
    $parentNode = null;
    $node = $head;

    if (!$node->next) {
        return $node->val === $val ? [] : $node;
    }

    while ($node) {
        if ($node->val === $val) {
            $node = $node->next;
            if (!$parentNode) {
                $head = $node;
            } else {
                $parentNode->next = $node;
            }
        } else {
            $parentNode = $node;
            $node = $node->next;
        }
    }

    return $head;
}