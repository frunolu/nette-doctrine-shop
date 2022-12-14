CREATE TABLE items
(
    id         INT AUTO_INCREMENT NOT NULL,
    order_id   INT      NOT NULL,
    product_id INT      NOT NULL,
    price      INT      NOT NULL,
    created_at DATETIME NOT NULL,
    INDEX      IDX_E11EE94D8D9F6D38 (order_id),
    INDEX      IDX_E11EE94D4584665A (product_id),
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
