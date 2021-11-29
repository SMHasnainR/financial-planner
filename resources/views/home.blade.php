<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css" />
    {{-- Font Awesome Pro 5.14.0 by @fontawesome - https://fontawesome.com
    License - https://fontawesome.com/license (Commercial License) --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}" type="text/css" /> --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        body{
            background-color: #303134;
        }
        input{
            background-color: #303134 !important;
            border-color: white !important;
            border-radius: 20px !important;
            border-width: 1px !important;
            color: white !important;
            padding: 2px 5px !important;
        }
        .expense-title, .total-title{
            font-size: large;
        }
    </style>
    <title>Financial Planner</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-warning m-5 text-uppercase">Financial Planner</h1>
        <div class="row">
            
            <x-week-div />
            {{-- <x-week-div week_no='2' />
            <x-week-div week_no='3' />
            <x-week-div week_no='4' />
            <x-week-div week_no='5' /> --}}

        </div>
    </div>
	<script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        let food = 0;
        let petrol = 0;
        let expenses = 0;
        $(document).ready(function(){
            // $('.expenses').on('change', function(){
            //     expenses += parseInt($(this).val());
            //     console.log(expenses);
            //     $('#total').val(0);
            //     $('#total').val(expenses);
            // })
            $('#add-expense').on('click', function(){
                $('#expense-div').append(`<x-forms.input-line title="Food" id='food' :close='true' />`)
            });

            $(document).on('click','.close', function(){
                $(this).parent().parent().addClass('d-none');
            })

            $('#food').on('change', function(){
                food = 0;
                food = parseInt($(this).val());
                expenses = food + petrol;
                $('#total').val(0);
                $('#total').val(expenses);
            })
            $('#petrol').on('change', function(){
                petrol = 0;
                petrol = parseInt($(this).val());
                expenses = food + petrol;
                $('#total').val(0);
                $('#total').val(expenses);
            })
        });
    </script>
</body>
</html>