$(document).ready(function(){
    let expenses = 0;
    
    $(document).on('change','.expenses', function(){
        let week_no = $(this).data('week');
        calculateExpense(week_no);
    })

    // Hide the div and remove the input when close icon clicked 
    $(document).on('click','.close', function(){
        let week_no = $(this).data('week');

        $(this).parent().prev().html('');
        $(this).parent().parent().addClass('d-none');
        calculateExpense(week_no);
    })

    $('.add-expense').on('click', function(){
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
            $(this).parent().parent().prev().append(`<x-forms.input-line title="${result.value}" weekNo=${week_no} :close='true' />`)
        }
        })
    })


    function calculateExpense(week_no){
        //  Setting expenses to zero before calculating each expense input field
        expenses = 0;
        // alert(week_no);
        
        // Loop through all expenses input and add them to the expenses variable
        $(`.expenses-${week_no}`).each((i, el) => {
            if(el.value){
                expenses += parseInt(el.value);
            }
        });
        $(`.total-${week_no}`).val(expenses);
    }
});