CREATE DATABASE `prime_results`;
USE `prime_results`;

CREATE TABLE `clientes` (
    `nome` VARCHAR(255) NOT NULL,
    `id` INT NOT NULL AUTO_INCREMENT,
    `cpf` VARCHAR(11) NOT NULL, 
    `cep` VARCHAR(8) NOT NULL,
    `endereco` VARCHAR(255) NOT NULL,
    `numero` INT NOT NULL,
    `bairro` VARCHAR(80) NOT NULL,
    `cidade` VARCHAR(50) NOT NULL,
    `estado` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE `bairro_ceps` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `bairro` VARCHAR(80) NOT NULL,
    `cep` VARCHAR(8) NOT NULL,
    `cliente_id` INT NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`id`)
);

-- Inserindo 10 clientes
-- 7 com bairros repetidos mas CEPs diferentes
-- 3 com bairros e  ceps unicos

INSERT INTO `clientes` (`nome`, `cpf`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `estado`) VALUES
('João da Silva', '12345678909', '30130001', 'Av. Cristóvão', 500, 'Savassi', 'Belo Horizonte', 'MG'),
('Maria Oliveira', '98765432100', '30130002', 'Av. Getúlio', 510, 'Savassi', 'Belo Horizonte', 'MG'),
('Lucas Fernandes', '56789012395', '30130003', 'Rua Sergipe', 520, 'Savassi', 'Belo Horizonte', 'MG'),
('Carlos Pereira', '34567890144', '30140070', 'Rua Timbiras', 800, 'Lourdes', 'Belo Horizonte', 'MG'),
('Fernanda Dias', '67890123486', '30140071', 'Rua Timbiras', 820, 'Lourdes', 'Belo Horizonte', 'MG'),
('Bruno Rocha', '78901234500', '30110000', 'Rua Grão Pará', 300, 'Funcionários', 'Belo Horizonte', 'MG'),
('Juliana Almeida', '01234567890', '30110010', 'Rua Piauí', 350, 'Funcionários', 'Belo Horizonte', 'MG'),
('Rafael Martins', '90123456722', '20040002', 'Rua México', 210, 'Centro', 'Rio de Janeiro', 'RJ'),
('Ana Costa', '45678901230', '01310930', 'Av. Paulista',  1000, 'Bela Vista', 'São Paulo', 'SP'),
('Patrícia Gomes', '89012345661', '30150000', 'Rua Espírito', 900, 'Santo Agostinho','Belo Horizonte', 'MG');

INSERT INTO `bairro_ceps` (`bairro`, `cep`, `cliente_id`) VALUES
('Savassi', '30130001', 1),
('Savassi', '30130002', 2),
('Savassi', '30130003', 3),
('Lourdes', '30140070', 4),
('Lourdes', '30140071', 5),
('Funcionários', '30110000', 6),
('Funcionários', '30110010', 7),
('Centro', '20040002', 8),
('Bela Vista', '01310930', 9),
('Santo Agostinho', '30150000', 10);