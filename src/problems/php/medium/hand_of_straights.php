<?php


/**
 * Hand Of Straights
 * @link https://leetcode.com/problems/hand-of-straights
 *
 * Approach:
 * Iterate through each unique card and put it into current group, if current group size is equals to groupSize argument,
 * then just start taking element to the next group.
 * But input may contain duplicates, so when you go to next group start at smallest element that has more than 0 zero duplicates.
 * In each iteration in context of current group check is this number consecutive.
 *
 * Time Complexity - O(n logn)
 * Space Complexity - O(n)
 */
class Solution {

    function isNStraightHand($hand, $groupSize) {
        if (count($hand) % $groupSize) {
            return false;
        }

        sort($hand);

        $uniqueHand = [];
        $counter = [];

        for ($i = 0; $i < count($hand); $i++) {
            if (isset($counter[$hand[$i]])) {
                $counter[$hand[$i]]++;
            } else {
                $counter[$hand[$i]] = 1;
                $uniqueHand[] = $hand[$i];
            }
        }

        $currentGroupSize = 0;
        $idx = 0;
        $restartIdx = 0;

        while ($idx < count($uniqueHand)) {
            if ($counter[$uniqueHand[$idx]] === 0) {
                $idx++;
                continue;
            }

            $counter[$uniqueHand[$idx]]--;

            if ($counter[$uniqueHand[$idx]] === 0 && $restartIdx === $idx) {
                $restartIdx = $idx + 1;

                while ($counter[$uniqueHand[$restartIdx]] === 0 && $restartIdx < count($uniqueHand)) {
                    $restartIdx++;
                }
            }

            // last element of current group, no need to check consecutive
            if ($currentGroupSize + 1 === $groupSize) {
                $idx = $restartIdx;
                $currentGroupSize = 0;
                continue;
            }

            if ($uniqueHand[$idx] + 1 !== ($uniqueHand[$idx + 1] ?? -1) || $counter[$uniqueHand[$idx + 1]] === 0) {
                return false;
            }

            $currentGroupSize++;
            $idx++;
        }

        return true;
    }
}