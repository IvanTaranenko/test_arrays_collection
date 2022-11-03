<?php

function findRedundantKeywords(array $needles, array $haystack): array
{
    $output = [];
    foreach ($haystack as $hay) {
        foreach ($needles as $needle) {
            if (preg_match("/\b$needle\b/", $hay)) {
                $output[] = $hay;
                break;
            }
        }
    }
    return $output;
}

$tests = [
    [
        'needles' => ['Software', 'cto', 'VP Engineering'],
        'haystack' => ['Software Engineer', 'Director', 'Hardware VP Engineering'],
        'output' => ['Software Engineer', 'Hardware VP Engineering']
    ],
    [
        'needles' => ['Software', 'cto', 'VP Engineering'],
        'haystack' => ['Software Engineer', 'Director', 'Hardware VP'],
        'output' => ['Software Engineer']
    ]
];


foreach ($tests as $test) {
    //OUTPUT = ['SOFTWARE Engineer']
    $output = findRedundantKeywords($test['needles'], $test['haystack']);
    //Меняется постоянно test['output'];
    if ($output  != $test['output']) {
        var_dump($test);
        var_dump($output);
        die('Test failed');
    }
}
die('Tests success');





