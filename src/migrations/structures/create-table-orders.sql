CREATE TABLE orders
(
    id               INT AUTO_INCREMENT NOT NULL,
    delivery_name    VARCHAR(255) NOT NULL,
    delivery_address LONGTEXT     NOT NULL,
    created_at       DATETIME     NOT NULL,
    cancelled_at     DATETIME DEFAULT NULL,
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB;
ALTER TABLE items
    ADD CONSTRAINT FK_E11EE94D8D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id);
ALTER TABLE items
    ADD CONSTRAINT FK_E11EE94D4584665A FOREIGN KEY (product_id) REFERENCES product (id);
