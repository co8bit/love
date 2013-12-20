/*创建用户及对应数据库，用户对对应的数据库享有所有权限*/
CREATE USER 'love'@'localhost' IDENTIFIED BY "love1314";/*用户名love，密码love1314*/
GRANT USAGE ON * . * TO 'love'@'localhost' IDENTIFIED BY "love1314" WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
CREATE DATABASE IF NOT EXISTS `love` ;
GRANT ALL PRIVILEGES ON `love` . * TO 'love'@'localhost';

/*使用数据库love*/
use love;

/*创建表*/
create table user(
	/*账户本身信息*/
	userId bigint NOT NULL AUTO_INCREMENT,
	userName varchar(100) NOT NULL,/*TODO：主键或者唯一*/
	userPassword varchar(100) NOT NULL,
	userPower varchar(100) NOT NULL,
	primary key(userId),
	
	/*匹配信息*/
	pairId bigint NOT NULL,
	pairUserId bigint NOT NULL,
	moodValue varchar(100)/*这里存的是对方的心情*/
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert user values(NULL,"wbx","wbx","11111111",1,2,"未设置");
insert user values(NULL,"lxz","lxz","11111111",1,1,"未设置");
insert user(userName,userPassword,userPower,moodValue) values("ldm","ldm","00000000","未设置");
insert user(userName,userPassword,userPower,moodValue) values("djm","djm","00000000","未设置");

create table pair(
	pairId bigint NOT NULL AUTO_INCREMENT,
	user1Id bigint NOT NULL,
	user2Id bigint NOT NULL,
	pairDate datetime,
	money bigint,
	lowId bigint,
	billContent LONGTEXT,/*存着数据如billId.分隔符.billId……*/
	primary key(pairId)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert pair values(NULL,1,2,"2013-12-18 00:00:00",100,1,NULL);/*lowId在创建的时候需要在low里插入一个新的记录，内容是拷贝lowId=1的内容*/

create table tempPair(
	tempPairId bigint NOT NULL AUTO_INCREMENT,
	userStartId bigint NOT NULL,
	userEndId bigint NOT NULL,
	remark varchar(100),
	pairDate datetime,
	primary key(tempPairId)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

create table low(
	lowId bigint NOT NULL AUTO_INCREMENT,
	content LONGTEXT,
	score LONGTEXT,
	primary key(lowId)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert low values (NULL,"一起去学习","5");
UPDATE `love`.`low` SET `content` = '一起去自习@#$%^&*&^%$#@!$(&&$%^一起去吃饭@#$%^&*&^%$#@!$(&&$%^每天打电话@#$%^&*&^%$#@!$(&&$%^打电话超过一个小时@#$%^&*&^%$#@!$(&&$%^发短信慢@#$%^&*&^%$#@!$(&&$%^有话说@#$%^&*&^%$#@!$(&&$%^一起学英语@#$%^&*&^%$#@!$(&&$%^不凶对方' WHERE `low`.`lowId` =1;
UPDATE `love`.`low` SET `score` = '5@#$%^&*&^%$#@!$(&&$%^23@#$%^&*&^%$#@!$(&&$%^10@#$%^&*&^%$#@!$(&&$%^5@#$%^&*&^%$#@!$(&&$%^5@#$%^&*&^%$#@!$(&&$%^5@#$%^&*&^%$#@!$(&&$%^3@#$%^&*&^%$#@!$(&&$%^5' WHERE `low`.`lowId` =1;

create table bill(
	billId bigint NOT NULL AUTO_INCREMENT,
	remark LONGTEXT,
	money int,
	primary key(lowId)
) CHARACTER SET utf8 COLLATE utf8_general_ci;