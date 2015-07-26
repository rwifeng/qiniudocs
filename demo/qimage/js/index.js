$(function() {
    var imgUrl = '';

    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4', //上传模式,依次退化
        browse_button: 'pickfiles', //上传选择的点选按钮，**必需**
        uptoken_url: 'uptoken.php', //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
        domain: 'http://rwxf.qiniudn.com/', //bucket 域名，下载资源时用到，**必需**
        container: 'container', //上传区域DOM ID，默认是browser_button的父元素，
        max_file_size: '100mb', //最大文件体积限制
        flash_swf_url: 'plupload/Moxie.swf', //引入flash,相对路径
        max_retries: 3, //上传失败最大重试次数
        dragdrop: true, //开启可拖曳上传
        drop_element: 'container', //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
        chunk_size: '4mb', //分块上传时，每片的体积
        auto_start: true, //选择文件后自动上传，若关闭需要自己绑定事件触发上传
        init: {
            'UploadProgress': function(up, file) {
                $('#pickfiles').prop('disabled', true).html('图片上传中...');
            },
            'FileUploaded': function(up, file, info) {

                $('#pickfiles').prop('disabled', false).html('上传图片');
                var res = JSON.parse(info);
                imgUrl = up.getOption('domain') + res.key;
                refresh(imgUrl);
            },
            'Error': function(up, err, errTip) {
                $('#pickfiles').prop('disabled', false).html('上传图片');
            }
        }
    });
    $('input').change(function() {
        refresh(imgUrl);
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

        refresh(imgUrl);
    });

    $('select').on('change', function() {
        refresh(imgUrl);
    });


    // refresh watermark url
    var refresh = function(url) {
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
