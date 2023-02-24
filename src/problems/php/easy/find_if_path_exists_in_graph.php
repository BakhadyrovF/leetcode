<?php


/**
 * Find If Path Exists In Graph
 * @link https://leetcode.com/problems/find-if-path-exists-in-graph
 *
 * Approach:
 * Quick-Union Implementation of Disjoint-set
 *
 * e = edges.length
 * n = vertices.length
 * Time Complexity - O(e * n)
 * Space Complexity - O(n)
 */
class Solution {
    public function validPath($n, $edges, $source, $destination)
    {
        $vertices = range(0, $n - 1);

        for ($i = 0; $i < count($edges); $i++) {
            $rootX = $this->findRoot($vertices, $edges[$i][0]);
            $rootY = $this->findRoot($vertices, $edges[$i][1]);

            if ($rootX < $rootY) {
                $vertices[$rootY] = $rootX;
            } else {
                $vertices[$rootX] = $rootY;
            }
        }

        return $this->findRoot($vertices, $source) === $this->findRoot($vertices, $destination);
    }

    private function findRoot($vertices, $vertex)
    {
        while ($vertices[$vertex] !== $vertex) {
            $vertex = $vertices[$vertex];
        }

        return $vertex;
    }
}