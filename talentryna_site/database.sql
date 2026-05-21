CREATE DATABASE IF NOT EXISTS talentryna CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE talentryna;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(120) NOT NULL,
  email VARCHAR(160) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  perfil ENUM('admin','empresa','estudante','ong','professor') NOT NULL DEFAULT 'estudante',
  telefone VARCHAR(30),
  instituicao VARCHAR(160),
  area_interesse VARCHAR(160),
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS vagas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(160) NOT NULL,
  empresa VARCHAR(160) NOT NULL,
  descricao TEXT,
  tipo VARCHAR(80),
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome,email,senha,perfil) VALUES
('Administrador','admin@talentryna.com', '$2y$10$Lx6g6dTn0s6Ti44LZ9JQHutpr/7do8Lu2HBIH.tJnXdrSp3giWfxC','admin');
-- Senha padrão do admin: admin123
