
다음 사이트에 접속하면, 강사PC와 동기화된 최신
정보를 바로 확인가능합니다.

https://github.com/eurekasolution/sec25

사이트 접속
http://localhost

DB 접속
http://localhost/phpmyadmin

비밀번호 취약점(266쪽)
https:///www.security.org/how-secure-is-my-password/

w3schools.com


회원정보를 위한 users 테이블 mariadb로 만들고 싶어.
다음과 같은 형태면 좋겠어.

idx : primary key, auto increment,
id : char(20) unique,
pass : char(50),
name : char(20)

CREATE TABLE users (
    idx INT AUTO_INCREMENT PRIMARY KEY,
    id CHAR(20) UNIQUE NOT NULL,
    pass CHAR(50) NOT NULL,
    name CHAR(20) NOT NULL
);


insert into users (id, pass, name) values ('admin', 'abcd', '관리자');
insert into users (id, pass, name) values ('test', 'abcd', '테스트');

PHP를 이용해서 홈페이지를 만들고 싶어.
HTML5와 Bootstrap5를 이용해 반응형으로 만들건데, 다음 조건에 맞게 코드를 작성해 줘.

상단에는 navbar를 이용해 메뉴를 구성할거야.
메뉴1 : 메뉴1-1, 메뉴1-2, 메뉴1-3 이 있고
메뉴2 : 메뉴2-1, 메뉴2-2로 구성되어 있어.

모든 코드는 index.php파일을 통과하도록 할 건데,
예를 들어

index.php?cmd=test 와 같이 cmd값이 오면
test.php를 include하도록 코드를 구성할 거야.
만약 index.php와 같이 cmd값이 없으면,
init.php 파일을 include 하도록 해줘.
화면 하단에는 사이트정보가 있는데
내용에는 "한국생산성본부 보안 강의"
라고 출력해 줘.

이를 만족하는 index.php 파일을 하나 만들어 줘.