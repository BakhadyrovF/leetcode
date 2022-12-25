<?php



/**
 * Best Time To Buy and Sell Stock
 * @link https://leetcode.com/problems/best-time-to-buy-and-sell-stock
 *
 * Approach:
 * Keep track of the cheapest price and max profit
 * If current stock price is cheaper than the cheapest store it
 * If current stock price is expensive than the cheapest price, then calculate profit and check is it max profit.
 *
 * Time complexity - O(n)
 * Space complexity - O(1)
 */
function maxProfit($prices) {
    $maxProfit = 0;

    if (empty($prices)) {
        return $maxProfit;
    }

    $cheapestPrice = $prices[0];

    for ($i = 1; $i < count($prices); $i++) {
        if ($prices[$i] < $cheapestPrice) {
            $cheapestPrice = $prices[$i];
        } elseif ($prices[$i] > $cheapestPrice) {
            $profit = $prices[$i] - $cheapestPrice;

            if ($profit > $maxProfit) {
                $maxProfit = $profit;
            }
        }
    }

    return $maxProfit;
}