@props(['weekNo'=>1])

<div class="col-md-4 my-3">
    <h4 class="text-center text-white">Week {{ $weekNo }}</h4>
    <div class="expense-div" >
        <x-forms.input-line title="Food" name="food" :weekNo='$weekNo' />                
        <x-forms.input-line title="Petrol" name="petrol" :weekNo='$weekNo' />                    
    </div>
    <div class="row">
        <div class="offset-md-11 col-md-1 mt-2">
            <i class="add-expense far fa-plus-circle fa-lg text-success" data-week='{{$weekNo}}' style="cursor: pointer"></i>
        </div>
    </div>
    <hr class="text-white">
    <x-forms.input-line title="Total" name='total' title-type="text-danger" :total='true' :weekNo='$weekNo' />
</div>
