<?php


/**
 * Number of Islands
 * @link https://leetcode.com/problems/number-of-islands
 *
 * Approach:
 * Iterate through each element,
 * if current element is land ('1'), then call recursive function that marks all its adjacent nodes as visited.
 * Note that when marking nodes as visited if you find another land ('1'), then you should mark its adjacent nodes as well.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    public function numIslands($grid)
    {
        $islands = 0;

        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                if ($grid[$i][$j] === '1') {
                    $islands++;

                    $this->markAsVisited($grid, $i, $j);
                }
            }
        }

        return $islands;
    }

    private function markAsVisited(&$grid, $i, $j)
    {
        $grid[$i][$j] = '2';
        $directions = [[$i, $j - 1], [$i, $j + 1], [$i - 1, $j], [$i + 1, $j]];

        for ($k = 0; $k < 4; $k++) {
            $i = $directions[$k][0];
            $j = $directions[$k][1];
            if (isset($grid[$i][$j]) && $grid[$i][$j] === '1') {
                $this->markAsVisited($grid, $i, $j);
            }
        }
    }
}