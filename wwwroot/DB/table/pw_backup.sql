CREATE TABLE pw_backup(
	date DATE,
	name VARCHAR(20) NOT NULL,
	keyword VARCHAR(20) NOT NULL,
	value VARCHAR(50) NOT NULL,
	INDEX pw_idx(date)
);
