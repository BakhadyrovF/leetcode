<?php


/**
 * Rotate Array
 * @link https://leetcode.com/problems/rotate-array
 * 
 * Approach: 
 * Divide by modulo $k to the length of array (Thus we are excluding unnecessary rotations: $k(10) % $length(3) = 1)
 * Calculate index of first element to be rotated by ($length - $k)
 * Push all elements to be rotated into a new empty array
 * Add the rest and assign new array to the input
 * 
 * Time complexity - O(n)
 * Beats: 70-95%
 * Runtime: 60-110ms
 * 
 * Space complexity - O(n)
 */
function rotate(&$nums, $k)
{
	$length = count($nums);
	$k = $k % $length; 
	$startIndex = $length - $k; // Index of first element that should be rotated

	for ($i = $startIndex; $i < $length; $i++) {
		$rotatedElements[] = $nums[$i];
	}

	for ($i = 0; $i < $startIndex; $i++) {
		$rotatedElements[] = $nums[$i];
	}

	$nums = $rotatedElements;
}

$nums = [1, 2, 3, 4, 5, 6, 7]; 
$k = 3;