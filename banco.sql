DROP DATABASE IF EXISTS allstar_sports;

CREATE DATABASE IF NOT EXISTS allstar_sports CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE allstar_sports;

#####################################################
############# CONSTRUÇÃO DAS TABELAS ################
#####################################################

CREATE TABLE IF NOT EXISTS listagem_produtos(
id INT PRIMARY KEY AUTO_INCREMENT,
produto VARCHAR(50) NOT NULL,
genero ENUM('M','F','SG') DEFAULT 'SG',
`status` ENUM('ativo','inativo') DEFAULT 'ativo',
valor DECIMAL NOT NULL,
data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS usuarios(
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
login VARCHAR(50) NOT NULL UNIQUE,
senha VARCHAR(250) NOT NULL,
`status` ENUM('ativo','inativo') DEFAULT 'ativo',
data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS clientes(
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
qtd_compras INT NOT NULL,
primeira_compra DATETIME DEFAULT CURRENT_TIMESTAMP,
compra_mais_recente DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS vendas(
id INT PRIMARY KEY AUTO_INCREMENT,
valor_total_venda DECIMAL NOT NULL,
qtd_itens INT NOT NULL,
id_produto INT NOT NULL,
FOREIGN KEY(id_produto) REFERENCES listagem_produtos(id),
id_cliente INT NOT NULL,
FOREIGN KEY(id_cliente) REFERENCES clientes(id),
data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

#####################################################
###################### INSERTS ######################
#####################################################

INSERT INTO listagem_produtos(produto, genero, valor)
VALUES ('camisa_torcedor', 'M', 130.00),
	('camisa_torcedor', 'F', 130.00),
       ('camisa_jogador', 'SG', 200.00),
       ('camisa_retro', 'SG', 190.00),
       ('camisa_basquete', 'SG', 230.00),
       ('kit_infantil', 'SG', 140.00);
       
INSERT INTO usuarios(nome, login, senha)
VALUES ('Ismael', 'isma_pereira', 125874),
	('Emerson', 'emerson_almeida', 125874)

