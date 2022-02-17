drop table if exists buchungen;
create table buchungen (
  id int primary key AUTO_INCREMENT,
  name varchar(256),
  vorname varchar(256),
  plz int,
  wohnort varchar(256),
  strasse varchar(256),
  telefon varchar(256),
  mitglied boolean
);

insert into buchungen (name, vorname, plz, wohnort, strasse, telefon, mitglied) values ('Allenstein', 'Ruben', '27568', 'Bremerhaven', 'Grazer Str. 1', '01520-1234567', 'true');
insert into buchungen (name, vorname, plz, wohnort, strasse, telefon, mitglied) values ('Allenstein', 'Ruben', '27568', 'Bremerhaven', 'Grazer Str. 1', '01520-1234567', 'true');
delete from buchungen where id='1';
