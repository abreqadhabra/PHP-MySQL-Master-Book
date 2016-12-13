DROP TABLE IF EXISTS system;
CREATE TABLE system (
    id          MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    username   	VARCHAR(50),
    password   	VARCHAR(128),
    PRIMARY KEY (id)
);

INSERT  INTO system (username, password) VALUES(  'system', '$2y$10$tUVR.YCXFVdyUeVABEYmqudPhEfHyfeK8YHVw9gg/1rN17ibTMfwq');

