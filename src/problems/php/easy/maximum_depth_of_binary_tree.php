<?php


class Solution {

    public function maxDepth($node)
    {
        if ($node === null) {
            return 0;
        }

        return max($this->maxDepth($node->left), $this->maxDepth($node->right)) + 1;
    }
}