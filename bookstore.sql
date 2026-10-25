CREATE TABLE books (
    id          INT(11) NOT NULL AUTO_INCREMENT,
    title       VARCHAR(255) NOT NULL,
    author      VARCHAR(255) NOT NULL,
    audience    ENUM('Kids', 'Adults') NOT NULL,
    category    VARCHAR(50) NOT NULL,
    price       DECIMAL(5,2) NOT NULL,
    image       VARCHAR(255) NOT NULL DEFAULT 'images/placeholder.jpg',
    description TEXT,
    PRIMARY KEY (id)
)   DEFAULT CHARSET=utf8;


-- Data: Kids - Infants
INSERT INTO books (title, author, audience, category, price, image, description) VALUES
(
    'Going on a Bear Hunt',
    'Michael Rosen',
    'Kids',
    'Infants',
    5.99,
    'images/bear_hunt.webp',
    'A classic adventure story about a family going on a bear hunt through grass, a river, mud and a snowstorm.'
),
(
    'The Very Hungry Caterpillar',
    'Eric Carle',
    'Kids',
    'Infants',
    4.99,
    'images/hungry_caterpillar.jpg',
    'A beloved picture book following a caterpillar as he eats through a variety of foods before transforming into a butterfly.'
),
(
    'Goodnight Moon',
    'Margaret Wise Brown',
    'Kids',
    'Infants',
    4.49,
    'images/goodnight_moon.jpg',
    'A soothing bedtime story in which a young bunny says goodnight to everything in his room.'
),
(
    'The Gruffalo',
    'Julia Donaldson',
    'Kids',
    'Infants',
    5.49,
    'images/gruffalo.jpg',
    'A clever mouse outwits predators by inventing a monster called the Gruffalo — only to discover the creature is real.'
);

-- Data: Kids - Junior
INSERT INTO books (title, author, audience, category, price, image, description) VALUES
(
    'The BFG',
    'Roald Dahl',
    'Kids',
    'Junior',
    6.99,
    'images/bfg.jpg',
    'Sophie is snatched from her bed by a Big Friendly Giant and taken to Giant Country, where they hatch a plan to stop man-eating giants.'
),
(
    'Diary of a Wimpy Kid',
    'Jeff Kinney',
    'Kids',
    'Junior',
    7.49,
    'images/wimpy_kid.jpg',
    'Greg Heffley chronicles his middle-school misadventures in this hilarious illustrated journal.'
),
(
    'Matilda',
    'Roald Dahl',
    'Kids',
    'Junior',
    6.49,
    'images/matilda.jpg',
    'A gifted girl with telekinetic powers takes on her awful parents and tyrannical headmistress Miss Trunchbull.'
),
(
    'Charlie and the Chocolate Factory',
    'Roald Dahl',
    'Kids',
    'Junior',
    6.99,
    'images/charlie_chocolate.jpg',
    'Lucky Charlie Bucket wins a golden ticket to tour Willy Wonkas magical and mysterious chocolate factory.'
);

-- Data: Kids - Young
INSERT INTO books (title, author, audience, category, price, image, description) VALUES
(
    'Harry Potter and the Philosophers Stone',
    'J.K. Rowling',
    'Kids',
    'Young',
    8.99,
    'images/harry_potter.jpg',
    'An orphaned boy discovers he is a wizard and begins his education at Hogwarts School of Witchcraft and Wizardry.'
),
(
    'Percy Jackson and the Lightning Thief',
    'Rick Riordan',
    'Kids',
    'Young',
    8.49,
    'images/percy_jackson.jpg',
    'Twelve-year-old Percy Jackson discovers he is the son of Poseidon and must recover Zeus stolen lightning bolt to prevent a war among the gods.'
),
(
    'The Chronicles of Narnia',
    'C.S. Lewis',
    'Kids',
    'Young',
    9.99,
    'images/narnia.jpg',
    'Four siblings discover a magical world through a wardrobe and must help the great lion Aslan defeat the White Witch.'
),
(
    'The Maze Runner',
    'James Dashner',
    'Kids',
    'Young',
    8.99,
    'images/maze_runner.jpg',
    'Thomas wakes up in a mysterious maze with no memory of his past and must find a way to escape with the other trapped teens.'
);

