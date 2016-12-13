CREATE TABLE notice
(
  id       MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  subject  VARCHAR(256),
  body     TEXT,
  reg_date DATETIME,
  PRIMARY KEY (id)
);

INSERT INTO notice (subject, body, reg_date) VALUES ('공지사항', '본문', NOW());