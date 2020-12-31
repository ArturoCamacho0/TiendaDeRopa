CREATE DATABASE IF NOT EXISTS tienda_master;

USE tienda_master;

CREATE TABLE user(
	id_user INT AUTO_INCREMENT,
    name_user VARCHAR(100) NOT NULL,
    last_name_user VARCHAR(100),
    email_user VARCHAR(255) NOT NULL UNIQUE,
    password_user VARCHAR(255) NOT NULL,
    role_user VARCHAR(20),
    image_user VARCHAR(255),
    
    CONSTRAINT pk_user PRIMARY KEY (id_user)
)ENGINE=InnoDB;


CREATE TABLE category(
	id_category INT AUTO_INCREMENT,
    name_category VARCHAR(255) NOT NULL,
    
    CONSTRAINT pk_category PRIMARY KEY (id_category)
)ENGINE=InnoDB;


CREATE TABLE product(
	id_product INT AUTO_INCREMENT,
    name_product VARCHAR(255) NOT NULL,
    description_product TEXT,
    price_product float(100, 2) NOT NULL,
    stock_product INT NOT NULL,
    off_product VARCHAR(2),
    date_product DATE NOT NULL,
    image_product VARCHAR(255),
    category_id INT,
    
    CONSTRAINT pk_product PRIMARY KEY (id_product),
    CONSTRAINT fk_category1 FOREIGN KEY (category_id) REFERENCES category(id_category) ON DELETE SET NULL,
    CHECK(stock_product >= 0),
    CHECK(price_product > 0)
)ENGINE=InnoDB;


CREATE TABLE orders(
	id_order INT AUTO_INCREMENT,
    province_order VARCHAR(100) NOT NULL,
    locality_order VARCHAR(100) NOT NULL,
    direction_order VARCHAR(255) NOT NULL,
    cost_order FLOAT(200, 2) NOT NULL,
    status_order VARCHAR(20) NOT NULL,
    date_order DATE,
    hour_order TIME,
    user_id INT,
    
    CONSTRAINT pk_order PRIMARY KEY (id_order),
    CONSTRAINT fk_user1 FOREIGN KEY (user_id) REFERENCES user(id_user) ON DELETE SET NULL,
    CHECK(cost_order >= 0)
)ENGINE=InnoDB;


CREATE TABLE lines_orders(
	id_lineorder INT AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    units INT,
    
    CONSTRAINT pk_lineorder PRIMARY KEY (id_lineorder),
    CONSTRAINT fk_order1 FOREIGN KEY (order_id) REFERENCES orders(id_order) ON DELETE CASCADE,
    CONSTRAINT fk_product1 FOREIGN KEY (product_id) REFERENCES product(id_product) ON DELETE SET NULL
)ENGINE=InnoDB;