-- Data: Adults - Classic Novels
INSERT INTO books (title, author, audience, category, price, image, description) VALUES
(
    'To Kill a Mockingbird',
    'Harper Lee',
    'Adults',
    'Classic Novels',
    9.99,
    'images/mockingbird.jpg',
    'Set in the American South, this Pulitzer Prize-winning novel follows lawyer Atticus Finch as he defends a Black man falsely accused of a crime.'
),
(
    'Pride and Prejudice',
    'Jane Austen',
    'Adults',
    'Classic Novels',
    7.99,
    'images/pride_prejudice.jpg',
    'Elizabeth Bennet navigates issues of manners, marriage and morality in Georgian England, sparring wittily with the proud Mr Darcy.'
),
(
    'Animal Farm',
    'George Orwell',
    'Adults',
    'Classic Novels',
    6.99,
    'images/animal_farm.jpg',
    'A satirical allegory in which farm animals overthrow their human farmer, only for their new leaders to become as oppressive as the old.'
),
(
    'Romeo and Juliet',
    'William Shakespeare',
    'Adults',
    'Classic Novels',
    5.99,
    'images/romeo_juliet.jpg',
    'Shakespeares timeless tragedy follows two young lovers from feuding families whose romance ends in devastating consequence.'
);

-- Data: Adults - Fiction
INSERT INTO books (title, author, audience, category, price, image, description) VALUES
(
    'Lord of the Flies',
    'William Golding',
    'Adults',
    'Fiction',
    8.99,
    'images/lord_flies.jpg',
    'A group of British boys stranded on an uninhabited island attempt to govern themselves with disastrous results.'
),
(
    'The Da Vinci Code',
    'Dan Brown',
    'Adults',
    'Fiction',
    9.49,
    'images/davinci_code.jpg',
    'Harvard symbologist Robert Langdon investigates a murder in the Louvre and uncovers a centuries-old secret that could shake the foundations of Christianity.'
),
(
    'The Hobbit',
    'J.R.R. Tolkien',
    'Adults',
    'Fiction',
    9.99,
    'images/hobbit.jpg',
    'Bilbo Baggins is swept into an epic quest to reclaim a dwarf kingdom from a fearsome dragon, in Tolkiens beloved prelude to The Lord of the Rings.'
),
(
    'The Lord of the Rings',
    'J.R.R. Tolkien',
    'Adults',
    'Fiction',
    14.99,
    'images/lotr.jpg',
    'The epic fantasy trilogy in which hobbit Frodo Baggins must destroy the One Ring to save Middle-earth from the dark lord Sauron.'
);

-- Data: Adults - Comic
INSERT INTO books (title, author, audience, category, price, image, description) VALUES
(
    'Watchmen',
    'Alan Moore',
    'Adults',
    'Comic',
    12.99,
    'images/watchmen.jpg',
    'In an alternate 1985 America, a group of retired superheroes investigates the murder of one of their own, uncovering a vast conspiracy.'
),
(
    'Batman: Year One',
    'Frank Miller',
    'Adults',
    'Comic',
    10.99,
    'images/batman_year_one.jpg',
    'The definitive origin story of Bruce Waynes transformation into Batman, told alongside Jim Gordons first year on the Gotham police force.'
),
(
    'Maus',
    'Art Spiegelman',
    'Adults',
    'Comic',
    11.99,
    'images/maus.jpg',
    'A Pulitzer Prize-winning graphic novel depicting the Holocaust through the story of the authors father, with Jews as mice and Nazis as cats.'
),
(
    'The Sandman',
    'Neil Gaiman',
    'Adults',
    'Comic',
    13.99,
    'images/sandman.jpg',
    'Dream, the Lord of Dreams, is captured and imprisoned for decades. Upon his escape he must reclaim his realm and rebuild his kingdom.'
);

-- Data: Adults - Crime & Thriller
INSERT INTO books (title, author, audience, category, price, image, description) VALUES
(
    'Gone Girl',
    'Gillian Flynn',
    'Adults',
    'Crime & Thriller',
    9.99,
    'images/gone_girl.jpg',
    'On their fifth wedding anniversary, Amy Dunne disappears. Her husband Nick becomes the prime suspect in a twisting psychological thriller.'
),
(
    'The Silence of the Lambs',
    'Thomas Harris',
    'Adults',
    'Crime & Thriller',
    9.49,
    'images/silence_lambs.jpg',
    'FBI trainee Clarice Starling must seek help from imprisoned cannibal Hannibal Lecter to catch a serial killer known as Buffalo Bill.'
),
(
    'The Girl with the Dragon Tattoo',
    'Stieg Larsson',
    'Adults',
    'Crime & Thriller',
    10.49,
    'images/dragon_tattoo.jpg',
    'Journalist Mikael Blomkvist and hacker Lisbeth Salander investigate a decades-old disappearance within a powerful Swedish family.'
),
(
    'Shutter Island',
    'Dennis Lehane',
    'Adults',
    'Crime & Thriller',
    9.99,
    'images/shutter_island.jpg',
    'US Marshal Teddy Daniels investigates the disappearance of a patient from a remote psychiatric facility — and begins to question his own sanity.'
);
