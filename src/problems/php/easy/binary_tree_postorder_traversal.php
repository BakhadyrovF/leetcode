<?php



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