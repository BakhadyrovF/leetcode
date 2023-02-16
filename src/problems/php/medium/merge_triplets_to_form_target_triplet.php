<?php


/**
 * Merge Triplets To Form Target Triplet
 * @link https://leetcode.com/problems/merge-triplets-to-form-target-triplet
 *
 * Approach:
 *
 */
class Solution {

    function mergeTriplets($triplets, $target) {
        $possibleTarget = null;

        for ($i = 0; $i < count($triplets); $i++) {
            if (!$possibleTarget) {
                $possibleTarget = $this->isValidTriplet($triplets[$i], $target) ? $triplets[$i] : null;
            } elseif ($this->isValidTriplet($triplets[$i], $target)) {
                $possibleTarget = [
                    max($possibleTarget[0], $triplets[$i][0]),
                    max($possibleTarget[1], $triplets[$i][1]),
                    max($possibleTarget[2], $triplets[$i][2])
                ];
            }
        }

        return $possibleTarget === $target;
    }

    protected function isValidTriplet(array $triplet, array $target)
    {
        return $triplet[0] <= $target[0] && $triplet[1] <= $target[1] && $triplet[2] <= $target[2];
    }
}