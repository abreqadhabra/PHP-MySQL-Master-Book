CREATE SCHEMA 'sampledb' DEFAULT CHARACTER SET utf8 ;  -- 스키마(sampledb) 추가
CREATE user sample@localhost identified BY 'password'; -- 사용자(sample)를 추가하면서 패스워드까지 설정
FLUSH privileges; -- 변경된 내용을 메모리에 반영
GRANT ALL privileges ON sampledb.* TO sample@localhost; -- 사용자 권한 부여
FLUSH privileges; -- 변경된 내용을 메모리에 반영