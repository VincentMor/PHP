CREATE TABLE utilisateur(login varchar(20) primary key,
                         mdp varchar(20),
                         role varchar(5)
                         nom varchar(20),
                         prenom varchar(20));
create table circuit (id int primary key auto_increment,nom varchar(30), typeDocument varchar(30));
create table listeEtape(idCircuit int,
                        login varchar(20),
                        constraint FK_CIRCUIT foreign key(idCircuit) references circuit(id),
                        constraint FK_UTILISATEUR foreign key(login) references utilisateur(login));
create table
insert into utilisateur values ('toto','toto','admin',"Jean","Bon");