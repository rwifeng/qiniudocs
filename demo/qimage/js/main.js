$(function() {


    var ufop = function(url, $pre) {
        $.ajax({
            url: url
        }).done(function(info) {
            var stringify = JSON.stringify(info, undefined, 2);
            var prettify = hljs.highlightAuto(stringify).value;
            prettify = hljs.fixMarkup(prettify);
            console.log($pre);
            $pre.html(prettify);
        });
    }


    var $nrop = $('pre.nrop');
    ufop('http://7xjiwi.com1.z0.glb.clouddn.com/fringe-sembolleri_59248.jpg?nrop', $nrop);

    var $ad = $('pre.ad');
    ufop('http://qiniuphotos.qiniudn.com/gogopher.jpg?ad', $ad);
});
