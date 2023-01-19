<?php
//
class Solution {
    public function swapPairs($head) {
        if (!$head || !$head->next) {
            return $head;
        }

        $previous = null;
        $newHead = $head->next;
        $current = $head;
        $next = $head->next;

        while ($next) {
            $tmp = $next->next;
            $next->next = $current;
            $current->next = $tmp;

            if ($previous) {
                $previous->next = $next;
            }

            $previous = $current;
            $current = $current->next;
            $next = $current->next;
        }

        return $newHead;
    }
}