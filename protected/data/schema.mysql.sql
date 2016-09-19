CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL
);

INSERT INTO tbl_user (username, password, email) VALUES ('test1', 'pass1', 'test1@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test2', 'pass2', 'test2@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test3', 'pass3', 'test3@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test4', 'pass4', 'test4@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test5', 'pass5', 'test5@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test6', 'pass6', 'test6@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test7', 'pass7', 'test7@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test8', 'pass8', 'test8@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test9', 'pass9', 'test9@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test10', 'pass10', 'test10@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test11', 'pass11', 'test11@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test12', 'pass12', 'test12@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test13', 'pass13', 'test13@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test14', 'pass14', 'test14@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test15', 'pass15', 'test15@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test16', 'pass16', 'test16@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test17', 'pass17', 'test17@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test18', 'pass18', 'test18@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test19', 'pass19', 'test19@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test20', 'pass20', 'test20@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test21', 'pass21', 'test21@example.com');


CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL
);

INSERT INTO tbl_user (username, password) VALUES ('admin', 'admin');


CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    tag INTEGER NOT NULL,
    openid VARCHAR(128) NOT NULL
);


INSERT INTO tbl_user(username, password, tag, openid)
VALUES ('test1', 'pass1', 0, 'ovIYqwNwuZGafU9paPydSoMjxjPw');

INSERT INTO tbl_user(username, password, tag, openid)
VALUES ('test1', 'pass1', 0, 'ovIYqwLFjLgmHtCGvzA9OYoxg7gE');


CREATE TABLE tbl_menu (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    tag INTEGER NOT NULL,
    parent_id INTEGER,
    sub_count INTEGER
);
INSERT INTO tbl_menu (name, tag, parent_id) VALUES ('菜单1', '1','0');
INSERT INTO tbl_menu (name, tag, parent_id) VALUES ('菜单2', '1','1');
INSERT INTO tbl_menu (name, tag, parent_id) VALUES ('菜单3', '1','1');
INSERT INTO tbl_menu (name, tag, parent_id) VALUES ('菜单4', '1','1');
INSERT INTO tbl_menu (name, tag, parent_id) VALUES ('菜单5', '1','2');
INSERT INTO tbl_menu (name, tag, parent_id) VALUES ('菜单6', '1','3');

CREATE TABLE tbl_follower (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    subscribe VARCHAR(128) NOT NULL,
    openid VARCHAR(128) NOT NULL,
    nickname VARCHAR(128) NOT NULL,
    gender VARCHAR(128) NULL,
    language VARCHAR(128) NUll,
    city VARCHAR(128)  NULL,
    province VARCHAR(128)  NULL,
    country VARCHAR(128)  NULL,
    headimgurl VARCHAR(1024)  NULL,
    subscribe_time VARCHAR(128) NOT NULL,
    unionid VARCHAR(128) NULL,
    remark VARCHAR(128) NULL,
    groupid INTEGER NOT NULL
);

CREATE TABLE tbl_keyWord (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    keyWord VARCHAR(128) NOT NULL,
    answer VARCHAR(1024) NOT NULL
);

INSERT INTO tbl_keyWord (keyWord,answer) VALUES ('你好','你好,天天开心!');
INSERT INTO tbl_keyWord (keyWord,answer) VALUES ('钱','如果对方提到钱的话,请确认是否是欺骗!');