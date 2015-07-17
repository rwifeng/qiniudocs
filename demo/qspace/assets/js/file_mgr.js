$(function() {

    $('.del').on('click', function() {
        var id = $(this).data('fid');

        $.ajax({
            method: "POST",
            url: "file_mgr.php",
            data: {
                "id": id
            }
        })
    });

});
