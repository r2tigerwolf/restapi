CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `profile` (`id`, `fname`, `lname`) VALUES
(1, 'Jack', 'Nicholson'),
(2, 'Michael', 'Jackson'),
(3, 'Nicholas', 'Cage'),
(4, 'Bruce', 'Banner'),
(5, 'Clark', 'Kent'),
(6, 'Sarrah', 'Connor'),
(7, 'Bruce', 'Wayne'),
(8, 'David', 'Bautista'),
(9, 'Rick', 'Grimes'),
(10, 'Oswald', 'Chesterfield');

ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);