<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\StudentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use \App\Models\Smjer;
use \App\Models\Student;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'query']);


Route::get('/smjerovi', function() {
    $data=Redis::get('smjerovi');
    if(!$data){
        $data1 = Student::select('ime', 'prezime')
    ->where('student_smjer', function($query){
        $query->select('id')->from('smjers')->where('smjer', 'Non qui unde consequuntur praesentium voluptatem occaeati.');
    })
    ->get();

        $data = $data1->toJson();    



        Redis::set('smjerovi', $data1);    
    }
    
    $data = json_decode($data);
    return $data;
    
});


Route::get('/', [PDFController::class, 'index']);

Route::get('/imena', [StudentController::class, 'index']);

Route::get('/weather/{city}', 'App\Http\Controllers\WeatherController@getWeather');
