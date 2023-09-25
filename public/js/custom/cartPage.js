
// Define a flag to track if an AJAX request is in progress
let isAjaxInProgress = false;

function updateCart(response) {
    let total = 0;
    $('#cart_count strong').text(response.length);
    $.each(response, function (index, data) {
        // Do something with each data item
        total += data.variant.price * data.units
        console.log(total);
    });
    // Update subtotal and total in the HTML
    $('#sub_total').html('<span>Subtotal</span> $' + total + '.00');
    $('#total').html('<span>Total</span> $' + total + '.00');
}
$('.cart-delete').click(function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    const spinnerIcon = $(this).find('.spinner-icon');
    const deleteIcon = $(this).find('.ti-trash');

    // Hide the delete icon and show the spinner icon
    deleteIcon.hide();
    spinnerIcon.show();
    $.ajax({
        url: url,
        type: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status == false)
                showAlert(false, 'Server error');
            //delete tr corresponding to the a tag
            $(event.target).closest('tr').remove();
            updateCart(response.data)

            showAlert(true, response.message);
        },
        error: function (xhr, status, error) {
            showAlert(false, 'Server error');
            console.log(error);
        },
        complete: function () {
            spinnerIcon.hide();
            deleteIcon.show();
        }
    });
});


$('.inc, .dec').click(function (event) {
    // Check if an AJAX request is in progress
    if (isAjaxInProgress) {
        return; // Do nothing if an AJAX request is already in progress
    }

    event.preventDefault();
    const tr = $(this).closest('tr');
    const itemId = tr.data('id'); // Get the item ID
    const action = $(this).hasClass('inc') ? 'inc' : 'dec'; // Determine the action
    const url = window.location.protocol + "//" + window.location.host + `/cart/${itemId}/${action}`;

    // Set the flag to true when an AJAX request starts
    isAjaxInProgress = true;

    // Send an AJAX request with the item ID and action
    $.ajax({
        url: url,
        type: 'GET',
        complete: function () {
            // Set the flag back to false when the AJAX request is complete
            isAjaxInProgress = false;
        },
        success: function (response) {
            if (response.status == false) {
                showAlert(false, 'Server error');
            } else {
                updateCart(response.data);
                const itemSubTotalTd = tr.find('.item-sub-total');
                itemSubTotalTd.html('<strong>$ ' + response.item_sub_total + '.00</strong>');
            }
        },
        error: function (xhr, status, error) {
            showAlert(false, 'Server error');
            console.log(error);
        }
    });
});
