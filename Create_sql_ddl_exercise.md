#### 1. Write a SQL statement to create a simple table countries including columns country_id,country_name and region_id.

````
Solution :
CREATE TABLE `countries` (
	 `country_id` VARCHAR(3) NOT NULL,
    `country_name` VARCHAR(20) NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`country_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````

#### 2. Write a SQL statement to create a simple table countries including columns country_id,country_name and region_id which is already exists.

````
Solution:
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` VARCHAR(3) NOT NULL,
    `country_name` VARCHAR(20) NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`country_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````

#### 3. Write a SQL statement to create the structure of a table dup_countries similar to countries.

````
Solution:
  - if there is no data present in the table
  CREATE TABLE IF NOT EXISTS `dup_countries` LIKE `countries`;
    -- general syntax : CREATE TABLE {new_table_name} LIKE {old_table_name}

  - if there is data present in the table
  CREATE TABLE `dup_countries` AS SELECT * FROM `countries`;
    -- general syntax : CREATE TABLE {new_table_name} AS SELECT * FROM {old_table_name}
````

#### 4. Write a SQL statement to create a duplicate copy of countries table including structure and data by name dup_countries.

````
Solution:
CREATE TABLE `dup_countries` AS SELECT * FROM `countries`;
````

#### 5. Write a SQL statement to create a table countries set a constraint NULL.

````
Solution:
  CREATE TABLE IF NOT EXISTS `countries`;
  CREATE TABLE `countries` (
    `country_id` VARCHAR(3) NOT NULL,
    `country_name` VARCHAR(20) NOT NULL,
    `region_id` INT(5) UNSIGNED NULL,
    PRIMARY KEY (`country_id`)
  )CHARSET = utf8 COLLATE = utf_unicode_ci;
````

#### 6. Write a SQL statement to create a table named jobs including columns job_id, job_title, min_salary, max_salary and check whether the max_salary amount exceeding the upper limit 25000.

````
Solution:
CREATE TABLE IF NOT EXISTS `jobs`;
CREATE TABLE `jobs` (
  `job_id` VARCHAR (8) NOT NULL,
  `job_title` VARCHAR (20) NOT NULL,
  `min_salary` INT(11) UNSIGNED NOT NULL,
  `max_salary` INT(11) UNSIGNED NOT NULL CHECK(max_salary <= 25000)
  PRIMARY KEY (`job_id`)
)CHARSET = utf8 COLLATE = utf_unicode_ci;
````

#### 7. Write a SQL statement to create a table named countries including columns country_id, country_name and region_id and make sure that no countries except Italy, India and China will be entered in the table.

````
Solution:
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` VARCHAR(3) NOT NULL,
    `country_name` VARCHAR(20) NOT NULL CHECK (`country_name` IN ('Italy','India','China'),
    `region_id` INT(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`country_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

Other Possible solution:
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` VARCHAR(3) NOT NULL,
    `country_name` ENUM('Italy','India','China') NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`country_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````

#### 8. Write a SQL statement to create a table named job_history including columns employee_id, start_date, end_date, job_id and department_id and make sure that the value against column end_date will be entered at the time of insertion to the format like '--/--/----'.
````
Solution:
DROP TABLE IF EXISTS `job_history`;
CREATE TABLE `job_history`(
    `employee_id` VARCHAR (8) NOT NULL,
    `start_date` DATE NOT NULL,
    `end_date` DATE NOT NULL CHECK(`end_date` LIKE '--/--/----'),
    `job_id` VARCHAR (8) NOT NULL,
    `department_id` VARCHAR (8) NOT NULL,
    PRIMARY KEY (`employee_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````

#### 9. Write a SQL statement to create a table named countries including columns country_id,country_name and region_id and make sure that no duplicate data against column country_id will be allowed at the time of insertion.

````
Solution:
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` VARCHAR(3) NOT NULL,
    `country_name` ENUM('Italy','India','China') NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`country_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

Other Possible Solution:
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` VARCHAR(3) NOT NULL,
    `country_name` ENUM('Italy','India','China') NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
    UNIQUE (`country_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
              OR
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` VARCHAR(3) UNIQUE NOT NULL,
    `country_name` ENUM('Italy','India','China') NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````

#### 10. Write a SQL statement to create a table named jobs including columns job_id, job_title, min_salary and max_salary, and make sure that, the default value for job_title is blank and min_salary is 8000 and max_salary is NULL will be entered automatically at the time of insertion if no value assigned for the specified columns.

Solution:
````
DROP TABLE IF EXISTS  `jobs`;
CREATE TABLE `jobs` (
  `job_id` VARCHAR (8) NOT NULL,
  `job_title` VARCHAR (20) NOT NULL DEFAULT '',
  `min_salary` INT(11) UNSIGNED NOT NULL DEFAULT 8000,
  `max_salary` INT(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`job_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

Output of the above query:
+------------+------------------+------+-----+---------+-------+
| Field      | Type             | Null | Key | Default | Extra |
+------------+------------------+------+-----+---------+-------+
| job_id     | varchar(8)       | NO   | PRI | NULL    |       |
| job_title  | varchar(20)      | NO   |     |         |       |
| min_salary | int(11) unsigned | NO   |     | 8000    |       |
| max_salary | int(11) unsigned | YES  |     | NULL    |       |
+------------+------------------+------+-----+---------+-------+
````
#### 11. Write a SQL statement to create a table named countries including columns country_id, country_name and region_id and make sure that the country_id column will be a key field which will not contain any duplicate data at the time of insertion.

````
Solution:
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` VARCHAR(3) NOT NULL,
    `country_name` ENUM('Italy','India','China') NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`country_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

output of the above query
+--------------+-------------------------------+------+-----+---------+-------+
| Field        | Type                          | Null | Key | Default | Extra |
+--------------+-------------------------------+------+-----+---------+-------+
| country_id   | varchar(3)                    | NO   | PRI | NULL    |       |
| country_name | enum('Italy','India','China') | NO   |     | NULL    |       |
| region_id    | int(5) unsigned               | NO   |     | NULL    |       |
+--------------+-------------------------------+------+-----+---------+-------+
````

#### 12. Write a SQL statement to create a table countries including columns country_id, country_name and region_id and make sure that the column country_id will be unique and store an auto incremented value.
````
Solution:
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `country_name` ENUM('Italy','India','China') NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`country_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

Output of the above query
+--------------+-------------------------------+------+-----+---------+----------------+
| Field        | Type                          | Null | Key | Default | Extra          |
+--------------+-------------------------------+------+-----+---------+----------------+
| country_id   | int(11) unsigned              | NO   | PRI | NULL    | auto_increment |
| country_name | enum('Italy','India','China') | NO   |     | NULL    |                |
| region_id    | int(5) unsigned               | NO   |     | NULL    |                |
+--------------+-------------------------------+------+-----+---------+----------------+
````

#### 13. Write a SQL statement to create a table countries including columns country_id, country_name and region_id and make sure that the combination of columns country_id and region_id will be unique.
````
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
    `country_id` VARCHAR(3) NOT NULL UNIQUE,
    `country_name` ENUM('Italy','India','China') NOT NULL,
    `region_id` INT(5) UNSIGNED NOT NULL,
    PRIMARY KEY (`country_id` , `region_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

Output of the above query
+--------------+-------------------------------+------+-----+---------+-------+
| Field        | Type                          | Null | Key | Default | Extra |
+--------------+-------------------------------+------+-----+---------+-------+
| country_id   | varchar(3)                    | NO   | PRI | NULL    |       |
| country_name | enum('Italy','India','China') | NO   |     | NULL    |       |
| region_id    | int(5) unsigned               | NO   | PRI | NULL    |       |
+--------------+-------------------------------+------+-----+---------+-------+
````

#### 14. Write a SQL statement to create a table job_history including columns employee_id, start_date, end_date, job_id and department_id and make sure that, the employee_id column does not contain any duplicate value at the time of insertion and the foreign key column job_id contain only those values which are exists in the jobs table.

````
Solution:
DROP TABLE IF EXISTS `job_history`;
CREATE TABLE `job_history`(
    `employee_id` VARCHAR (8) NOT NULL,
    `start_date` DATE NOT NULL,
    `end_date` DATE NOT NULL CHECK(`end_date` LIKE '--/--/----'),
    `job_id` VARCHAR (8) NOT NULL,
    `department_id` VARCHAR (8) NOT NULL,
    PRIMARY KEY (`employee_id`),
    FOREIGN KEY (`job_id`) REFERENCES `jobs`(`job_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

output of the above query would be:
+---------------+------------+------+-----+---------+-------+
| Field         | Type       | Null | Key | Default | Extra |
+---------------+------------+------+-----+---------+-------+
| employee_id   | varchar(8) | NO   | PRI | NULL    |       |
| start_date    | date       | NO   |     | NULL    |       |
| end_date      | date       | NO   |     | NULL    |       |
| job_id        | varchar(8) | NO   | MUL | NULL    |       |
| department_id | varchar(8) | NO   |     | NULL    |       |
+---------------+------------+------+-----+---------+-------+\
````

#### 15. Write a SQL statement to create a table employees including columns employee_id, first_name, last_name, email, phone_number hire_date, job_id, salary, commission, manager_id and department_id and make sure that, the employee_id column does not contain any duplicate value at the time of insertion and the foreign key columns combined by department_id and manager_id columns contain only those unique combination values, which combinations are exists in the departments table.

````
Solution:
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`(
  `employee_id` INT (8) UNSIGNED NOT NULL,
  `first_name` VARCHAR (15) NOT NULL,
  `last_name` VARCHAR (15) NOT NULL,
  `email` VARCHAR (255) NOT NULL,
  `phone_number` BIGINT (11) UNSIGNED NOT NULL,
  `hire_date` DATE NOT NULL,
  `job_id` VARCHAR (8) NOT NULL,
  `salary` INT(11) UNSIGNED NOT NULL,
  `commission` INT(11) UNSIGNED DEFAULT NULL,
  `manager_id` DECIMAL(6,0) NOT NULL,
  `department_id` DECIMAL(4,0) NOT NULL,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`department_id`) REFERENCES `departments`(`department_id`),
  FOREIGN KEY (`manager_id`) REFERENCES `departments`(`manager_id`)
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

Output of the above query would be:
+---------------+---------------------+------+-----+---------+-------+
| Field         | Type                | Null | Key | Default | Extra |
+---------------+---------------------+------+-----+---------+-------+
| employee_id   | int(8) unsigned     | NO   | PRI | NULL    |       |
| first_name    | varchar(15)         | NO   |     | NULL    |       |
| last_name     | varchar(15)         | NO   |     | NULL    |       |
| email         | varchar(255)        | NO   |     | NULL    |       |
| phone_number  | bigint(11) unsigned | NO   |     | NULL    |       |
| hire_date     | date                | NO   |     | NULL    |       |
| job_id        | varchar(8)          | NO   |     | NULL    |       |
| salary        | int(11) unsigned    | NO   |     | NULL    |       |
| commission    | int(11) unsigned    | YES  |     | NULL    |       |
| manager_id    | decimal(6,0)        | NO   |     | NULL    |       |
| department_id | decimal(4,0)        | NO   |     | NULL    |       |
+---------------+---------------------+------+-----+---------+-------+
````

#### 16. Write a SQL statement to create a table employees including columns employee_id, first_name, last_name, email, phone_number hire_date, job_id, salary, commission, manager_id and department_id and make sure that, the employee_id column does not contain any duplicate value at the time of insertion, and the foreign key column department_id, reference by the column department_id of departments table, can contain only those values which are exists in the departments table and another foreign key column job_id, referenced by the column job_id of jobs table, can contain only those values which are exists in the jobs table. The InnoDB Engine have been used to create the tables.

````
Solution:
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`(
  `employee_id` INT (8) UNSIGNED NOT NULL,
  `first_name` VARCHAR (15) NOT NULL,
  `last_name` VARCHAR (15) NOT NULL,
  `email` VARCHAR (255) NOT NULL,
  `phone_number` BIGINT (11) UNSIGNED NOT NULL,
  `hire_date` DATE NOT NULL,
  `job_id` VARCHAR (8) NOT NULL,
  `salary` INT(11) UNSIGNED NOT NULL,
  `commission` INT(11) UNSIGNED DEFAULT NULL,
  `manager_id` DECIMAL(6,0) NOT NULL,
  `department_id` DECIMAL(4,0) NOT NULL,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`department_id`) REFERENCES `departments`(`department_id`),
  FOREIGN KEY (`manager_id`) REFERENCES `departments`(`manager_id`),
  FOREIGN KEY (`job_id`) REFERENCES `jobs`(`job_id`),
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````

#### 17. Write a SQL statement to create a table employees including columns employee_id, first_name, last_name, job_id, salary and make sure that, the employee_id column does not contain any duplicate value at the time of insertion, and the foreign key column job_id, referenced by the column job_id of jobs table, can contain only those values which are exists in the jobs table. The InnoDB Engine have been used to create the tables. The specialty of the statement is that, The ON UPDATE CASCADE action allows you to perform cross-table update and ON DELETE RESTRICT action reject the deletion. The default action is ON DELETE RESTRICT.

````
Solution:
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`(
  `employee_id` INT (8) UNSIGNED NOT NULL,
  `first_name` VARCHAR (15) NOT NULL,
  `last_name` VARCHAR (15) NOT NULL,
  `email` VARCHAR (255) NOT NULL,
  `phone_number` BIGINT (11) UNSIGNED NOT NULL,
  `hire_date` DATE NOT NULL,
  `job_id` VARCHAR (8) NOT NULL,
  `salary` INT(11) UNSIGNED NOT NULL,
  `commission` INT(11) UNSIGNED DEFAULT NULL,
  `manager_id` DECIMAL(6,0) NOT NULL,
  `department_id` DECIMAL(4,0) NOT NULL,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`department_id`) REFERENCES `departments`(`department_id`),
  FOREIGN KEY (`manager_id`) REFERENCES `departments`(`manager_id`),
  FOREIGN KEY (`job_id`) REFERENCES `jobs`(`job_id`),
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````

#### 18. Write a SQL statement to create a table employees including columns employee_id, first_name, last_name, job_id, salary and make sure that, the employee_id column does not contain any duplicate value at the time of insertion, and the foreign key column job_id, referenced by the column job_id of jobs table, can contain only those values which are exists in the jobs table. The InnoDB Engine have been used to create the tables. The specialty of the statement is that, The ON DELETE CASCADE that lets you allow to delete records in the employees(child) table that refer to a record in the jobs(parent) table when the record in the parent table is deleted and the ON UPDATE RESTRICT actions reject any updates.

````
Solution:
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`(
  `employee_id` INT (8) UNSIGNED NOT NULL,
  `first_name` VARCHAR (15) NOT NULL,
  `last_name` VARCHAR (15) NOT NULL,
  `email` VARCHAR (255) NOT NULL,
  `phone_number` BIGINT (11) UNSIGNED NOT NULL,
  `hire_date` DATE NOT NULL,
  `job_id` VARCHAR (8) NOT NULL,
  `salary` INT(11) UNSIGNED NOT NULL,
  `commission` INT(11) UNSIGNED DEFAULT NULL,
  `manager_id` DECIMAL(6,0) NOT NULL,
  `department_id` DECIMAL(4,0) NOT NULL,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`job_id`) REFERENCES `jobs`(`job_id`) ON DELETE CASCADE ON UPDATE RESTRICT
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````

#### 19. Write a SQL statement to create a table employees including columns employee_id, first_name, last_name, job_id, salary and make sure that, the employee_id column does not contain any duplicate value at the time of insertion, and the foreign key column job_id, referenced by the column job_id of jobs table, can contain only those values which are exists in the jobs table. The InnoDB Engine have been used to create the tables. The specialty of the statement is that, The ON DELETE SET NULL action will set the foreign key column values in the child table(employees) to NULL when the record in the parent table(jobs) is deleted, with a condition that the foreign key column in the child table must accept NULL values and the ON UPDATE SET NULL action resets the values in the rows in the child table(employees) to NULL values when the rows in the parent table(jobs) are updated.

````
Solution:
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`(
  `employee_id` INT (8) UNSIGNED NOT NULL,
  `first_name` VARCHAR (15) NOT NULL,
  `last_name` VARCHAR (15) NOT NULL,
  `email` VARCHAR (255) NOT NULL,
  `phone_number` BIGINT (11) UNSIGNED NOT NULL,
  `hire_date` DATE NOT NULL,
  `job_id` VARCHAR (8) NOT NULL,
  `salary` INT(11) UNSIGNED NOT NULL,
  `commission` INT(11) UNSIGNED DEFAULT NULL,
  `manager_id` DECIMAL(6,0) NOT NULL,
  `department_id` DECIMAL(4,0) NOT NULL,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`job_id`) REFERENCES `jobs`(`job_id`) ON DELETE SET NULL ON UPDATE SET NULL
)CHARSET = utf8 COLLATE = utf8_unicode_ci;

so based on the above reference key the table structure for jobs table will be:

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `job_id` VARCHAR (8) NULL,
  `job_title` VARCHAR (20) NOT NULL,
  `min_salary` INT(11) UNSIGNED NOT NULL,
  `max_salary` INT(11) UNSIGNED NOT NULL CHECK(max_salary <= 25000)
)CHARSET = utf8 COLLATE = utf_unicode_ci;

Since the foreign key column should be able to set to NULL
````

#### 20. Write a SQL statement to create a table employees including columns employee_id, first_name, last_name, job_id, salary and make sure that, the employee_id column does not contain any duplicate value at the time of insertion, and the foreign key column job_id, referenced by the column job_id of jobs table, can contain only those values which are exists in the jobs table. The InnoDB Engine have been used to create the tables. The specialty of the statement is that, The ON DELETE NO ACTION and the ON UPDATE NO ACTION actions will reject the deletion and any updates.

````
Solution:
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`(
  `employee_id` INT (8) UNSIGNED NOT NULL,
  `first_name` VARCHAR (15) NOT NULL,
  `last_name` VARCHAR (15) NOT NULL,
  `email` VARCHAR (255) NOT NULL,
  `phone_number` BIGINT (11) UNSIGNED NOT NULL,
  `hire_date` DATE NOT NULL,
  `job_id` VARCHAR (8) NOT NULL,
  `salary` INT(11) UNSIGNED NOT NULL,
  `commission` INT(11) UNSIGNED DEFAULT NULL,
  `manager_id` DECIMAL(6,0) NOT NULL,
  `department_id` DECIMAL(4,0) NOT NULL,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`job_id`) REFERENCES `jobs`(`job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
)CHARSET = utf8 COLLATE = utf8_unicode_ci;
````
