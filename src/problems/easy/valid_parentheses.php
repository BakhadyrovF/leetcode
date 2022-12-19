<?php

/**
 * Needs description!
 */
function isValid($s) {
    $parentheses = [ "(" => ")", "[" => "]", "{" => "}", ];
    $stack = [];
    $length = strlen($s);

    for ($i = 0; $i < $length; $i++) {
        $bracket = substr($s, $i, 1);

        if (isset($parentheses[$bracket])) {
            $stack[] = $bracket;
        } else {
            $stackTop = array_pop($stack);

            if ($bracket !== $parentheses[$stackTop]) {
                return false;
            }
        }
    }

    return $stack === [];
}

$s = "[()]{}";
echo isValid($s);
