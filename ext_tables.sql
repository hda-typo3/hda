#
# Table structure for table 'pages'
#
CREATE TABLE pages ( 
	editor varchar(60) DEFAULT '' NOT NULL,
	editor_substitute varchar(60) DEFAULT '' NOT NULL,
);



ALTER TABLE `fe_users` CHANGE `title` `title` VARCHAR(255) DEFAULT '' NOT NULL 