<?php
require '../vendor/autoload.php';
use \Old\Controller\SongsController;

if(isset($_POST))
{
    if(isset($_POST['total_songs']))
    {
        $songs = new SongsController();
        $res = $songs->getStatus();
        echo $res;
    }
    elseif (isset($_POST['artist'], $_POST['track']))
    {
        $songs = new SongsController();
        $res = $songs->addSong($_POST['artist'], $_POST['track'], $_POST['link']);
        echo $res;
    }
    elseif (isset($_POST['id']))
    {
        $songs = new SongsController();
        $res = $songs->deleteSong($_POST['id']);
        echo $res;
    }
}

