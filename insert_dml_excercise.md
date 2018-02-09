#### 1. Write a SQL statement to insert a record with your own value into the table countries against each columns.

````sql
Solution:
Assuming that we have the following table structure for `countries`
+--------------+---------------+------+-----+---------+-------+
| Field        | Type          | Null | Key | Default | Extra |
+--------------+---------------+------+-----+---------+-------+
| COUNTRY_ID   | varchar(2)    | YES  |     | NULL    |       |
| COUNTRY_NAME | varchar(40)   | YES  |     | NULL    |       |
| REGION_ID    | decimal(10,0) | YES  |     | NULL    |       |
+--------------+---------------+------+-----+---------+-------+

Then we can run the insert command as:
  INSERT INTO `countries` VALUES ('AA','Argentina',01);
````

#### 2 Write a SQL statement to insert one row into the table countries against the column country_id and country_name.

````sql

Solution:
Assuming that we have the following table structure for `countries`
+--------------+---------------+------+-----+---------+-------+
| Field        | Type          | Null | Key | Default | Extra |
+--------------+---------------+------+-----+---------+-------+
| COUNTRY_ID   | varchar(2)    | YES  |     | NULL    |       |
| COUNTRY_NAME | varchar(40)   | YES  |     | NULL    |       |
| REGION_ID    | decimal(10,0) | YES  |     | NULL    |       |
+--------------+---------------+------+-----+---------+-------+


  INSERT INTO `countries` (`country_id`,`country_name`) VALUES ('AG','Afganisthan',02);
````

#### 3. Write a SQL statement to create duplicate of countries table named country_new with all structure and data.

````sql
Solution:
  CREATE TABLE `country_new` AS SELECT * FROM `countries`;
````

#### 4. Write a SQL statement to insert NULL values against region_id column for a row of countries table
```` sql
Solution:
  INSERT INTO `countries` (`country_id`,`country_name`,`region_id`) VALUES ('AG','Afganisthan',NULL);
````

#### 5. Write a SQL statement to insert 3 rows by a single insert statement.

````sql
Solution:
  INSERT INTO `countries` VALUES ('CN','Canada',05),('IN','India',03),('NL','Netherlands',06);
````

#### 6. Write a SQL statement insert rows from country_new table to countries table.

```` sql
+------------+--------------+-----------+
| COUNTRY_ID | COUNTRY_NAME | REGION_ID |
+------------+--------------+-----------+
| C0001      | India        |      1001 |
| C0002      | USA          |      1007 |
| C0003      | UK           |      1003 |
+------------+--------------+-----------+

Solution:
  INSERT INTO countries SELECT * FROM country_new;

This wil run into error since the country_id is varchar(2) in my previous assumption so rectifying it with and alter statement would fix the issue:

  ALTER TABLE `country_new` change `country_id` `country_id` VARCHAR(5) NULL DEFAULT NULL;
````

#### 7. Write a SQL statement to insert one row in jobs table to ensure that no duplicate value will be entered in the job_id column.

