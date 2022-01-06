<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css" />

    {{-- Font Awesome Pro 5.14.0 by @fontawesome - https://fontawesome.com
    License - https://fontawesome.com/license (Commercial License) --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}" type="text/css" /> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Financial Planner</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-warning m-5 text-uppercase">Financial Planner</h1>

        <div class='months row'>
            @foreach ($months as $month)
                <div class="col-md-2">
                    <button class="btn btn-outline-warning {{ $active_month == $month->name ? 'active' : ''}}" onclick="location.href='/{{$month->name}}' ">
                        {{$month->name}}
                    </button>
                </div>
            @endforeach
        </div>


        <form action="{{ route('save') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                @php
                    function returnWeekExpense($weekly_expense, $number)
                    {
                        return $weekly_expense
                            ->filter(function ($value, $key) use ($number) {
                                return $value->number == $number;
                            })
                            ->first();
                    }
                @endphp

                <x-week-div :week_expense='returnWeekExpense($weekly_expense,1)' />
                <x-week-div :week_expense='returnWeekExpense($weekly_expense,2)' week_no='2' />
                <x-week-div :week_expense='returnWeekExpense($weekly_expense,3)' week_no='3' />
                <x-week-div :week_expense='returnWeekExpense($weekly_expense,4)' week_no='4' />
                <x-week-div :week_expense='returnWeekExpense($weekly_expense,5)' week_no='5' />
                <x-week-div :week_expense='$weekly_expense' week_no='total' />

                <div class="col-md-2 margin">
                    <button type="submit" class="btn btn-success form-control"> Save</button>
                </div>
                <div class="col-md-2 margin">
                    <button class="btn btn-danger form-control">Delete</button>
                </div>
            </div>
        </form>
    </div>

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    {{-- <script src="{{asset('assets/js/custom.js')}}"></script> --}}
    <script>
        $(document).ready(function() {
            let expenses = 0;

            $(document).on('change', '.expenses', function() {
                let week_no = $(this).data('week');
                calculateExpense(week_no);
            })

            // Hide the div and remove the input when close icon clicked 
            $(document).on('click', '.close', function() {
                let week_no = $(this).data('week');

                $(this).parent().prev().html('');
                $(this).parent().parent().addClass('d-none');
                calculateExpense(week_no);
            })

            $('.add-expense').on('click', function() {
                let week_no = $(this).data('week');

                Swal.fire({
                    title: 'Enter Expense name',
                    input: 'text',
                    background: '#303134',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Enter',
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent().parent().prev().append(
                            `<x-forms.input-line title="${result.value}" name='${result.value.toLowerCase()}' weekNo=${week_no} :close='true' />`
                            )
                    }
                })
            })


            function calculateExpense(week_no) {
                //  Setting expenses to zero before calculating each expense input field
                expenses = 0;
                // alert(week_no);

                // Loop through all expenses input and add them to the expenses variable
                $(`.expenses-${week_no}`).each((i, el) => {
                    if (el.value) {
                        expenses += parseInt(el.value);
                    }
                });
                $(`.total-${week_no}`).val(expenses);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>

</body>

</html>
