CREATE TABLE subjects_version(
	subject CHAR(4),
	level CHAR(2),
	version INTEGER CHECK(0 <= version AND version <= 9999),
	name VARCHAR(20) NOT NULL,
	description VARCHAR(100) NULL,
	rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
	updt DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(subject, level, version)
);
