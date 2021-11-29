<?php

use App\Models\Week;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('/save-expense', function (Request $request) {
    $expenses = $request->except('_token');
    foreach ($expenses as $expense => $value){
        $expenseArr = explode('_',$expense);

        $week_number = $expenseArr[1]; 
        $week  = new Week;
        $week->number = $expenseArr[1]; 
        if($expenseArr[0] == 'food'){
            $week->food = $value; 
        }elseif($expenseArr[0] == 'petrol'){
            $week->petrol = $value; 
        }
        // if($week_number !=)
        $week->save();
    }
    return view('home');
})->name('save');
