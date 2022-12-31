<?php

function search($nums, $target) {
    list($first, $last) = [0, count($nums) - 1];

    while ($first <= $last) {
        $middle = floor(($first + $last) / 2);

        if ($nums[$middle] === $target) {
            return $middle;
        }

        if ($nums[$middle] < $target) {
            $first = $middle + 1;
        } else {
            $last = $middle - 1;
        }
    }

    return -1;
}
