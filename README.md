# 30 Days to Learn Laravel - Laracast

## DAY 1

### Laravel Blade Components
- Laging may "x" pag tatawagin yung component, example `<x-layout>`.
- `<x-layout>` kadalasang ginagamit na component name ng main layout, may pagkakatulad sya sa `@extends('layout')`.
- `{{$slot}}`, ito yung default slot ng layout. Dito napupunta yung dynamic content ng isang layout, may pagkakatulad sya sa `@yield('slot')`.
- Pwede ring mag add ng named slot sa isang layout, example kung gustong gawing dynamic yung header: `<header>{{$header}}</header>`.
- Pag gagamitin na sya: `<x-slot:<header>Home</x-slot:<header>`.
- `{{$attributes}}` dito napupunta yung mga HTML element attributes.
- `@props`, parang additional attribute ng component.

### View Data and Route Wildcards
```php
Route::get('/job/{id}', function($id) {
  // some code
});
```
- wildcard ang tawag sa `{id}`, pwedeng maaccess ang value ng wildcard sa loob ng callback function/closure.
- pwedeng magpasa ng data dito galing sa view example, `<a href="/job/{{ $job['id'] }}">`.
- `Arr::first()` built in method sa Laravel para mabilis mahanap yung element sa isang array.

### Autoloading, Namespaces and Models:
- natutunan ko kung paano gumawa ng hardcoded na Model na may dummy data.

## DAY 2

### Introduction to Migrations:
- natutunan ko kung paano gumamit ng sqlite and tableplus.

### Meet Eloquent:
- `protected $table = 'table_names';` pag magkaiba yung word na ginamit sa table name at model class name.
- `php artisan tinker`, para makapag run ng php code at makapagmanipulate ng database gamit and cli.

### Model Factories:
- trait, para magamit ng isang class yung mga method sa ibang class kahit hindi gumagamit ng inheritance.
- `HasFactory` trait, para magamit ng Model yung mga factory method para makagawa ng dummy data sa model na yon, ex. `Job::factory()->create();`
- $table->foreignIdFor(ModelName::class); para makapag add ng foreign key na id sa table.

### Two key Eloquent relationship types:
- `belongsTo(ModelName::class);` child in one-to-one or one-to-many relationship.
- `hasMany(ModelName::class);` parent in one-to-many relationship.

## DAY 3

### Pivot tables and BelongsToMany Relationships:
- `$table->foreignIdFor(ModelName::class)->constrained()->cascadeOnDelete();`
  Automatic mag-aadd ng foreign key na id sa row ng table na to.
  Pag na delete na yung foreign key na id sa parent table, madedelete na rin yung row sa table na to.
- `php artisan migrate:rollback`, para ma undo yung huling migration.
- `belongsToMany();` many to many relationship.
- natutunan ko kung paano ioverride yung naming convention ng laravel sa table name at column name.
- natutunan ko kung paano maglagay ng data sa pivot table na ang laman ay yung mga foreign id sa ibang table.

### Eager Loading and the N+1 Problem:
- N+1 problem/lazy loading, nagkakaroon ng isang query kada loop sa collection na may foreign key, kaya pag maraming data yung table ng foreign key ng collection marami din yung query, ex. `$jobs = Job::all();`
- eager loading, sa isang query mareretrieve na lahat ng data kasama yung data ng foreign key, ex. `$jobs = Job::with('employer')->get();`
- natutunan ko kung paano gumamit ng laravel debugbar.

## DAY 4

### All You Need To Know About Pagination:
- pagination, mas napapabilis pa yung query dahil may limit yung item na irerender, ex. `paginate(5)`.
- natutunan ko yung ibat-ibang type ng pagination at kung kailan sila magandang gamitin, `paginate()`, `simplePaginate()`, `cursor()`.
- `php artisan vendor:publish`, para lumabas yung mga views ng pagination link, pwede ring imodify.
- pwedeng ilagay yung default pagination link sa AppServiceProvider, ex. kung bootstrap 5 yung gamit `Paginator::useBootstrapFive();`

