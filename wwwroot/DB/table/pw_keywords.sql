CREATE TABLE pw_keywords(
	name VARCHAR(20),
	keyword VARCHAR(20),
	value VARCHAR(50) NOT NULL,
	PRIMARY KEY(name, keyword)
);
