<?php

/**
 * Binary Tree Preorder Traversal
 * @link https://leetcode.com/problems/binary-tree-preorder-traversal
 *
 * Approach:
 * Think of each node of tree as a subtree and run these steps recursively for each subtree (node).
 * 1. Collect value at root node
 * 2. Collect value at left node
 * 3. Collect value at right node
 *
 * Time complexity - O(n)
 * Space complexity - O(n)
 */
class Solution {

    public function preorderTraversal($root)
    {
        if (empty($root)) {
            return [];
        }

        $result = [];

        $this->preorder($root, $result);

        return $result;
    }

    protected function preorder($node, &$result)
    {
        if ($node === null) {
            return null;
        }

        $result[] = $node->val;
        $this->preorder($node->left, $result);
        $this->preorder($node->right, $result);
    }
}