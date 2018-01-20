$(function () {
    $(document).on('submit', '.js-validate', function() {
        if ($('.js-input').val() == '') {
            $('.js-input').closest('div').addClass('has-error');
            $('.error').css('display', 'block');
            return false;
        }
    });
});
