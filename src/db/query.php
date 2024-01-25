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
        $stmt->bind_param('sssssss', $name, $surname, $username, $psswrd, $email, $date, $immagine);
        $stmt->execute();
    }

    public function checkUser($username){
        $query = "
            SELECT u.Password
            FROM utente u
            WHERE u.Username = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc()['Password'];
    }

    public function createEvent($nome, $indirizzo, $civico, $citta, $paese, $data, $ora, $numeroPartecipanti, $organizzatore, $immagine){
        $query = "
            INSERT INTO evento (Nome, Indirizzo, NumeroCivico, Citta, Paese, Data, Ora, NumeroPartecipanti, Organizzatore, Copertina)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssissssiss', $nome, $indirizzo, $civico, $citta, $paese, $data, $ora, $numeroPartecipanti, $organizzatore, $immagine);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function deleteEvent($id){
        $query = "
            DELETE FROM evento 
            WHERE idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function getEventFromDate($date){
        $query = "
           SELECT *
           FROM evento e
           WHERE e.Data = ?
           ORDER BY e.Data DESC
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $date);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventFromName($name){
        $query = "
           SELECT *
           FROM evento e
           WHERE e.Nome = ?
           ORDER BY e.Data DESC
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventFromUser($user){
        $query = "
            SELECT *
            FROM evento
            WHERE Organizzatore = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventFromId($id){
        $query = "
        SELECT *
        FROM evento
        WHERE idEvento = ?
    ";

    $stmt = $this->db->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserFromUsername($username){
        $query = "
           SELECT *
           FROM utente u
           WHERE u.Username = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUsernameFromUser($user){
        $query = "
           SELECT *
           FROM utente u
           WHERE u.Username = ? OR u.Nome = ? OR u.Cognome = ? OR u.Email = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $user, $user, $user, $user);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createPost($dataOra, $testo, $immagine, $personale, $proprietario, $evento){
        $query = "
            INSERT INTO post (DataOra, Testo, Immagine, Personale, NumeroLike, NumeroCommenti, Proprietario, idEvento)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $numLike=0;
        $numCommenti=0;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssiiisi', $dataOra, $testo, $immagine, $personale, $numLike, $numCommenti, $proprietario, $evento);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function deletePost($id){
        $query = "
            DELETE FROM post
            WHERE idPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function getPostsFromUser($user){
        $query = "
            SELECT *
            FROM post
            WHERE Proprietario = ? AND Personale = ?
            ORDER BY DataOra DESC
        ";

        $stmt = $this->db->prepare($query);
        $personale = 1;
        $stmt->bind_param('si', $user, $personale);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFollowingPosts($user){
        $query = "
            SELECT *
            FROM post p
            WHERE p.Personale = ? AND p.proprietario IN (
                SELECT s.Following 
                FROM segui s
                WHERE s.Follower = ? )
        ";

        $stmt = $this->db->prepare($query);
        $personale = 1;
        $stmt->bind_param('is', $personale, $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function follow($followerId, $followingId){
        $query = "
            INSERT INTO segui (Follower, Following)
            VALUES (?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $followerId, $followingId);
        $stmt->execute();
    }

    public function unfollow($followerId, $followingId){
        $query = "
            DELETE FROM segui 
            WHERE Follower = ? AND Following = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $followerId, $followingId);
        $stmt->execute();
    }

    public function getFollowers($user){
        $query = "
            SELECT s.Follower 
            FROM segui s
            WHERE s.Following = ? 
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFollowing($user){
        $query = "
            SELECT s.Following 
            FROM segui s
            WHERE s.Follower = ? 
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkFollow($followerId, $followingId){
        $query = "
            SELECT *
            FROM segui 
            WHERE Follower = ? AND Following = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $followerId, $followingId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addLike($user, $post){
        $query = "
            INSERT INTO mipiace (UserMiPiace, IdPost)
            VALUES (?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $user, $post);
        $stmt->execute();

        $query = "
            UPDATE post p
            SET p.NumeroLike = p.NumeroLike + 1
            WHERE p.IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $post);
        $stmt->execute();
    }

    public function removeLike($user, $post){
        $query = "
            DELETE FROM mipiace
            WHERE UserMiPiace = ? AND IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $user, $post);
        $stmt->execute();

        $query = "
            UPDATE post p
            SET p.NumeroLike = p.NumeroLike - 1
            WHERE p.IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $post);
        $stmt->execute();
    }

    public function checkLike($user, $post){
        $query = "
            SELECT *
            FROM mipiace
            WHERE UserMiPiace = ? AND idPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $user, $post);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addComment($DataOra, $Testo, $idPost, $UserCommento){
        $query = "
            INSERT INTO commento (DataOra, Testo, idPost, UserCommento)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssis', $DataOra, $Testo, $idPost, $UserCommento);
        $stmt->execute();

        $query1 = "
            UPDATE post p
            SET p.NumeroCommenti = p.NumeroCommenti + 1
            WHERE p.IdPost = ?
        ";

        $stmt1 = $this->db->prepare($query1);
        $stmt1->bind_param('i', $idPost);
        $stmt1->execute();

        return $stmt->insert_id;
    }

    public function removeComment($idCommento, $idPost){
        $query = "
            DELETE FROM commento
            WHERE idCommento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idCommento);
        $stmt->execute();

        $query = "
            UPDATE post p
            SET p.NumeroCommenti = p.NumeroCommenti - 1
            WHERE p.IdPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idPost);
        $stmt->execute();
    }

    public function getPostsComments($idPost){
        $query = "
            SELECT *
            FROM commento
            WHERE idPost = ? 
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idPost);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addSurvey($idEvento){
        $query = "
            INSERT INTO sondaggio (idEvento)
            VALUES (?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idEvento);
        $stmt->execute();
    }

    public function deleteSurvey($idSondaggio){
        $query = "
            DELETE FROM sondaggio
            WHERE idSondaggio = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idSondaggio);
        $stmt->execute();
    }

    public function getSurveyFromEvent($evento){
        $query = "
            SELECT *
            FROM sondaggio
            WHERE idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $evento);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addOptionInSurvey($idSondaggio, $Nome){
        $query = "
            INSERT INTO opzione (idSondaggio, Nome, NumeroVoti)
            VALUES (?, ?, ?)
        ";

        $numVoti=0;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isi', $idSondaggio, $Nome, $numVoti);
        $stmt->execute();
    }

    public function addVote($idSondaggio, $Nome){
        $query = "
            UPDATE opzione o
            SET o.NumeroVoti = o.NumeroVoti + 1
            WHERE o.idSondaggio = ? AND o.Nome = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $idSondaggio, $Nome);
        $stmt->execute();
    }

    public function removeVote($idSondaggio, $Nome){
        $query = "
            UPDATE opzione o
            SET o.NumeroVoti = o.NumeroVoti + 1
            WHERE o.idSondaggio = ? AND o.Nome = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $idSondaggio, $Nome);
        $stmt->execute();
    }
    
    public function addList($idEvento){
        $query = "
            INSERT INTO lista (idLista, ImportoTotale, idEvento)
            VALUES ((SELECT MAX(idLista) FROM lista)+1, ?, ?)
        ";

        $importo=0;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $importo, $idEvento);
        $stmt->execute();
    }

    public function deleteList($idLista){
        $query = "
            DELETE FROM lista
            WHERE idLista = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idLista);
        $stmt->execute();
    }

    public function getListFromEvent($evento){
        $query = "
            SELECT *
            FROM lista
            WHERE idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $evento);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addProductInList($Nome, $Prezzo, $idLista){
        $query = "
            INSERT INTO prodotto (Nome, Prezzo, idLista)
            VALUES (?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdi', $Nome, $Prezzo, $idLista);
        $stmt->execute();

        $query1 = "
            UPDATE lista l
            SET l.ImportoTotale = l.ImportoTotale + ?
            WHERE l.idLista = ?
        ";

        $stmt1 = $this->db->prepare($query1);
        $stmt1->bind_param('di', $Prezzo, $IdLista);
        $stmt1->execute();

        return $stmt->insert_id;
    }

    public function newRequest($UserPartecipante, $idEvento, $idNotifica){
        $query = "
            INSERT INTO richiesta (UserPartecipante, idEvento, idNotifica, Accettata)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('siib', $UserPartecipante, $idEvento, $idNotifica, false);
        $stmt->execute();
    }

    public function requestAccepted($UserPartecipante, $idEvento){
        $query = "
            UPDATE richiesta r
            SET r.Accettata = true
            WHERE r.UserPartecipante = ? AND r.idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $UserPartecipante, $idEvento);
        $stmt->execute();
    }

    public function requestDenied($UserPartecipante, $idEvento){
        $query = "
            DELETE FROM richiesta 
            WHERE r.UserPartecipante = ? AND r.idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $UserPartecipante, $idEvento);
        $stmt->execute();
    }

    public function newNotification($idNotifica, $Tipo,	$Testo, $UserInvio, $UserRicevente, $idPost){
        $query = "
            INSERT INTO notifica (Tipo, Testo, UserInvio, UserRicevente, idPost)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssi', $Tipo, $Testo, $UserInvio, $UserRicevente, $idPost);
        $stmt->execute();
    }

}