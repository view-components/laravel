DROP DATABASE IF EXISTS pf_laravel_demo;
CREATE DATABASE IF NOT EXISTS pf_laravel_demo;
USE pf_laravel_demo;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
  id int(10) NOT NULL,
  name varchar(255) NOT NULL,
  role varchar(31) NOT NULL,
  birthday date NOT NULL,
  PRIMARY KEY (id)
);

DELETE FROM users;

INSERT INTO users VALUES (1, 'John', 'Admin', '1970-01-16');
INSERT INTO users VALUES (2, 'Max', 'Manager', '1980-11-20');
INSERT INTO users VALUES (3, 'Anna', 'Manager', '1987-03-30');
INSERT INTO users VALUES (4, 'Lisa', 'User', '1989-04-21');
INSERT INTO users VALUES (5, 'Eric', 'User', '1990-10-23');

INSERT INTO users VALUES (6, 'David', 'User', '1990-10-23');
INSERT INTO users VALUES (7, 'Bruce', 'User', '1977-09-14');
INSERT INTO users VALUES (8, 'Julia', 'User', '1994-03-05');
INSERT INTO users VALUES (9, 'Ben', 'User', '1991-11-13');
INSERT INTO users VALUES (10, 'Frank', 'Manager', '1964-10-29');
INSERT INTO users VALUES (11, 'Phil', 'User', '1972-08-17');
INSERT INTO users VALUES (12, 'Nikita', 'User', '1973-04-17');
INSERT INTO users VALUES (13, 'Steven', 'User', '1983-03-21');
INSERT INTO users VALUES (14, 'Ross', 'User', '1982-07-14');
INSERT INTO users VALUES (15, 'Sammy', 'User', '1982-07-24');

INSERT INTO users VALUES (16, 'Victor', 'User', '1979-01-23');
INSERT INTO users VALUES (17, 'Martin', 'Manager', '2001-01-04');
INSERT INTO users VALUES (18, 'Florin', 'User', '2002-06-06');
INSERT INTO users VALUES (19, 'Diego', 'User', '1987-05-11');
INSERT INTO users VALUES (20, 'Robert', 'Admin', '1984-02-01');
INSERT INTO users VALUES (21, 'Peter', 'User', '1994-05-12');
INSERT INTO users VALUES (22, 'Sebastian', 'User', '1991-11-16');
INSERT INTO users VALUES (23, 'Rafael', 'User', '1993-05-04');