/*�����û�����Ӧ���ݿ⣬�û��Զ�Ӧ�����ݿ���������Ȩ��*/
CREATE USER 'love'@'localhost' IDENTIFIED BY "love1314";/*�û���love������love1314*/
GRANT USAGE ON * . * TO 'love'@'localhost' IDENTIFIED BY "love1314" WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
CREATE DATABASE IF NOT EXISTS `love` ;
GRANT ALL PRIVILEGES ON `love` . * TO 'love'@'localhost';

/*ʹ�����ݿ�love*/
use love;

/*������*/
create table user(
	userId bigint NOT NULL AUTO_INCREMENT,
	userName varchar(100) NOT NULL,
	userPassword varchar(100) NOT NULL,
	userPower varchar(100) NOT NULL,
	primary key(userId)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
insert user(userName,userPassword,userPower) values("wbx","wbx","11111111");

/*
create table product(
	product_id bigint NOT NULL AUTO_INCREMENT,
	product_name varchar(100),
	product_incount bigint,
	product_outcount bigint,
	product_inprice double,
	product_avgoutprice double,
	product_inremarks varchar(1000),
	product_outremarks varchar(1000),
	primary key(product_id)
);
create table company(
	company_name varchar(100),
	company_street varchar(100),
	primary key(company_name)
);
create table company_phone(
	company_name varchar(100),
	company_phonenumber bigint,
	primary key(company_name,company_phonenumber)
);
create table employee(
	employee_id bigint NOT NULL AUTO_INCREMENT,
	employee_name varchar(100),
	employee_salary double,
	employee_position varchar(100),
	employee_address varchar(1000),
	employee_intime datetime,
	employee_updatetime datetime,
	primary key(employee_id)
);
create table money(
	money_id bigint NOT NULL AUTO_INCREMENT,
	money_amount double,
	money_inamount double,
	money_remarks varchar(1000),
	money_intime datetime,
	money_outtime datetime,
	company_name varchar(100),
	primary key(money_id)
);
create table buy(
	company_name varchar(100),
	product_id bigint,
	buy_id bigint,
	buy_time datetime,
	primary key(company_name,product_id,buy_id)
);
create table sale(
	company_name varchar(100),
	product_id bigint,
	sale_id bigint,
	sale_time datetime,
	primary key(company_name,product_id,sale_id)
);*/