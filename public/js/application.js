$(function() {
    $('#javascript-ajax-button').on('click', function() {
        var total_songs = 'total_songs';
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8888/old/Core/ControllerHandler.php',
            data: {total_songs: total_songs},
            success: function(result) {
                $('#javascript-ajax-result-box').html(result);
            },
            error: function(qXHR, textStatus, errorThrown) {
                alert(textStatus, errorThrown);
            }
        });
    });

    $('#add_song').on('submit', function(e){
        e.preventDefault();
        var artist = $('#artist').val();
        var track = $('#track').val();
        var link = $('#link').val();
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8888/old/Core/ControllerHandler.php',
            data: {artist: artist, track: track, link: link},
            success: function(result) {
                // alert(response);
                window.location.reload();
            },
            error: function(qXHR, textStatus, errorThrown) {
                alert(textStatus, errorThrown);
            }
        });
    });


    $("body").on("click", ".delbtn", function(){
        var id = $(this).val()
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8888/old/Core/ControllerHandler.php',
            data: {id: id},
            success: function(result) {
                window.location.reload();
            },
            error: function(qXHR, textStatus, errorThrown) {
                alert(textStatus, errorThrown);
            }
        });
    });

    $('#chat_gpt').on('submit', function(e){
        e.preventDefault();
        var search = $('#search').val();
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8888/old/Core/GPTHandler.php',
            data: {search: search},
            success: function(result) {
                // alert(response);
                $('#chat-gpt-result-box').html(result);
            },
            error: function(qXHR, textStatus, errorThrown) {
                alert(textStatus, errorThrown);
            }
        });
    });
});
