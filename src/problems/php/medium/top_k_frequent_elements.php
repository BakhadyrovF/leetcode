<?php


/**
 * Top K Frequent Elements
 * @link https://leetcode.com/problems/top-k-frequent-elements
 *
 * Approach:
 * Using hash-map for count how many times element repeats,
 * Using max-heap for extract element that is repeated the most
 *
 * Note:
 * Time Complexity should be better than O(n log n), so we can trade off space complexity for achieving better time.
 *
 * Time Complexity - O(n + k log n) which is better than O(n log n) but worse than O(n) that can be achieved with Bucket Sort
 * Space Complexity - O(n + k)
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    public function topKFrequent($nums, $k) {
        $hashMap = [];

        // using hash-map for counting how many times element repeats
        // O(n)
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($hashMap[$nums[$i]])) {
                $hashMap[$nums[$i]]++;
            } else {
                $hashMap[$nums[$i]] = 1;
            }
        }

        // converting hash-map to the array so, we can build max-heap from the array (I think it is also possible to build max-heap from hash-map)
        // O(n)
        $heap = [];
        foreach($hashMap as $number => $count) {
            $heap[] = [$number, $count];
        }

        // building max-heap from the array
        // O(n)
        for ($i = floor(count($heap) / 2 - 1); $i >= 0; $i--) {
            $this->bubbleDown($heap, $i);
        }

        // extract max element from the max-heap and push it to our result array
        // O(k log n)
        $result = [];
        for ($i = 0; $i < $k; $i++) {
            $result[] = $this->extractMax($heap);
        }

        // summary time complexity is - O(n) + O(n) + O(n) + O(k log n) = O(3n + k log n) = O(n + k log n);
        return $result;
    }

    protected function bubbleDown(array &$heap, $index)
    {
        $leftChild = $heap[$index * 2 + 1] ?? null;
        $rightChild = $heap[$index * 2 + 2] ?? null;

        if (is_null($leftChild) && is_null($rightChild)) {
            return;
        }

        if (is_null($rightChild) || isset($leftChild) && $leftChild[1] > $rightChild[1]) {
            $maxChild = $leftChild;
            $maxChildIndex = $index * 2 + 1;
        } else {
            $maxChild = $rightChild;
            $maxChildIndex = $index * 2 + 2;
        }

        if ($heap[$index][1] < $maxChild[1]) {
            // swap them
            $heap[$maxChildIndex] = $heap[$index];
            $heap[$index] = $maxChild;

            $this->bubbleDown($heap, $maxChildIndex);
        }
    }

    protected function extractMax(array &$heap)
    {
        $max = $heap[0];
        $heap[0] = array_pop($heap);
        $this->bubbleDown($heap, 0);

        return $max[0];
    }
}

