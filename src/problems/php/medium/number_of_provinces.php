<?php


/**
 * Number Of Provinces
 * @link https://leetcode.com/problems/number-of-provinces
 *
 * Approach:
 * Quick Union implementation of Union Find
 * Iterate through each element and check are they connected.
 * If so, then union them.
 *
 * Time Complexity - O(n^2)
 * Union Constructor - O(n)
 * Union for each connection - O(n^2)
 * Count provinces with finding root of each element - O(n^2)
 * So overall - O(n) + O(n^2) + O(n^2) = O(2n^2 + n) = O(n^2)
 * Space Complexity - O(n)
 */
class Solution {

    private array $root = [];

    function findCircleNum($isConnected)
    {
        for ($i = 0; $i < count($isConnected); $i++) {
            $this->root[$i] = $i;
        }

        for ($i = 0; $i < count($isConnected); $i++) {
            for ($j = $i + 1; $j < count($isConnected); $j++) {
                if ($isConnected[$i][$j]) {
                    $this->union($i, $j);
                }
            }
        }

        $provinces = [];

        for ($i = 0; $i < count($this->root); $i++) {
            $provinces[$this->findRoot($i)] = true;
        }

        return count($provinces);
    }

    private function union($x, $y)
    {
        $rootX = $this->findRoot($x);
        $rootY = $this->findRoot($y);

        if ($rootX === $rootY) {
            return;
        }

        if ($rootX < $rootY) {
            $this->root[$rootY] = $rootX;
        } else {
            $this->root[$rootX] = $rootY;
        }
    }

    private function findRoot($x)
    {
        while ($this->root[$x] !== $x) {
            $x = $this->root[$x];
        }

        return $x;
    }
}