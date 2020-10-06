SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

ALTER TABLE `#__redshopb_product` DROP FOREIGN KEY `#__rs_prod_fk6`;

ALTER TABLE `#__redshopb_product`
    ADD CONSTRAINT `#__rs_prod_fk6` FOREIGN KEY (`unit_measure_id`) REFERENCES `#__redshopb_unit_measure` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;