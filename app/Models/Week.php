<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;
    protected $table ='weeks';
    protected $guarded =[];
    // protected $total_expenses = $this->getTotalExpense();

    protected $with = ['other_expenses'];


    public function getTotalExpensesAttribute(){
        
        return $this->other_expenses->sum('value') + $this->food + $this->petrol;
    }


    public function other_expenses(){
        return $this->hasMany('App\Models\OtherExpense');
    }
}
