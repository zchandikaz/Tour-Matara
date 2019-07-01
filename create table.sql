DROP DATABASE tourmatara;
CREATE DATABASE tourmatara;
use tourmatara;
CREATE TABLE forum(
	indexno INT AUTO_INCREMENT,
	text VARCHAR(1000),
	name VARCHAR(100),
	email VARCHAR(100),
	date VARCHAR(10),
	time VARCHAR(11),
	PRIMARY KEY(indexno)
);
CREATE TABLE forumreply(
	indexno INT AUTO_INCREMENT,
	forumindexno INT,
	text VARCHAR(1000),
	name VARCHAR(100),
	email VARCHAR(100),
	date VARCHAR(10),
	time VARCHAR(11),
	PRIMARY KEY(indexno),
	INDEX (forumindexno),
	FOREIGN KEY (forumindexno)
		REFERENCES forum(indexno)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
);

