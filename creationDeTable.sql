CREATE TABLE utilisateur(login varchar(20) primary key,
                         mdp varchar(20),
                         role varchar(5)
                         nom varchar(20),
                         prenom varchar(255));
create table circuit (id int primary key auto_increment,
                      nom varchar(30), 
                      typeDocument varchar(30));
create table listeEtape(idCircuit int,
                        idEtape int,
                        constraint FK_CIRCUIT foreign key(idCircuit) references circuit(id),
                        constraint FK_ETAPES foreign key(idEtape) references etape(id));
create table etape(id int primary key auto_increment,
                    nom varchar(20),
                    position int,
                    personne varchar(20),
                    constraint FK_UTILISATEUR foreign key(personne) references utilisateur(login));
create table document(id int primary key auto_increment,
                      idCircuit int,
                      positionactuelle int,
                      proprietaire varchar(20),
                      nom varchar(30),
                      constraint FK_CIRCUIT foreign key(idCircuit) references circuit(id),
                      constraint FK_PROPRIO foreign key(proprietaire) references utilisateur(login));
insert into utilisateur values ('toto','$2y$10$hyGUl/M5fiF361SOvQn1o.o6i02rsZ3tg4v5vJxAHVDuP7clgAHyu','admin',"Jean","Bon");