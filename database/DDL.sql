/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  jrdumayag
 * Created: 05 20, 17
 */
CREATE DATABASE `redfin` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `redfin`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(200) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `date_created` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`));
