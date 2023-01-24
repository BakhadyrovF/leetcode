<?php


/**
 * Product of Array Except Self
 * @link https://leetcode.com/problems/product-of-array-except-self
 *
 * Approach:
 * Compute prefix and postfix arrays, and then in third loop compute product of array except itself:
 * ans[i] = prefix[i - 1] * postfix[i + 1]
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 *
 */
class Solution {

    public function productExceptSelf($nums)
    {
        $count = count($nums);
        $prefix = [$nums[0]];
        $postfix = [$count - 1 => $nums[$count - 1]];

        for ($i = 1; $i < $count; $i++) {
            $prefix[] = $prefix[$i - 1] * $nums[$i];
        }

        for ($i = $count - 2; $i >= 0; $i--) {
            $postfix[$i] = $nums[$i] * $postfix[$i + 1];
        }

        $ans = [];
        for ($i = 0; $i < $count; $i++) {
            $ans[] = ($prefix[$i - 1] ?? 1) * ($postfix[$i + 1] ?? 1);
        }

        return $ans;
    }
}