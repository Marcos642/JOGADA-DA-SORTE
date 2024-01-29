CREATE DATABASE IF NOT EXISTS tela_login;
USE tela_login;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    email VARCHAR(100) DEFAULT NULL,
    senha VARCHAR(100) NOT NULL
);

DROP TABLE IF EXISTS bilhetes;
CREATE TABLE bilhetes(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    bilhetes int /*TEM QUE RECEBER IMAGENS FUTURAMENTE*/
);
/*futbol / loteria / tenis / basquete / */
INSERT INTO bilhetes(nome,bilhetes) 
VALUES('futebol',1),('loteria',2),('tenis',3),('futebol',4),('loteria',5),('tenis',6),
('futebol',7),('basquete',8),('futebol',9),('basquete',10),('futebol',11),('basquete',12),('futebol',13),('basquete',14),
('basquete',15),('basquete',16),('loteria',17),('basquete',18),('tenis',19),('futebol',20),('tenis',21),
('tenis',22),('futebol',23),('tenis',24),('futebol',25),('futebol',26);

select * from bilhetes;

DROP TABLE IF EXISTS sobre;
CREATE TABLE sobre(
	id INT PRIMARY KEY AUTO_INCREMENT,
	infoGerais VARCHAR(2000) NOT NULL,
    endereco VARCHAR(2000) DEFAULT NULL,
    instagram VARCHAR(70) NOT NULL,
    email VARCHAR(70) NOT NULL
);

INSERT INTO sobre(infoGerais,endereco,instagram,email) 
VALUES("INFO GORAIS - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sit amet nibh sit amet sem ornare egestas. Mauris condimentum ligula nec diam interdum, in vestibulum arcu vulputate. Etiam ultricies dui id mi vulputate fermentum. Vestibulum quis felis at nunc tempor porttitor. Nulla facilisi. Morbi et mi dictum, auctor erat vitae, ultricies neque. Suspendisse porta urna sed nisl elementum, quis elementum mauris sagittis. Vivamus scelerisque enim pulvinar sapien rutrum, ut sodales ipsum congue. Integer in bibendum velit. Sed tempor tellus libero, quis suscipit lectus lobortis eu. Cras enim dolor, eleifend quis erat in, fermentum egestas felis. Aliquam tincidunt odio elementum, efficitur ligula nec, eleifend tortor.", 
      "Rua Principal, 123, Cidade, Estado",
      "instagram.com/jogodasorte",
      "contato@jogodasorte.com");
select * from sobre;

CREATE TABLE usuarios_log(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    email VARCHAR(20) DEFAULT NULL,
    data_deletado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DELIMITER //
	CREATE TRIGGER pega_dados
    BEFORE DELETE ON usuarios
    FOR EACH ROW
BEGIN
	INSERT INTO usuarios_log(nome, telefone, email)
    VALUES(OLD.nome, OLD.telefone, OLD.email);
END 
DELIMITER ;