


$('.add_to_cart').click(function (e) {
    e.preventDefault(); // Prevent the default click behavior
    const url = $(this).attr('href')
    // Send a POST request to the logout route
    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            if (response.status == false) {
                showAlert(false, 'Server error');
            }
            $('#cart_count strong').text(response.count);
            showAlert(success, response.message);
        },
        error: function (xhr, status, error) {
            showAlert(false, 'Server error');
            console.log(error);
        },
    });
});
