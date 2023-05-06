<?php
namespace Old\Model;
use Old\Model\Model;

class Song extends Model
{
    public function getAllSongs()
    {
        $statement = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($statement);
        $query->execute();

        return $query->fetchAll();
    }

    public function addSongs($artist, $track, $link)
    {
        $statement = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($statement);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);

        $query->execute($parameters);
    }

    public function getSongs($song_id)
    {
        $statement = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($statement);
        $parameters = array(':song_id' => $song_id);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateSongs($artist, $track, $link, $song_id)
    {
        $statement = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($statement);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        $query->execute($parameters);
    }

    public function getTotalSongs()
    {
        $statement = "SELECT COUNT(id) AS total_songs FROM song";
        $query = $this->db->prepare($statement);
        $query->execute();

        return $query->fetch()->total_songs;
    }
}
