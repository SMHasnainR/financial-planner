@props(['title','titleType' => 'text-primary', 'total' => false, 'id', 'close' => false])

<div class="col-md-12 mt-2">
    <div class="row">
        <div class="col-md-2">
            <span class="mt-5 {{ $total ? 'h5' : 'expense-title' }}  {{$titleType}}"> {{ $title }}: </span>
        </div>
        <div class="col-md-9">
            <input type="number" id="{{$id}}" class="form-control {{ $total ? 'h3' : 'expenses' }}" {{$total ? 'readonly' : ''}}> 
        </div>
        @if ($close)
            <div class="col-md-1">
                <i class="fas fa-times fa-lg text-danger close" style="cursor: pointer"></i>
            </div>
        @endif
    </div>
</div>