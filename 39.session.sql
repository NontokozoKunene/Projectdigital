

CREATE TABLE sales (
     id INT AUTO_INCREMENT PRIMARY KEY,
    pub_name VARCHAR(50) NOT NULL,
    beer_name VARCHAR(100) NOT NULL,
    quantity_sold INT NOT NULL,
    sale_date DATE NOT NULL
);

INSERT INTO sales (id, pub_name, beer_name, quantity_sold, sale_date, created_at)
VALUES (1, 'Pub 1', 'Beer A', 10, '2023-01-01', NOW());