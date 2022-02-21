drop table if exists platzbelegung;
create table platzbelegung (
  id int primary key AUTO_INCREMENT,
  zeit varchar(256),
  platz1 varchar(256),
  platz2 varchar(256),
  platz3 varchar(256),
  platz4 varchar(256),
  platz5 varchar(256),
  platz6 varchar(256),
  platz7 varchar(256),
  platz8 varchar(256),
  platz9 varchar(256)
);

insert into platzbelegung (zeit) values ('07:00-08:00');
insert into platzbelegung (zeit) values ('08:00-09:00');
insert into platzbelegung (zeit) values ('09:00-10:00');
insert into platzbelegung (zeit) values ('10:00-11:00');
insert into platzbelegung (zeit) values ('11:00-12:00');
insert into platzbelegung (zeit) values ('12:00-13:00');
insert into platzbelegung (zeit) values ('13:00-14:00');
insert into platzbelegung (zeit) values ('14:00-15:00');
insert into platzbelegung (zeit) values ('15:00-16:00');
insert into platzbelegung (zeit) values ('16:00-17:00');
insert into platzbelegung (zeit) values ('17:00-18:00');
insert into platzbelegung (zeit) values ('18:00-19:00');
insert into platzbelegung (zeit) values ('19:00-20:00');
insert into platzbelegung (zeit) values ('20:00-21:00');
insert into platzbelegung (zeit) values ('21:00-22:00');
insert into platzbelegung (zeit) values ('22:00-23:00');

update platzbelegung set platz1 = 'frei ?' where platz1 is NULL;
update platzbelegung set platz2 = 'frei ?' where platz2 is NULL;
update platzbelegung set platz3 = 'frei ?' where platz3 is NULL;
update platzbelegung set platz4 = 'frei ?' where platz4 is NULL;
update platzbelegung set platz5 = 'frei ?' where platz5 is NULL;
update platzbelegung set platz6 = 'frei ?' where platz6 is NULL;
update platzbelegung set platz7 = 'frei ?' where platz7 is NULL;
update platzbelegung set platz8 = 'frei ?' where platz8 is NULL;
update platzbelegung set platz9 = 'frei ?' where platz9 is NULL;
