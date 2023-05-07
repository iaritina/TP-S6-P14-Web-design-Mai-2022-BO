CREATE DATABASE miniprojet_wd;
ALTER DATABASE miniprojet_wd OWNER TO mrrojo;

psql -U mrrojo miniprojet_wd

drop owned by mrrojo;

create table users(
    id serial primary key,
    name varchar(255) not null,
    email varchar(255) unique not null,
    password varchar(255) not null
);


create table content(
    idcont serial primary key,
    title varchar(255) not null,
    summary text not null,
    description text ,
    date_redaction date default now()
);
insert into content(title,summary,description) values('test','test','test');