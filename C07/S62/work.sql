DROP TABLE member;

CREATE TABLE member
(
  id         MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  last_name  VARCHAR(50),
  first_name VARCHAR(50),
  age        TINYINT UNSIGNED,
  PRIMARY KEY (id)
);

INSERT INTO member (last_name, first_name, age) VALUES ('고', '길동', 21);
INSERT INTO member (last_name, first_name, age) VALUES ('박', '희동', 18);
INSERT INTO member (last_name, first_name, age) VALUES ('고', '영희', 35);
INSERT INTO member (last_name, first_name, age) VALUES ('고', '철수', 10);
INSERT INTO member (last_name, first_name, age) VALUES ('박', '정자', 28);