/*global Qiniu */
/*global plupload */
/*global FileProgress */
/*global hljs */

$(function() {
    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'pickfiles',
        container: 'container',
        drop_element: 'container',
        //max_file_size: '100mb',
        flash_swf_url: 'js/plupload/Moxie.swf',
        dragdrop: true,
        chunk_size: '4mb',
        uptoken_url: $('#uptoken_url').val(),
        domain: $('#domain').val(),
        auto_start: true,
        init: {
            'FilesAdded': function(up, files) {
                $('table').show();
                $('#success').hide();
                plupload.each(files, function(file) {
                    var progress = new FileProgress(file, 'fsUploadProgress');
                    progress.setStatus("等待...");
                });
            },
            'BeforeUpload': function(up, file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                if (up.runtime === 'html5' && chunk_size) {
                    progress.setChunkProgess(chunk_size);
                }
            },
            'UploadProgress': function(up, file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));

                progress.setProgress(file.percent + "%", file.speed, chunk_size);
            },
            'UploadComplete': function() {
                $('#success').show();
            },
            'FileUploaded': function(up, file, info) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                progress.setComplete(up, info);
            },
            'Error': function(up, err, errTip) {
                $('table').show();
                var progress = new FileProgress(err.file, 'fsUploadProgress');
                progress.setError();
                progress.setStatus(errTip);
            }
        }
    });

    uploader.bind('FileUploaded', function() {
        console.log('hello man,a file is uploaded');
    });

    $('#container').on(
        'dragenter',
        function(e) {
            e.preventDefault();
            $('#container').addClass('draging');
            e.stopPropagation();
        }
    ).on('drop', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragleave', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragover', function(e) {
        e.preventDefault();
        $('#container').addClass('draging');
        e.stopPropagation();
    });


    $('body').on('click', 'table button.btn', function() {
        $(this).parents('tr').next().toggle();
    });

    function initPlayer(vLink) {

        if ($("#video-embed").length) {
            return;
        }

        var vType = function() {

            var type = '';
            $.ajax({
                url: vLink + "?stat",
                async: false
            }).done(function(info) {
                type = info.mimeType;
                if (type == 'application/x-mpegurl') {
                    type = 'application/x-mpegURL';
                }
            });

            return type;
        };

        var player = $('<video id="video-embed" class="video-js vjs-default-skin"></video>');
        $('#video-container').empty();
        $('#video-container').append(player);

        console.log('=======>>Type:', vType(), '====>>vLink:', vLink);
        var poster = vLink + '?vframe/jpg/offset/2';
        videojs('video-embed', {
            "width": "100%",
            "height": "500px",
            "controls": true,
            "autoplay": false,
            "preload": "auto",
            "poster": poster
        }, function() {
            this.src({
                type: vType(),
                src: vLink
            });
        });
    }

    function disposePlayer() {
        if ($("#video-embed").length) {
            $('#video-container').empty();
            _V_('video-embed').dispose();
        }
    }


    $('#myModal-video').on('hidden.bs.modal', function() {
        disposePlayer();
    });

    $('tbody').on('click', '.play-btn', function() {
        $('#myModal-video').modal();
        var url = $(this).data('url');
        initPlayer(url);
    });
});
