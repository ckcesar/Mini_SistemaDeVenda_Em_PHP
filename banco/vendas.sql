# Host: 192.168.115.1  (Version: 5.1.56-log)
# Date: 2015-06-02 17:25:55
# Generator: MySQL-Front 5.3  (Build 4.205)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "categoria"
#

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "categoria"
#

INSERT INTO `categoria` VALUES (1,'Refrigerante','1');

#
# Structure for table "cliente"
#

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ativo` char(1) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "cliente"
#

INSERT INTO `cliente` VALUES (1,'César','ckcesaraugusto@gmail.com','1');

#
# Structure for table "produto"
#

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(100) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `status` char(1) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`idproduto`),
  KEY `fk_produto_categoria_idx` (`idcategoria`),
  CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "produto"
#

INSERT INTO `produto` VALUES (1,'Coca-cola',5.70,'1',1,17),(2,'Citrus',6.90,'1',1,3);

#
# Structure for table "usuario"
#

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` char(32) NOT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (1,'Admin','admin@admin.com','b2469a15f7b66a9b319e60cc686df8d1','1'),(2,'César','ckcesaraugusto@gmail.com','698dc19d489c4e4db73e28a713eab07b','1');

#
# Structure for table "venda"
#

CREATE TABLE `venda` (
  `idvenda` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idvenda`),
  KEY `fk_venda_cliente1_idx` (`idcliente`),
  KEY `fk_venda_usuario1_idx` (`idusuario`),
  CONSTRAINT `fk_venda_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "venda"
#


#
# Structure for table "vendaitem"
#

CREATE TABLE `vendaitem` (
  `idproduto` int(11) NOT NULL,
  `idvenda` int(11) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `precopago` decimal(8,2) NOT NULL,
  `qtd` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproduto`,`idvenda`),
  KEY `fk_produto_has_venda_venda1_idx` (`idvenda`),
  KEY `fk_produto_has_venda_produto1_idx` (`idproduto`),
  CONSTRAINT `fk_produto_has_venda_produto1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_venda_venda1` FOREIGN KEY (`idvenda`) REFERENCES `venda` (`idvenda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "vendaitem"
#

