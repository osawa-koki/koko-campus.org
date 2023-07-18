CREATE TABLE subjects_backup(
	date DATE NOT NULL,
	subject CHAR(4),
	level CHAR(1),
	version INTEGER CHECK(0 <= version AND version <= 9999),
	page INTEGER CHECK(0 <= page AND page <= 100),
	contents VARCHAR(10000) DEFAULT '',
	INDEX idx_1(date)
);
