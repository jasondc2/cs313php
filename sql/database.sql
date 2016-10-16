CREATE TABLE class (
	id	SERIAL PRIMARY KEY,
	name	TEXT	NOT NULL,
	grade	INT		NOT NULL);

CREATE TABLE date (
	id	SERIAL PRIMARY KEY,
	due	DATE	NOT NULL,
	start	DATE 	NOT NULL,
	complete	DATE	NOT NULL);

CREATE TABLE grade (
	id	SERIAL	PRIMARY KEY,
	expected	INTEGER	NOT NULL,
	received	INTEGER	NOT NULL);

CREATE TABLE time (
	id	SERIAL	PRIMARY KEY,
	expected	INTEGER	NOT NULL,
	actual	INTEGER	NOT NULL);

CREATE TABLE assignment (
	id	SERIAL	PRIMARY KEY NOT NULL,
	class_id	SERIAL	REFERENCES class(id) NOT NULL,
	date_id		SERIAL	REFERENCES date(id) NOT NULL,
	grade_id	SERIAL	REFERENCES grade(id) NOT NULL,
	time_id		SERIAL	REFERENCES time(id) NOT NULL);

INSERT INTO class (name, grade)
	VALUES('CS 313', 96);

INSERT INTO date (due, start, complete)
	VALUES(10/15/2016, 10/13/2016, 10/14/2016);

INSERT INTO grade (expected, received)
	VALUES(100, 95);

INSERT INTO	time (expected, actual)
	VALUES(4, 5);