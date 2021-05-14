$(function () {

    $(document).ready(function () {
        $('#taskData').DataTable();
    });

    $('.buttonAddData').on('click', function () {
        $('#formModalLabel').html('Add Task Page');
        $('.modal-footer button[type=submit]').html('Add Task');
        $('#username').val('');
        $('#email').val('');
        $('#description').val('');
        $('#is_complete').val('');
        $('.form-check').hide();
    });


    $('.showUpdateModal').on('click', function () {
        $('#formModalLabel').html('Update Task Page');
        $('.modal-footer button[type=submit]').html('Update Task');
        $('.modal-body form').attr('action', 'http://localhost/taskbook/public/Home/update');
        $('.form-check').show();


        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/taskbook/public/Home/getUpdate',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#username').val(data.username);
                $('#email').val(data.email);
                $('#description').val(data.description);
                $('#is_complete').val(data.is_complete);
                if ($('#is_complete').val() == 1) {
                    $(':checkbox').prop('checked', true);
                }else{
                    $(':checkbox').prop('checked', false);
                    $('#is_complete').val('1');
                }
                $('#updated_by').val(data.updated_by);
                $('#id').val(data.id);
            }
        });

    });

});