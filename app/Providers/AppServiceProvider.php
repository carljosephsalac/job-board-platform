<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
        // Paginator::useBootstrapFive();

        # Step 3. Define Gates inside AppServiceProvider
        Gate::define('edit-job', function(User $user, Job $job) :bool {
            return $job->employer->user->is($user); // if the user who created the job is the currently signed in user.
        });
    }
}