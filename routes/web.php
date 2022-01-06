<?php

use App\Models\Month;
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

Route::get('/{month}', function ($active_month) {

    // Getting week expenses form active month
    $mnth =Month::where('name', $active_month)->firstOrFail();
    $week = Week::where('month_id',$mnth->id)->get();
    
    $months = Month::all();
    
    $data = [
        'weekly_expense' => $week,
        'months' => $months,
        'active_month' => $active_month
    ];
    return view('home', $data);
})->name('home');

Route::post('/save-expense', function (Request $request) {
    $expenses = $request->except('_token');
    foreach ($expenses as $expense => $value){
        $expenseArr = explode('-',$expense);
        if($expenseArr[1] == 'total'){
            continue;
        }
        $week = Week::whereNumber($expenseArr[1])->first();
        if($expenseArr[0] == 'food'){
            $week->food = $value; 
        }elseif($expenseArr[0] == 'petrol'){
            $week->petrol = $value; 
        }

        $week->save();
    }
    return redirect()->route('home');
})->name('save');
