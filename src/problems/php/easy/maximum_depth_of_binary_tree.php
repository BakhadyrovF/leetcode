<?php


/**
 * Maximum Depth of Binary Tree
 * @link https://leetcode.com/problems/maximum-depth-of-binary-tree
 *
 * Approach:
 * If given node is null, then it means there is no left or right, and since node is null we return 0 nodes here
 * Otherwise, we are calling method recursively and adding it 1 so, in the end we will get sum of nodes of left and right side,
 * and just take highest from them
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n) - calling method recursively n times.
 */
class Solution {

    public function maxDepth($node)
    {
        if ($node === null) {
            return 0;
        }

        return max($this->maxDepth($node->left), $this->maxDepth($node->right)) + 1;
    }
}