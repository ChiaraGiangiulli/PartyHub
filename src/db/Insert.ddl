
INSERT INTO `commento` (`idCommento`, `DataOra`, `Testo`, `idPost`, `UserCommento`) VALUES
(1, '0000-00-00 00:00:00', 'Buon anno!', 18, 'User2'),
(2, '0000-00-00 00:00:00', 'Buon anno<3', 19, 'chiag');


INSERT INTO `evento` (`idEvento`, `Nome`, `Indirizzo`, `NumeroCivico`, `Citta`, `Paese`, `Data`, `Ora`, `NumeroPartecipanti`, `Organizzatore`, `Copertina`) VALUES
(1, 'Party1', '123 Main St', 42, 'City1', 'Country1', '2024-01-20', '18:00:00', 1, 'User1', 'party1.jpg'),
(2, 'Concert2', '456 Broadway', 101, 'City2', 'Country2', '2024-02-15', '20:30:00', 2, 'User2', 'party17.jpg'),
(3, 'Capodanno2k25', 'Via Degli Alberi', 13, 'City3', 'Italy', '2025-01-01', '19:00:00', 2, 'User2', 'party2.jpg'),
(4, 'FestaTraAmici', 'Via Patate', 1, 'Cesena', 'Italy', '2024-01-20', '20:30:00', 3, 'User1', 'party4.jpg'),
(5, 'Magico', 'Via Dante Alighieri', 3, 'Montesilvano', 'Italy', '2024-04-23', '23:55:00', 2, 'chiag', 'party3.jpg'),
(7, 'Sunset', 'Via Colle', 1, 'Cesena', 'Italy', '2024-01-30', '21:00:00', 1, 'User2', 'party14.jpg'),
(11, 'GrandeEvento', 'Via Bella', 7, 'Bologna', 'Italy', '2024-01-29', '12:12:00', 1, 'seba_seijas', 'party8.jpg');


INSERT INTO `lista` (`idLista`, `ImportoTotale`, `idEvento`) VALUES
(1, 57.59, 3),
(2, 17.5, 4);


INSERT INTO `mipiace` (`UserMiPiace`, `idPost`) VALUES
('User1', 5),
('User2', 7),
('chiag', 18),
('chiag', 5),
('chiag', 19);


INSERT INTO `notifica` (`idNotifica`, `Tipo`, `Testo`, `UserInvio`, `UserRicevente`, `idPost`, `Vista`) VALUES
(1, 'Follow', 'ha iniziato a seguirti', 'chiag', 'User1', NULL, 1),
(2, 'Follow', 'ha iniziato a seguirti', 'chiag', 'User2', NULL, 1),
(3, 'Follow', 'ha iniziato a seguirti', 'chiag', 'seba_seijas', NULL, 1),
(4, 'Follow', 'ha iniziato a seguirti', 'seba_seijas', 'chiag', NULL, 1),
(5, 'Follow', 'ha iniziato a seguirti', 'seba_seijas', 'User1', NULL, 1),
(6, 'Follow', 'ha iniziato a seguirti', 'seba_seijas', 'User2', NULL, 1),
(7, 'Follow', 'ha iniziato a seguirti', 'User2', 'chiag', NULL, 1),
(8, 'Follow', 'ha iniziato a seguirti', 'User2', 'seba_seijas', NULL, 1),
(9, 'Follow', 'ha iniziato a seguirti', 'User1', 'seba_seijas', NULL, 1),
(10, 'Follow', 'ha iniziato a seguirti', 'User1', 'chiag', NULL, 1),
(11, 'Like', 'ha messo like al tuo post: Bel post', 'User1', 'chiag', 5, 1),
(12, 'Commento', 'ha commentato il tuo post: Bellissimo', 'User2', 'seba_seijas', 18, 1),
(13, 'Like', 'ha messo like al tuo post: Post', 'User2', 'seba_seijas', 7, 1),
(14, 'Richiesta Partecipazione Evento', 'vuole partecipare al tuo evento: FestaTraAmici', 'User2', 'User1', NULL, 1),
(15, 'Like', 'ha messo like al tuo post: Bellissimo', 'chiag', 'seba_seijas', 18, 1),
(16, 'Richiesta Partecipazione Evento', 'vuole partecipare al tuo evento: Capodanno2k25', 'seba_seijas', 'User2', NULL, 1),
(17, 'Richiesta Partecipazione Evento', 'vuole partecipare al tuo evento: Concert2', 'seba_seijas', 'User2', NULL, 1),
(18, 'Richiesta Accettata', 'ha accettato la tua richiesta di partecipazione all\'evento: FestaTraAmici', 'User1', 'User2', NULL, 1),
(19, 'Richiesta Partecipazione Evento', 'vuole partecipare al tuo evento: Capodanno2k25', 'seba_seijas', 'User2', NULL, 1),
(20, 'Richiesta Partecipazione Evento', 'vuole partecipare al tuo evento: Capodanno2k25', 'seba_seijas', 'User2', NULL, 1),
(21, 'Richiesta Partecipazione Evento', 'vuole partecipare al tuo evento: Concert2', 'seba_seijas', 'User2', NULL, 1),
(22, 'Richiesta Accettata', 'ha accettato la tua richiesta di partecipazione all\'evento: Concert2', 'User2', 'seba_seijas', NULL, 0),
(23, 'Richiesta Accettata', 'ha accettato la tua richiesta di partecipazione all\'evento: Capodanno2k25', 'User2', 'seba_seijas', NULL, 0),
(24, 'Richiesta Partecipazione Evento', 'vuole partecipare al tuo evento: Magico', 'User2', 'chiag', NULL, 1),
(25, 'Richiesta Accettata', 'ha accettato la tua richiesta di partecipazione all\'evento: Magico', 'chiag', 'User2', NULL, 1),
(26, 'Richiesta Partecipazione Evento', 'vuole partecipare al tuo evento: FestaTraAmici', 'chiag', 'User1', NULL, 1),
(27, 'Richiesta Accettata', 'ha accettato la tua richiesta di partecipazione all\'evento: FestaTraAmici', 'User1', 'chiag', NULL, 1),
(28, 'Like', 'ha messo like al tuo post: Bel post', 'chiag', 'chiag', 5, 1),
(29, 'Like', 'ha messo like al tuo post: Buon anno', 'chiag', 'User2', 19, 0),
(30, 'Commento', 'ha commentato il tuo post: Buon anno', 'chiag', 'User2', 19, 0),
(31, 'Follow', 'ha iniziato a seguirti', 'chiag', 'seba_seijas', NULL, 0);


