
-- Criação do banco e tabelas
CREATE DATABASE IF NOT EXISTS sistema_chamados DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE sistema_chamados;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  senha VARCHAR(255) NOT NULL,
  setor VARCHAR(100),
  tipo_usuario ENUM('admin','usuario') DEFAULT 'usuario'
);

CREATE TABLE IF NOT EXISTS chamados (
  id INT PRIMARY KEY AUTO_INCREMENT,
  numero_os VARCHAR(20) UNIQUE,
  solicitante_id INT,
  setor VARCHAR(100),
  descricao TEXT,
  prioridade ENUM('Alta','Média','Baixa') DEFAULT 'Média',
  status ENUM('Aberto','Em Atendimento','Finalizado') DEFAULT 'Aberto',
  resposta_tecnico TEXT,
  data_abertura DATETIME DEFAULT CURRENT_TIMESTAMP,
  data_fechamento DATETIME NULL,
  CONSTRAINT fk_chamados_user FOREIGN KEY (solicitante_id) REFERENCES usuarios(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS reservas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT,
  data_reserva DATE,
  hora_inicio TIME,
  hora_fim TIME,
  necessita_tecnico BOOLEAN DEFAULT FALSE,
  CONSTRAINT fk_reservas_user FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS equipamentos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  usuario_id INT,
  equipamento VARCHAR(100) NOT NULL,
  data_solicitacao DATETIME DEFAULT CURRENT_TIMESTAMP,
  termo_ciencia BOOLEAN DEFAULT FALSE,
  CONSTRAINT fk_equip_user FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS relatorios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  tecnico_id INT,
  mes VARCHAR(10),
  chamados_finalizados INT,
  tempo_medio DECIMAL(5,2),
  CONSTRAINT fk_rel_user FOREIGN KEY (tecnico_id) REFERENCES usuarios(id) ON DELETE SET NULL
);

-- Usuário admin padrão (senha: admin123 - trocar em produção)
INSERT INTO usuarios (nome,email,senha,setor,tipo_usuario)
VALUES ('Administrador','admin@local','$2b$12$tI2Vaf4IIAHjidLqyjA2.eSh7jPVxvUeZHsHTkuGEXqCYf3QG0e/S','TI','admin')
ON DUPLICATE KEY UPDATE email=email;
