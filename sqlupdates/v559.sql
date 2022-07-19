ALTER TABLE `product_stocks` ADD `duration` INT NULL DEFAULT NULL AFTER `qty`;
ALTER TABLE `product_stocks` ADD `sort_order` INT NULL AFTER `duration`;