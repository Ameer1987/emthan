ALTER TABLE `sub_book_type` DROP FOREIGN KEY `FK_874E5A9FE39A1476` ;
ALTER TABLE `sub_book_type` DROP `sub_book_container_type_id`;
DROP TABLE sub_book_container_type;

CREATE TABLE `book_classification` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `item` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

ALTER TABLE `book` ADD `book_classification_id` INT NULL AFTER `book_type_id` ;

ALTER TABLE `emthan`.`book` ADD INDEX ( `book_classification_id` );

ALTER TABLE `book` ADD FOREIGN KEY ( `book_classification_id` ) REFERENCES `emthan`.`book_classification` (
`id`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;

