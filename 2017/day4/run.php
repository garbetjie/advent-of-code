<?php
// This contains all the pass phrases, without any rows that contain duplicate phrases.
$phrasesWithoutDuplicates = array_filter(
    array_map(
        function($line) {
            return array_filter(
                array_map(
                    'trim',
                    explode(' ', $line)
                )
            );
        },
        file('./input')
    ),
    function($row) {
        return max(array_count_values($row)) <= 1;
    }
);

$phrasesWithoutAnagrams = array_filter(
    array_map(
        function($phrases) {
            return array_map(
                function($phrase) {
                    $split = str_split($phrase);
                    sort($split);
                    return implode('', $split);
                },
                $phrases
            );
        },
        $phrasesWithoutDuplicates
    ),
    function($row) {
        return max(array_count_values($row)) <= 1;
    }
);

print_r(count($phrasesWithoutAnagrams));