````sql
Solution:
Assuming the structure of jobs to have columns like job_id, job_title, min_salary, max_salary. So recreating the jobs table
CREATE TABLE IF NOT EXISTS `jobs`;
CREATE TABLE `jobs` (
  `job_id` INT(11) UNSIGNED NOT NULL,
  `job_title` VARCHAR (255) NOT NULL,
  `min_salary` FLOAT (6,2) NOT NULL,
  `max_salary` FLOAT (6,2) NOT NULL,
  PRIMARY KEY (`job_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

So the final structure of the table jobs will look like:
+------------+------------------+------+-----+---------+-------+
| Field      | Type             | Null | Key | Default | Extra |
+------------+------------------+------+-----+---------+-------+
| job_id     | int(11) unsigned | NO   | PRI | NULL    |       |
| job_title  | varchar(255)     | NO   |     | NULL    |       |
| min_salary | float(6,2)       | NO   |     | NULL    |       |
| max_salary | float(6,2)       | NO   |     | NULL    |       |
+------------+------------------+------+-----+---------+-------+

now since jobs have the job_id column as primary key the value will never have any duplicate values so the insert statement now

INSERT INTO `jobs` VALUES ('1','Programmer','20000','25000');
````

#### 8. Write a SQL statement to insert one row in jobs table to ensure that no duplicate value will be entered in the job_id column.

````SQL
Solution:
Assuming the structure of jobs to have columns like job_id, job_title, min_salary, max_salary. So recreating the jobs table
CREATE TABLE IF NOT EXISTS `jobs`;
CREATE TABLE `jobs` (
  `job_id` INT(11) UNSIGNED NOT NULL,
  `job_title` VARCHAR (255) NOT NULL,
  `min_salary` FLOAT (6,2) NOT NULL,
  `max_salary` FLOAT (6,2) NOT NULL,
  PRIMARY KEY (`job_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

So the final structure of the table jobs will look like:
+------------+------------------+------+-----+---------+-------+
| Field      | Type             | Null | Key | Default | Extra |
+------------+------------------+------+-----+---------+-------+
| job_id     | int(11) unsigned | NO   | PRI | NULL    |       |
| job_title  | varchar(255)     | NO   |     | NULL    |       |
| min_salary | float(6,2)       | NO   |     | NULL    |       |
| max_salary | float(6,2)       | NO   |     | NULL    |       |
+------------+------------------+------+-----+---------+-------+

now since jobs have the job_id column as primary key the value will never have any duplicate values so the insert statement now

  INSERT INTO `jobs` VALUES ('1','Programmer','20000','25000');
````

#### 9. Write a SQL statement to insert a record into the table countries to ensure that, a country_id and region_id combination will be entered once in the table.

````SQL
Solution:
Assuming the structure of countries to have columns like country_id, country_name, region_id. So recreating the countries table

Solution:
CREATE TABLE `countries` (
  `country_id` varchar(3) NOT NULL,
  `country_name` varchar(20) NOT NULL,
  `region_id` int(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`country_id`,`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

So the final structure of the table countries will look like:
+--------------+-----------------+------+-----+---------+-------+
| Field        | Type            | Null | Key | Default | Extra |
+--------------+-----------------+------+-----+---------+-------+
| country_id   | varchar(3)      | NO   | PRI | NULL    |       |
| country_name | varchar(20)     | NO   |     | NULL    |       |
| region_id    | int(5) unsigned | NO   | PRI | NULL    |       |
+--------------+-----------------+------+-----+---------+-------+

now since countries have the country_id and region_id column as primary key the value will never have any duplicate values so the insert statement now

  INSERT INTO countries VALUES(325,'USA',128);

#### 10. Write a SQL statement to insert rows into the table countries in which the value of country_id column will be unique and auto incremented

Solution:
Assuming the structure of countries to have columns like country_id, country_name, region_id. So recreating the countries table

Solution:
CREATE TABLE `countries` (
  `country_id` INT(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(20) NOT NULL,
  `region_id` int(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

So the final structure of the table countries will look like:
+--------------+-----------------+------+-----+---------+----------------+
| Field        | Type            | Null | Key | Default | Extra          |
+--------------+-----------------+------+-----+---------+----------------+
| country_id   | int(11)         | NO   | PRI | NULL    | auto_increment |
| country_name | varchar(20)     | NO   |     | NULL    |                |
| region_id    | int(5) unsigned | NO   |     | NULL    |                |
+--------------+-----------------+------+-----+---------+----------------+

now since countries have the country_id is autoincremented the insert statement can leave out the coloumn

  INSERT INTO countries VALUES('USA',128);
````

#### 11. Write a SQL statement to insert records into the table countries to ensure that the country_id column will not contain any duplicate data and this will be automatically incremented and the column country_name will be filled up by 'N/A' if no value assigned for that column.

````sql
Solution:
Assuming the structure of countries to have columns like country_id, country_name, region_id. So recreating the countries table

Solution:
CREATE TABLE `countries` (
  `country_id` INT(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(20) NOT NULL DEFAULT 'N/A',
  `region_id` int(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

So the final structure of the table countries will look like:
+--------------+-----------------+------+-----+---------+----------------+
| Field        | Type            | Null | Key | Default | Extra          |
+--------------+-----------------+------+-----+---------+----------------+
| country_id   | int(11)         | NO   | PRI | NULL    | auto_increment |
| country_name | varchar(20)     | NO   |     | N/A     |                |
| region_id    | int(5) unsigned | NO   |     | NULL    |                |
+--------------+-----------------+------+-----+---------+----------------+

INSERT INTO countries(region_id) VALUES(109);
````

#### 12. Write a SQL statement to insert rows in the job_history table in which one column job_id is containing those values which are exists in job_id column of jobs table.

````sql
Solution:
Assuming that our table jobs have the following set of columns

CREATE TABLE IF NOT EXISTS `jobs`;
CREATE TABLE `jobs`(
`job_id` INT(11) NOT NULL PRIMARY KEY,
`job_title` varchar(35) NOT NULL,
`min_salary` float(6,0) NOT NULL,
);

thus the structure of the table becomes :
+------------+-------------+------+-----+---------+-------+
| Field      | Type        | Null | Key | Default | Extra |
+------------+-------------+------+-----+---------+-------+
| job_id     | int(11)     | NO   | PRI | NULL    |       |
| job_title  | varchar(35) | NO   |     | NULL    |       |
| min_salary | float(6,0)  | NO   |     | NULL    |       |
+------------+-------------+------+-----+---------+-------+

INSERT INTO jobs_renew(`job_id`,`job_title`,`min_salary`) VALUES(01,'programmer',1);
INSERT INTO jobs_renew(`job_id`,`job_title`,`min_salary`) VALUES(02,'analyst',1);

+--------+------------+------------+
| job_id | job_title  | min_salary |
+--------+------------+------------+
|   01   | programmer |          1 |
|   02   | analyst    |          1 |
+--------+------------+------------+


Sample table job_history;
CREATE TABLE IF NOT EXISTS `job_history`;
CREATE TABLE `job_history` (
  `emp_id` INT(11) NOT NULL PRIMARY KEY,
  `job_id` INT(11) NOT NULL,
  `dept_id` VARCHAR(255) DEFAULT NULL,
  FOREIGN KEY (`job_id`) REFERENCES `jobs`(`job_id`)
);

thus the table structure becomes like :
+---------+---------+------+-----+---------+-------+
| Field   | Type    | Null | Key | Default | Extra |
+---------+---------+------+-----+---------+-------+
| emp_id  | int(11) | NO   | PRI | NULL    |       |
| job_id  | int(11) | NO   |     | NULL    |       |
| dept_id | int(11) | YES  |     | NULL    |       |
+---------+---------+------+-----+---------+-------+

Sample Solution:
INSERT INTO `job_history` VALUES(1,01,60);

so our table data is now :
+--------+--------+---------+
| emp_id | job_id | dept_id |
+--------+--------+---------+
|      1 |     01 |      60 |
+--------+--------+---------+
````

#### 13. Write a SQL statement to insert rows into the table employees in which a set of columns department_id and manager_id contains a unique value and that combined values must have exists into the table departments.

````sql
Solution:
So assuming the table structure for the table `department`
CREATE TABLE IF NOT EXISTS `department`;
CREATE TABLE `department`(
  `dept_id` INT(11) NOT NULL UNIQUE,
  `dept_name` VARCHAR(30) NOT NULL,
  `manager_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`dept_id`,`dept_name`)
);

and thus our table structure comes down to this:
+------------+-------------+------+-----+---------+-------+
| Field      | Type        | Null | Key | Default | Extra |
+------------+-------------+------+-----+---------+-------+
| dept_id    | int(11)     | NO   | PRI | NULL    |       |
| dept_name  | varchar(30) | NO   | PRI | NULL    |       |
| manager_id | int(11)     | YES  |     | NULL    |       |
+------------+-------------+------+-----+---------+-------+

INSERT INTO `department` VALUES(60,'Programmer',201);
INSERT INTO `department` VALUES(61,'Analyst',201);
INSERT INTO `department` VALUES(80,'Manager',211);

running the above commands will result in the following table output on
 - SELECT * from `department`;

+---------+------------+------------+
| dept_id | dept_name  | manager_id |
+---------+------------+------------+
|      60 | Programmer |        201 |
|      61 | Analyst    |        202 |
|      80 | Manager    |        211 |
+---------+------------+------------+

Assuming the employee table has the following table defination:
CREATE TABLE IF NOT EXISTS `employees`;
CREATE TABLE `employees` (
  `emp_id` INT(11) NOT NULL PRIMARY KEY,
  `full_name` VARCHAR(20) DEFAULT NULL,
  `job_id` VARCHAR(10) NOT NULL,
  `salary` FLOAT(8,2) DEFAULT NULL,
  `manager_id` INT(11) NOT NULL,
  `department_id` INT(11) NOT NULL,
  FOREIGN KEY(`department_id`) REFERENCES  `department`(`dept_id`),
  FOREIGN KEY(`manager_id`) REFERENCES  `department`(`manager_id`)
);

So the table structure for the `employees` table now becomes :
+---------------+-------------+------+-----+---------+-------+
| Field         | Type        | Null | Key | Default | Extra |
+---------------+-------------+------+-----+---------+-------+
| emp_id        | int(11)     | NO   | PRI | NULL    |       |
| full_name     | varchar(20) | YES  |     | NULL    |       |
| job_id        | varchar(10) | NO   |     | NULL    |       |
| salary        | float(8,2)  | YES  |     | NULL    |       |
| manager_id    | int(11)     | NO   |     | NULL    |       |
| department_id | int(11)     | NO   |     | NULL    |       |
+---------------+-------------+------+-----+---------+-------+

so the insert statement in the table :
INSERT INTO `employees` VALUES(510,'Ace ventre','Programmer',18000,201,60);
INSERT INTO `employees` VALUES(511,'Ann Lee','Analyst',18000,211,80);

yeilds us the following output:

+--------+------------+------------+----------+------------+---------------+
| emp_id | full_name  | job_id     | salary   | manager_id | department_id |
+--------+------------+------------+----------+------------+---------------+
|    518 | Ace ventre | Programmer | 18000.00 |        201 |            60 |
|    519 | Ann Lee    | Analyst    | 18000.00 |        202 |            61 |
+--------+------------+------------+----------+------------+---------------+
````

#### 14. Write a SQL statement to insert rows into the table employees in which a set of columns department_id and job_id contains the values which must have exists into the table departments and jobs.

````sql
Solution:
So assuming the table structure for the table `department`
CREATE TABLE IF NOT EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` INT(11) NOT NULL UNIQUE,
  `dept_name` VARCHAR(30) NOT NULL,
  `manager_id` INT(11) DEFAULT NULL,
  PRIMARY KEY (`dept_id`,`dept_name`)
);

and thus our table structure comes down to this:
+------------+-------------+------+-----+---------+-------+
| Field      | Type        | Null | Key | Default | Extra |
+------------+-------------+------+-----+---------+-------+
| dept_id    | int(11)     | NO   | PRI | NULL    |       |
| dept_name  | varchar(30) | NO   | PRI | NULL    |       |
| manager_id | int(11)     | YES  |     | NULL    |       |
+------------+-------------+------+-----+---------+-------+

INSERT INTO `department` VALUES(60,'Programmer',201);
INSERT INTO `department` VALUES(61,'Analyst',201);
INSERT INTO `department` VALUES(80,'Manager',211);

running the above commands will result in the following table output on
 - SELECT * from `department`;

+---------+------------+------------+
| dept_id | dept_name  | manager_id |
+---------+------------+------------+
|      60 | Programmer |        201 |
|      61 | Analyst    |        202 |
|      80 | Manager    |        211 |
+---------+------------+------------+

Sample table jobs.

CREATE TABLE IF NOT EXISTS `jobs`;
CREATE TABLE `jobs`(
`job_id` INT(11) NOT NULL PRIMARY KEY,
`job_title` varchar(35) NOT NULL,
`min_salary` float(6,0) NOT NULL,
);

thus the structure of the table becomes :

+------------+-------------+------+-----+---------+-------+
| Field      | Type        | Null | Key | Default | Extra |
+------------+-------------+------+-----+---------+-------+
| job_id     | int(11)     | NO   | PRI | NULL    |       |
| job_title  | varchar(35) | NO   |     | NULL    |       |
| min_salary | float(6,0)  | NO   |     | NULL    |       |
+------------+-------------+------+-----+---------+-------+

INSERT INTO `jobs`(`job_id`,`job_title`,`min_salary`) VALUES(01,'programmer',1);
INSERT INTO `jobs`(`job_id`,`job_title`,`min_salary`) VALUES(02,'analyst',1);

+--------+------------+------------+
| job_id | job_title  | min_salary |
+--------+------------+------------+
|   01   | programmer |          1 |
|   02   | analyst    |          1 |
+--------+------------+------------+

Assuming the employee table has the following table defination:

CREATE TABLE IF NOT EXISTS `employees`;
CREATE TABLE `employees`(
  `emp_id` INT(11) NOT NULL PRIMARY KEY,
  `full_name` VARCHAR(20) DEFAULT NULL,
  `job_id` INT(11) NOT NULL,
  `salary` FLOAT(8,2) DEFAULT NULL,
  `manager_id` INT(11) NOT NULL,
  `department_id` INT(11) NOT NULL,
  FOREIGN KEY(`department_id`) REFERENCES  `department`(`dept_id`),
  FOREIGN KEY(`job_id`) REFERENCES  `jobs`(`job_id`)
);

So the table structure for the `employees` table now becomes :
+---------------+-------------+------+-----+---------+-------+
| Field         | Type        | Null | Key | Default | Extra |
+---------------+-------------+------+-----+---------+-------+
| emp_id        | int(11)     | NO   | PRI | NULL    |       |
| full_name     | varchar(20) | YES  |     | NULL    |       |
| job_id        | int(11)     | NO   |     | NULL    |       |
| salary        | float(8,2)  | YES  |     | NULL    |       |
| manager_id    | int(11)     | NO   |     | NULL    |       |
| department_id | int(11)     | NO   |     | NULL    |       |
+---------------+-------------+------+-----+---------+-------+


now running the insert statement in employees table:
  INSERT INTO `employees` VALUES(515,'Aakash Dhar',01,18000,201,60);

now running the query:
SELECT * FROM employees;
+--------+-------------+------------+----------+------------+---------------+
| emp_id | full_name   | job_id     | salary   | manager_id | department_id |
+--------+-------------+------------+----------+------------+---------------+
|    515 | Aakash Dhar | 01         | 18000.00 |        201 |            60 |
+--------+------------+------------+----------+------------+---------------+
````
