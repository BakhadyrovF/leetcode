<?php


/**
 * House Robber 2
 * @link https://leetcode.com/problems/house-robber-ii
 *
 * Top-Down Approach:
 * We can use same solution as in House Robber 1.
 * 1. Rob all houses except the last house.
 * 2. Rob all houses except the first house.
 * We can't rob first house and last house at the same time, because they are connected.
 * 3. Return maximum from 1st and 2nd portions of houses.
 *
 * Time Complexity - O(n) + O(n) = O(n)
 * Space Complexity - O(n) + O(n) = O(n)
 */
class Solution {
    private array $houses;
    private array $dp = [];
    private array $dp2 = [];

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function rob($nums)
    {
        if (count($nums) === 1) {
            return $nums[0];
        }

        if (count($nums) === 2) {
            return max($nums[0], $nums[1]);
        }

        $this->houses = $nums;

        $housesExceptLast = max($this->robHouseExceptLast(0), $this->robHouseExceptLast(1));
        $housesExceptFirst = max($this->robHouseExceptFirst(1), $this->robHouseExceptFirst(2));

        return max($housesExceptLast, $housesExceptFirst);
    }

    public function robHouseExceptLast($house)
    {
        if (isset($this->dp[$house])) {
            return $this->dp[$house];
        }

        if ($house >= count($this->houses) - 1) {
            return 0;
        }

        $this->dp[$house] = $this->houses[$house] + max($this->robHouseExceptLast($house + 2), $this->robHouseExceptLast($house + 3));

        return $this->dp[$house];
    }

    public function robHouseExceptFirst($house)
    {
        if (isset($this->dp2[$house])) {
            return $this->dp2[$house];
        }

        if ($house >= count($this->houses)) {
            return 0;
        }

        $this->dp2[$house] = $this->houses[$house] + max($this->robHouseExceptFirst($house + 2), $this->robHouseExceptFirst($house + 3));

        return $this->dp2[$house];
    }
}