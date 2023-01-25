<?php


/**
 * Coin Change
 * @link https://leetcode.com/problems/coin-change
 *
 * Top-Down Approach:
 * Using Recursion (Depth First Search), we can solve all sub-problems.
 * Sub-problem in our case - we have some amount, and we should change it until we get 0
 * For each sub-problem we have to solve take optimal solution, in our case it's minimum number of coins that changed.
 *
 * Time Complexity - O(coins * amount)
 * Space Complexity - O(coins * amount)
 */
class Solution {

    private array $coins;
    private array $dp = [];
    public function coinChange($coins, $amount)
    {
        $this->coins = $coins;

        $this->change($amount);
        print_r($this->dp);
    }

    protected function change($currentAmount)
    {
        if (isset($this->dp[$currentAmount])) {
            return $this->dp[$currentAmount];
        }

        if ($currentAmount === 0) {
            return 0;
        }

        if ($currentAmount < 0) {
            return -1;
        }

        $min = -1;
        for ($i = 0; $i < count($this->coins); $i++) {
            if ($this->coins[$i] <= $currentAmount) {
                $res = $this->change($currentAmount - $this->coins[$i]);

                if ($res === -1) {
                    continue;
                }

                if ($min === -1 || $res < $min) {
                    $min = $res;
                }
            }
        }

        $this->dp[$currentAmount] = $min === -1 ? -1 : 1 + $min;

        return $this->dp[$currentAmount];
    }
}