<?php


/**
 * Merge K Sorted Lists
 * @link https://leetcode.com/problems/merge-k-sorted-lists
 *
 * Approach:
 * Take all nodes of all Lists and push them to the Array
 * Heapify Array so, it will be MinHeap
 * Extract min value from the MinHeap until Heap is not empty
 *
 * n = total number of nodes of all lists
 * Time Complexity - O(n log n)
 * Space Complexity - O(n)
 *
 */
class Solution {

    private array $heap = [];

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    public function mergeKLists($lists)
    {
        if (empty($lists)) {
            return [];
        }

        // O(n * m)
        for ($i = 0; $i < count($lists); $i++) {
            $node = $lists[$i];

            while ($node) {
                $this->heap[] = $node;
                $node = $node->next;
            }
        }

        // O(m)
        $this->heapify();

        // O(m log m)
        $head = $this->extractMin();
        $node = $head;
        while ($node) {
            $node->next = $this->extractMin();
            $node = $node->next;
        }

        return $head;
    }

    protected function heapify()
    {
        for ($i = floor(count($this->heap) / 2 - 1); $i >= 0; $i--) {
            $this->bubbleDown($i);
        }
    }

    protected function bubbleDown($current)
    {
        $leftChild = $current * 2 + 1;
        $rightChild = $current * 2 + 2;

        if (($this->heap[$leftChild]->val ?? PHP_INT_MAX) < ($this->heap[$rightChild]->val ?? PHP_INT_MAX)) {
            $minChild = $leftChild;
        } else {
            $minChild = $rightChild;
        }

        if (($this->heap[$minChild]->val ?? PHP_INT_MAX) < $this->heap[$current]->val) {
            $tmp = $this->heap[$current];
            $this->heap[$current] = $this->heap[$minChild];
            $this->heap[$minChild] = $tmp;

            $this->bubbleDown($minChild);
        }
    }

    protected function extractMin()
    {
        if (empty($this->heap)) {
            return null;
        }

        if (count($this->heap) === 1) {
            return array_pop($this->heap);
        }

        $min = $this->heap[0];
        $this->heap[0] = array_pop($this->heap);

        $this->bubbleDown(0);

        return $min;
    }
}
