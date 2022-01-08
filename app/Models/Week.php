<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;
    protected $table ='weeks';
    protected $guarded =[];
    protected $with = ['other_expenses'];

    public function other_expenses(){
        return $this->hasMany('App\Models\OtherExpense');
    }
}
