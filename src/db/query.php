<?php
class DatabaseHelper{
    public $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function createUser($name, $surname, $username, $psswrd, $email, $date, $immagine){
        $query = "
            INSERT INTO utente (Nome, Cognome, Username, Password, Email, DataDiNascita, ImmagineProfilo)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssbs', $name, $surname, $username, $psswrd, $email, $date, $immagine);
        $stmt->execute();
    }

    public function checkUser($username, $psswrd){
        $query = "
            SELECT u.Username u.Password
            FROM utente u
            WHERE u.username = ? AND u.psswrd = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $psswrd);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createEvent($id, $nome, $indirizzo, $civico, $citta, $paese, $dataOra, $numeroPartecipanti, $organizzatore, $immagine){
        $query = "
            INSERT INTO evento (idEvento, Nome, Indirizzo, NumeroCivico, Citta, Paese, DataOra, NumeroPartecipanti, Organizzatore, Copertina)
            VALUES (?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssissbis', $id, $nome, $indirizzo, $civico, $citta, $paese, $dataOra, $numeroPartecipanti, $organizzatore, $immagine);
        $stmt->execute();
    }

    public function deleteEvent($id){
        $query = "
            DELETE FROM evento 
            WHERE idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
    }

    public function createPost($id, $dataOra, $testo, $immagine, $personale, $proprietario){
        $query = "
            INSERT INTO post (idPost, DataOra, Testo, Immagine, Personale, NumeroLike, NumeroCommenti, Proprietario)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sbssbiis', $id, $dataOra, $testo, $immagine, $personale, 0, 0, $proprietario);
        $stmt->execute();
    }

    public function deletePost($id){
        $query = "
            DELETE FROM post
            WHERE idPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
    }

    public function follow($followerId, $followingId){
        $query = "
            INSERT INTO segui (Follower, Following)
            VALUES (?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $follower,$following);
        $stmt->execute();
    }

    public function unfollow($followerId, $followingId){
        $query = "
            DELETE FROM segui 
            WHERE Follower = ? AND Following = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $follower,$following);
        $stmt->execute();
    }

    public function addLike($user, $post){
        $query = "
            INSERT INTO mipiace (UserMiPiace, IdPost)
            VALUES (?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $user, $post);
        $stmt->execute();

        $query = "
            UPDATE post p
            SET p.NumeroLike = p.NumeroLike + 1
            WHERE p.IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $post);
        $stmt->execute();
    }

    public function removeLike($user, $post){
        $query = "
            DELETE FROM mipiace
            WHERE UserMiPiace = ? AND IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $user, $post);
        $stmt->execute();

        $query = "
            UPDATE post p
            SET p.NumeroLike = p.NumeroLike - 1
            WHERE p.IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $post);
        $stmt->execute();
    }

    public function addComment($idCommento, $DataOra, $Testo, $idPost, $UserCommento){
        $query = "
            INSERT INTO commento (idCommento, DataOra, Testo, idPost, UserCommento)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sbsss', $idCommento, $DataOra, $Testo, $idPost, $UserCommento);
        $stmt->execute();

        $query = "
            UPDATE post p
            SET p.NumeroCommenti = p.NumeroCommenti + 1
            WHERE p.IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idPost);
        $stmt->execute();
    }

    public function removeComment($idCommento, $idPost){
        $query = "
            DELETE FROM commento
            WHERE idCommento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idCommento);
        $stmt->execute();

        $query = "
            UPDATE post p
            SET p.NumeroCommenti = p.NumeroCommenti - 1
            WHERE p.IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idPost);
        $stmt->execute();
    }

    public function addSurvey($idSondaggio, $idEvento){
        $query = "
            INSERT INTO sondaggio (idSondaggio, idEvento)
            VALUES (?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $idSondaggio, $idEvento);
        $stmt->execute();
    }

    public function deleteSurvey($idSondaggio, $idEvento){
        $query = "
            DELETE FROM sondaggio
            WHERE idSondaggio = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idSondaggio);
        $stmt->execute();
    }

    public function addOptionInSurvey($idSondaggio, $Nome){
        $query = "
            INSERT INTO opzione (idSondaggio, Nome, NumeroVoti)
            VALUES (?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi', $idSondaggio, $Nome, 0);
        $stmt->execute();
    }

    public function addVote($idSondaggio, $Nome){
        $query = "
            UPDATE opzione o
            SET o.NumeroVoti = o.NumeroVoti + 1
            WHERE o.idSondaggio = ? AND o.Nome = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $idSondaggio, $Nome);
        $stmt->execute();
    }

    public function removeVote($idSondaggio, $Nome){
        $query = "
            UPDATE opzione o
            SET o.NumeroVoti = o.NumeroVoti + 1
            WHERE o.idSondaggio = ? AND o.Nome = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idPost);
        $stmt->execute();
    }
    
    public function addList($idLista, $idEvento){
        $query = "
            INSERT INTO lista (idLista, ImportoTotale, idEvento)
            VALUES (?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sis', $idLista, 0, $idEvento);
        $stmt->execute();
    }

    public function deleteList($idLista){
        $query = "
            DELETE FROM lista
            WHERE idLista = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idLista);
        $stmt->execute();
    }

    public function addProductInList($idProdotto, $Nome, $Prezzo, $idLista){
        $query = "
            INSERT INTO prodotto (idProdotto, Nome, Prezzo, idLista)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssds', $idProdotto, $Nome, $Prezzo, $idLista);
        $stmt->execute();

        $query = "
            UPDATE lista l
            SET l.ImportoTotale = l.ImportoTotale + ?
            WHERE l.idLista = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ds', $Prezzo, $IdLista);
        $stmt->execute();
    }

    public function newRequest($UserPartecipante, $idEvento, $idNotifica){
        $query = "
            INSERT INTO richiesta (UserPartecipante, idEvento, idNotifica, Accettata)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssb', $UserPartecipante, $idEvento, $idNotifica, false);
        $stmt->execute();
    }

    public function requestAccepted($UserPartecipante, $idEvento){
        $query = "
            UPDATE richiesta r
            SET r.Accettata = true
            WHERE r.UserPartecipante = ? AND r.idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ds', $Prezzo, $IdLista);
        $stmt->execute();
    }

    public function requestDenied($UserPartecipante, $idEvento){
        $query = "
            DELETE FROM richiesta 
            WHERE r.UserPartecipante = ? AND r.idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ds', $UserPartecipante, $idEvento);
        $stmt->execute();
    }

    public function newNotification($idNotifica, $Tipo,	$Testo, $UserInvio, $UserRicevente, $idPost){
        $query = "
            INSERT INTO notifica (idNotifica, Tipo, Testo, UserInvio, UserRicevente, idPost)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss', $idNotifica, $Tipo,	$Testo, $UserInvio, $UserRicevente, $idPost);
        $stmt->execute();
    }

}