$(function() {

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
                var imgUrl = up.getOption('domain') + res.key +
                    '?imageView2/1/w/200/h/100';


                $imgThumbnail = $('div.list-group div').first().clone();
                $imgThumbnail.find('img').attr('src', imgUrl);
                $imgThumbnail.find('p').html(res.key);
                $('div.list-group').prepend($imgThumbnail);
                console.log(imgUrl);
            },
            'Error': function(up, err, errTip) {
                $('#pickfiles').prop('disabled', false).html('上传图片');
            }
        }
    });

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

    $('div.container').on('click', '.sample', function() {
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
