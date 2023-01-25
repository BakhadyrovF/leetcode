<?php


/**
 * House Robber
 * @link https://leetcode.com/problems/house-robber
 *
 * Top-Down Approach:
 * Divide problem to sub-problems, in each index we have 2 options, rob current house or rob next house.
 * Check all possible solutions to sub-problems recursively and take optimal from each of them.
 * (Decisions tree will do this clear)
 *
 *
 * This solution is not the best, but it's more simple and straightforward than Iterative approach.
 *
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */
class Solution {

    private array $houses;
    private array $dp = [];

    public function rob($nums)
    {
        $this->houses = $nums;

        return max($this->robHouse(0), $this->robHouse(1));
    }

    protected function robHouse($house)
    {
        if (isset($this->dp[$house])) {
            return $this->dp[$house];
        }

        if ($house >= count($this->houses)) {
            return 0;
        }

        $this->dp[$house] =$this->houses[$house] + max($this->robHouse($house + 2), $this->robHouse($house + 3));

        return $this->dp[$house];
    }
}

/**
 * Bottom-Up Approach:
 * Since our sub-problem's solution depends on previous 2 sub-problems solutions, we can use 2 variables instead of array.
 * (I do not understand this solution clearly, so can't write explanation)
 *
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */
class Solution2 {
    function rob($nums)
    {
        if (empty($nums)) {
            return 0;
        }

        if (count($nums) === 1) {
            return $nums[0];
        }

        if (count($nums) === 2) {
            return max($nums[0], $nums[1]);
        }

        $prevPrev = $nums[0];
        $prev = max($nums[0], $nums[1]);

        for ($i = 2; $i < count($nums); $i++) {
            if ($nums[$i] + $prevPrev > $prev) {
                $temp = $nums[$i] + $prevPrev;
                $prevPrev = $prev;
                $prev = $temp;
            } else {
                $prevPrev = $prev;
            }
        }

        return $prev;
    }
}
