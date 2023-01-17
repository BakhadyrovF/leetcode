<?php


class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canBeIncreasing($nums) {
        $isRemoved = false;

        $prev = 0;
        $current = 1;
        while ($current < count($nums)) {
            if (($nums[$prev] ?? null) >= $nums[$current]) {
                if ($isRemoved) {
                    return false;
                }

                $isRemoved = true;
                if (isset($nums[$current + 1]) && $nums[$prev] >= $nums[$current + 1]) {
                    $prev = $prev - 1;
                } else {
                    $current++;
                }
            } else {
                $prev = $current;
                $current++;
            }
        }

        return true;
    }
}

$solution = new Solution();
echo $solution->canBeIncreasing([10, 2, 3]) ? 'true' : 'false';