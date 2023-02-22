<?php


/**
 * Kth Smallest Element In a BST
 * @link https://leetcode.com/problems/kth-smallest-element-in-a-bst
 *
 * Approach:
 * Iterative Inorder Traversal using Stack to back up to parent node when we reach the bottom.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    public function kthSmallest($root, $k)
    {
        $stack = [];
        $node = $root;
        $smallestCounter = 0;
        $smallestValue = 0;

        while ($smallestCounter !== $k) {
            if ($node === null) {
                $parentNode = array_pop($stack);
                $smallestValue = $parentNode->val;
                $smallestCounter++;

                $node = $parentNode->right;
            } else {
                $stack[] = $node;
                $node = $node->left;
            }
        }

        return $smallestValue;
    }

}