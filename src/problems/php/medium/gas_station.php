<?php


/**
 * Gas Station
 * @link https://leetcode.com/problems/gas-station
 *
 * Approach:
 * Be greedy - start at 0th index and try to travel by taking the subtraction of gas and cost.
 * If subtraction gives us negative - we can't start at this position.
 * Otherwise, maybe it is our solution so add this subtraction to our tank and continue iterating.
 * Note that if sum of difference between gas and cost is less than 0 - there is no solution.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    public function canCompleteCircuit($gas, $cost)
    {
        $sumOfDiff = 0;
        $ans = 0;
        $tank = 0;

        for ($i = 0; $i < count($gas); $i++) {
            $tank += $gas[$i] - $cost[$i];
            $sumOfDiff += $gas[$i] - $cost[$i];

            if ($tank < 0) {
                $tank = 0;
                $ans = $i + 1;
            }
        }

        return $sumOfDiff >= 0 ? $ans : -1;
    }
}