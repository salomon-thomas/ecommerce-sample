$('#add_to_cart').click(function (e) {
    e.preventDefault(); // Prevent the default click behavior
    const id = $(this).data('id');
    const variant = $('#variant').val()
    const url = window.location.protocol + "//" + window.location.host + `/cart/add/${id}/${variant}`;
    // Send a POST request to the logout route
    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            if (response.status == false) {
                showAlert(false, 'Server error');
            }
            $('#cart_count strong').text(response.count);
            showAlert(true, response.message);
        },
        error: function (xhr, status, error) {
            showAlert(false, 'Server error');
            console.log(error);
        },
    });
});
$('#variant').change(function(){
    const selectedOption = $('#variant option:selected');
    const newPrice = selectedOption.data('id');
    $('#details-price').text('$ ' + newPrice.toFixed(2)); 
})