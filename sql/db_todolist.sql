create database to_do_list;

use to_do_list;

create table achievments (
    achId INT not null PRIMARY KEY AUTO_INCREMENT,
    achName varchar(36) not null
    );
create table users (
    usersId INT not null PRIMARY KEY AUTO_INCREMENT,
    usersFirstname VARCHAR(36) not null,
    usersLastname VARCHAR(36) not null,
    usersBirth_date DATE null,
    usersUsername VARCHAR(36) not null,
    usersPass_hash VARCHAR(36) not null
    );
create table user_achievments (
    auId INT not null PRIMARY KEY AUTO_INCREMENT,
    auUserid int not null references users(usersId),
    auAchievmentid int not null references achievments(achId)
    );
create table importence (
    imId INT not null PRIMARY KEY AUTO_INCREMENT,
    imName varchar(36) 
    );
create table tasks (
    taskId INT not null PRIMARY KEY AUTO_INCREMENT,
    taskName VARCHAR(36) not null,
    taskDate datetime not null,
    taskImportence int not null references importence(imId),
    taskFinished boolean not null
    );
    create table user_tasks (
    utId INT not null PRIMARY KEY AUTO_INCREMENT,
    utUserid int not null references users(usersId),
    utTaskid int not null references task(taskId)
    );