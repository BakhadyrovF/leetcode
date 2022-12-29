<?php



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

    protected function preorder($node, &$result = [])
    {
        $result[] = $node->val;

        if ($node->left !== null) {
            $this->preorder($node->left, $result);
        }

        if ($node->right !== null) {
            $this->preorder($node->right, $result);
        }
    }
}