-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Mon Jan 15 15:37:02 2024 
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
     idCommento char(255) not null,
     DataOra date not null,
     Testo char(255) not null,
     idPost char(255) not null,
     UserCommento char(255) not null,
     constraint ID_Commento_ID primary key (idCommento));

create table Richiesta (
     Username char(255) not null,
     idEvento char(255) not null,
     idNotifica char(255) not null,
     Accettata char not null,
     constraint ID_Richiesta_ID primary key (Username, idEvento),
     constraint SID_Richi_Notif_ID unique (idNotifica));

create table Evento (
     idEvento char(255) not null,
     Nome char(255) not null,
     Indirizzo char(255) not null,
     NumeroCivico numeric(1) not null,
     Citta char(255) not null,
     Paese char(255) not null,
     DataOra date not null,
     NumeroPartecipanti numeric(1) not null,
     Organizzatore char(255) not null,
     constraint ID_Evento_ID primary key (idEvento));

create table MiPiace (
     UserMiPiace char(255) not null,
     idPost char(255) not null);

create table Lista (
     idLista char(255) not null,
     ImportoTotale float(1) not null,
     idEvento char(255) not null,
     constraint ID_Lista_ID primary key (idLista));

create table Notifica (
     idNotifica char(255) not null,
     Tipo char(255) not null,
     Testo char(255) not null,
     UserInvio char(255) not null,
     UserRicevente char(255) not null,
     idPost char(255),
     constraint ID_Notifica_ID primary key (idNotifica));

create table Opzione (
     idSondaggio char(255) not null,
     Nome char(255) not null,
     NumeroVoti numeric(1) not null,
     constraint ID_Opzione_ID primary key (idSondaggio, Nome));

create table Post (
     idPost char(255) not null,
     DataOra date not null,
     Testo char(255),
     Immagine char(255),
     Personale char not null,
     NumeroLike numeric(1) not null,
     NumeroCommenti numeric(1) not null,
     Proprietario char(255) not null,
     constraint ID_Post_ID primary key (idPost));

create table Prodotto (
     idProdotto char(255) not null,
     Nome char(255) not null,
     Prezzo float(1) not null,
     idLista char(255) not null,
     constraint ID_Prodotto_ID primary key (idProdotto));

create table Segui (
     Follower char(255) not null,
     Following char(255) not null,
     constraint ID_Segui_ID primary key (Follower, Following));

create table Sondaggio (
     idSondaggio char(255) not null,
     idEvento char(255) not null,
     constraint ID_Sondaggio_ID primary key (idSondaggio));

create table Utente (
     Nome char(255) not null,
     Cognome char(255) not null,
     Username char(255) not null,
     Password char(255) not null,
     Email char(255) not null,
     DataDiNascita date not null,
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

