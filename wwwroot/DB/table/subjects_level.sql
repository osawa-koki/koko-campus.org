CREATE TABLE subjects_level(
	subject CHAR(4),
	level CHAR(1),
	comment VARCHAR(100) NULL,
	rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
	updt DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(subject, level)
);