@props(['title','weekExpense', 'name','titleType' => 'text-primary', 'total' => false, 'classes' => '', 'close' => false, 'weekNo' => 1])

<div class="col-md-12 mt-2">
    <div class="row">
        <div class="col-md-2">
            <span class="mt-5 {{ $total ? 'h5' : 'expense-title' }}  {{$titleType}}"> {{ $title }}: </span>
        </div>
        <div class="col-md-9">
            <input type="number" value="{{$weekExpense ?? '' }}" name='{{$name}}-{{$weekNo}}' class="form-control  {{ $classes }} {{ $total ? 'h3 total' : 'expenses expenses' }}-{{$weekNo}}" data-week="{{$weekNo}}"  {{$total ? 'readonly' : ''}}> 
        </div>
        @if ($close)
            <div class="col-md-1 p-0">
                <i class="fas fa-times fa-lg text-danger close" data-week="{{$weekNo}}" style="cursor: pointer"></i>
            </div>
        @endif
    </div>
</div>