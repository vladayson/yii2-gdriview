$(document).ready(function () {
    $('body').on('click', '#filter-btn', function () {
        $('#filter-modal').modal();
        return false;
    });

    $('body').on('click', '#filter-modal-content button', function () {
        $('#filter-modal').modal('hide');
    });
});
