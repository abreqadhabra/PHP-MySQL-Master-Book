DROP TABLE member;

CREATE TABLE member
(
  id         MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  last_name  VARCHAR(50),
  first_name VARCHAR(50),
  PRIMARY KEY (id)
);