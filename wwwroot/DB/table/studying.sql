CREATE TABLE studying(
	student CHAR(16),
	subject CHAR(4),
	progress INTEGER DEFAULT 0 CHECK(0 <= progress AND progress <= 100),
	comment VARCHAR(100) NULL,
	rgdt DATE DEFAULT CURRENT_TIMESTAMP,
	updt DATE DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(student, subject)
);