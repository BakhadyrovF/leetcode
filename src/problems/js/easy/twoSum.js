/*
 * Two Sum
 * link - https://leetcode.com/problems/two-sum
 *
 * Approach:
 * Using auxiliary space for reducing Time Complexity of algorithm.
 *
 * Time complexity - O(n)
 * Space complexity - O(n)
 */
const twoSum = function(nums, target) {
    const cache = {};

    for (i = 0; i < nums.length; i++) {
        if (cache[nums[i]] !== undefined) {
            return [cache[nums[i]], i];
        }

        cache[target - nums[i]] = i;
    }

    return -1;
};