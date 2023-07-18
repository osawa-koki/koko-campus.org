delimiter //
CREATE PROCEDURE get_subject_state(IN subject CHAR(4))
BEGIN
	SELECT l.level, vv.version, vv.page
	FROM subjects_level l
	INNER JOIN
	(
		SELECT MAX(v.version) AS version, v.level, pp.page AS page
		FROM subjects_version v
		INNER JOIN(
			SELECT MAX(p.page) AS page, p.version
			FROM subjects_pages p
		) AS pp
		ON v.version = pp.version
	) AS vv
	ON l.level = vv.level
	AND subject = subject;
END
//