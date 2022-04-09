## The Problem

Using Technologies below:
PHP 7.4 or 8 - Vanilla or OOP
MySQL 8
HTML
Ajax

Design a one page html file, inputs are:
name: input
surname: input
South African ID : input
age: read-only auto populate this field from ZAID
date of birth: read-only auto populate this field from ZAID

Functionality
Save to database using Ajax
Simple datatable showing what was written to the database after saving the above

## Test Instructions

- Load the files in a directory or homedirectory and access the index.php
- Configure the database connection in the includes/db_connect.php file with the correct parameters on your database
- Create the persons table in your database

- Table structure for table `persons`

 ```
CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `zaid` varchar(20) DEFAULT NULL,
  `age` smallint(6) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zaid` (`zaid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
 ```
- Access the index.php from your browser
- Test by adding valid and invalid values

