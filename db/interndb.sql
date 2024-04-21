CREATE DATABASE interndb;

USE interndb;

CREATE TABLE admin(
	id int not null primary key auto_increment,
    username varchar(30) not null unique,
    password varchar(20) not null,
    firstname varchar(20) not null,
    lastname varchar(20) not null
)engine=InnoDB;

CREATE TABLE departement(
	id int not null primary key auto_increment,
    name varchar(30) not null,
    idadmin int not null,
    constraint fk_admin foreign key (idadmin) references admin(id) on delete restrict on update cascade
)engine=InnoDB;

CREATE TABLE intern(
	id int not null primary key auto_increment ,
	firstname varchar(20) not null,
    lastname varchar(20) not null,
    birthday date
)engine=InnoDB;

CREATE TABLE internship(
	iddep int not null ,
	idintern int not null ,
	idadmin int not null ,
	startsAt date,
    endsAt date,
    constraint pk_internship primary key(iddep, idintern, idadmin),
	constraint fk_departement foreign key (iddep) references departement(id) on delete restrict on update cascade,
    constraint fk_admin_internship foreign key (idadmin) references admin(id) on delete restrict on update cascade,
    constraint fk_intern foreign key (idintern) references intern(id) on delete restrict on update cascade
)engine=InnoDB;

