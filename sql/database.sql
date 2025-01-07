DROP DATABASE IF EXISTS devblog_db;
CREATE DATABASE devblog_db;

-- Connect to the database
USE devblog_db;


-- Create users table first
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    bio TEXT,
    profile_picture_url VARCHAR(255)
) 

-- Create categories table
CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL
)

-- Create articles table with proper foreign keys
CREATE TABLE articles (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    excerpt TEXT,
    meta_description VARCHAR(160),
    category_id BIGINT NOT NULL,
    featured_image VARCHAR(255),
    status ENUM('draft', 'published', 'scheduled') NOT NULL DEFAULT 'draft',
    scheduled_date DATETIME NULL,
    author_id BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    views INTEGER DEFAULT 0,
    KEY idx_articles_category (category_id),
    KEY idx_articles_author (author_id),
    KEY idx_articles_status_date (status, scheduled_date),
    CONSTRAINT fk_articles_category FOREIGN KEY (category_id)
        REFERENCES categories (id)
    -- CONSTRAINT fk_articles_author FOREIGN KEY (author_id) 
        -- REFERENCES users (id)
)





-- Create tags table
CREATE TABLE tags (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
) 


-- Create article_tags table
CREATE TABLE article_tags (
    article_id BIGINT UNSIGNED,
    tag_id BIGINT,
    PRIMARY KEY (article_id, tag_id),
    CONSTRAINT fk_article_tags_article FOREIGN KEY (article_id) 
        REFERENCES articles (id) ON DELETE CASCADE,
    CONSTRAINT fk_article_tags_tag FOREIGN KEY (tag_id) 
        REFERENCES tags (id) ON DELETE CASCADE
)

ALTER TABLE articles
DROP COLUMN excerpt
DROP COLUMN meta_description,

DROP COLUMN featured_image,
DROP COLUMN author_id,
DROP COLUMN created_at,
DROP COLUMN updated_at,


DROP COLUMN views,

MODIFY COLUMN id INT AUTO_INCREMENT PRIMARY KEY,

MODIFY COLUMN status VARCHAR(50) NOT NULL
MODIFY COLUMN scheduled_date DATE NOT NULL;

-- Optionally, add foreign key constraint
ALTER TABLE articles
ADD CONSTRAINT fk_articles_category FOREIGN KEY (category_id) REFERENCES categories(id);

-- Optionally, drop old indexes
ALTER TABLE articles
DROP INDEX idx_articles_slug,
DROP INDEX idx_articles_category,
DROP INDEX idx_articles_author,
DROP INDEX idx_articles_status_date;
