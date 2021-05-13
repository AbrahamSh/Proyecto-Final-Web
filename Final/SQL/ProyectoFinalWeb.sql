-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2021 at 09:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `producto_comprado` int(11) DEFAULT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `producto_comprado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `historial`
--

INSERT INTO `historial` (`id_historial`, `id_usuario`, `producto_comprado`, `fecha`, `cantidad`, `total`) VALUES
(1, 2, 1, '2021-05-12', 5, '6443.81'),
(2, 2, 2, '2021-05-12', 3, '6443.81'),
(3, 2, 3, '2021-05-12', 2, '6443.81');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fabricante` varchar(200) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `editorial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `foto`, `precio`, `cantidad`, `fabricante`, `origen`, `editorial`) VALUES
(1, 'V for Vendetta', 'SC, TPB, in cello, New, Written by Alan Moore. Art by David Lloyd. Published in December of 2005. Softcover, 296 pages, full color. Cover price $19.99.', 'comic1.jpg', '397.00', 45, 'Alan Moore', 'Inglés', 'Vertigo'),
(2, 'Watchmen: Edición Deluxe', '¿Quién vigila a los vigilantes? Nueva York, 1985. El cruento asesinato de Edward Blake, el Comediante, deja tras de sí un smiley manchado de sangre y moviliza a los pocos justicieros que aún viven. Uno de los más resolutivos e implacables, Rorschach (Walter J. Kovacs), emprende una investigación que le hará reencontrarse con el desengañado Búho Nocturno (Dan Dreiberg), el poderoso Dr. Manhattan (Jon Osterman), el multimillonario Ozymandias, considerado“el hombre más listo del mundo” (Adrian Veidt), y la renuente y atormentada Espectro de Seda (Laurie Juspeczyk). Juntos afrontarán un pasado terrible, bajo la sombra de los Minutemen, y tratarán de superarlo para salvar el futuro si es que el fin, cada vez más cerca, no llega antes y destruye la Tierra por completo.', 'comic.jpg', '786.27', 47, 'Alan Moore', 'Inglés', 'Vertigo'),
(3, 'Absolute Batman: The Killing Joke (30th Anniversary Edition', 'One bad day. Freed once again from the confines of Arkham Asylum, The Joker is out to prove a deranged point. And he\'s going to use Gotham City\'s top cop, commissioner Jim Gordon, and his brilliant daughter Barbara (a.k.a. Batgirl) to do it. Now Batman must race to stop his archnemesis before his reign of terror claims two of the Dark Knight\'s closest friends.', 'comic2.jpg', '1000.00', 27, 'Alan Moore', 'Inglés', 'DC'),
(4, 'Heroes in Crisis', 'There\'s a new kind of crisis threatening the heroes of the DC Universe, ripped from real-world headlines by CIA-operative turned comics writer Tom King: How does a superhero handle PTSD?THERE\'S NEVER BEEN A CRISIS LIKE THIS.', 'comic3.jpg', '554.77', 50, 'Tom King', 'Inglés', 'DC'),
(5, 'Maus', 'Maus es la biografía de Vladek Spiegelman, un judío polaco superviviente de los campos de exterminio nazis, contada a través de su hijo Art, un dibujante de cómics que quiere dejar memoria de la aterradora persecución que sufrieron millones de personas en la Europa sometida por Hitler y de las consecuencias de este sufrimiento en la vida cotidiana de las generaciones posteriores. Apartándose de las formas de literatura creadas hasta la publicación de Maus, Art Spiegelman se aproxima al tema del Holocausto de un modo absolutamente renovador, y para ello relata la experiencia de su propia familia en forma de memoria gráfica, utilizando todos los recursos estilísticos y narrativos tradicionales de este género y, a la vez, inventando otros nuevos.', 'comic4.jpg', '389.00', 50, 'Art Spiegelman', 'Español', 'Penguin Random House Grupo Editorial SA de CV (1 marzo 2015)'),
(6, 'Infinity Gauntlet', 'It\'s the Avengers, the New Warriors, the X-Men and more against the omnipotent Eternal, Thanos! The Mad Titan has become the most powerful being in the universe, and enslavement or destruction may be the only choices he gives it! The successive Starlin sagas that shook space and time start here!', 'comic5.jpg', '429.00', 19, 'Jim Starlin', 'Inglés', 'Marvel'),
(7, 'Civil war', 'The landscape of the Marvel Universe is changing, and it\'s time to choose: Whose side are you on? A conflict has been brewing from more than a year, threatening to pit friend against friend, brother against brother - and all it will take is a single misstep to cost thousands their lives and ignite the fuse.', 'comic6.jpg', '545.00', 50, 'Mark Millar', 'Inglés', 'Marvel'),
(8, 'Marvel Zombies', 'On an Earth shockingly similar to the Marvel Universe\'s, an alien virus has mutated all of the world\'s greatest super heroes into flesh-eating monsters! It took them only hours to destroy life as we know it - but what happens when they run out of humans to eat?', 'comic7.jpg', '323.98', 15, 'Robert Kirkman', 'Inglés', 'Marvel'),
(9, 'Flashpoint', 'Not a dream, not an imaginary story, not an elseworld. This is Flash Fact: When Barry Allen wakes at his desk, he discovers the world has changed. Family is alive, loved ones are strangers, and close friends are different, gone or worse. It\'s a world on the brink of a cataclysmic war--but where are Earth\'s Greatest Heroes to stop it? It\'s a place where America\'s last hope is Cyborg, who hopes to gather the forces of The Outsider, The Secret 7, Shazam!, Citizen Cold and other new and familiar-yetaltered faces! It\'s a world that could be running out of time, if The Flash can\'t find the villain who altered the time line!', 'comic8.jpg', '389.00', 35, 'Geoff Johns', 'Inglés', 'DC'),
(10, 'The Sandman Vol 1: Preludes &amp; Nocturnes', 'The Sandman Vol. 1: Preludes &amp; Nocturnes 30th Anniversary Edition collects issues #1-8 of the original run of The Sandman, beginning an epic saga unique in graphic literature and introducing readers to a dark and enchanting world of dreams and nightmares--the home of Morpheus, the King of Dreams, and his kin, the Endless.', 'comic9.jpg', '343.00', 20, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(11, 'The Sandman Vol. 2: The Doll\'s House', 'Featuring a brand-new cover and collecting issues #9-16 of the original run of The Sandman, The Doll\'s House follows a young woman named Rose Walker as she discovers the singular nature of her identity. Rose\'s journey is watched closely by the King of Dreams, for whom she becomes both an intriguing mystery and a deadly threat.', 'comic10.jpg', '333.00', 20, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(12, 'The Sandman Vol. 3: Dream Country', 'The third book of the Sandman collection is a series of four short comic book stories. In each of these otherwise unrelated stories, Morpheus serves only as a minor character. Here we meet the mother of Morpheus\'s son, find out what cats dream about, and discover the true origin behind Shakespeare\'s A Midsummer\'s Night Dream. The latter won a World Fantasy Award for best short story, the first time a comic book was given that honor.  Collects THE SANDMAN #17-20.', 'comic11.jpg', '404.95', 30, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(13, 'he Sandman Vol. 4: Season of Mists', 'Ten thousand years ago, Morpheus condemned a woman who loved him to Hell. Now the other members of his immortal family, The Endless, have convinced the Dream King that this was an injustice. To make it right, Morpheus must return to Hell to rescue his banished love -- and Hell\'s ruler, the fallen angel Lucifer, has already sworn to destroy him. Collects THE SANDMAN #21-28.', 'comic12.jpg', '358.00', 20, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(14, 'The Sandman Vol. 5: A Game of You', 'One of the most popular and critically acclaimed graphic novels of all time, Neil Gaiman\'s award-winning masterpiece The Sandman set the standard for mature, lyrical fantasy in the modern comics era. Illustrated by critically acclaimed artists, the series is a rich blend of modern and ancient mythology in which contemporary fiction, historical drama and legend are seamlessly interwoven. Collects The Sandman #32-37.', 'comic13.jpg', '358.00', 25, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(15, 'The Sandman Vol. 6: Fables & Reflections', 'One of the most popular and critically acclaimed graphic novels of all time, Neil Gaiman\'s award-winning masterpiece The Sandman set the standard for mature, lyrical fantasy in the modern comics era. Illustrated by an exemplary selection of the medium\'s most gifted artists, the series is a rich blend of modern and ancient mythology in which contemporary fiction, historical drama and legend are seamlessly interwoven. Collects The Sandman #29-31, #38-40, #50, Sandman Special #1 and Vertigo Preview #1.', 'comic14.jpg', '404.95', 30, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(16, 'The Sandman Vol. 7: Brief Lives', 'In Brief Lives, Delirium, youngest of the extended family known as the Endless, prevails upon her brother Dream to help find their missing sibling, Destruction. Their subsequent odyssey through the waking world, and their final confrontation with Destruction--as well as the resolution of Dream\'s painful relationship with his son, Orpheus--will change the Endless forever. Collects The Sandman #41-49.', 'comic15.jpg', '305.00', 35, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(17, 'The Sandman Vol. 8: World\'s End ', 'In Worlds\' End, wayfarers from throughout time, myth and imagination seek shelter from the fury of a reality storm in the welcoming halls of a mysterious inn. As they wait out the tempest raging around them, the travelers share stories of the places they have been, the things they have seen...and those that they have dreamed. Collects The Sandman #51-56.', 'comic16.jpg', '305.00', 30, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(18, 'Sandman Vol. 9: The Kindly Ones', 'The Kindly Ones have many names: The Erinyes. The Eumenides. The Dirae. The Furies. Agents of vengeance, implacable and unstoppable, they do not rest until the crimes they seek to punish are washed clean with blood. It is to them Lyta Hall turns when her baby, Daniel, is taken from her, and it is Dream of the Endless who becomes their target. But behind a mother\'s grief and unyielding rage, there are darker forces at work, and what they set in motion will eventually demand a sacrifice greater than any the Dreaming has yet known. Collects The Sandman #57-69 and Vertigo Jam #1.', 'comic17.jpg', '452.00', 36, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(19, 'Sandman Vol. 10: The Wake', 'In The Wake, ancient gods, old friends and enemies alike gather to pay tribute to the fallen King of Dreams, bringing to a close the long story of Morpheus of the Endless. In the aftermath, echoes of Morpheus reverberate, touching a man who refuses to die, a Chinese sage lost in a desert of dreams and an aging William Shakespeare, who must fulfill one last obligation to the Sandman in his own twilight years. Collects The Sandman #70-75.', 'comic18.jpg', '352.00', 35, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(20, 'Sandman Vol. 11: Endless Nights', 'Endless Nights returns to the realm of the Dreaming with seven remarkable stories--one for each member of the otherworldly Endless family\'--illustrated by an international roster of artists drawn from the ranks of comics\' greatest talents. By turns haunting, bittersweet, erotic, and nightmarish, these provocative tales range across space and time to reveal strange secrets and surprising truths about the immortal siblings Death, Desire, Delirium, Dream, Despair, Destruction, and Destiny.', 'comic19.jpg', '378.00', 38, 'Neil Gaiman', 'Inglés', 'Vertigo'),
(21, 'Deadpool Versus Marvel', 'Todo lo que sabías acerca del primer encuentro entre Deadpool y Cable era un error… ¡ahora conoce toda la historia. ¿Podrá X-Force salvar la historia de las manos de Deadpool? Y luego, ¡Wade Wilson viaja al infinito y más allá dándose de guanteletazos con Thanos, el Titán Loco. ¿Pero quién se ganará la blanca y huesuda mano de la Muerte? ¡Y llega la batalla definitiva del demente bueno contra el demente malo cuando Deadpool enfrenta a Carnage. ¡Habrá mucha sangre. ¡Y el Degenerado que se regenera sale con Hawkeye la noche de Halloween. ¡Uh, terrorífico. Además: ¡Madcap se apodera de la cabeza de Wade y DP ayuda a su “mejor amigo” Spidey portando sus redes. ¡Hará muchos amigos e influenciará a la gente al estilo Deadpool.\r\n¡El Mercenario Bocón contra los más grandes héroes de Marvel y sus villanos más viles.\r\nRecopila Deadpool vs. X-Force #1-4, Deadpool Annual (2013) #1-2, Deadpool vs. Thanos #1-4, Deadpool vs. Carnage #1-4 y Hawkeye vs. Deadpool #0-4.', 'comic20.jpg', '399.00', 50, 'Duane Swierczynski', 'Español', 'Marvel'),
(22, 'ABSOLUTE CARNAGE DELUXE', 'Carnage, el descendiente psicótico de Venom está de regreso, y ¡planea matar a todos los que alguna vez han usado un simbionte! Cletus Kasady se mantuvo al borde de la periferia del Universo Marvel durante meses y ahora está listo para hacer su triunfal regreso a Nueva York, ¡más poderoso que nunca! Y para empeorar un poco más las cosas, existe un nuevo jugador en la cancha, ¡que no es quien esperabas! Spider-Man y Venom harán frente a la locura de Carnage pero, las cosas no se ven nada bien. Estos inquietos aliados apenas han sido capaces de escapar vivos y no han tenido más remedio que arrastrar con ellos a una gran cantidad de héroes que también están en la mira de Carnage. Por impactante que parezca, no todos saldrán enteros de este conflicto... claro, ¡si acaso lo logran! Recopila Absolute Carnage #1-5 y materiales del Free Comic Book Day 2019 (Spider-Man/Venom) #1', 'comic21.jpg', '369.00', 50, 'Donny Cates', 'Español', 'Marvel'),
(23, 'The Superior Spider-Man Vol. 1', '¡El Doctor Octopus ha logrado la mayor victoria contra Spider-Man.\r\nDespués de años de ser derrotado a manos del trepamuros, OTTO OCTAVIUS ha conseguido lo impensable… ¡PONER SU MENTE EN EL CUERPO DE PETER PARKER. Una asombrosa era terminó, ¡pero una nueva inicia para un inteligente y fuerte Superior Spider-Man. Y vaya que lo demostrará haciendo mejoras a su traje y derrotando a los nuevos Seis Siniestros.\r\nPero las cosas no serán muy amigables en el vecindario de Spidey, pues sus despiadados métodos para combatir el crimen causarán preocupación en sus compañeros héroes. ¿Acaso sus acciones violentas harán que deje de ser un Vengador? Con apariciones de enemigos clásicos como el Buitre y el Duende Verde, y nuevos amigos como Anna Maria Marconi, este es un Spider-Man como nunca lo has visto… Pero… ¿qué le sucedió al verdadero Peter Parker?', 'comic22.jpg', '349.00', 25, 'Dan Slott', 'Español', 'Marvel'),
(24, 'SECRET WARS MARVEL DELUXE', 'El multiverso ha colapsado. Sólo dos realidades permanecen. Ahora el Universo Marvel  y el Universo Ultimate, colisionarán. Los héroes de cada Tierra lucharán para salvar sus hogares. Y fallarán. Pero de la nada, saldrá un increíble planeta formado de retazos a partir de los restos de mundos perdidos. Reinos repletos de caras, sólo que, diferentes. Un lugar de fronteras estrictas, donde la ley y el orden se han mantenido bajo la vigilancia de un ejército de cientos de Thors y los pecadores son arrojados a los terrores profanos detrás de la muralla. Un Mundo Batalla en conflicto constante, que hereda todo lo que anteriormente fue consignado al mito y la leyenda. Mantenerlo unido es la voluntad de hierro de un hombre, con un poder del más allá que lo convierte en un dios. ¿Qué esperanza tiene la humanidad cuando su única salvación es... la fatalidad? Con portada de Alex Ross. Recopila Secret Wars #1-9, incluye material del Free Comic Book Day 2015 (Secret Wars) #0.', 'comic23.jpg', '369.00', 30, 'Jonathan Hickman', 'Español', 'Marvel'),
(25, 'BATMAN THE DARK KNIGHT SAGA', 'Esta obra maestra de la narrativa moderna en cómic le da potente vida a un mundo oscuro y a un hombre aún más oscuro. Junto al entintador Klaus Janson y la colorista Lynn Varley, el escritor/artista Frank Miller reinventó completamente la leyenda de Batman en su saga de una Gotham City que se ha podrido en un futuro cercano, 10 años después de que el Caballero Oscuro se ha retirado. El crimen corre desenfrenado sobre las calles, y el hombre que fue Batman continúa torturado por el recuerdo de sus padres muertos. Conforme la sociedad civil se desmorona a su alrededor, el aspecto vigilante largamente reprimido de Bruce Wayne finalmente se libera de sus grilletes autoimpuestos. Treinta años después de su debut, BATMAN: THE DARK KNIGHT RETURNS permanece como un clásico indiscutible y una de las historias más influyentes jamás contadas en el medio del cómic. Esta edición reúne BATMAN: THE DARK KNIGHT RETURNS #1-4 y su secuela BATMAN: THE DARK KNIGHT STRIKES AGAIN #1-3.', 'comic24.jpg', '444.00', 34, 'Frank Miller', 'Español', 'DC'),
(26, 'The Batman Who Laughs', 'A New York Times bestselling Graphic Novel!\r\nA Batman who laughs is a Batman who always wins.\r\nHe unleashed the Dark Multiverse in the epic series Dark Nights: Metal. Now superstar writer Scott Snyder reunites with acclaimed artist Jock (Batman: Black Mirror) to set that evil alternate reality\'s deadliest denizen loose in Gotham City--and the original Dark Knight will never be the same!\r\nHalf Batman. Half Joker. Combining everything that makes the Caped Crusader a hero and the Clown Prince a killer, the Batman Who Laughs is the Dark Multiverse\'s deadliest criminal mastermind. Now he\'s come to Gotham to turn Bruce Wayne\'s home into an incubator for evil.\r\nA New York Times bestselling Graphic Novel!', 'comic25.jpg', '607.00', 50, 'Scott Snyder', 'Inglés', 'DC'),
(27, 'Justice League, Volume 1', 'Worlds collide in DC Comics and Dark Horse\'s greatest crossover events featuring the Justice League!\r\nIn the dense forests of Central America, Superman makes an incredible discovery: a spacecraft of unknown origin, which could point humanity toward new technological advances--or spell its doom. As the Man of Steel realizes the ship is somehow draining his powers, a terrorist organization arrives to use the ship for their own nefarious plans. As Superman struggles to focus his waning power, the ship\'s predatory owner returns...\r\nWhen the insane sentient computer, Skynet, sends Terminators to present-day Metropolis to hunt John Connor, it didn\'t plan on the Man of Steel coming to the rescue...or did it? As the battle to save mankind rages in the Metropolis of the present and the future, will the combined might of Superman, Supergirl, Superboy and Steel be enough to stop the deadly killing machines--and their new ally, the Cyborg Superman--from terminating John Connor?\r\n', 'comic26.jpg', '419.99', 50, 'Varios', 'Inglés', 'DC Comics/Dark Horse Comics'),
(28, 'Justice League Volume 2', 'In this collection of DC Comics crossovers, Dark Horse brings never republished material featuring a host of heroes back to fans in a single volume. The JLA take on the most frightening hunters in the universe--the Predators--in adaptive superhero form! Batman teams up with Tarzan to resist the claws of the Catwoman as two orphan heroes protect their own jungles. Kyle Rayner must don the mantle of Green Lantern to turn back the tide of Aliens that Hal Jordan once permitted to live. Super-teens join forces as Spyboy and his friends work alongside Young Justice to defeat nightmarish foes.', 'comic27.jpg', '500.00', 50, 'Ron Marz', 'Inglés', 'DC Comics/Dark Horse Comics'),
(29, 'The Magic Order ', 'De día, viven entre nosotros como nuestros amigos, vecinos o compañeros de trabajo. De noche, son brujos, magos y hechiceros que nos protegen de las fuerzas de la oscuridad… ellos son la razón por la que nunca has visto un fantasma. ¡Presentamos el debut de la serie en cómic de Netflix del equipo creativo superestrella compuesto por el escritor Mark Millar (Civil War, Old Man Logan) y el artista Olivier Coipel (The Amazing Spider-Man, Thor)!', 'comic28.jpg', '155.00', 50, 'Mark Millar', 'Español', 'Panini'),
(30, 'The League of Extraordinary Gentlemen', '¡Los héroes más grandes de las novelas de aventuras en formato Trazado!', 'comic29.jpg', '387.00', 50, 'Alan Moore', 'Español', 'Planeta DeAgostini Cómic');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `passwd` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `numero_tarjeta` varchar(18) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `correo`, `passwd`, `fecha_nacimiento`, `numero_tarjeta`, `cp`, `direccion`, `ciudad`, `estado`, `pais`) VALUES
(1, 'Administrador', 'admin@thecomicbookstore.com', 'Asf@1234', '2021-05-12', '000000000000000000', '05120', 'Paseo de los Tamarindos #400 Torre A-5°', 'CDMX', 'México', 'México'),
(2, 'Abraham Shapiro', 'abraham.shapiro@anahuac.mx', 'Asf@00289882', '1998-02-07', '123456789123456789', '05120', 'Paseo de los Tamarindos #400 Torre A-5°', 'CDMX', 'México', 'México');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `producto_comprado` (`producto_comprado`);

--
-- Indexes for table `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `producto_comprado` (`producto_comprado`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_comprado`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`producto_comprado`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
