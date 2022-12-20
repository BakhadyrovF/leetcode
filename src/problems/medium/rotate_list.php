<?php




/**
 * Rotate List
 * @link https://leetcode.com/problems/rotate-list
 * 
 * Approach:
 * Iterate through each node and push it to array (later we can access nodes in O(1)) also, 
 * keep tracking length of linked list
 * Remove unnecessary rotations (divide by modulo)
 * Calculate the index of node that stays before first node to be rotated (it will be new tail after rotations)
 * Take new tail and point it to null (tail should be pointed to null)
 * Take last node of given head (old tail) and point it to to first node (like in circular linked list, but here 
 * we already did remove reference)
 *
 * Time complexity - O(n)
 * Beats: 80-99%
 * Runtime: 8-15ms
 * 
 * Space complexity - O(n)
 */
function rotateRight($head, $k)
{
	if ($k === 0 || empty($head)) {
		return $head;
	}

	// push first element of list to array and initialize variable to keep tracking the length of list
	$nodes = [$head];
	$node = $head->next;
	$length = 1;

	while ($node) {
		$length++;
		$nodes[] = $node;

		$node = $node->next;
	}

	$k = $k % $length; // remove unnecessary rotations

	if ($k === 0) {  // $k === $length it means we can simply return head and no rotations needed
		return $head;
	}

	$newTailIndex = $length - $k - 1;

	$newTail = $nodes[$newTailIndex]; // node that will be tail after all rotations
	$newHead = $newTail->next; // hold pointer to the node that will be head after all rotations so garbage collector does not remove this node
	$newTail->next = null; // tail should point to the null
	
	$nodes[$length - 1]->next = $head; // take the last node of given head (old tail) and point it to the first node of given head (it would be circular linked list if we did not remove reference above)

	return $newHead; // return holding pointer to the new head
}
