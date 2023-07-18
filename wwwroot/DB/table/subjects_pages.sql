CREATE TABLE subjects_pages(
	subject CHAR(4),
	level CHAR(1),
	version INTEGER CHECK(0 <= version AND version <= 9999),
	page INTEGER CHECK(0 <= page AND page <= 100),
	title VARCHAR(30) NOT NULL,
	contents VARCHAR(10000) DEFAULT '',
	rgdt DATETIME DEFAULT CURRENT_TIMESTAMP,
	updt DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(subject, level, version, page)
);
