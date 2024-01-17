-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator timestamp: Sep 14 2021              
-- * Generation timestamp: Mon Jan 15 15:37:02 2024 
-- * LUN file: C:\Users\chiar\Desktop\Chiara\uni\terzo_anno\tecnologie_web\progetto\PartyHub\doc\PartyHub.lun 
-- * Schema: SCHEMA/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database PartyHub;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 
use PartyHub;

create table Commento (
     idCommento int not null,
     DataOra timestamp not null,
     Testo varchar(255) not null,
     idPost int not null,
     UserCommento varchar(255) not null,
     constraint ID_Commento_ID primary key (idCommento));

create table Richiesta (
     UserPartecipante varchar(255) not null,
     idEvento int not null,
     idNotifica int not null,
     Accettata boolean not null,
     constraint ID_Richiesta_ID primary key (UserPartecipante, idEvento),
     constraint SID_Richi_Notif_ID unique (idNotifica));

create table Evento (
     idEvento int not null,
     Nome varchar(255) not null,
     Indirizzo varchar(255) not null,
     NumeroCivico int not null,
     Citta varchar(255) not null,
     Paese varchar(255) not null,
     Data date not null,
     Ora time not null,
     NumeroPartecipanti int not null,
     Organizzatore varchar(255) not null,
     Copertina varchar(255),
     constraint ID_Evento_ID primary key (idEvento));

create table MiPiace (
     UserMiPiace varchar(255) not null,
     idPost int not null);

create table Lista (
     idLista int not null,
     ImportoTotale float not null,
     idEvento int not null,
     constraint ID_Lista_ID primary key (idLista));

create table Notifica (
     idNotifica int not null,
     Tipo varchar(255) not null,
     Testo varchar(255) not null,
     UserInvio varchar(255) not null,
     UserRicevente varchar(255) not null,
     idPost int,
     constraint ID_Notifica_ID primary key (idNotifica));

create table Opzione (
     idSondaggio int not null,
     Nome varchar(255) not null,
     NumeroVoti int not null,
     constraint ID_Opzione_ID primary key (idSondaggio, Nome));

create table Post (
     idPost int not null,
     DataOra timestamp not null,
     Testo varchar(255),
     Immagine varchar(255),
     Personale boolean not null,
     NumeroLike int not null,
     NumeroCommenti int not null,
     Proprietario varchar(255) not null,
     constraint ID_Post_ID primary key (idPost));

create table Prodotto (
     idProdotto int not null,
     Nome varchar(255) not null,
     Prezzo float not null,
     idLista int not null,
     constraint ID_Prodotto_ID primary key (idProdotto));

create table Segui (
     Follower varchar(255) not null,
     Following varchar(255) not null,
     constraint ID_Segui_ID primary key (Follower, Following));

create table Sondaggio (
     idSondaggio int not null,
     idEvento int not null,
     constraint ID_Sondaggio_ID primary key (idSondaggio));

create table Utente (
     Nome varchar(255) not null,
     Cognome varchar(255) not null,
     Username varchar(255) not null,
     Password varchar(255) not null,
     Email varchar(255) not null,
     DataDiNascita timestamp not null,
     ImmagineProfilo varchar(255),
     constraint ID_Utente_ID primary key (Username));


-- Constraints Section
-- ___________________ 

alter table Commento add constraint REF_Comme_Post_FK
     foreign key (idPost)
     references Post(idPost);

alter table Commento add constraint REF_Comme_Utent_FK
     foreign key (UserCommento)
     references Utente(Username);

alter table Richiesta add constraint SID_Richi_Notif_FK
     foreign key (idNotifica)
     references Notifica(idNotifica);

alter table Richiesta add constraint REF_Richi_Event_FK
     foreign key (idEvento)
     references Evento(idEvento);

alter table Richiesta add constraint REF_Richi_Utent
     foreign key (UserPartecipante)
     references Utente(Username);

alter table Evento add constraint REF_Event_Utent_FK
     foreign key (Organizzatore)
     references Utente(Username);

alter table MiPiace add constraint REF_MiPia_Utent_FK
     foreign key (UserMiPiace)
     references Utente(Username);

alter table MiPiace add constraint REF_MiPia_Post_FK
     foreign key (idPost)
     references Post(idPost);

alter table Lista add constraint REF_Lista_Event_FK
     foreign key (idEvento)
     references Evento(idEvento);

alter table Notifica add constraint REF_Notif_Utent_1_FK
     foreign key (UserInvio)
     references Utente(Username);

alter table Notifica add constraint REF_Notif_Utent_FK
     foreign key (UserRicevente)
     references Utente(Username);

alter table Notifica add constraint REF_Notif_Post_FK
     foreign key (idPost)
     references Post(idPost);

alter table Opzione add constraint REF_Opzio_Sonda
     foreign key (idSondaggio)
     references Sondaggio(idSondaggio);

alter table Post add constraint REF_Post_Utent_FK
     foreign key (Proprietario)
     references Utente(Username);

alter table Prodotto add constraint REF_Prodo_Lista_FK
     foreign key (idLista)
     references Lista(idLista);

alter table Segui add constraint REF_Segui_Utent_1_FK
     foreign key (Following)
     references Utente(Username);

alter table Segui add constraint REF_Segui_Utent
     foreign key (Follower)
     references Utente(Username);

alter table Sondaggio add constraint REF_Sonda_Event_FK
     foreign key (idEvento)
     references Evento(idEvento);


-- Index Section
-- _____________ 

create unique index ID_Commento_IND
     on Commento (idCommento);

create index REF_Comme_Post_IND
     on Commento (idPost);

create index REF_Comme_Utent_IND
     on Commento (UserCommento);

create unique index ID_Richiesta_IND
     on Richiesta (UserPartecipante, idEvento);

create unique index SID_Richi_Notif_IND
     on Richiesta (idNotifica);

create index REF_Richi_Event_IND
     on Richiesta (idEvento);

create unique index ID_Evento_IND
     on Evento (idEvento);

create index REF_Event_Utent_IND
     on Evento (Organizzatore);

create index REF_MiPia_Utent_IND
     on MiPiace (UserMiPiace);

create index REF_MiPia_Post_IND
     on MiPiace (idPost);

create unique index ID_Lista_IND
     on Lista (idLista);

create index REF_Lista_Event_IND
     on Lista (idEvento);

create unique index ID_Notifica_IND
     on Notifica (idNotifica);

create index REF_Notif_Utent_1_IND
     on Notifica (UserInvio);

create index REF_Notif_Utent_IND
     on Notifica (UserRicevente);

create index REF_Notif_Post_IND
     on Notifica (idPost);

create unique index ID_Opzione_IND
     on Opzione (idSondaggio, Nome);

create unique index ID_Post_IND
     on Post (idPost);

create index REF_Post_Utent_IND
     on Post (Proprietario);

create unique index ID_Prodotto_IND
     on Prodotto (idProdotto);

create index REF_Prodo_Lista_IND
     on Prodotto (idLista);

create unique index ID_Segui_IND
     on Segui (Follower, Following);

create index REF_Segui_Utent_1_IND
     on Segui (Following);

create unique index ID_Sondaggio_IND
     on Sondaggio (idSondaggio);

create index REF_Sonda_Event_IND
     on Sondaggio (idEvento);

create unique index ID_Utente_IND
     on Utente (Username);

