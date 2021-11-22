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
            <div class="offset-md-4 col-md-4">
                <h4 class="text-center text-white">Week 1</h4>
                <div id="expense-div">
                    <x-forms.input-line title="Food" id='food'/>                
                    <x-forms.input-line title="Petrol" id='petrol'/>                    
                </div>
                <div class="row">
                    <div class="offset-md-11 col-md-1 mt-2">
                        <i id="add-expense" class="far  fa-plus-circle fa-lg text-success" style="cursor: pointer"></i>
                    </div>
                </div>

                <hr class="text-white">
                <x-forms.input-line title="Total" id='total' title-type="text-danger" :total='true' />
            </div>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            let expenses = 0;
            $(document).on('change','.expenses', function(){
                //  Setting expenses to zero before calculating each expense input field
                expenses = 0;
                
                // Loop through all expenses input and add them to the expenses variable
                $('.expenses').each((i, el) => {
                    if(el.value){
                        expenses += parseInt(el.value);
                    }
                });
                $('#total').val(expenses);
            })

            $(document).on('click','.close', function(){
                $(this).parent().prev().html('');
                $(this).parent().parent().addClass('d-none');
            })

            $('#add-expense').on('click', function(){
                Swal.fire({
                title: 'Submit your Github username',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Look up',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(response.statusText)
                        }
                        $('#expense-div').append(`<x-forms.input-line title="Food" id='food' :close='true' />`)

                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                        `Request failed: ${error}`
                        )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                    })
                }
                })
            })
        });
    </script>
</body>
</html>