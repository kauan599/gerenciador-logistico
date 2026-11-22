CREATE DATABASE IF NOT EXISTS gerenciador_logistico CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gerenciador_logistico;

CREATE TABLE IF NOT EXISTS produtos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120) NOT NULL,
 descricao TEXT,
 peso DECIMAL(10,2) DEFAULT 0,
 valor DECIMAL(12,2) DEFAULT 0,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS enderecos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 identificacao VARCHAR(80) NOT NULL,
 cep VARCHAR(10), logradouro VARCHAR(150) NOT NULL,
 numero VARCHAR(20), complemento VARCHAR(100), bairro VARCHAR(80), cidade VARCHAR(80) NOT NULL,
 estado CHAR(2) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS transportadores (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120) NOT NULL,
 documento VARCHAR(20), telefone VARCHAR(25), email VARCHAR(120), veiculo VARCHAR(100), placa VARCHAR(10), created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS fretes (
 id INT AUTO_INCREMENT PRIMARY KEY,
 codigo VARCHAR(30) NOT NULL UNIQUE,
 origem_id INT NOT NULL, destino_id INT NOT NULL, transportador_id INT NOT NULL,
 data_frete DATE NOT NULL, status VARCHAR(30) DEFAULT 'Pendente', observacoes TEXT,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (origem_id) REFERENCES enderecos(id),
 FOREIGN KEY (destino_id) REFERENCES enderecos(id),
 FOREIGN KEY (transportador_id) REFERENCES transportadores(id)
);
CREATE TABLE IF NOT EXISTS frete_produtos (
 frete_id INT NOT NULL, produto_id INT NOT NULL, quantidade INT NOT NULL DEFAULT 1,
 PRIMARY KEY (frete_id, produto_id),
 FOREIGN KEY (frete_id) REFERENCES fretes(id) ON DELETE CASCADE,
 FOREIGN KEY (produto_id) REFERENCES produtos(id)
);
