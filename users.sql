DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id          INT(11) NOT NULL AUTO_INCREMENT,
    name        VARCHAR(255) NOT NULL,
    phone       VARCHAR(10) NOT NULL,
    email       VARCHAR(255) NOT NULL UNIQUE,
    password    VARCHAR(255) NOT NULL,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ;