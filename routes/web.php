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


Route::get('/', function () {
    return redirect()->route('home','January');
});


Route::get('/{month}', function ($active_month) {

    // Getting week expenses form active month
    $mnth =Month::where('name', $active_month)->firstOrFail();
    $week = Week::where('month_id',$mnth->id)->get();
    
    $months = Month::all();
    
    $data = [
        'weekly_expense' => $week,
        'months' => $months,
        'active_month' => $active_month,
        // 'month_id' => $mnth->id
    ];
    return view('home', $data);
})->name('home');

Route::post('/save-expense/{month}', function (Request $request, $month_name) {


    // Getting month collection
    $month = Month::where('name', $month_name)->firstOrFail();

    $expenses = $request->except('_token');

    //  Loop through week and save expense
    foreach ($expenses as $expense => $value){
        $expenseArr = explode('-',$expense);
        $expense_name = $expenseArr[0];
        $week_no = $expenseArr[1];

        // Don't save total expense
        if($expenseArr[1] == 'total'){
            continue;
        }

        //  Getting week from week no and month id 
        $week = Week::whereNumber($week_no)->where('month_id',$month->id)->first();

        if(!$week){
            $week = new Week();
            $week->number = $week_no;
        }

        if($expense_name == 'food'){
            $week->food = $value; 
        }elseif($expense_name == 'petrol'){
            $week->petrol = $value; 
        }

        $week->month_id = $month->id;
        $week->save();
    }
    return redirect()->route('home',$month_name);
})->name('save');
