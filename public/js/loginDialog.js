$(document).ready(function() {
    $('a.dialog-link').click(function() {
        var dialog_id = $(this).attr('data-selector');
        $(dialog_id).modal();
        $(dialog_id).fadeIn(200);
        $(dialog_id).css({
            'margin-top' : -($(dialog_id).height() + 4) / 2,
            'margin-left' : -($(dialog_id).width() + 4) / 2
        });
        $('body').removeClass('modal-open');
        return false;
    });
});
