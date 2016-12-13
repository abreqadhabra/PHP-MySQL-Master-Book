DROP TABLE IF EXISTS premember;
CREATE TABLE premember (
    id          MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    username   	VARCHAR(50),
    password   	VARCHAR(128),
    last_name  	VARCHAR(50),
    first_name 	VARCHAR(50),
    birthday   	CHAR(8),
    ken         SMALLINT,
    link_pass  	VARCHAR(128),
    reg_date   	DATETIME,
    PRIMARY KEY (id)
);
