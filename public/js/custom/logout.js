
$(document).ready(function () {
    $('#logout').click(function (e) {
        e.preventDefault(); // Prevent the default click behavior
        $('#logout-form').submit(); // Submit the logout form
    });
});

