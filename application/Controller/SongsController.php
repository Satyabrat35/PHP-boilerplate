<?php
namespace Old\Controller;
use Old\Model\Song;

class SongsController {
    public function index()
    {
        $song = new Song();
        $all_songs = $song->getAllSongs();
        $total_songs = $song->getTotalSongs();

        require APP . 'view/templates/header.php';
        require APP . 'view/songs/index.php';
        require APP . 'view/templates/footer.php';
    }

    public function addSong()
    {
        if(isset($_POST['add_song']))
        {
            $song = new Song();
            if(isset($_POST["artist"], $_POST["track"],  $_POST["link"]))
            {
                $song->addSong($_POST["artist"], $_POST["track"],  $_POST["link"]);
            }
        }
        header('location: '. URL . 'songs/index'); // change URL
    }

    public function deleteSong($id)
    {
        if(isset($id))
        {
            $song = new Song();
            $song->deleteSong($id);
        }
        header('location: ' . URL . 'songs/index');
    }

    public function updateSong($id)
    {
        if (isset($_POST["submit_update_song"])) {
            $song = new Song();
            if (isset($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']))
            {
                $song->updateSong($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']);
            }
            header('location: ' . URL . 'songs/index');
        }
    }

    public function ajaxGetStatus()
    {
        $song = new Song();
        $total_songs = $song->getAmountOfSongs();
        var_dump($total_songs);
    }
}