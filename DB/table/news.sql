CREATE TABLE news(
	date DATE NOT NULL,
	title VARCHAR(50) NOT NULL,
	type INTEGER CHECK(0 <= type AND type <= 10),
	url VARCHAR(100) NULL,
	contents VARCHAR(500) NULL,
	INDEX dt_idx(dt)
);
