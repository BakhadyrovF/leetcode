<?php


/**
 * Construct Binary Tree from Preorder and Inorder Traversal
 * @link https://leetcode.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal
 *
 * Approach:
 * In preorder root is always first element.
 * Elements that stay on the left of index of current root in inorder array is left ascendants, those on right side are right ascendants.
 *
 * Time Complexity - O(n^2) can be optimized to O(n) with hashmap for storing indices of inorder values.
 * Space Complexity - O(n)
 */
class Solution {
    function buildTree($preorder, $inorder)
    {
        if (empty($preorder) && empty($inorder)) {
            return null;
        }

        $root = new TreeNode($preorder[0]);
        $mid = array_search($preorder[0], $inorder);
        $root->left = $this->buildTree(array_slice($preorder, 1, $mid), array_slice($inorder, 0, $mid));
        $root->right = $this->buildTree(array_slice($preorder, $mid + 1), array_slice($inorder, $mid + 1));

        return $root;
    }
}
