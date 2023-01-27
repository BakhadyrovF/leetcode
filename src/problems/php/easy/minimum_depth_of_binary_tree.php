<?php


/**
 * Minimum Depth of Binary Tree
 * @link https://leetcode.com/problems/minimum-depth-of-binary-tree
 *
 * Approach:
 * Modified Breadth First Search, we are incrementing depth only after passing all nodes in current level.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    public function minDepth($root)
    {
        if ($root === null) {
            return 0;
        }

        $queue = [$root];
        $depth = 1;

        while (!empty($queue)) {
            $size = count($queue);

            for ($i = 0; $i < $size; $i++) {
                $node = array_shift($queue);

                if ($node->left === null && $node->right === null) {
                    return $depth;
                }

                if ($node->left) {
                    $queue[] = $node->left;
                }

                if ($node->right) {
                    $queue[] = $node->right;
                }
            }
            $depth++;
        }

        return -1;
    }
}