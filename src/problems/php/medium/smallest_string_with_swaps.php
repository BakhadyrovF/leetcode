<?php


/**
 * Smallest String With Swaps
 * @link https://leetcode.com/problems/smallest-string-with-swaps
 *
 * Approach:
 * Quick Union implementation of Union Find.
 * Think of it as a graph problem.
 * Group each pair, so we can take each group and sort it.
 * After sorting each group, iterate through each letter (node) and determine to which group this letter belongs.
 * Then just start taking smallest element in lexicographical order from its group.
 *
 * Time Complexity - O(n^2)
 * Space Complexity - O(n)
 */
class Solution {
    private array $root = [];

    public function smallestStringWithSwaps($s, $pairs)
    {
        for ($i = 0; $i < strlen($s); $i++) {
            $this->root[$i] = $i;
        }

        for ($i = 0; $i < count($pairs); $i++) {
            $this->union($pairs[$i][0], $pairs[$i][1]);
        }

        $groups = [];
        for ($i = 0; $i < count($this->root); $i++) {
            $rootX = $this->find($i);
            if (isset($groups[$rootX])) {
                $groups[$rootX][] = $s[$i];
            } else {
                $groups[$rootX] = [$s[$i]];
            }
        }

        $groups = array_map(function ($group) {
            rsort($group);

            return $group;
        }, $groups);

        $ans = '';
        for ($i = 0; $i < strlen($s); $i++) {
            $group = $this->find($i);

            $ans .= array_pop($groups[$group]);
        }

        return $ans;
    }

    private function union($x, $y)
    {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX === $rootY) {
            return;
        }

        if ($rootX < $rootY) {
            $this->root[$rootY] = $rootX;
        } else {
            $this->root[$rootX] = $rootY;
        }
    }

    private function find($x)
    {
        while ($this->root[$x] !== $x) {
            $x = $this->root[$x];
        }

        return $x;
    }
}