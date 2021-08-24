
$(document).ready(function() {

    function checkPasswordMatch() {
        var password = $("#password");
        var confirmPassword = $("#password2");

        if (password.val() != confirmPassword.val()) {
            confirmPassword.closest('.form-control').removeClass('is-valid').addClass('is-invalid')
            confirmPassword.closest('form').removeClass('was-validated')
            confirmPassword.setCustomValidity("Invalid field.")
        } else {
            confirmPassword.closest('.form-control').removeClass('is-invalid').addClass('is-valid')
            confirmPassword.closest('form').addClass('was-validated')

        }
    }
    $("#password, #password2").keyup(checkPasswordMatch);

    $('.toggle-password').click(function() {
        $input = $(this).closest('td').find('input')
        if ($input.attr('type') === 'password') {
            $input.attr('type', 'text')
            $(this).text('Hide')
        } else {
            $input.attr('type', 'password')
            $(this).text('Show')
        }
    })
    $('table').DataTable();

});