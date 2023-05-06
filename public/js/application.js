$(function() {
    var demoHeaderBox;

    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    		.hide()
    		.text('Hello from JavaScript! This line has been added by public/js/application.js')
    		.css('color', 'green')
    		.fadeIn('slow');
    }

    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // "url" is defined in views/_templates/footer.php
            // console.log(url);
            $.ajax(url + "SongController/ajaxGetStatus")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }
    $('#add_song').on('submit', function(e){
        e.preventDefault();
        var artist = $('#artist').val();
        var track = $('#track').val();
        var link = $('#link').val();
        $.ajax({
            type: 'POST',
            url: '../application/Controller/SongsController.php/addSong',
            data: {artist: artist, track: track, link: link},
            success: function(response) {
                alert(response);
            },
            error: function(qXHR, textStatus, errorThrown) {
                alert(textStatus, errorThrown);
            }
        });
    });

});
