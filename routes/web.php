<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/job', function() {
    return view('job', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Frontend Developer',
                'salary' => '17,000'
            ],
            [
                'id' => 2,
                'title' => 'Backend Developer',
                'salary' => '20,000'
            ],
            [
                'id' => 3,
                'title' => 'Fullstack Developer',
                'salary' => '30,000'
            ],
            [
                'id' => 4,
                'title' => 'Mobile Developer',
                'salary' => '35,000'
            ]
        ]
    ]);
});

Route::get('/job/{id}', function($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Frontend Developer',
            'salary' => '17,000'
        ],
        [
            'id' => 2,
            'title' => 'Backend Developer',
            'salary' => '20,000'
        ],
        [
            'id' => 3,
            'title' => 'Fullstack Developer',
            'salary' => '30,000'
        ],
        [
            'id' => 4,
            'title' => 'Mobile Developer',
            'salary' => '35,000'
        ]
    ];

    $chosenJob = Arr::first($jobs, fn($job) => $job['id'] == $id); // using arrow function

    return view('job', compact('chosenJob'));

    // foreach ($jobs as $job) // using foreach
    // {
    //     if ($job['id'] == $id)
    //     {
    //         dd($job);
    //     }
    // }

    // $job = Arr::first($jobs, function($job) use ($id) { // using use()
    //     return $job['id'] == $id;
    // });
    // dd($job);
});

Route::get('/contact', function() {
    return view('contact');
});