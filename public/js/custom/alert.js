
function showAlert(status, message) {
    const toast = document.getElementById('alert-toast-bs');
    const toastTitle = toast.querySelector('.toast-header strong');
    const toastBody = toast.querySelector('.toast-body');

    // Update title and message  
    toastTitle.textContent = status == true ? 'Success' : 'Error';
    toastBody.textContent = message;
    new bootstrap.Toast(document.getElementById('alert-toast-bs')).show();

}