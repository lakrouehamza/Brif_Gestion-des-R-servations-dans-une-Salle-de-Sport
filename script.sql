drop table client ;
drop table activite;
drop table reservation;
-- CREATE DATABASE lakroune;
create table client(
id integer primary key AUTO_INCREMENT,
nom varchar(50) not null,
prenom varchar(50) not null,
email varchar(100) not null,
telephone varchar(10) not null 
); 
create table activite (
    id integer primary key auto_increment,
    nom varchar(50) not null,
    descriptionA text not null,
    capacite varchar(50) not null,
    date_debu date ,
    date_fin date,
    disponibilite tinyint  not null
);
create table reservation(
    id integer primary key auto_increment,
    id_client integer not null,
    id_activite integer not null,
    date_resevation date not null,
    statut varchar(30) not null,
    constraint FK_client foreign key(id_client) references client(id) on delete cascade on update cascade ,
    constraint FK_activite foreign key(id_activite) references activite(id)  on delete cascade on update cascade 
);
alter table client 
modify column  telephone varchar(12);


insert into  client(nom,prenom,email,telephone) values('hamza','lakroune','lakroune@gmail.com','0606060606')
                                                    ,('oussama','amou','amou2@gmail.com','0606060690'),
                                                    ('younasse','bens','younasse@gmail.com','0606060680'),
                                                    ('oussama','bennouja','lakroune@gmail.com','0606060606');
insert into activite(nom,descriptionA,capacite,date_debu,date_fin,disponibilite)
 values ('youga','Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi obcaecati, ','capacite1',now(),'20/10/2024',0),
        ('taicoindo','Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi obcaecati, ','capacite3',now(),'20/11/2026',1);
insert into  reservation(id_client,id_activite,date_resevation,statut)
 values(1,1,'01/01/2025','31/02/2025'),
        (1,2,'23/09/2025','03/12/2025'),
        (2,2,'23/09/2025','03/12/2025');

select * 
from client;

select nom ,descriptionA
from activite;

--  liste les nom  et prenom tout les client le  va fairs un reservation 
   --metode 1
select nom ,  prenom  
from client 
where id in (select id_client 
             from reservation 
             group by id_client );
    --metode 2
select c.nom ,c.prenom ,r.date_resevation
from client c,reservation r
where c.id = r.id_client
group by id_client ;
    -- métode 3
select c.nom ,c.prenom
from client c inner join reservation r   on c.id = r.id_client
group by id_client ;

--  le delete un line un client par id  -- id 3 
delete 
from client 
where id =3;

select * from client;

update client 
set email ='amou12@gmail'
where nom = 'oussama' and  prenom ='amou';
