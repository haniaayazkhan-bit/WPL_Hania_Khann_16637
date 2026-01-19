$(document).ready(function() {

    // Fetch users
    function fetchUsers() {
        $.ajax({
            url: 'read.php',
            method: 'GET',
            success: function(data) {
                $('#userTable tbody').html(data);
            }
        });
    }

    fetchUsers();

    // Create or Update user
    $('#userForm').on('submit', function(e) {
        e.preventDefault();

        let id = $('#userId').val();
        let name = $('#name').val();
        let email = $('#email').val();

        let url = id ? 'update.php' : 'create.php';

        $.ajax({
            url: url,
            method: 'POST',
            data: {id, name, email},
            success: function(response) {
                alert(response);
                $('#userForm')[0].reset();
                $('#userId').val('');
                fetchUsers();
            }
        });
    });

    // Edit user
    $(document).on('click', '.editBtn', function() {
        let id = $(this).data('id');
        $.ajax({
            url: 'read.php',
            method: 'GET',
            success: function(data) {
                // parse JSON and fill form
                $.ajax({
                    url: 'read.php',
                    method: 'GET',
                    success: function(data) {
                        let user = JSON.parse($(data).filter('#user-' + id).html());
                        $('#userId').val(user.id);
                        $('#name').val(user.name);
                        $('#email').val(user.email);
                    }
                });
            }
        });
    });

    // Delete user
    $(document).on('click', '.deleteBtn', function() {
        let id = $(this).data('id');
        if (confirm("Are you sure to delete this user?")) {
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data: {id},
                success: function(response) {
                    alert(response);
                    fetchUsers();
                }
            });
        }
    });

});