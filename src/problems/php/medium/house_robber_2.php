<?php



class Solution {
    private array $houses;

    public function rob($nums)
    {
        if (count($nums) === 1) {
            return $nums[0];
        }

        if (count($nums) <= 3) {
            return max($nums);
        }

        $this->houses = $nums;

        return max($this->robHouse(0, 0), $this->robHouse(1, 1));
    }

    protected function robHouse($house, $parentHouse)
    {
        if ($house === count($this->houses) - 1 && $parentHouse === 0) {
            return 0;
        }

        if ($house >= count($this->houses)) {
            return 0;
        }

        return $this->houses[$house] + max($this->robHouse($house + 2, $parentHouse), $this->robHouse($house + 3, $parentHouse));
    }
}

$solution = new Solution();
echo $solution->rob([1, 2, 3, 4, 5, 1, 2, 3, 4, 5]);