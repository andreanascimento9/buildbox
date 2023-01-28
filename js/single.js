
jQuery(document).ready(function ($) {
    $('.container-thumb').click(function () {
        $(this).hide();
        var urlIframe = $('.url_iframe').val()
        urlIframe = `${urlIframe}?autoplay=1`;
        $('.play-iframe iframe').attr("src", urlIframe);
    })
})
