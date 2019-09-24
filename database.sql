create database employees;

use employees;

CREATE TABLE `tbl_employees` (
  `id` int(11) NOT NULL auto_increment,
  `eFirstName` varchar(100) NOT NULL,
  `eLastName` varchar(100) NOT NULL,
  `eGender` varchar(100) NOT NULL,
  `eDepartment` varchar(100) NOT NULL,
  `eDateEmployed` varchar(100) NOT NULL,
  `eSalary` float,
  PRIMARY KEY  (`id`)
);