<?php
class DatabaseHelper{
    public $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function createUser($name, $surname, $username, $psswrd, $email, $date){
        $query = "
            INSERT INTO utente (Nome, Cognome, Password, Email, DataDiNascita)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssb',$name, $surname, $username, $psswrd, $email, $date);
        $stmt->execute();
    }

    public function createEvent($id, $nome, $indirizzo, $civico, $citta, $paese, $dataOra, $numeroPartecipanti, $organizzatore){
        $query = "
            INSERT INTO utente (idEvento, Nome, Indirizzo, NumeroCivico, Citta, Paese, DataOra, NumeroPartecipanti, Organizzatore)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssissbis',$id, $nome, $indirizzo, $civico, $citta, $paese, $dataOra, $numeroPartecipanti, $organizzatore);
        $stmt->execute();
    }

    public function createPost($id, $dataOra, $testo, $immagine, $personale, $proprietario){
        $query = "
            INSERT INTO post(idPost, DataOra, Testo, Immagine, Personale, NumeroLike, NumeroCommenti, Proprietario)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sbssbiis', $id, $dataOra, $testo, $immagine, $personale, 0, 0, $proprietario);
        $stmt->execute();
    }

    public function follow($followerId, $followingId){
        $query = "
            INSERT INTO segui (Follower, Following)
            VALUES (?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$follower,$following);
        $stmt->execute();
    }

    public function unfollow($followerId, $followingId){
        $query = "
            DELETE FROM segui 
            WHERE Follower = ? AND Following = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$follower,$following);
        $stmt->execute();
    }
}