INSERT INTO `opzione` (`idSondaggio`, `Nome`, `NumeroVoti`) VALUES
(1, 'aranciata', 0),
(1, 'birra', 0),
(1, 'the', 0),
(1, 'vino', 1),
(2, 'country', 1),
(2, 'pop', 0),
(2, 'rock', 0);


INSERT INTO `post` (`idPost`, `DataOra`, `Testo`, `Immagine`, `Personale`, `NumeroLike`, `NumeroCommenti`, `Proprietario`, `idEvento`) VALUES
(1, '2024-01-29 07:54:46', 'Hello World!', NULL, 1, 0, 0, 'User1', 1),
(2, '2024-01-29 07:54:54', 'Another post', NULL, 0, 0, 0, 'User2', 2),
(3, '2024-01-31 16:17:41', 'Textttt', 'party10.jpg', 1, 0, 0, 'User2', 4),
(4, '2024-01-31 15:32:44', 'Wow', 'party7.jpg', 1, 0, 0, 'User2', 3),
(5, '2024-02-02 11:40:20', 'Bel post', 'party15.jpg', 1, 2, 0, 'chiag', 5),
(7, '2024-01-31 14:09:10', 'Post', 'party12.jpg', 1, 1, 0, 'seba_seijas', 2),
(8, '2024-01-31 09:44:55', 'Happy', 'party13.jpg', 1, 0, 0, 'User2', 2),
(9, '0000-00-00 00:00:00', 'Cosa compro?', NULL, 0, 0, 0, 'seba_seijas', 11),
(10, '0000-00-00 00:00:00', 'Allergie?', NULL, 0, 0, 0, 'chiag', 5),
(11, '0000-00-00 00:00:00', 'Compriamo le patatine?', NULL, 0, 0, 0, 'chiag', 5),
(18, '2024-02-02 11:37:52', 'Bellissimo', 'party6.jpg', 1, 1, 1, 'seba_seijas', 3),
(19, '0000-00-00 00:00:00', 'Buon anno', 'party11.jpg', 1, 1, 1, 'User2', 3),
(20, '0000-00-00 00:00:00', 'Che musica ascoltate?', NULL, 0, 0, 0, 'User2', 5),
(21, '2024-02-02 12:03:09', 'Compriamo l\'uva?', NULL, 0, 0, 0, 'User2', 3),
(22, '2024-02-02 12:06:55', 'Avete posti letto?', NULL, 0, 0, 0, 'chiag', 4);


INSERT INTO `prodotto` (`idProdotto`, `Nome`, `Prezzo`, `idLista`) VALUES
(1, 'lenticchie', 10.3, 1),
(2, 'spumante', 30.4, 1),
(3, 'cotechino', 16.89, 1),
(4, 'lanterne', 14.8, 2),
(5, 'patatine', 2.7, 2);


INSERT INTO `richiesta` (`UserPartecipante`, `idEvento`, `idNotifica`, `Accettata`) VALUES
('chiag', 4, 26, 1),
('seba_seijas', 2, 17, 1),
('seba_seijas', 3, 16, 1),
('User2', 4, 14, 1),
('User2', 5, 24, 1);


INSERT INTO `segui` (`Follower`, `Following`) VALUES
('chiag', 'seba_seijas'),
('chiag', 'User1'),
('chiag', 'User2'),
('seba_seijas', 'chiag'),
('seba_seijas', 'User1'),
('seba_seijas', 'User2'),
('User1', 'chiag'),
('User1', 'seba_seijas'),
('User2', 'chiag'),
('User2', 'seba_seijas');


INSERT INTO `sondaggio` (`idSondaggio`, `idEvento`) VALUES
(2, 4),
(1, 5);


INSERT INTO `utente` (`Nome`, `Cognome`, `Username`, `Password`, `Email`, `DataDiNascita`, `ImmagineProfilo`) VALUES
('Chiara', 'Giangiulli', 'chiag', '$2y$10$2IZCzgYyLr7ytmQEQWvmsewTqYhlBFuv.En7WqavJs0c85hX1.Yne', 'chiara.giangiulli@email.com', '2002-03-25', 'profile6.jpg'),
('Seba', 'Seijas', 'seba_seijas', '$2y$10$6Sx1NTP7GRrVVbOvImr0Q.Ng4sL3bXq8DMc5fxiNbCnocZDHjsfwC', 'seba.seijas@email.com', '2001-07-23', 'profile5.jpg'),
('John', 'Doe', 'User1', '$2y$10$vnW4sLCYg0x/jV/kJ0f9oOtpFAHSW4I7SIXTvEi.Sh08gots7xXJi', 'user1@email.com', '1988-02-18', 'profile3.jpg'),
('Jane', 'Doe', 'User2', '$2y$10$gJ8Rduj4gG4bF.YZl.dVduENLcnTuA9CRmFXJTK/lbYU0M7Yxtnbe', 'user2@email.com', '2024-02-02', 'profile1.jpg');

