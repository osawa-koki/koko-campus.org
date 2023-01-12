CREATE TABLE news_type(
	type INTEGER PRIMARY KEY CHECK(0 <= type AND type <= 10),
	description VARCHAR(100)
);
