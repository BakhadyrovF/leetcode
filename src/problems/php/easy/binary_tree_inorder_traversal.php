<?php





class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

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
