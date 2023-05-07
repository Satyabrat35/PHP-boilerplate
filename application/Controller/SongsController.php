<?php
namespace Old\Controller;
use Old\Model\Song;

class SongsController
{
    public function index()
    {
        $song = new Song();
        $all_songs = $song->getAllSongs();
        $total_songs = $song->getTotalSongs();

        require APP . 'view/templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/templates/footer.php';
    }

    public function addSong($artist, $track, $link='')
    {
        $song = new Song();
        $artist = trim($artist);
        $track = trim($track);
        $link = trim($link);
        if(!empty($artist) && !empty($track))
        {
            $song->addSongs($artist, $track, $link);
        }
    }

    public function deleteSong($id)
    {
        if(isset($id))
        {
            $song = new Song();
            $song->deleteSongs($id);
        }
        //header('location: ' . URL . 'songs/index');
    }

    public function updateSong($id)
    {
        if (isset($_POST["submit_update_song"])) {
            $song = new Song();
            if (isset($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']))
            {
                $song->updateSongs($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']);
            }
            //header('location: ' . URL . 'songs/index');
        }
    }

    public function getStatus()
    {
        $song = new Song();
        $total_songs = $song->getTotalSongs();
        return $total_songs;
    }
}