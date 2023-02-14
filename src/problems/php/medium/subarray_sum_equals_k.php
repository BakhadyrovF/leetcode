<?php


/**
 * Subarray Sum Equals K
 * @link https://leetcode.com/problems/subarray-sum-equals-k
 *
 * Approach:
 * Use hash-map to store prefix sum till current index with its counter.
 * In current index check is there deletable subarray with sum equals to (sum - k)
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    public function subarraySum($nums, $k)
    {
        $map = [0 => 1];
        $sum = 0;
        $res = 0;

        for ($i = 0; $i < count($nums); $i++) {
            $sum += $nums[$i];

            if (isset($map[$sum - $k])) {
                $res += $map[$sum - $k];
            }

            $map[$sum] = 1 + ($map[$sum] ?? 0);
        }

        return $res;
    }
}