delimiter //
CREATE PROCEDURE get_subject_dataset(IN subject CHAR(4))
BEGIN
	SELECT s.subject, l.level, v.version, p.page
	FROM subjects s
	LEFT OUTER JOIN subjects_level l ON s.subject = l.subject
	LEFT OUTER JOIN subjects_version v ON l.level = v.level
	LEFT OUTER JOIN subjects_pages p ON v.version = p.version
	WHERE s.subject = subject;
END
//