-- Ajoutez cette partie pour créer une table pour les utilisateurs
CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Ajoutez un utilisateur de test
INSERT INTO users (username, password) VALUES ('demo', 'demopassword');

-- Reste du code pour la table "demo"
CREATE TABLE IF NOT EXISTS demo (
  message VARCHAR(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO demo (message) VALUES('Hello World!');
