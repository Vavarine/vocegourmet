drop database db_gourmet;
create database db_gourmet;
use db_gourmet;
CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8;
INSERT INTO
  `administradores` (`id`, `usuario`, `senha`, `email`)
VALUES
  (
    1,
    'test',
    '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa',
    'test@test.com'
  );
CREATE TABLE `dicas` (
    `dicaId` int(11) NOT NULL,
    `titulo` varchar(255) NOT NULL,
    `descricao` varchar(255) NOT NULL,
    `texto` text NOT NULL,
    `imagem` varchar(255) DEFAULT NULL,
    `dataHora` varchar(20) DEFAULT NULL
  ) ENGINE = MyISAM DEFAULT CHARSET = latin1;
CREATE TABLE `receitas` (
    `receitaId` int(11) NOT NULL,
    `titulo` varchar(255) NOT NULL,
    `descricao` varchar(255) NOT NULL,
    `ingredientes` text NOT NULL,
    `preparo` text NOT NULL,
    `imagem` varchar(255) DEFAULT NULL,
    `dataHora` varchar(20) DEFAULT NULL
  ) ENGINE = MyISAM DEFAULT CHARSET = latin1;
ALTER TABLE
  `administradores`
ADD
  PRIMARY KEY (`id`);
ALTER TABLE
  `dicas`
ADD
  PRIMARY KEY (`dicaId`);
ALTER TABLE
  `receitas`
ADD
  PRIMARY KEY (`receitaId`);
ALTER TABLE
  `administradores`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
ALTER TABLE
  `dicas`
MODIFY
  `dicaId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 17;
ALTER TABLE
  `receitas`
MODIFY
  `receitaId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 51;
COMMIT;