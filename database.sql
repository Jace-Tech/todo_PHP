-- CREATING A DATABASE

CREATE DATABASE first_db; -- first_db

-- CREATING TABLE

USE first_db;

-- CREATE A TABLE IN THE `first_db` DB

CREATE TABLE todo_table(
    id INT PRIMARY KEY AUTO_INCREMENT, 
    content VARCHAR(255)
);

-- INT (length)
-- VARCHAR (length) 0 - 65,000
-- TEXT 
-- LONG_TEXT
-- BLOB
-- DATE / DATETIME

-- ADDING DATA IN OUR DATABASE TABLE - C [C.R.U.D]

INSERT INTO todo_table (content) VALUES ('This is my first content');


-- SELECTING A DATA FROM A TABLE - R [C.R.U.D]

-- GETTING A SPECIFIC FIELD
SELECT content FROM todo_table; 

-- GETTING ALL FIELDS
SELECT * FROM todo_table; 


-- CONDITIONAL SELECTION

-- USING THE WHERE CLAUSE WITH COMPARISON OPERATOR
SELECT * FROM todo_table WHERE id < 3; 

-- USING THE WHERE CLAUSE WITH COMPARISON OPERATOR AND LOGICAL OPERATOR
SELECT * FROM todo_table WHERE id < 3 AND id != 1; -- ID - 2

-- UPDATING A ROW IN THE TABLE - U [C.R.U.D]
UPDATE todo_table SET content = 'This is a longer second data' WHERE id = 2

-- DELETING A ROW IN THE TABLE - D [C.R.U.D]
DELETE FROM todo_table WHERE id = 3


