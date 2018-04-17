CREATE TABLE countries (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    country varchar(50) NOT NULL,
    code varchar(5) NOT NULL
);

-- INSERTING DUMMY TO COUNTRIES --
INSERT INTO countries (country, code)
VALUES('Algeria', 'DZA'),
('American Samoa', 'ASM'),
('Guam', 'GUM'),
('Philippines', 'PHL');