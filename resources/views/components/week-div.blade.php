@props(['weekNo'=>1, 'weekExpense'])

<div class="col-md-4 my-3">
        
    @php
        $total = $weekExpense->food + $weekExpense->petrol;
    @endphp
    <h4 class="text-center text-white">Week {{ $weekNo }}   </h4>
    <div class="expense-div" >
        <x-forms.input-line title="Food" name="food" :weekNo='$weekNo' :week_expense='$weekExpense->food'  />                
        <x-forms.input-line title="Petrol" name="petrol" :weekNo='$weekNo' :week_expense='$weekExpense->petrol' />                    
    </div>
    <div class="row">
        <div class="offset-md-11 col-md-1 mt-2">
            <i class="add-expense far fa-plus-circle fa-lg text-success" data-week='{{$weekNo}}' style="cursor: pointer"></i>
        </div>
    </div>
    <hr class="text-white">
    <x-forms.input-line title="Total" name='total' title-type="text-danger" :total='true' :weekNo='$weekNo' :week_expense='$total' />
</div>
