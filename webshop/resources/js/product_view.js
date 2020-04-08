$(document).ready(function () {
    $('.panel-heading').click(function () {
        if(!$('.panel-body').hasClass('collapse show')) {
            $('.downbutton').removeClass('fa fa-chevron-right');
            $('.downbutton').addClass('fa fa-chevron-down');

        }
        else
        {
            $('.downbutton').removeClass('fa fa-chevron-down');
            $('.downbutton').addClass('fa fa-chevron-right');
        }
    })

});
