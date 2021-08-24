</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script>
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
</script>

</body>

</html>