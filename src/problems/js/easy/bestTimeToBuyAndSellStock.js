



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
const maxProfit = function(prices) {
    if (prices.length === 0) {
        return 0;
    }

    let maxProfit = 0;
    let cheapestPrice = prices[0];

    for (i = 1; i < prices.length; i++) {
        if (prices[i] < cheapestPrice) {
            cheapestPrice = prices[i];
        } else if (prices[i] > cheapestPrice) {
            if ((prices[i] - cheapestPrice) > maxProfit) {
                maxProfit = prices[i] - cheapestPrice;
            }
        }
    }

    return maxProfit;
};