DROP TABLE IF EXISTS notice;
CREATE TABLE notice (
    id          MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    subject   	VARCHAR(256),
    body   	TEXT,
    reg_date   	DATETIME,
    PRIMARY KEY (id)
);

INSERT  INTO notice (subject, body, reg_date )  VALUES('会員向けお知らせ',   '会員向け本文',   now() );
