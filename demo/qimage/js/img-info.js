$(function() {

    var ufop = function(url, $pre) {
        $.ajax({
            url: url
        }).done(function(info) {
            var stringify = JSON.stringify(info, undefined, 2);
            var prettify = hljs.highlightAuto(stringify).value;
            prettify = hljs.fixMarkup(prettify);
            $pre.html(prettify);
        }).error(function(error) {
            $pre.html(error.responseText);
        });
    }

    $('.sample').on('click', function() {
        $(this).addClass('active').siblings().removeClass('active');
        var url = $(this).find('img').attr('src').split('?')[0];


        var infoUrl = url + '?imageInfo';
        $('.imageInfo a').html(infoUrl).attr('href', infoUrl);
        ufop(infoUrl, $('pre.imageInfo'));

        var aveUrl = url + '?imageAve';
        $('.imageAve a').html(aveUrl).attr('href', aveUrl);
        ufop(aveUrl, $('pre.imageAve'));

        var exifUrl = url + '?exif';
        $('.exif a').html(exifUrl).attr('href', exifUrl);
        ufop(exifUrl, $('pre.exif'));
    });
    $('.sample.active').click();

});
