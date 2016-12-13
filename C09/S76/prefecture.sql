DROP TABLE IF EXISTS prefecture;

CREATE TABLE prefecture
(
  id         SMALLINT,
  prefecture VARCHAR(10),
  PRIMARY KEY (id)
);

INSERT INTO prefecture (id, prefecture) VALUES (1, '서울특별시');
INSERT INTO prefecture (id, prefecture) VALUES (2, '부산광역시');
INSERT INTO prefecture (id, prefecture) VALUES (3, '대구광역시');
INSERT INTO prefecture (id, prefecture) VALUES (4, '울산광역시');
INSERT INTO prefecture (id, prefecture) VALUES (5, '광주광역시');
INSERT INTO prefecture (id, prefecture) VALUES (6, '대전광역시');
INSERT INTO prefecture (id, prefecture) VALUES (7, '인천광역시');
INSERT INTO prefecture (id, prefecture) VALUES (8, '세종특별자치시');
INSERT INTO prefecture (id, prefecture) VALUES (9, '경기도');
INSERT INTO prefecture (id, prefecture) VALUES (10, '강원도');
INSERT INTO prefecture (id, prefecture) VALUES (11, '충청북도');
INSERT INTO prefecture (id, prefecture) VALUES (12, '충청남도');
INSERT INTO prefecture (id, prefecture) VALUES (13, '경상북도');
INSERT INTO prefecture (id, prefecture) VALUES (14, '경상남도');
INSERT INTO prefecture (id, prefecture) VALUES (15, '전라북도');
INSERT INTO prefecture (id, prefecture) VALUES (16, '전라남도');
INSERT INTO prefecture (id, prefecture) VALUES (17, '제주특별자치도');
INSERT INTO prefecture (id, prefecture) VALUES (18, '함경북도');
INSERT INTO prefecture (id, prefecture) VALUES (19, '함경남도');
INSERT INTO prefecture (id, prefecture) VALUES (20, '평안북도');
INSERT INTO prefecture (id, prefecture) VALUES (21, '평안남도');
INSERT INTO prefecture (id, prefecture) VALUES (22, '황해도');