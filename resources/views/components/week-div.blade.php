@props(['weekNo'=>1, 'weekExpense'=>0])

<div class="col-md-4 my-3">
        
    @php
        $total = 0;
        if($weekExpense !== 0){
            if($weekNo == 'total'){
                $food = $weekExpense->pluck('food')->sum();
                $petrol = $weekExpense->pluck('petrol')->sum();
                // Sum all week total expenses to get monthly expense
                $total = $weekExpense->sum('total_expenses');
            }else{
                $food = $weekExpense->food;
                $petrol = $weekExpense->petrol;
            }
            // $total = $food + $petrol;
        }else{
            $food = 0;
            $petrol = 0;
        }
    @endphp
    <h4 class="text-center text-white"> {{ $weekNo == 'total' ? 'Grand Total' : 'Week '. $weekNo }}   </h4>
    <div class="expense-div" >
        <x-forms.input-line title="Petrol" name="petrol" :weekNo='$weekNo' :week_expense="$petrol" />                    
        <x-forms.input-line title="Food" name="food" :weekNo='$weekNo' :week_expense="$food"  />

        {{-- @php
            dd($weekExpense->other_expenses->first()->name);
        @endphp --}}
        @if (!empty($weekExpense) && $weekNo !== 'total' && count($weekExpense->other_expenses))
            @foreach ($weekExpense->other_expenses as $expense)
                <x-forms.input-line :title="$expense->name" :name="$expense->name" :weekNo="$weekNo" :week_expense="$expense->value" :close="true" />
            @endforeach
        @endif                

    </div>
    <div class="row">
        <div class="offset-md-10 col-md-1 mt-2 p-0">
            <i class="add-expense far fa-plus-circle fa-lg text-success" data-week='{{$weekNo}}' style="cursor: pointer"></i>
        </div>
    </div>
    <hr class="text-white">
    <x-forms.input-line title="Total" name='total' title-type="text-danger" :total='true' :weekNo='$weekNo' :week_expense='$total' />
</div>
