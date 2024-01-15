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

create database SCHEMA;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table Commento (
     idCommento varchar(255) not null,
     DataOra timestamp not null,
     Testo varchar(255) not null,
     idPost varchar(255) not null,
     UserCommento varchar(255) not null,
     constraint ID_Commento_ID primary key (idCommento));

create table Richiesta (
     Username varchar(255) not null,
     idEvento varchar(255) not null,
     idNotifica varchar(255) not null,
     Accettata varchar not null,
     constraint ID_Richiesta_ID primary key (Username, idEvento),
     constraint SID_Richi_Notif_ID unique (idNotifica));

create table Evento (
     idEvento varchar(255) not null,
     Nome varchar(255) not null,
     Indirizzo varchar(255) not null,
     NumeroCivico int not null,
     Citta varchar(255) not null,
     Paese varchar(255) not null,
     DataOra timestamp not null,
     NumeroPartecipanti int not null,
     Organizzatore varchar(255) not null,
     constraint ID_Evento_ID primary key (idEvento));

create table MiPiace (
     UserMiPiace varchar(255) not null,
     idPost varchar(255) not null);

create table Lista (
     idLista varchar(255) not null,
     ImportoTotale float not null,
     idEvento varchar(255) not null,
     constraint ID_Lista_ID primary key (idLista));

create table Notifica (
     idNotifica varchar(255) not null,
     Tipo varchar(255) not null,
     Testo varchar(255) not null,
     UserInvio varchar(255) not null,
     UserRicevente varchar(255) not null,
     idPost varchar(255),
     constraint ID_Notifica_ID primary key (idNotifica));

create table Opzione (
     idSondaggio varchar(255) not null,
     Nome varchar(255) not null,
     NumeroVoti int not null,
     constraint ID_Opzione_ID primary key (idSondaggio, Nome));

create table Post (
     idPost varchar(255) not null,
     DataOra timestamp not null,
     Testo varchar(255),
     Immagine varchar(255),
     Personale varchar not null,
     NumeroLike int not null,
     NumeroCommenti int not null,
     Proprietario varchar(255) not null,
     constraint ID_Post_ID primary key (idPost));

create table Prodotto (
     idProdotto varchar(255) not null,
     Nome varchar(255) not null,
     Prezzo float not null,
     idLista varchar(255) not null,
     constraint ID_Prodotto_ID primary key (idProdotto));

create table Segui (
     Follower varchar(255) not null,
     Following varchar(255) not null,
     constraint ID_Segui_ID primary key (Follower, Following));

create table Sondaggio (
     idSondaggio varchar(255) not null,
     idEvento varchar(255) not null,
     constraint ID_Sondaggio_ID primary key (idSondaggio));

create table Utente (
     Nome varchar(255) not null,
     Cognome varchar(255) not null,
     Username varchar(255) not null,
     Password varchar(255) not null,
     Email varchar(255) not null,
     DataDiNascita timestamp not null,
     constraint ID_Utente_ID primary key (Username));


-- Constraints Section
-- ___________________ 

alter table Commento add constraint REF_Comme_Post_FK
     foreign key (idPost)
     references Post;

alter table Commento add constraint REF_Comme_Utent_FK
     foreign key (UserCommento)
     references Utente;

alter table Richiesta add constraint SID_Richi_Notif_FK
     foreign key (idNotifica)
     references Notifica;

alter table Richiesta add constraint REF_Richi_Event_FK
     foreign key (idEvento)
     references Evento;

alter table Richiesta add constraint REF_Richi_Utent
     foreign key (Username)
     references Utente;

alter table Evento add constraint REF_Event_Utent_FK
     foreign key (Organizzatore)
     references Utente;

alter table MiPiace add constraint REF_MiPia_Utent_FK
     foreign key (UserMiPiace)
     references Utente;

alter table MiPiace add constraint REF_MiPia_Post_FK
     foreign key (idPost)
     references Post;

alter table Lista add constraint REF_Lista_Event_FK
     foreign key (idEvento)
     references Evento;

alter table Notifica add constraint REF_Notif_Utent_1_FK
     foreign key (UserInvio)
     references Utente;

alter table Notifica add constraint REF_Notif_Utent_FK
     foreign key (UserRicevente)
     references Utente;

alter table Notifica add constraint REF_Notif_Post_FK
     foreign key (idPost)
     references Post;

alter table Opzione add constraint REF_Opzio_Sonda
     foreign key (idSondaggio)
     references Sondaggio;

alter table Post add constraint REF_Post_Utent_FK
     foreign key (Proprietario)
     references Utente;

alter table Prodotto add constraint REF_Prodo_Lista_FK
     foreign key (idLista)
     references Lista;

alter table Segui add constraint REF_Segui_Utent_1_FK
     foreign key (Following)
     references Utente;

alter table Segui add constraint REF_Segui_Utent
     foreign key (Follower)
     references Utente;

alter table Sondaggio add constraint REF_Sonda_Event_FK
     foreign key (idEvento)
     references Evento;


-- Index Section
-- _____________ 

create unique index ID_Commento_IND
     on Commento (idCommento);

create index REF_Comme_Post_IND
     on Commento (idPost);

create index REF_Comme_Utent_IND
     on Commento (UserCommento);

create unique index ID_Richiesta_IND
     on Richiesta (Username, idEvento);

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

