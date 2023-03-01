<?php


/**
 * Course Schedule
 * @link https://leetcode.com/problems/course-schedule
 *
 * Approach:
 * If there is a cycle in given graph, then we can't complete all courses, so we need to detect is there a cycle in given graph.
 * For detecting cycle in a graph, we can use simple DFS traverse with set/hash-map to keep track of visited nodes.
 * If node is already visited then - there is a cycle.
 *
 * Or we can use BFS solution that I like better.
 * For detecting cycle in a graph using BFS we can use Kanh's algorithm for topological sort.
 *
 * Time Complexity - O(V + E)
 * Space Complexity - O(V + E)
 */
class Solution {
    public function canFinish($numCourses, $prerequisites)
    {
        $adjacencyList = $this->buildAdjacencyList($numCourses, $prerequisites);

        return !$this->hasCycle($adjacencyList);
    }

    private function hasCycle($graph)
    {
        $inDegreeOfNodes = array_fill(0, count($graph), 0);
        for ($i = 0; $i < count($graph); $i++) {
            for ($j = 0; $j < count($graph[$i]); $j++) {
                $inDegreeOfNodes[$graph[$i][$j]]++;
            }
        }

        $queue = new SplQueue();
        for ($i = 0; $i < count($graph); $i++) {
            if ($inDegreeOfNodes[$i] === 0) {
                $queue->enqueue($i);
            }
        }


        $visitedNodesCount = 0;

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $visitedNodesCount++;

            for ($i = 0; $i < count($graph[$node]); $i++) {
                $inDegreeOfNodes[$graph[$node][$i]]--;
                if ($inDegreeOfNodes[$graph[$node][$i]] === 0) {
                    $queue->enqueue($graph[$node][$i]);
                }
            }

        }

        return count($graph) !== $visitedNodesCount;
    }



    private function buildAdjacencyList($nodesCount, $edges)
    {
        $adjacencyList = [];
        for ($i = 0; $i < $nodesCount; $i++) {
            $adjacencyList[$i] = [];
        }

        for ($i = 0; $i < count($edges); $i++) {
            $adjacencyList[$edges[$i][0]][] = $edges[$i][1];
        }

        return $adjacencyList;
    }
}
