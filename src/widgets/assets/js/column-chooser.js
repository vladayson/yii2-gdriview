$(document).ready(function () {
    $('body').on('click', '#columns-chooser-btn', function () {
        $('#column-chooser-modal').modal();
        showColumns();
        return false;
    });

    $('body').on('click', '#save-chosen-buttons', function () {
        saveColumns();
    });

    $('body').on('click', '#js-chosen-attributes', function () {
        $('.js-chosen-attributes').attr('checked', $(this).is(':checked'));
    });
});

function showColumns()
{
    var attributes = Cookies.get(COOKIE_NAME);
    if (attributes !== undefined) {
        attributes = JSON.parse(attributes);
        if (attributes[MODEL] !== undefined) {
            $('.js-chosen-attributes').each(function () {
                $(this).attr('checked', attributes[MODEL].includes($(this).val()));
            });
        }
    }
    $('#js-chosen-attributes').attr('checked', $('.js-chosen-attributes').length == $('.js-chosen-attributes:checked').length);
}

function saveColumns()
{
    var key = MODEL;

    var attributes = Cookies.get(COOKIE_NAME);
    if (attributes === undefined) {
        attributes = {};
    } else {
        attributes = JSON.parse(attributes);
    }
    attributes[key] = [];

    $('.js-chosen-attributes:checked').each(function () {
        attributes[key].push($(this).val());
    });

    Cookies.set(COOKIE_NAME, attributes);
    window.location.reload();
}
