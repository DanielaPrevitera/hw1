Create DATABASE hw1;
USE hw1;

CREATE TABLE users (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null,
    propic varchar(255)
) Engine = InnoDB;

CREATE TABLE attori (
    id integer primary key auto_increment,
    persona varchar(255),
    user_id integer,
    content json
) Engine = InnoDB;

CREATE TABLE serie (
    id integer primary key auto_increment,
    titolo varchar(255),
    user_id integer,
    content json
) Engine = InnoDB;
