<?php
    class Album {
        private $conn;
        private $id;
        private $title;
        private $artistId;
        private $genre;
        private $artworkPath;
        public function __construct($conn, $id){
            $this->conn = $conn;
            $this->id = $id;
            $albumQuery = "SELECT * FROM albums WHERE id = '$this->id'";
            $resultAlbumQuery = mysqli_query($this->conn, $albumQuery);
            $album = mysqli_fetch_array($resultAlbumQuery);
            $this->title = $album['title'];
            $this->artistId = $album['artist'];
            $this->genre = $album['genre'];
            $this->artworkPath = $album['artworkPath'];

        }
        
        public function getTitle()
        {
            return $this->title;
        }
        public function getArtist()
        {
            return new Artist($this->conn, $this->artistId);
        }
        public function getArtworkPath()
        {
            return $this->artworkPath;
        }
        public function getGenre()
        {
            return $this->genre;
        }
        public function getNumberOfSongs()
        {
            $query = "SELECT * FROM songs WHERE album = '$this->id'";
            $queryResult = mysqli_query($this->conn, $query);
            return mysqli_num_rows($queryResult);
        }
    }
?>