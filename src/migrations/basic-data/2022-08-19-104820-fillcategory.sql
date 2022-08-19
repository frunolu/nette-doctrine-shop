# SET FOREIGN_KEY_CHECKS=0;

-- Records of category
-- ----------------------------
DELETE FROM `category`;
INSERT INTO `category` VALUES ('1', 'obyvaci-pokoj', 'Obývací pokoj', '2', '0', null);
INSERT INTO `category` VALUES ('2', 'kvetinace', 'Květináče', '3', '0', '1');
INSERT INTO `category` VALUES ('3', 'zaclony', 'Záclony', '6', '0', '1');
INSERT INTO `category` VALUES ('4', 'sklenene-kvetinace', 'Skleněné květináče', '4', '0', '2');
INSERT INTO `category` VALUES ('5', 'kuchyne', 'Kuchyně', '8', '0', null);
INSERT INTO `category` VALUES ('8', 'koupelny', 'Koupelny', '12', '0', null);
INSERT INTO `category` VALUES ('9', 'loznice', 'Ložnice', '15', '0', null);
INSERT INTO `category` VALUES ('10', 'keramicke-kvetinace', 'Keramické květináče', '5', '0', '2');
INSERT INTO `category` VALUES ('11', 'nabytek', 'Nábytek', '7', '0', '1');
INSERT INTO `category` VALUES ('12', 'kuchynske-desky', 'Kuchyňské desky', '9', '0', '5');
INSERT INTO `category` VALUES ('13', 'odkapavace', 'Odkapávače', '10', '0', '5');
INSERT INTO `category` VALUES ('14', 'nadobi', 'Nádobí', '11', '0', '5');
INSERT INTO `category` VALUES ('15', 'povleceni', 'Povlečení', '16', '0', '9');
INSERT INTO `category` VALUES ('16', 'matrace', 'Matrace', '17', '0', '9');
INSERT INTO `category` VALUES ('17', 'umyvadla', 'Umyvadla', '13', '0', '8');
INSERT INTO `category` VALUES ('18', 'kosmetika', 'Kosmetika', '14', '0', '8');
INSERT INTO `category` VALUES ('19', 'nezarazeno', 'Nezařazeno', '18', '1', null);
INSERT INTO `category` VALUES ('20', 'zpusoby-dopravy', 'Způsoby dopravy', '19', '1', null);
