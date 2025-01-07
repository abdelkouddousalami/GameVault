-- Active: 1733818924772@@127.0.0.1@3306@phpmyadmin
CREATE DATABASE VideoGame;

USE VideoGame;

CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(255),
    role ENUM('Admin', 'User') DEFAULT 'User',
    banned BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    release_date DATE,
    genre VARCHAR(50),
    description TEXT,
    score FLOAT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE UserGames (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    status ENUM('En cours', 'Terminé', 'Abandonné') DEFAULT 'En cours',
    personal_rating FLOAT,
    play_time INT DEFAULT 0, 
    is_favorite BOOLEAN DEFAULT FALSE,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES Games(id) ON DELETE CASCADE
);

CREATE TABLE Reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    review_text TEXT,
    rating FLOAT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
);


CREATE TABLE ChatRooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    game_id INT NOT NULL,
    message TEXT NOT NULL,
    name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE UserHistory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    action ENUM('Ajouté', 'Modifié', 'Supprimé', 'Favori', 'Critique publiée'),
    action_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Bans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    reason TEXT,
    banned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
cd ..