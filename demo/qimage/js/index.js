$(function() {
    $('input').change(function() {
        // var url = 'http://7xjiwi.com1.z0.glb.clouddn.com/fringe-sembolleri_59248.jpg';
        refresh();
    });


    //  text/image watermark toggle
    $('.nav-wm').on('click', function() {
        $(this).addClass('active').siblings().removeClass('active');
        if ($(this).hasClass('nav-wm-text')) {
            $('.wm-text').show();
            $('.wm-image').hide();
        } else {
            $('.wm-text').hide();
            $('.wm-image').show();
        }
    });


    // dissolve slider
    var slider = document.getElementById('slider-tooltip');
    noUiSlider.create(slider, {
        start: 100,
        range: {
            'min': 1,
            'max': 100
        }
    });
    slider.noUiSlider.on('change', function(values, idx) {
        var dissolve = Math.ceil(values[idx]);
        $('.dissolve').val(dissolve).trigger('change');
    });

    // gravity select
    $('div.wm-gravity .gravity').on('click', function() {
        $(this).addClass('selected').siblings().removeClass('selected');

        var $dx = $('div.wm-gravity .dx');
        var $dy = $('div.wm-gravity .dy');
        var gravity = $(this).data('gravity');
        if ($.inArray(gravity, ['North', 'South']) > -1) {
            $dx.hide();
            $dy.show();
        } else if ($.inArray(gravity, ['West', 'East']) > -1) {
            $dx.show();
            $dy.hide();
        } else if (gravity == 'Center') {
            $dx.hide();
            $dy.hide();
        } else {
            $dx.show();
            $dy.show();
        }

        refresh();
    });

    $('select').on('change', function() {
        refresh();
    });


    // refresh watermark url
    var refresh = function() {
        var url = 'http://rwxf.qiniudn.com/1234.jpg';
        var $imageview = $('div.imageview');

        var imgv = {
            'fop': 'imageView2',
            'mode': $imageview.find('select').val()
        };
        $imageview.find('input').each(function() {
            var op = $(this).data('op');
            imgv[op] = $(this).val();
        });


        var $watermark = $('div.wm')
        var wm = {
            'fop': 'watermark',
            'font': $watermark.find('select').val(),
            'gravity': $('div.wm-gravity .selected').data('gravity'),
            'mode': $('.nav-wm.active').data('mode')
        };
        $('div.wm').find('input').each(function() {
            var op = $(this).data('op');
            wm[op] = $(this).val();
        });

        console.log($('.nav-wm.active').data('mode'));

        var fops = function(url, fop) {
            url += '?' + Qiniu.pipeline(fop);
            var lastchar = url.charAt(url.length - 1);
            url = lastchar == '|' ? url.substring(0, url.length - 1) : url;
            console.log(fop);
            console.log(url);
            return url;
        };
        url = fops(url, [imgv, wm]);
        $img = $('#img-dsp');
        $img.attr('src', url);

        $imgLink = $('#img-link');
        $imgLink.attr('href', url).html(url);


    }
});
