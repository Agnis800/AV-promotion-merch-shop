/*
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
*/

INSERT INTO users (id, username, email, password)
VALUES (1, "AgnisV", "agnisvanags@gmail.com", "12345678");