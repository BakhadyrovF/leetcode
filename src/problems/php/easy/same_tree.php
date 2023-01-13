<?php



class Solution {

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    public function isSameTree($p, $q)
    {
        return $this->traversal($p, $q);
    }

    protected function traversal($p, $q)
    {
        if ($p->val !== $q->val) {
            return false;
        }

        if ($p->left !== null && $q->left !== null) {
            $res = $this->traversal($p->left, $q->left);

            if (!$res) {
                return false;
            }
        } else {
            $pOrq = $p->left ?? $q->left;

            if ($pOrq) {
                return false;
            }
        }

        if ($p->right !== null && $q->right !== null) {
            $res = $this->traversal($p->right, $q->right);

            if (!$res) {
                return false;
            }
        } else {
            $pOrQ = $p->right ?? $q->right;

            if ($pOrQ) {
                return false;
            }
        }

        return true;
    }
}