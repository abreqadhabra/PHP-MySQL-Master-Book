DROP TABLE IF EXISTS member;

CREATE TABLE member
(
  id         MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
  username   VARCHAR(50),
  password   VARCHAR(128),
  last_name  VARCHAR(50),
  first_name VARCHAR(50),
  birthday   CHAR(8),
  prefecture SMALLINT,
  reg_date   DATETIME,
  cancel     DATETIME,
  PRIMARY KEY (id)
);

INSERT INTO member (username, password, last_name, first_name, birthday, prefecture, reg_date, cancel) VALUES
  ('user', '$2y$10$jUaIP/qDbBFIJFEPfd/W2ewsCIzoGPrbxCaHOdWjwQFUNRGoKT4DS', '고', '길동', '20130101', '1', now(), NULL);