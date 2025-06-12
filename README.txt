
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

alter database kpc CHARACTER SET=utf8mb4 COLLATE=utf8mb4_unicㅠㅠode_ci;
alter table kpc CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


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

================================================
이 코드를 수정해서

로그인 기능을 만들고 싶어.
navbar메뉴 밑에 로그인 여부에 따라서 다음과 같이 구성해 줘.
로그인이 된 경우 :
    홍길동님 <로그아웃 버튼>
로그인이 안된 경우 :
    ID, PW를 입력받는 입력창 <로그인버튼>
    ID 의 name = name으로 설정
    PW 의 name = pass로 설정

로그인 버튼을 누르면 : index.php?cmd=login로 이동해서 처리
로그아웃 버튼을 누르면 : index.php?cmd=logout으로 이동해서 처리

세션을 확인하기 위해 sess 폴더에서 모든 세션을 저장하고 싶어.

여기에다가 site정보를 표시할 때, 본문의 내용이 짧아도, 화면의 맨 아래에 배치하고 싶어.

=======================================================

db에 접속하기 위한 코드를 작성할 거야.
index.php의 시작에 

include "db.php";

$conn = connectDB();

와 같이 포함시키고 connectDB()를 호출할건데,
connectDB()는 db.php에 정의해 줘.

db name : kpc
db user : kpc
db pass : 1111

mysqli()를 이용해 객체를 생성하고,
접속이 되면 $conn를 리턴하도록 해 줘.


============================================

CREATE TABLE users (
    idx INT AUTO_INCREMENT PRIMARY KEY,
    id CHAR(20) UNIQUE NOT NULL,
    pass CHAR(50) NOT NULL,
    name CHAR(20) NOT NULL
);

이렇게 생긴 users 테이블과 비교해 로그인을 시도하는 코드를
login.php에서 처리하고 싶어.

로그인이 성공하면 세션에 저장하고, 
alert('성공했습니다.')라고 보여주고, 첫페이지로 이동(index.php)

실패한 경우에는 alert('아이디와 비번을 확인하세요')를 보여주고 첫페이지로 이동

DB와 쿼리할때는 mysqli_query()를 이용해 줘.
