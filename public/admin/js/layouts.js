/**
 *
 * @param text
 * @param status available values => ['success','info','warning','danger'];
 */
function showAlert(text, status = 'success') {
    status.replace('error', 'danger');
    let html = '<div id="alert" class="alert alert-' + status + '">'
        + text + '</div>';
    $('#alert').replaceWith(html);
    $('#alert').fadeIn();
    let width = $('#alert').outerWidth();
    setTimeout(function () {
        // $('#alert').animate({
        //     'right': -width
        // }, 700);
        $('#alert').slideToggle();
    }, 2500);
}


