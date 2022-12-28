<?php

/**
 * Binary Tree Inorder Traversal
 * @link https://leetcode.com/problems/binary-tree-inorder-traversal
 *
 * Approach:
 * Imagine each node of tree as a subtree and run these steps recursively for each subtree (node).
 * 1. Collect value on the left side
 * 2. Collect root node
 * 3. Collect value on the right side
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
        if ($node === null) {
            return null;
        }

        if ($node->left !== null) {
            $this->inOrder($node->left, $result);
        }

        $result[] = $node->val;

        if ($node->right !== null) {
            $this->inOrder($node->right, $result);
        }
    }

}

