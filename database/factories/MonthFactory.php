<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MonthFactory extends Factory
{
    protected $number = '0';

    protected $month;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->number++;
        if($this->number == 1) {
            $this->month = 'January';
        }elseif($this->number == 2) {
            $this->month = 'February';
        }elseif($this->number == 3) {
            $this->month = 'March';
        }elseif($this->number == 4) {
            $this->month = 'April';
        }elseif($this->number == 5) {
            $this->month = 'May';
        }elseif($this->number == 6) {
            $this->month = 'June';
        }elseif($this->number == 7) {
            $this->month = 'July';
        }elseif($this->number == 8) {
            $this->month = 'August';
        }elseif($this->number == 9) {
            $this->month = 'September';
        }elseif($this->number == 10) {
            $this->month = 'October';
        }elseif($this->number == 11) {
            $this->month = 'November';
        }elseif($this->number == 12) {
            $this->month = 'December';
        }else{
            return false;
        }
        
        return [
            'name' => $this->month,
            'user_id' => 1,
        ];
    }
}
