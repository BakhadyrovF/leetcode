<?php

/**
 * Binary Tree Inorder Traversal
 * @link https://leetcode.com/problems/binary-tree-inorder-traversal
 *
 * Approach:
 * Think of each node of tree as a subtree and run these steps recursively for each subtree (node).
 * 1. Collect value at left node
 * 2. Collect value at root node
 * 3. Collect value at right node
 *
 * Time complexity - O(n)
 * Space complexity - O(n)
 */
class Solution {

    public function inorderTraversal($root)
    {
        if (empty($root)) {
            return [];
        }

        $result = [];

        $this->inOrder($root, $result);

        return $result;
    }

    protected function inOrder($node, &$result)
    {
        if ($node->left !== null) {
            $this->inOrder($node->left, $result);
        }

        $result[] = $node->val;

        if ($node->right !== null) {
            $this->inOrder($node->right, $result);
        }
    }

}

