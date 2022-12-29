<?php

/**
 * Binary Tree Postorder Traversal
 * @link https://leetcode.com/problems/binary-tree-postorder-traversal
 *
 * Approach:
 * Think of each node of tree as a subtree and run these steps recursively for each subtree (node).
 * 1. Collect value at left node
 * 2. Collect value at right node
 * 3. Collect value at root node
 *
 * Time complexity - O(n)
 * Space complexity - O(n)
 */
class Solution {

    public function postorderTraversal($root)
    {
        if (empty($root)) {
            return [];
        }

        $result = [];
        $this->postorder($root, $result);

        return $result;
    }

    protected function postorder($node, &$result)
    {
        if ($node === null) {
            return null;
        }

        $this->postorder($node->left, $result);
        $this->postorder($node->right, $result);
        $result[] = $node->val;
    }
}