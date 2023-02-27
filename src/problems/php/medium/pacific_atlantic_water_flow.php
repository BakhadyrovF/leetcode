<?php


/**
 * Pacific Atlantic Water Flow
 * @link https://leetcode.com/problems/pacific-atlantic-water-flow
 *
 * Approach:
 * Start depth-first-search for each element of each edge;
 * Try to go as deep as possible, and store visited elements in hashmaps.
 * Actually (I'm tired of solving this kind of problems. I spent months of learning, but what I got?)
 *
 * Time Complexity - O(n * m)
 * Space Complexity - O(n * m)
 */
class Solution {

    function pacificAtlantic($heights) {
        $pacific = [];
        $atlantic = [];
        $rows = count($heights);
        $cells = count($heights[0]);

        for ($i = 0; $i < $cells; $i++) {
            $this->dfs(0, $i, $heights, $heights[0][$i], $pacific);
            $this->dfs($rows - 1, $i, $heights, $heights[$rows - 1][$i], $atlantic);
        }

        for ($i = 0; $i < $rows; $i++) {
            $this->dfs($i, 0, $heights, $heights[$i][0], $pacific);
            $this->dfs($i, $cells - 1, $heights, $heights[$i][$cells - 1], $atlantic);
        }

        $result = [];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cells; $j++) {
                if (isset($pacific["$i#$j"]) && isset($atlantic["$i#$j"])) {
                    $result[] = [$i, $j];
                }
            }
        }

        return $result;
    }

    private function dfs($row, $cell, $heights, $prevHeight, &$ocean)
    {
        if (
            !isset($heights[$row][$cell]) ||
            isset($ocean["$row#$cell"]) ||
            $heights[$row][$cell] < $prevHeight
        ) {
            return;
        }

        $ocean["$row#$cell"] = true;

        $this->dfs($row, $cell - 1, $heights, $heights[$row][$cell], $ocean);
        $this->dfs($row, $cell + 1, $heights, $heights[$row][$cell], $ocean);
        $this->dfs($row - 1, $cell, $heights, $heights[$row][$cell], $ocean);
        $this->dfs($row + 1, $cell, $heights, $heights[$row][$cell], $ocean);
    }

}

$sol = new Solution();
print_r($sol->pacificAtlantic([[3,3,3],[3,1,3],[0,2,4]]));














