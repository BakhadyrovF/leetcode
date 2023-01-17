<?php



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

        for ($i = 0; $i < count($lists); $i++) {
            $node = $lists[$i];

            while ($node) {
                $this->heap[] = $node;
                $node = $node->next;
            }
        }

        $this->heapify();

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

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null)
    {
         $this->val = $val;
         $this->next = $next;
    }
}

$solution = new Solution();
$listNode = new ListNode(1, new ListNode(2, new ListNode(2)));
$listNode2 = new ListNode(1, new ListNode(1, new ListNode(2)));

print_r($solution->mergeKLists([$listNode, $listNode2]));