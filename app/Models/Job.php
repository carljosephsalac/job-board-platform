<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job {
    public static function all (): array
    {
        return [
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
    }

    public static function find(int $id): array
    {
        $chosenJob = Arr::first(static::all(), fn($job) => $job['id'] == $id); // using arrow function

        if (!$chosenJob)
        {
            abort(404);
        }

        return $chosenJob;
    }
}