### Understanding Database Seeders:
- `php artisan db:seed`, pwedeng makapag add ng dummy data sa ibat-ibang table sa isang command lang.
- `php artisan make:seeder SeederName`, para makagawa ng specific seeder class.
- `php artisan db:seed --class=SeederName`, pag specific na table lang ang gustong lagyan ng dummy data.

### Forms and CSRF
- laravel convention, para mabilis maintindihan ng mga laravel developer yung code/project ng isat-isa.
- csrf, pagsubmit ng form data or post request sa isang website gamit ang ibang webiste ex. phising site.
- `@csrf` token, para malaman ng server kung legit na user yung gumagawa ng form request, chinecheck ng laravel kung magkapareho yung csrf token at session token ng user, pag hindi magkapareho lalabas yung 419 page expired error.
- `protected $fillable`, dito nilalagay yung mga column name ng table na mass assignable.
- `protected $guarded`, dito nilalagay yung mga column name ng table na hindi mass assignable.

## DAY 5

### Editing, Updating and Deleting a Resource:
- resource, ito yung instance ng model, ex. `$user = User::find($id);` yung $user ang resource.
- put, pag yung buong resource ang gustong iupdate, ex. pag gusto kong iupdate yung name, email at password fields ng $user.
- patch, pag yung specific field lang yung gusto kong iupdate, ex. yung name field lang.
- `findOrFail($id)`, pag hindi mahanap or wala yung $id sa table, magtothrow ng error.
- route model binding, kailangan magkapareho yung name ng route parameter/wildcard ex. `'/jobs/{chosenJob}'` at name ng instance ng model ex. `function(Job $chosenJob)` para gumana.
- kahit pare-pareho ng route url basta iba-iba yung http method gagana pa rin.
- pag may dalawang submit button sa isang form tapos yung isang button sa ibang route ko isasubmit, gagawa lang ng isang form na hidden tapos lalagyan ng id, tapos yung isang submit button na gusto kong papuntahin sa ibang route ay lalagyan ng form attribute na ang value ay yung id ng hidden form, ex.` form="hidden-form-id"`.

### Routes Reloaded:
- `Route::view('/', 'home');` shorthand pag view lang ang irereturn.
- `php artisan route:list --except-vendor`, para makita lahat ng routes at yung corresponding controller.
- `Route::resource()`, automatic gagawa ng mga routes.
- `only` at `except`, pag gustong tanggalin yung ibang routes.

## DAY 6
- laravel breeze
- laravel bootcamp
- cms-laravel-breeze

## DAY 7

### Make a Login and Registration System From Scratch:
- `@guest`, kung di pa naka login yung user.
- `@auth`, kung naka login na yung user.
- `Illuminate\Validation\Rules\Password;` nagpoprovide ng validation para sa password.
- `'password' => 'confirmed'`, validation para sa password confirmation, dapat yung name attribute ng confirm password field ay `password_confirmation`.
- `throw ValidationException::withMessages(['email' => 'Wrong Credentials']);` custom validation

## DAY 8

### Steps to Authorization Mastery:
- `Auth::guest()`, pag di pa naka login.
- `$user->is`, `$user->isNot`, para macompare yung mga id ng mga Model, ex. User Model or $user instance.
- Step 1. inline authorization
- Step 2. GATES
- Step 3. Define Gates inside AppServiceProvider
- Step 4. `$model->can()`, `@can`, `Route::post()->can`
- Step 5. Middleware Authorization
- Step 6. Policies

## DAY 9

### How to preview and send email using mailable class:
- `php artisan make:mail`.
- make view for email.
- configure .env using mailtrap.

### Queues are easier than you think:
- terms (`queue`, `job`, `worker`)
- `queue`, ginagawa nya yung job behind the scene(asynchronously) para bumilis yung loading ng request.
- `queue()` instead of `send()`.
- `php artisan queue:work`, para may mag manage ng job or para gumana yung queue.
- `dispatch()->delay(3);`
- dedicated job classes `php artisan make:job`.
- always restart the worker(`php artisan queue:work`) after making a code change.

