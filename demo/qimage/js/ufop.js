$(function() {
    var nropConments = function(info) {

        var $comments = $('div.ufop-nrop .comments');
        var file = info.fileList[0];

        var $msg = $comments.find('div.msg');
        $msg.find(':first-child').html('"message": ' + info.message);
        if (info.code == 0) {
            $msg.find('label').text('成功');
        }

        var review = file.review;
        var $review = $comments.find('div.review');
        $review.find(':first-child').html('"review": ' + review);
        if (review) {
            $review.find('label').html('是');
        } else {
            $review.find('label').html('否');
        }

        var labels = ["色情", "性感", "正常"];
        var label_ = file.label;
        var label = labels[label_];

        $comments.find('div.type :first-child').html('"label:" ' + label_);
        $comments.find('div.type label').html(label);

        var rate_ = file.rate;
        var rate = Math.floor(rate_ * 100) + '%';
        $comments.find('div.rate :first-child').html('"rate": ' + rate_);
        $comments.find('div.rate label').html(rate);
    }

    var adConments = function(info) {

        var $comments = $('div.ufop-ad .comments');
        var file = info.fileList[0];

        var $msg = $comments.find('div.msg');
        $msg.find(':first-child').html('"message": ' + info.message);
        if (info.code == 0) {
            $msg.find('label').text('成功');
        }

        var review = file.review;
        var $review = $comments.find('div.review');
        $review.find(':first-child').html('"review": ' + review);
        if (review) {
            $review.find('label').html('是');
        } else {
            $review.find('label').html('否');
        }

        var labels = ["正常", "二维码", "小广告", "商业海报"];
        var label_ = file.label;
        var label = labels[label_];

        $comments.find('div.type :first-child').html('"label:" ' + label_);
        $comments.find('div.type label').html(label);

        var rate_ = file.rate;
        var rate = Math.floor(rate_ * 100) + '%';
        $comments.find('div.rate :first-child').html('"rate": ' + rate_);
        $comments.find('div.rate label').html(rate);
    }

    var ufop = function(url, $pre, type) {
        $.ajax({
            url: url
        }).done(function(info) {
            console.log(info);
            if (type == 'ad') {
                adConments(info);
            } else {
                nropConments(info);
            }

            var stringify = JSON.stringify(info, undefined, 2);
            var prettify = hljs.highlightAuto(stringify).value;
            prettify = hljs.fixMarkup(prettify);
            $pre.html(prettify);
        });
    }



    var $nrop = $('pre.nrop');
    var $ad = $('pre.ad');

    $('.sample').on('click', function() {
        $(this).addClass('active').siblings().removeClass('active');
        var url = $(this).find('img').attr('src').split('?')[0];

        var norpUrl = url + '?nrop';
        $('.ufop-nrop a').html(norpUrl).attr('href', norpUrl);
        ufop(norpUrl, $nrop);

        var adUrl = url + '?ad';
        $('.ufop-ad a').html(adUrl).attr('href', adUrl);
        ufop(adUrl, $ad, 'ad');
    });
    $('.sample.active').click();

});
