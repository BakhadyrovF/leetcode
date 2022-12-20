<?php


/**
 * Design Circular Queue
 * @link https://leetcode.com/problems/design-circular-queue
 * 
 * Approach:
 * Queue built using Arrays and that is it!
 * 
 * Time complexity:
 * enQueue() - O(1)
 * deQueue() - O(n)
 * Beats: 100%
 * Runtime: 60-100ms  
 * 
 * Space complexity - O(n)
 */
class MyCircularQueue {
    private int $size;
    private array $queue = [];
    
    /**
     * @param Integer $k
     */
    function __construct($k) {
        $this->size = $k;
    }
  
    /**
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value) {
   		if ($this->isFull()) {
   			return false;
   		}

   		$this->queue[] = $value;

   		return true;
    }
  
    /**
     * @return Boolean
     */
    function deQueue() {
    	if ($this->isEmpty()) {
    		return false;
    	}

    	$queue = [];
    	for ($i = 1; $i < count($this->queue); $i++) {
    		$queue[] = $this->queue[$i];
    	}

    	$this->queue = $queue;

    	return true;
    }
  
    /**
     * @return Integer
     */
    function Front() {
    	if ($this->isEmpty()) {
    		return -1;
    	}

    	return $this->queue[0];
    }
  
    /**
     * @return Integer
     */
    function Rear() {
    	if ($this->isEmpty()) {
    		return -1;
    	}

    	return $this->queue[count($this->queue) - 1];
    }
  
    /**
     * @return Boolean
     */
    function isEmpty() {
    	return count($this->queue) === 0;
    }
  
    /**
     * @return Boolean
     */
    function isFull() {
        return $this->size === count($this->queue);
    }
}
