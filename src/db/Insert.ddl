-- Insert statements for Utente table
INSERT INTO Utente (Nome, Cognome, Username, Password, Email, DataDiNascita, ImmagineProfilo)
VALUES ('John', 'Doe', 'User1', 'password1', 'user1@email.com', '1990-01-01 00:00:00', 'profile1.jpg'),
       ('Jane', 'Smith', 'User2', 'password2', 'user2@email.com', '1985-05-15 12:30:00', 'profile2.jpg');
       -- Add more rows as needed;

-- Insert statements for Post table
INSERT INTO Post (idPost, DataOra, Testo, Immagine, Personale, NumeroLike, NumeroCommenti, Proprietario)
VALUES (1, '2024-01-18 14:45:00', 'Hello World!', 'hello.jpg', true, 10, 3, 'User1'),
       (2, '2024-01-19 10:30:00', 'Another post', 'another.jpg', false, 15, 7, 'User2');
       -- Add more rows as needed;

-- Insert statements for MiPiace table
INSERT INTO MiPiace (UserMiPiace, idPost)
VALUES ('User1', 1),
       ('User2', 2);
       -- Add more rows as needed;

-- Insert statements for Commento table
INSERT INTO Commento (idCommento, DataOra, Testo, idPost, UserCommento)
VALUES (1, '2024-01-17 12:00:00', 'First comment', 1, 'User1'),
       (2, '2024-01-17 13:30:00', 'Another comment', 1, 'User2');
       -- Add more rows as needed;

-- Insert statements for Notifica table
INSERT INTO Notifica (idNotifica, Tipo, Testo, UserInvio, UserRicevente, idPost)
VALUES (1, 'Amicizia', 'User1 ti ha aggiunto agli amici', 'User1', 'User2', 1),
       (2, 'Evento', 'User2 ha creato un nuovo evento', 'User2', 'User1', 2);
       -- Add more rows as needed;

-- Insert statements for Evento table
INSERT INTO Evento (idEvento, Nome, Indirizzo, NumeroCivico, Citta, Paese, Data, Ora, NumeroPartecipanti, Organizzatore, Copertina)
VALUES (1, 'Party1', '123 Main St', 42, 'City1', 'Country1', '2024-01-20', '18:00:00', 100, 'User1', 'party1.jpg'),
       (2, 'Concert2', '456 Broadway', 101, 'City2', 'Country2', '2024-02-15', '20:30:00', 200, 'User2', 'concert2.jpg');
       -- Add more rows as needed;

-- Insert statements for Richiesta table
INSERT INTO Richiesta (UserPartecipante, idEvento, idNotifica, Accettata)
VALUES ('User1', 1, 1, true),
       ('User2', 2, 2, false);
       -- Add more rows as needed;

-- Insert statements for Segui table
INSERT INTO Segui (Follower, Following)
VALUES ('User1', 'User2'),
       ('User2', 'User1');
       -- Add more rows as needed;

-- Insert statements for Lista table
INSERT INTO Lista (idLista, ImportoTotale, idEvento)
VALUES (1, 50.00, 1),
       (2, 75.50, 2);
       -- Add more rows as needed;

-- Insert statements for Prodotto table
INSERT INTO Prodotto (idProdotto, Nome, Prezzo, idLista)
VALUES (1, 'Prodotto1', 20.00, 1),
       (2, 'Prodotto2', 30.50, 1);
       -- Add more rows as needed;

-- Insert statements for Sondaggio table
INSERT INTO Sondaggio (idSondaggio, idEvento)
VALUES (1, 1),
       (2, 2);
       -- Add more rows as needed;

-- Insert statements for Opzione table
INSERT INTO Opzione (idSondaggio, Nome, NumeroVoti)
VALUES (1, 'Opzione1', 5),
       (1, 'Opzione2', 8);
       -- Add more rows as needed;
