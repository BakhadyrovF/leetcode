<?php


/**
 * Fruit Into Baskets
 * @link https://leetcode.com/problems/fruit-into-baskets
 *
 * Approach:
 * Brute-force approach will be - starting pick fruits from each index using nested loop - O(n^2),
 * but we can actually improve it to O(n) using Sliding Window Technique.
 *
 * Count amount of fruits until we find third type of fruit, if third type of fruit found,
 * check previous fruit type and depending on this type clear 1st or 2nd basket, and change amount of basket.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution {

    public function totalFruit($fruits)
    {
        $firstBasket = ['type' => $fruits[0], 'amount' => 1, 'last_index' => 0];
        $secondBasket = [];
        $maxAmount = 0;

        for ($i = 1; $i < count($fruits); $i++) {
            if ($firstBasket['type'] === $fruits[$i]) {
                $firstBasket['amount']++;
                $firstBasket['last_index'] = $i;
            } elseif (empty($secondBasket)) {
                $secondBasket = ['type' => $fruits[$i], 'amount' => 1, 'last_index' => $i];
            } elseif ($secondBasket['type'] === $fruits[$i]) {
                $secondBasket['amount']++;
                $secondBasket['last_index'] = $i;
            } else {
                // this type of fruit can't fit into our baskets

                $maxAmount = max($maxAmount, $firstBasket['amount'] + $secondBasket['amount']);

                // we have to clear second basket and change amount of first basket
                if ($firstBasket['type'] === $fruits[$i - 1]) {
                    $firstBasket['amount'] = $firstBasket['last_index'] - $secondBasket['last_index'];
                } else {
                    // we have to clear first basket and change amount of second basket
                    $secondBasket['amount'] = $secondBasket['last_index'] - $firstBasket['last_index'];
                    $firstBasket = $secondBasket;
                }

                $secondBasket = ['type' => $fruits[$i], 'amount' => 1, 'last_index' => $i];
                // 0, 0, 1, 1, 1, 3, 1, 1
            }
        }

        return max($maxAmount, $firstBasket['amount'] + $secondBasket['amount']);
    }
}