/*
SQLyog - Free MySQL GUI v5.02
Host - 5.5.20-log : Database - powerbank
*********************************************************************
Server version : 5.5.20-log
*/


create database if not exists `powerbank`;

USE `powerbank`;

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `pid` int(3) NOT NULL AUTO_INCREMENT,
  `posts` varchar(200) NOT NULL,
  `uid` varchar(3) NOT NULL,
  `umail` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `post` */

insert into `post` values 
(1,'Hiiiiiii','',''),
(2,'Hello','',''),
(3,'XD','',''),
(4,'XD','',''),
(5,'asd','',''),
(6,'xd','',''),
(7,'xd','',''),
(8,'Wah','',''),
(9,'','','');

/*Table structure for table `uploads` */

DROP TABLE IF EXISTS `uploads`;

CREATE TABLE `uploads` (
  `picid` int(3) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(500) NOT NULL,
  `uid` int(3) NOT NULL,
  PRIMARY KEY (`picid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `uploads` */

insert into `uploads` values 
(1,'pic1.jpg',6),
(2,'pic5.jpg',6);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `uid` int(3) NOT NULL AUTO_INCREMENT,
  `umail` varchar(50) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contno` varchar(11) NOT NULL,
  `pic` varchar(500) NOT NULL DEFAULT 'user.jpg',
  `location` varchar(500) NOT NULL,
  `accnum` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert into `users` values 
(1,'jhaycee17@yahoo.com','Jaycee17','Jaycee','Mandap','Scholar','1998-05-20','Male','09876543210','user.jpg','PH','1234567890'),
(6,'jc@yahoo.com','mandap34','Jc','Layco','Sponsor','1998-05-20','Male','09109886496','user.jpg','PH','0987654321');

/*Table structure for table `wib` */

DROP TABLE IF EXISTS `wib`;

CREATE TABLE `wib` (
  `wibid` int(3) NOT NULL AUTO_INCREMENT,
  `wib` varchar(50) NOT NULL,
  PRIMARY KEY (`wibid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wib` */

insert into `wib` values 
(1,'');
