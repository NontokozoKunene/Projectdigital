

-- Create the database


-- Use the database
USE beer_sales;

-- Create a table for beer names
CREATE TABLE beer_names (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Insert some sample beer names
INSERT INTO beer_names (name) VALUES ('corona'), ('Lager'), ('Stout');

-- Create a table for pubs
CREATE TABLE pubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Insert some sample pubs
INSERT INTO pubs (name) VALUES ('PUB_A'), ('PUB_B'), ('PUB_C');

-- Create a table for sales
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pub_id INT,
    beer_id INT,
    quantity INT,
    FOREIGN KEY (pub_id) REFERENCES pubs(id),
    FOREIGN KEY (beer_id) REFERENCES beer_names(id)
);
