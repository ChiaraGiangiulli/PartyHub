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

        $testo = "ha creato un nuovo evento: ".$nome;
        foreach($this->getFollowers($organizzatore) as $follower){
            $this->newNotification("Nuovo Evento", $testo, $organizzatore, $follower['Follower'], null, 0);
        }
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

    public function getPostFromId($idPost){
        $query = "
            SELECT *
            FROM post p
            WHERE p.idPost = ?
        ";

        $stmt = $this->db->prepare($query);
        $personale = 0;
        $stmt->bind_param('i', $idPost);
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

    public function getPostForEvent($idEvento){
        $query = "
            SELECT *
            FROM post p
            WHERE p.Personale = ? AND p.idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $personale = 0;
        $stmt->bind_param('ii', $personale, $idEvento);
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

        $testo = "ha iniziato a seguirti";
        $this->newNotification("Follow", $testo, $followerId, $followingId, null, 0);
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

        $testo = "ha messo like al tuo post: ".($this->getPostFromId($post)[0]['Testo']);
        $this->newNotification("Like", $testo, $user, $this->getPostFromId($post)[0]['Proprietario'], $post, 0);
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
    
    public function voteSondaggio($idSondaggio,$nomeOpzione){
        
        $query = "
            UPDATE opzione o
            SET o.NumeroVoti = o.NumeroVoti + 1
            WHERE o.idSondaggio = ? AND o.Nome = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $idSondaggio,$nomeOpzione);
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

    public function addComment($dataOra, $testo, $idPost, $userCommento){
        $query = "
            INSERT INTO commento (DataOra, Testo, idPost, UserCommento)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssis', $dataOra, $testo, $idPost, $userCommento);
        $stmt->execute();
        $stmt->insert_id;

        $query1 = "
            UPDATE post p
            SET p.NumeroCommenti = p.NumeroCommenti + 1
            WHERE p.IdPost = ?
        ";

        $stmt1 = $this->db->prepare($query1);
        $stmt1->bind_param('i', $idPost);
        $stmt1->execute();

        $testo = "ha commentato il tuo post: ".($this->getPostFromId($idPost)[0]['Testo']);
        $this->newNotification("Commento", $testo, $userCommento, $this->getPostFromId($idPost)[0]['Proprietario'], $idPost, 0);

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

        return $stmt->insert_id;
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

    public function addOptionInSurvey($idSondaggio, $nome){
        $query = "
            INSERT INTO opzione (idSondaggio, Nome, NumeroVoti)
            VALUES (?, ?, ?)
        ";

        $numVoti=0;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isi', $idSondaggio, $nome, $numVoti);
        $stmt->execute();
    }

    public function getOpzioniFromSondaggio($idSondaggio){
        $query = "
            SELECT *
            FROM opzione
            WHERE idSondaggio = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idSondaggio);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addVote($idSondaggio, $nome){
        $query = "
            UPDATE opzione o
            SET o.NumeroVoti = o.NumeroVoti + 1
            WHERE o.idSondaggio = ? AND o.Nome = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $idSondaggio, $nome);
        $stmt->execute();
    }

    public function removeVote($idSondaggio, $nome){
        $query = "
            UPDATE opzione o
            SET o.NumeroVoti = o.NumeroVoti + 1
            WHERE o.idSondaggio = ? AND o.Nome = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $idSondaggio, $nome);
        $stmt->execute();
    }

    
    public function addList($idEvento){
        $query = "
            INSERT INTO lista (ImportoTotale, idEvento)
            VALUES (?, ?)
        ";

        $importo=0;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $importo, $idEvento);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function getProdottifromLista($idLista){
        $query = "
            SELECT *
            FROM prodotto
            WHERE idLista = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idLista);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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

    public function addProductInList($nome, $prezzo, $idLista){
        $query = "
            INSERT INTO prodotto (Nome, Prezzo, idLista)
            VALUES (?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdi', $nome, $prezzo, $idLista);
        $stmt->execute();

        $query1 = "
            UPDATE lista l
            SET l.ImportoTotale = l.ImportoTotale + ?
            WHERE l.idLista = ?
        ";

        $stmt1 = $this->db->prepare($query1);
        $stmt1->bind_param('di', $prezzo, $idLista);
        $stmt1->execute();

        return $stmt->insert_id;
    }

    public function newRequest($user, $idEvento, $idNotifica){
        $query = "
            INSERT INTO richiesta (UserPartecipante, idEvento, idNotifica, Accettata)
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $accettata = 0;
        $stmt->bind_param('siib', $user, $idEvento, $idNotifica, $accettata);
        $stmt->execute();
    }

    public function requestAccepted($user, $idEvento){
        $query = "
            UPDATE richiesta r
            SET r.Accettata = true
            WHERE r.UserPartecipante = ? AND r.idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $user, $idEvento);
        $stmt->execute();

        $query = "
            UPDATE evento e
            SET e.NumeroPartecipanti = e.NumeroPartecipanti + 1
            WHERE e.idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idEvento);
        $stmt->execute();
    }

    public function requestDenied($user, $idEvento){
        $query = "
            DELETE FROM richiesta 
            WHERE r.UserPartecipante = ? AND r.idEvento = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $user, $idEvento);
        $stmt->execute();
    }

    public function isAccepted($user, $idEvento){
        $query = "
            SELECT *
            FROM richiesta r
            WHERE r.UserPartecipante = ? AND r.idEvento = ? AND r.Accettata = ?
        ";

        $stmt = $this->db->prepare($query);
        $accettata = 1;
        $stmt->bind_param('sii', $user, $idEvento, $accettata);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function newNotification($Tipo,	$Testo, $UserInvio, $UserRicevente, $idPost){
        $query = "
            INSERT INTO notifica (Tipo, Testo, UserInvio, UserRicevente, idPost, Vista)
            VALUES (?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);
        $seen = 0;
        $stmt->bind_param('ssssii', $Tipo, $Testo, $UserInvio, $UserRicevente, $idPost, $seen);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getNotificationsFromUser($user){
        $query = "
            SELECT *
            FROM notifica
            WHERE UserRicevente = ?
            ORDER BY idNotifica DESC
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function setNotificationSeen($idNotifica){
        $query = "
            UPDATE notifica
            SET Vista = true
            WHERE idNotifica = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idNotifica);
        $stmt->execute();
    }

    public function requestFromNotification($idNotifica){
        $query = "
            SELECT *
            FROM richiesta
            WHERE idNotifica = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idNotifica);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteNotification($idNotifica){
        $query = "
            DELETE FROM notifica
            WHERE idNotifica = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $user, $idNotifica);
        $stmt->execute();
    }
}