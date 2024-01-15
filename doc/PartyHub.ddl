-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Mon Jan 15 12:56:46 2024 
-- * LUN file: C:\Users\chiar\Desktop\Chiara\uni\terzo_anno\tecnologie_web\progetto\PartyHub\doc\PartyHub.lun 
-- * Schema: PartyHub/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database PartyHub;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table Commento (
     idCommento char(255) not null,
     DataOra date not null,
     Testo char(255) not null,
     idPost char(255) not null,
     UsernameCommento char(255) not null,
     constraint ID_Commento_ID primary key (idCommento));

create table Evento (
     idEvento char(255) not null,
     Nome_ char(255) not null,
     Indirizzo char(255) not null,
     NumeroCivico numeric(1) not null,
     Citta char(255) not null,
     Paese char(255) not null,
     Data date not null,
     Privato char,
     NumeroPartecipanti numeric(1) not null,
     Organizzatore char(255) not null,
     constraint ID_Evento_ID primary key (idEvento));

create table MiPiace (
     UsernameMiPiace char(255) not null,
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
     UserMittente char(255) not null,
     idPost char(255),
     constraint ID_Notifica_ID primary key (idNotifica));

create table Opzione (
     idSondaggio char(255) not null,
     Nome char(255) not null,
     NumeroVoti numeric(1) not null,
     constraint ID_Opzione_ID primary key (idSondaggio, Nome));

create table Partecipa (
     idEvento char(255) not null,
     Username char(255) not null,
     constraint ID_Partecipa_ID primary key (idEvento, Username));

create table Post (
     idPost char(255) not null,
     DataOra date not null,
     Testo char(255),
     Immagine char(255),
     Personale char,
     Numer MiPiace numeric(1) not null,
     NumeroCommenti numeric(1) not null,
     idEvento char(255) not null,
     Proprietario char(255) not null,
     constraint ID_Post_ID primary key (idPost));

create table Prodotto (
     idProdotto char(255) not null,
     Nome char(255) not null,
     Prezzo float(1) not null,
     idLista char(255) not null,
     constraint ID_Prodotto_ID primary key (idProdotto));

create table Riceve (
     idNotifica char(255) not null,
     Username char(255) not null,
     constraint ID_Riceve_ID primary key (idNotifica, Username));

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
     foreign key (UsernameCommento)
     references Utente;

alter table Evento add constraint ID_Evento_CHK
     check(exists(select * from Partecipa
                  where Partecipa.idEvento = idEvento)); 

alter table Evento add constraint REF_Event_Utent_FK
     foreign key (Organizzatore)
     references Utente;

alter table MiPiace add constraint REF MiPiace_Utent_FK
     foreign key (Usernam MiPiace)
     references Utente;

alter table MiPiace add constraint REF MiPiace_Post_FK
     foreign key (idPost)
     references Post;

alter table Lista add constraint ID_Lista_CHK
     check(exists(select * from Prodotto
                  where Prodotto.idLista = idLista)); 

alter table Lista add constraint REF_Lista_Event_FK
     foreign key (idEvento)
     references Evento;

alter table Notifica add constraint ID_Notifica_CHK
     check(exists(select * from Riceve
                  where Riceve.idNotifica = idNotifica)); 

alter table Notifica add constraint REF_Notif_Utent_FK
     foreign key (UserMittente)
     references Utente;

alter table Notifica add constraint REF_Notif_Post_FK
     foreign key (idPost)
     references Post;

alter table Opzione add constraint EQU_Opzio_Sonda
     foreign key (idSondaggio)
     references Sondaggio;

alter table Partecipa add constraint REF_Parte_Utent_FK
     foreign key (Username)
     references Utente;

alter table Partecipa add constraint EQU_Parte_Event
     foreign key (idEvento)
     references Evento;

alter table Post add constraint REF_Post_Event_FK
     foreign key (idEvento)
     references Evento;

alter table Post add constraint REF_Post_Utent_FK
     foreign key (Proprietario)
     references Utente;

alter table Prodotto add constraint EQU_Prodo_Lista_FK
     foreign key (idLista)
     references Lista;

alter table Riceve add constraint REF_Ricev_Utent_FK
     foreign key (Username)
     references Utente;

alter table Riceve add constraint EQU_Ricev_Notif
     foreign key (idNotifica)
     references Notifica;

alter table Segui add constraint REF_Segui_Utent_1_FK
     foreign key (Following)
     references Utente;

alter table Segui add constraint REF_Segui_Utent
     foreign key (Follower)
     references Utente;

alter table Sondaggio add constraint ID_Sondaggio_CHK
     check(exists(select * from Opzione
                  where Opzione.idSondaggio = idSondaggio)); 

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
     on Commento (UsernameCommento);

create unique index ID_Evento_IND
     on Evento (idEvento);

create index REF_Event_Utent_IND
     on Evento (Organizzatore);

create index REF MiPiace_Utent_IND
     on MiPiace (Usernam MiPiace);

create index REF MiPiace_Post_IND
     on MiPiace (idPost);

create unique index ID_Lista_IND
     on Lista (idLista);

create index REF_Lista_Event_IND
     on Lista (idEvento);

create unique index ID_Notifica_IND
     on Notifica (idNotifica);

create index REF_Notif_Utent_IND
     on Notifica (UserMittente);

create index REF_Notif_Post_IND
     on Notifica (idPost);

create unique index ID_Opzione_IND
     on Opzione (idSondaggio, Nome);

create unique index ID_Partecipa_IND
     on Partecipa (idEvento, Username);

create index REF_Parte_Utent_IND
     on Partecipa (Username);

create unique index ID_Post_IND
     on Post (idPost);

create index REF_Post_Event_IND
     on Post (idEvento);

create index REF_Post_Utent_IND
     on Post (Proprietario);

create unique index ID_Prodotto_IND
     on Prodotto (idProdotto);

create index EQU_Prodo_Lista_IND
     on Prodotto (idLista);

create unique index ID_Riceve_IND
     on Riceve (idNotifica, Username);

create index REF_Ricev_Utent_IND
     on Riceve (Username);

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

