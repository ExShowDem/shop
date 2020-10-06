SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

ALTER TABLE `#__redshopb_manufacturer` DROP FOREIGN KEY `#__rs_manufacturer_fk1`;

ALTER TABLE `#__redshopb_manufacturer`
    ADD CONSTRAINT `#__rs_manufacturer_fk1` FOREIGN KEY (`parent_id`) REFERENCES `#__redshopb_manufacturer` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;