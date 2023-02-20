<?php


/**
 * LCA Of a Binary Tree
 * @link https://leetcode.com/problems/lowest-common-ancestor-of-a-binary-tree
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    private $ans;

    public function lowestCommonAncestor($root, $p, $q)
    {
        $this->ans = $root;

        $this->findLCA($root, $p, $q);

        return $this->ans;
    }

    private function findLCA($root, $p, $q)
    {
        if ($root == null) {
            return false;
        }

        $left = $this->findLCA($root->left, $p, $q);
        $right = $this->findLCA($root->right, $p, $q);

        $middle = ($root->val == $p->val || $root->val == $q->val);

        if ($left + $right + $middle === 2) {
            $this->ans = $root;
        }

        return ($left + $right + $middle) > 0;
    }
}