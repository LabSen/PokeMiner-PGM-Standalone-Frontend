ALTER TABLE sightings
ADD last_modified integer DEFAULT NULL;

CREATE SEQUENCE pokedex_seq;

CREATE TABLE IF NOT EXISTS pokedex (
  id int NOT NULL DEFAULT NEXTVAL ('pokedex_seq'),
  identifier varchar(40) DEFAULT NULL,
  push varchar(1) NOT NULL DEFAULT '0',
  rarity varchar(50) DEFAULT 'Common',
  PRIMARY KEY (id)
)  ;

ALTER SEQUENCE pokedex_seq RESTART WITH 10092;

-- Dumping data for table pokeminer.pokedex: ~748 rows (approximately)
DELETE FROM pokedex;
/*!40000 ALTER TABLE `pokedex` DISABLE KEYS */;
INSERT INTO pokedex (id, identifier, push, rarity) VALUES
	(1, 'Bulbasaur', '0', 'Rare'),
	(2, 'Ivysaur', '0', 'Very Rare'),
	(3, 'Venusaur', '1', 'Ultra Rare'),
	(4, 'Charmander', '0', 'Rare'),
	(5, 'Charmeleon', '0', 'Very Rare'),
	(6, 'Charizard', '1', 'Ultra Rare'),
	(7, 'Squirtle', '0', 'Rare'),
	(8, 'Wartortle', '0', 'Very Rare'),
	(9, 'Blastoise', '1', 'Ultra Rare'),
	(10, 'Caterpie', '0', 'Common'),
	(11, 'Metapod', '0', 'Uncommon'),
	(12, 'Butterfree', '0', 'Rare'),
	(13, 'Weedle', '0', 'Common'),
	(14, 'Kakuna', '0', 'Uncommon'),
	(15, 'Beedrill', '0', 'Rare'),
	(16, 'Pidgey', '0', 'Common'),
	(17, 'Pidgeotto', '0', 'Uncommon'),
	(18, 'Pidgeot', '0', 'Uncommon'),
	(19, 'Rattata', '0', 'Common'),
	(20, 'Raticate', '0', 'Uncommon'),
	(21, 'Spearow', '0', 'Common'),
	(22, 'Fearow', '0', 'Uncommon'),
	(23, 'Ekans', '0', 'Uncommon'),
	(24, 'Arbok', '0', 'Rare'),
	(25, 'Pikachu', '0', 'Rare'),
	(26, 'Raichu', '1', 'Very Rare'),
	(27, 'Sandshrew', '0', 'Uncommon'),
	(28, 'Sandslash', '0', 'Rare'),
	(29, 'Nidoran-F', '0', 'Common'),
	(30, 'Nidorina', '0', 'Uncommon'),
	(31, 'Nidoqueen', '1', 'Very Rare'),
	(32, 'Nidoran-M', '0', 'Common'),
	(33, 'Nidorino', '0', 'Uncommon'),
	(34, 'Nidoking', '1', 'Very Rare'),
	(35, 'Clefairy', '0', 'Common'),
	(36, 'Clefable', '0', 'Rare'),
	(37, 'Vulpix', '0', 'Uncommon'),
	(38, 'Ninetales', '0', 'Rare'),
	(39, 'Jigglypuff', '0', 'Common'),
	(40, 'Wigglytuff', '0', 'Rare'),
	(41, 'Zubat', '0', 'Common'),
	(42, 'Golbat', '0', 'Rare'),
	(43, 'Oddish', '0', 'Common'),
	(44, 'Gloom', '0', 'Rare'),
	(45, 'Vileplume', '0', 'Rare'),
	(46, 'Paras', '0', 'Common'),
	(47, 'Parasect', '0', 'UnCommon'),
	(48, 'Venonat', '0', 'Common'),
	(49, 'Venomoth', '0', 'Uncommon'),
	(50, 'Diglett', '0', 'Rare'),
	(51, 'Dugtrio', '0', 'Very Rare'),
	(52, 'Meowth', '0', 'Common'),
	(53, 'Persian', '0', 'Rare'),
	(54, 'Psyduck', '0', 'Common'),
	(55, 'Golduck', '0', 'Rare'),
	(56, 'Mankey', '0', 'Uncommon'),
	(57, 'Primeape', '0', 'Rare'),
	(58, 'Growlithe', '0', 'Uncommon'),
	(59, 'Arcanine', '1', 'Very Rare'),
	(60, 'Poliwag', '0', 'Common'),
	(61, 'Poliwhirl', '0', 'Rare'),
	(62, 'Poliwrath', '1', 'Very Rare'),
	(63, 'Abra', '0', 'Common'),
	(64, 'Kadabra', '0', 'Rare'),
	(65, 'Alakazam', '1', 'Ultra Rare'),
	(66, 'Machop', '0', 'Common'),
	(67, 'Machoke', '0', 'Rare'),
	(68, 'Machamp', '1', 'Very Rare'),
	(69, 'Bellsprout', '0', 'Common'),
	(70, 'Weepinbell', '0', 'Rare'),
	(71, 'Victreebel', '0', 'Rare'),
	(72, 'Tentacool', '0', 'Common'),
	(73, 'Tentacruel', '0', 'Rare'),
	(74, 'Geodude', '0', 'Uncommon'),
	(75, 'Graveler', '0', 'Rare'),
	(76, 'Golem', '0', 'Very Rare'),
	(77, 'Ponyta', '0', 'Uncommon'),
	(78, 'Rapidash', '0', 'Rare'),
	(79, 'Slowpoke', '0', 'Uncommon'),
	(80, 'Slowbro', '0', 'Rare'),
	(81, 'Magnemite', '0', 'Common'),
	(82, 'Magneton', '0', 'Uncommon'),
	(83, 'Farfetchd', '0', 'Ultra Rare'),
	(84, 'Doduo', '0', 'Uncommon'),
	(85, 'Dodrio', '0', 'Rare'),
	(86, 'Seel', '0', 'Uncommon'),
	(87, 'Dewgong', '0', 'Rare'),
	(88, 'Grimer', '0', 'Rare'),
	(89, 'Muk', '1', 'Ultra Rare'),
	(90, 'Shellder', '0', 'Common'),
	(91, 'Cloyster', '0', 'Uncommon'),
	(92, 'Gastly', '0', 'Common'),
	(93, 'Haunter', '0', 'Uncommon'),
	(94, 'Gengar', '0', 'Very Rare'),
	(95, 'Onix', '0', 'Very Rare'),
	(96, 'Drowzee', '0', 'Common'),
	(97, 'Hypno', '0', 'Uncommon'),
	(98, 'Krabby', '0', 'Common'),
	(99, 'Kingler', '0', 'Rare'),
	(100, 'Voltorb', '0', 'Common'),
	(101, 'Electrode', '0', 'Rare'),
	(102, 'Exeggcute', '0', 'Rare'),
	(103, 'Exeggutor', '1', 'Ultra Rare'),
	(104, 'Cubone', '0', 'Uncommon'),
	(105, 'Marowak', '0', 'Rare'),
	(106, 'Hitmonlee', '0', 'Rare'),
	(107, 'Hitmonchan', '0', 'Rare'),
	(108, 'Lickitung', '0', 'Very Rare'),
	(109, 'Koffing', '0', 'Rare'),
	(110, 'Weezing', '0', 'Very Rare'),
	(111, 'Rhyhorn', '0', 'Uncommon'),
	(112, 'Rhydon', '1', 'Very Rare'),
	(113, 'Chansey', '1', 'Ultra Rare'),
	(114, 'Tangela', '1', 'Ultra Rare'),
	(115, 'Kangaskhan', '0', 'Ultra Rare'),
	(116, 'Horsea', '0', 'Common'),
	(117, 'Seadra', '0', 'Rare'),
	(118, 'Goldeen', '0', 'Common'),
	(119, 'Seaking', '0', 'Rare'),
	(120, 'Staryu', '0', 'Uncommon'),
	(121, 'Starmie', '0', 'Rare'),
	(122, 'Mr-Mime', '0', 'Uncommon'),
	(123, 'Scyther', '0', 'Very Rare'),
	(124, 'Jynx', '0', 'Uncommon'),
	(125, 'Electabuzz', '0', 'Very Rare'),
	(126, 'Magmar', '0', 'Very Rare'),
	(127, 'Pinsir', '0', 'Very Rare'),
	(128, 'Tauros', '0', 'Ultra Rare'),
	(129, 'Magikarp', '0', 'Common'),
	(130, 'Gyarados', '1', 'Ultra Rare'),
	(131, 'Lapras', '1', 'Ultra Rare'),
	(132, 'Ditto', '1', 'Ultra Rare'),
	(133, 'Eevee', '0', 'Uncommon'),
	(134, 'Vaporeon', '1', 'Ultra Rare'),
	(135, 'Jolteon', '1', 'Ultra Rare'),
	(136, 'Flareon', '1', 'Ultra Rare'),
	(137, 'Porygon', '0', 'Very Rare'),
	(138, 'Omanyte', '0', 'Rare'),
	(139, 'Omastar', '1', 'Ultra Rare'),
	(140, 'Kabuto', '0', 'Rare'),
	(141, 'Kabutops', '1', 'Ultra Rare'),
	(142, 'Aerodactyl', '1', 'Very Rare'),
	(143, 'Snorlax', '1', 'Ultra Rare'),
	(144, 'Articuno', '1', 'Ultra Rare'),
	(145, 'Zapdos', '1', 'Ultra Rare'),
	(146, 'Moltres', '1', 'Ultra Rare'),
	(147, 'Dratini', '0', 'Rare'),
	(148, 'Dragonair', '1', 'Very Rare'),
	(149, 'Dragonite', '1', 'Ultra Rare'),
	(150, 'Mewtwo', '1', 'Very Rare'),
	(151, 'Mew', '1', 'Very Rare');