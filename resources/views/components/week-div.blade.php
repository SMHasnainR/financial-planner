@props(['weekNo'=>1])

<div class="col-md-4 my-3">
    <h4 class="text-center text-white">Week {{ $weekNo }}</h4>
    <div id="expense-div">
        <x-forms.input-line title="Food" id='food'/>                
        <x-forms.input-line title="Petrol" id='petrol'/>                    
    </div>
    <div class="row">
        <div class="offset-md-11 col-md-1 mt-2">
            <i id="add-expense" class="far fa-plus-circle fa-lg text-success" style="cursor: pointer"></i>
        </div>
    </div>
    <hr class="text-white">
    <x-forms.input-line title="Total" id='total' title-type="text-danger" :total='true' />
</div>
