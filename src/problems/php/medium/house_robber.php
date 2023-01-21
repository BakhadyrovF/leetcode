<?php



$arr = [1, 2, 3, 1];
// do not
class Solution {
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

$solution = new Solution();
echo $solution->rob($arr);