<?php


function addCandidateIdsToDevelopers(array $candidates, array $developers): array
{
    $time_start = microtime(true);
//    $result = [];
//    foreach ($developers as $v) {
//        foreach ($candidates as $val) {
//            if ($v['email'] === $val['email']) {
//                $result[] = [
//                    'candidateId' => $val['id'],
//                    'name' => $v['name'],
//                    'email' => $v['email']
//                ];
//                break;
//            } elseif ($v['name'] === $val['name'] && $v['company'] === $val['company']) {
//                $result[] = [
//                    'candidateId' => $val['id'],
//                    'name' => $v['name'],
//                    'company' => $v['company'],
//                    'email' => $v['email']
//                ];
//                break;
//            }
//        }
//    }



    $candidatesCollections = collect($candidates);
    $developersCollections = collect($developers);

   $solution = $candidatesCollections->map(function ($item) use ($developersCollections) {
//       return $item;
        $result = $developersCollections->firstWhere('email', $item['email']);
        if($result) {
            return [
                'candidateId' => $item['id'],
                'name' => $result['name'],
                'email' => $result['email']
            ];
        }
       $result = $developersCollections->where('name', $item['name'])->firstWhere('company', $item['company']);
       if ($result) {
           return [
               'candidateId' => $item['id'],
               'name' => $result['name'],
               'company' => $result['company'],
               'email' => $result['email']
           ];
       }
        else
            return [];

    })->filter()->toArray();
    $time_end = microtime(true);
    $execution_time = ($time_end - $time_start);
    echo '<b>Полное выполнение функции:</b> ' . $execution_time . ' cек <br/> ';
    return $solution;


}


$tests = [
    [
        'developers' => [
            [
                'name' => 'jonathan',
                'email' => 'jon@acme.com'
            ],
            [
                'name' => 'jane',
                'company' => 'google',
                'email' => 'jane@gmail.com'
            ],
            [
                'name' => 'peter',
                'email' => 'peter@netflix.com',
                'company' => 'netflix'
            ],


        ],
        'output' => [
            [
                'candidateId' => 1,
                'name' => 'jonathan',
                'email' => 'jon@acme.com'
            ],
            [
                'candidateId' => 2,
                'name' => 'jane',
                'company' => 'google',
                'email' => 'jane@gmail.com'
            ]
        ]
    ]
];

$candidates =
    [
        [
            'id' => 1,
            'name' => 'jon',
            'email' => 'jon@acme.com',
            'company' => 'acme'
        ],
        [
            'id' => 2,
            'name' => 'jane',
            'email' => 'jane@google.com',
            'company' => 'google'
        ],
        [
            'id' => 3,
            'name' => 'peter',
            'email' => 'peter@microsoft.com',
            'company' => 'microsoft'
        ]
    ];


//$randomCandidates = [];
//for ($i = 4; $i < 100; $i++) {
//    $randomCandidates[] = [
//        'id' => $i,
//        'name' => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10),
//        'email' => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '@gmail.com',
//        'company' => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10)
//    ];
//
//}

//$candidatesWithRandom = array_merge($candidates, $randomCandidates);
////
$path_to_json = storage_path("json/candidates.json");
////
////
//$json_data = json_encode($candidatesWithRandom);
////
//////dd($json_data);
////
//$putCandidate = file_put_contents($path_to_json, $json_data);
//dd($putCandidate);

$getCandidate = json_decode(file_get_contents($path_to_json), true);

//dd($getCandidate);
$tests[0]['candidates'] = $getCandidate;


foreach ($tests as $test) {
    $output = addCandidateIdsToDevelopers($test['candidates'], $test['developers']);
    if ($output != $test['output']) {
//        var_dump($test);
//        var_dump($output);
        die('Test failed');
    }
}
die('Tests success');
