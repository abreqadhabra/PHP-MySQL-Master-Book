DROP TABLE member;
CREATE TABLE member (
    id         MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    last_name  VARCHAR(50),
    first_name VARCHAR(50),
    age        TINYINT UNSIGNED,
    PRIMARY KEY (id)
);
INSERT  INTO member (last_name, first_name, age) VALUES('田中','一郎', 21);
INSERT  INTO member (last_name, first_name, age) VALUES('山田','二郎', 18);
INSERT  INTO member (last_name, first_name, age) VALUES('林',  '三郎', 35);
INSERT  INTO member (last_name, first_name, age) VALUES('鈴木','四郎', 10);
INSERT  INTO member (last_name, first_name, age) VALUES('佐藤','五郎', 28);
