<?php


$grid = [
    [1, 2, 4],
    [3, 3, 1]
];

/**
 * Delete Greatest Value in Each Row
 * @link https://leetcode.com/problems/delete-greatest-value-in-each-row
 *
 * Approach:
 * Iterate through each row and sort it by ascending order
 * Take max value from each row, compare with other rows max value and then delete it
 * After each while iteration take the highest value among rows and add it to total sum
 * And do while loop until first row of grid is not empty
 * (We can assume that if first row is empty - all rows empty too, because it is grid and all rows length are the same)
 *
 * m = grid.length
 * n = grid[i].length
 *
 * Time Complexity - O(m * n^2) - but it is faster than it seems.
 * Runtime - 27-40ms
 * Beats: 50-99%
 * Space complexity - O(1)
 */
function deleteGreatestValue($grid)
{
    $sum = 0;
    $isFirstTime = true;
    while (!empty($grid[0])) { // n times
        $maxValue = 0;
        for ($i = 0; $i < count($grid); $i++) { // m times
            if ($isFirstTime) {
                sort($grid[$i]); // Quicksort - O(n^2)
            }

            $rowMaxValue = $grid[$i][count($grid[$i]) - 1];

            if ($rowMaxValue > $maxValue) {
                $maxValue = $rowMaxValue;
            }

            unset($grid[$i][count($grid[$i]) - 1]);
        }

        $sum += $maxValue;
        $isFirstTime = false;
    }

    return $sum;
}

print_r(deleteGreatestValue($grid)); // 8