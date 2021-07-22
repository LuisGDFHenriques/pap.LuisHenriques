/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50731
Source Host           : localhost:3306
Source Database       : pap2021telemoveis

Target Server Type    : MYSQL
Target Server Version : 50731
File Encoding         : 65001

Date: 2021-07-22 11:24:36
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `categoriachaves`
-- ----------------------------
DROP TABLE IF EXISTS `categoriachaves`;
CREATE TABLE `categoriachaves` (
  `categoriaChaveId` int(11) NOT NULL AUTO_INCREMENT,
  `categoriaChaveNome` varchar(45) NOT NULL,
  `categoriaChaveCategoriaId` int(11) DEFAULT NULL,
  `categoriaChaveTipo` enum('geral','especifico') NOT NULL DEFAULT 'geral',
  PRIMARY KEY (`categoriaChaveId`) USING BTREE,
  KEY `fk_categoriachaves_categorias1_idx` (`categoriaChaveCategoriaId`) USING BTREE,
  CONSTRAINT `fk_categoriachaves_categorias1` FOREIGN KEY (`categoriaChaveCategoriaId`) REFERENCES `categorias` (`categoriaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of categoriachaves
-- ----------------------------
INSERT INTO categoriachaves VALUES ('1', 'Caracteristicas fisicas', null, 'geral');
INSERT INTO categoriachaves VALUES ('2', 'Caracteristicas Especificas', '1', 'geral');
INSERT INTO categoriachaves VALUES ('3', 'MemÃ³ria', '1', 'especifico');
INSERT INTO categoriachaves VALUES ('4', 'CÃ¢mara', '1', 'especifico');
INSERT INTO categoriachaves VALUES ('5', 'EcrÃ£', '1', 'especifico');

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `categoriaId` int(11) NOT NULL AUTO_INCREMENT,
  `categoriaNome` varchar(45) NOT NULL,
  PRIMARY KEY (`categoriaId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO categorias VALUES ('1', 'TelemÃ³veis');
INSERT INTO categorias VALUES ('3', 'Carregadores');
INSERT INTO categorias VALUES ('4', 'Capas');

-- ----------------------------
-- Table structure for `chaves`
-- ----------------------------
DROP TABLE IF EXISTS `chaves`;
CREATE TABLE `chaves` (
  `chaveId` int(11) NOT NULL AUTO_INCREMENT,
  `chaveNome` varchar(45) NOT NULL,
  `chaveCategoriaChaveId` int(11) NOT NULL,
  PRIMARY KEY (`chaveId`) USING BTREE,
  KEY `fk_chaves_categorias_idx` (`chaveCategoriaChaveId`) USING BTREE,
  CONSTRAINT `fk_chaves_categorias` FOREIGN KEY (`chaveCategoriaChaveId`) REFERENCES `categoriachaves` (`categoriaChaveId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of chaves
-- ----------------------------
INSERT INTO chaves VALUES ('1', 'Cor', '1');
INSERT INTO chaves VALUES ('2', 'Peso', '1');
INSERT INTO chaves VALUES ('3', 'Altura', '1');
INSERT INTO chaves VALUES ('4', 'Sistema Operativo', '2');
INSERT INTO chaves VALUES ('5', 'VersÃ£o Sistema Operativo', '2');
INSERT INTO chaves VALUES ('6', 'Processador', '2');
INSERT INTO chaves VALUES ('7', 'Velocidade Processador (GHz)', '2');
INSERT INTO chaves VALUES ('8', 'NÃºcleos', '2');
INSERT INTO chaves VALUES ('9', 'Operador', '2');
INSERT INTO chaves VALUES ('10', 'Largura', '1');
INSERT INTO chaves VALUES ('11', 'Profundidade', '1');
INSERT INTO chaves VALUES ('12', 'MemÃ³ria RAM', '3');
INSERT INTO chaves VALUES ('13', 'MemÃ³ria Interna', '3');
INSERT INTO chaves VALUES ('14', 'Diagonal do EcrÃ£', '5');
INSERT INTO chaves VALUES ('15', 'Tecnologia do EcrÃ£', '5');
INSERT INTO chaves VALUES ('16', 'ResoluÃ§Ã£o de EcrÃ£', '5');
INSERT INTO chaves VALUES ('17', 'NÂº de cÃ¢maras traseiras', '4');
INSERT INTO chaves VALUES ('18', 'NÂº de cÃ¢maras frontais', '4');
INSERT INTO chaves VALUES ('19', 'ResoluÃ§Ã£o CÃ¢mara Traseira', '4');
INSERT INTO chaves VALUES ('20', 'ResoluÃ§Ã£o CÃ¢mara Frontal', '4');

-- ----------------------------
-- Table structure for `encomendadetalhes`
-- ----------------------------
DROP TABLE IF EXISTS `encomendadetalhes`;
CREATE TABLE `encomendadetalhes` (
  `encomendaDetalheProdutoId` int(11) NOT NULL,
  `encomendaDetalheEncomendaId` int(11) NOT NULL,
  `encomendaDetalheQuantidade` int(11) NOT NULL,
  `encomendaDetalhePreco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`encomendaDetalheProdutoId`,`encomendaDetalheEncomendaId`) USING BTREE,
  KEY `fk_produtos_has_encomendas_encomendas1_idx` (`encomendaDetalheEncomendaId`) USING BTREE,
  KEY `fk_produtos_has_encomendas_produtos1_idx` (`encomendaDetalheProdutoId`) USING BTREE,
  CONSTRAINT `fk_produtos_has_encomendas_encomendas1` FOREIGN KEY (`encomendaDetalheEncomendaId`) REFERENCES `encomendas` (`encomendaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_has_encomendas_produtos1` FOREIGN KEY (`encomendaDetalheProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of encomendadetalhes
-- ----------------------------

-- ----------------------------
-- Table structure for `encomendas`
-- ----------------------------
DROP TABLE IF EXISTS `encomendas`;
CREATE TABLE `encomendas` (
  `encomendaId` int(11) NOT NULL AUTO_INCREMENT,
  `encomendaData` date NOT NULL,
  `encomendaEstado` enum('pendente','expedicao','concluida') NOT NULL DEFAULT 'pendente',
  `encomendaPerfilId` int(11) NOT NULL,
  `encomendaValorFinal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`encomendaId`) USING BTREE,
  KEY `fk_encomendas_perfis1_idx` (`encomendaPerfilId`) USING BTREE,
  CONSTRAINT `fk_encomendas_perfis1` FOREIGN KEY (`encomendaPerfilId`) REFERENCES `perfis` (`perfilId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of encomendas
-- ----------------------------

-- ----------------------------
-- Table structure for `extras`
-- ----------------------------
DROP TABLE IF EXISTS `extras`;
CREATE TABLE `extras` (
  `extraId` int(11) NOT NULL AUTO_INCREMENT,
  `extraNome` varchar(45) NOT NULL,
  PRIMARY KEY (`extraId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of extras
-- ----------------------------

-- ----------------------------
-- Table structure for `marcas`
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas` (
  `marcaId` int(11) NOT NULL AUTO_INCREMENT,
  `marcaNome` varchar(45) NOT NULL,
  PRIMARY KEY (`marcaId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO marcas VALUES ('1', 'Apple');
INSERT INTO marcas VALUES ('2', 'Samsung');
INSERT INTO marcas VALUES ('3', 'Goodis');
INSERT INTO marcas VALUES ('4', 'Mophie');

-- ----------------------------
-- Table structure for `paises`
-- ----------------------------
DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises` (
  `paisId` int(11) NOT NULL AUTO_INCREMENT,
  `paisAcr` varchar(4) NOT NULL,
  `paisNome` varchar(45) NOT NULL,
  PRIMARY KEY (`paisId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of paises
-- ----------------------------
INSERT INTO paises VALUES ('1', 'PT', 'Portugal');

-- ----------------------------
-- Table structure for `perfis`
-- ----------------------------
DROP TABLE IF EXISTS `perfis`;
CREATE TABLE `perfis` (
  `perfilId` int(11) NOT NULL AUTO_INCREMENT,
  `perfilNome` varchar(45) NOT NULL,
  `perfilMorada` varchar(45) DEFAULT NULL,
  `perfilCidade` varchar(45) DEFAULT NULL,
  `perfilTelemovel` varchar(45) DEFAULT NULL,
  `perfilPaisId` int(11) DEFAULT NULL,
  `perfilCodPostal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`perfilId`) USING BTREE,
  KEY `fk_perfis_paises1_idx` (`perfilPaisId`) USING BTREE,
  CONSTRAINT `fk_perfis_paises1` FOREIGN KEY (`perfilPaisId`) REFERENCES `paises` (`paisId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user` FOREIGN KEY (`perfilId`) REFERENCES `users` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of perfis
-- ----------------------------
INSERT INTO perfis VALUES ('1', 'Luis', 'Toze', 'Zeto', '967829302', '1', '2430');

-- ----------------------------
-- Table structure for `produtochaves`
-- ----------------------------
DROP TABLE IF EXISTS `produtochaves`;
CREATE TABLE `produtochaves` (
  `produtoChaveChaveId` int(11) NOT NULL,
  `produtoChaveProdutoId` int(11) NOT NULL,
  `produtoChaveValor` varchar(255) NOT NULL,
  PRIMARY KEY (`produtoChaveChaveId`,`produtoChaveProdutoId`) USING BTREE,
  KEY `fk_chaves_has_telemoveis_telemoveis1_idx` (`produtoChaveProdutoId`) USING BTREE,
  CONSTRAINT `fk_chaves_has_telemoveis_chaves1` FOREIGN KEY (`produtoChaveChaveId`) REFERENCES `chaves` (`chaveId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_chaves_has_telemoveis_telemoveis1` FOREIGN KEY (`produtoChaveProdutoId`) REFERENCES `produtos` (`produtoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of produtochaves
-- ----------------------------
INSERT INTO produtochaves VALUES ('1', '1', 'Bronze');
INSERT INTO produtochaves VALUES ('1', '2', 'Preto');
INSERT INTO produtochaves VALUES ('1', '3', 'Cinzento');
INSERT INTO produtochaves VALUES ('1', '4', 'Rosa');
INSERT INTO produtochaves VALUES ('1', '5', 'Preto');
INSERT INTO produtochaves VALUES ('1', '6', 'Preto');
INSERT INTO produtochaves VALUES ('2', '1', '282g');
INSERT INTO produtochaves VALUES ('2', '2', '194 g');
INSERT INTO produtochaves VALUES ('2', '3', '133 g');
INSERT INTO produtochaves VALUES ('2', '4', '228 g');
INSERT INTO produtochaves VALUES ('2', '5', '174 g');
INSERT INTO produtochaves VALUES ('2', '6', '175 g');
INSERT INTO produtochaves VALUES ('3', '1', '15.92cm');
INSERT INTO produtochaves VALUES ('3', '2', '15.1');
INSERT INTO produtochaves VALUES ('3', '3', '14.6 cm');
INSERT INTO produtochaves VALUES ('3', '4', '16.5 cm');
INSERT INTO produtochaves VALUES ('3', '5', '14.4 cm');
INSERT INTO produtochaves VALUES ('3', '6', '15.8 cm');
INSERT INTO produtochaves VALUES ('4', '1', 'Android');
INSERT INTO produtochaves VALUES ('4', '2', 'iOS');
INSERT INTO produtochaves VALUES ('4', '3', 'iOS');
INSERT INTO produtochaves VALUES ('4', '4', 'Android');
INSERT INTO produtochaves VALUES ('4', '5', 'iOS');
INSERT INTO produtochaves VALUES ('4', '6', 'Android');
INSERT INTO produtochaves VALUES ('5', '1', '10');
INSERT INTO produtochaves VALUES ('5', '2', '13');
INSERT INTO produtochaves VALUES ('5', '3', '14');
INSERT INTO produtochaves VALUES ('5', '4', '10');
INSERT INTO produtochaves VALUES ('5', '5', '11');
INSERT INTO produtochaves VALUES ('5', '6', '9');
INSERT INTO produtochaves VALUES ('6', '1', 'Snapdragon 865+');
INSERT INTO produtochaves VALUES ('6', '2', 'A13 Bionic');
INSERT INTO produtochaves VALUES ('6', '3', 'A14 Bionic');
INSERT INTO produtochaves VALUES ('6', '4', 'Exynos 2100');
INSERT INTO produtochaves VALUES ('6', '5', 'A11 Bionic');
INSERT INTO produtochaves VALUES ('6', '6', 'Exynos9 9820');
INSERT INTO produtochaves VALUES ('7', '1', 'Snapdragon 865+ OctaCore (7nm)');
INSERT INTO produtochaves VALUES ('7', '2', '2x2.65 + 4x1.8');
INSERT INTO produtochaves VALUES ('7', '5', '2.39 GHz');
INSERT INTO produtochaves VALUES ('7', '6', '2.7 + 2.3 + 1.9 GHz');
INSERT INTO produtochaves VALUES ('8', '1', 'Octa-Core');
INSERT INTO produtochaves VALUES ('8', '2', 'Hexa-Core');
INSERT INTO produtochaves VALUES ('8', '5', 'Hexa-Core');
INSERT INTO produtochaves VALUES ('8', '6', 'Octa-Core');
INSERT INTO produtochaves VALUES ('9', '1', 'Desbloqueado');
INSERT INTO produtochaves VALUES ('9', '2', 'Desbloqueado');
INSERT INTO produtochaves VALUES ('9', '3', 'Desbloqueado');
INSERT INTO produtochaves VALUES ('9', '4', 'Desbloqueado');
INSERT INTO produtochaves VALUES ('9', '5', 'Desbloqueado');
INSERT INTO produtochaves VALUES ('9', '6', 'Desbloqueado');
INSERT INTO produtochaves VALUES ('10', '1', '6.8 cm/12.82 cm');
INSERT INTO produtochaves VALUES ('10', '2', '7.6');
INSERT INTO produtochaves VALUES ('10', '3', '7.1 cm');
INSERT INTO produtochaves VALUES ('10', '4', '7.5 cm');
INSERT INTO produtochaves VALUES ('10', '5', '7.1 cm');
INSERT INTO produtochaves VALUES ('10', '6', '7.4 cm');
INSERT INTO produtochaves VALUES ('11', '1', '6.9 cm/16.8 cm');
INSERT INTO produtochaves VALUES ('11', '2', '0.83');
INSERT INTO produtochaves VALUES ('11', '3', '0.7 cm');
INSERT INTO produtochaves VALUES ('11', '4', '0.8 cm');
INSERT INTO produtochaves VALUES ('11', '5', '0.77 cm');
INSERT INTO produtochaves VALUES ('11', '6', '0.78 cm');
INSERT INTO produtochaves VALUES ('12', '1', '12 GB');
INSERT INTO produtochaves VALUES ('12', '2', '4 GB');
INSERT INTO produtochaves VALUES ('12', '4', '12 GB');
INSERT INTO produtochaves VALUES ('12', '5', '3 GB');
INSERT INTO produtochaves VALUES ('12', '6', '8 GB');
INSERT INTO produtochaves VALUES ('13', '1', '256 GB');
INSERT INTO produtochaves VALUES ('13', '2', '64 GB');
INSERT INTO produtochaves VALUES ('13', '3', '128 GB');
INSERT INTO produtochaves VALUES ('13', '4', '128 GB');
INSERT INTO produtochaves VALUES ('13', '5', '64 GB');
INSERT INTO produtochaves VALUES ('13', '6', '128 GB');
INSERT INTO produtochaves VALUES ('14', '1', '7.6');
INSERT INTO produtochaves VALUES ('14', '2', '6.1');
INSERT INTO produtochaves VALUES ('14', '3', '6.1');
INSERT INTO produtochaves VALUES ('14', '4', '6.8');
INSERT INTO produtochaves VALUES ('14', '5', '5.8');
INSERT INTO produtochaves VALUES ('14', '6', '6.4');
INSERT INTO produtochaves VALUES ('15', '1', 'Dynamic AMOLED 2x');
INSERT INTO produtochaves VALUES ('15', '2', 'Retina');
INSERT INTO produtochaves VALUES ('15', '3', 'OLED');
INSERT INTO produtochaves VALUES ('15', '4', 'Dynamic AMOLED 2x');
INSERT INTO produtochaves VALUES ('15', '5', 'OLED');
INSERT INTO produtochaves VALUES ('15', '6', 'Dynamic Amoled');
INSERT INTO produtochaves VALUES ('16', '1', 'QHD+');
INSERT INTO produtochaves VALUES ('16', '2', 'HD 720p');
INSERT INTO produtochaves VALUES ('16', '4', 'WQHD+');
INSERT INTO produtochaves VALUES ('16', '5', 'HD 720p');
INSERT INTO produtochaves VALUES ('16', '6', 'QHD+');
INSERT INTO produtochaves VALUES ('17', '1', '3');
INSERT INTO produtochaves VALUES ('17', '2', '2');
INSERT INTO produtochaves VALUES ('17', '3', '3');
INSERT INTO produtochaves VALUES ('17', '4', '4');
INSERT INTO produtochaves VALUES ('17', '5', '2');
INSERT INTO produtochaves VALUES ('17', '6', '3');
INSERT INTO produtochaves VALUES ('18', '1', '2');
INSERT INTO produtochaves VALUES ('18', '2', '1');
INSERT INTO produtochaves VALUES ('18', '3', '1');
INSERT INTO produtochaves VALUES ('18', '4', '1');
INSERT INTO produtochaves VALUES ('18', '5', '1');
INSERT INTO produtochaves VALUES ('18', '6', '2');
INSERT INTO produtochaves VALUES ('19', '1', '12+ 12 + 12');
INSERT INTO produtochaves VALUES ('19', '2', '12 + 12 MP');
INSERT INTO produtochaves VALUES ('19', '3', '12 MP');
INSERT INTO produtochaves VALUES ('19', '4', '108 + 10 + 10 + 12');
INSERT INTO produtochaves VALUES ('19', '5', '12MP + 12MP');
INSERT INTO produtochaves VALUES ('19', '6', '16 + 12 + 12MP');
INSERT INTO produtochaves VALUES ('20', '1', '10');
INSERT INTO produtochaves VALUES ('20', '2', '12 MP');
INSERT INTO produtochaves VALUES ('20', '4', '40 MP');
INSERT INTO produtochaves VALUES ('20', '5', '7 MP');

-- ----------------------------
-- Table structure for `produtos`
-- ----------------------------
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `produtoId` int(11) NOT NULL AUTO_INCREMENT,
  `produtoNome` varchar(255) NOT NULL,
  `produtoImagemURL` varchar(255) NOT NULL,
  `produtoDescricao` text NOT NULL,
  `produtoMarcaId` int(11) NOT NULL,
  `produtoPreco` decimal(10,2) NOT NULL,
  `produtoCategoriaId` int(11) NOT NULL,
  `produtoDestaque` enum('sim','nao') DEFAULT 'nao',
  PRIMARY KEY (`produtoId`) USING BTREE,
  KEY `fk_telemoveis_marcas1_idx` (`produtoMarcaId`) USING BTREE,
  KEY `fk_produtos_categorias1_idx` (`produtoCategoriaId`) USING BTREE,
  CONSTRAINT `fk_produtos_categorias1` FOREIGN KEY (`produtoCategoriaId`) REFERENCES `categorias` (`categoriaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_telemoveis_marcas1` FOREIGN KEY (`produtoMarcaId`) REFERENCES `marcas` (`marcaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of produtos
-- ----------------------------
INSERT INTO produtos VALUES ('1', 'Smartphone SAMSUNG Galaxy Z Fold2 5G (7.6\'\' - 12 GB - 256 GB)', 'images/transferir.jpg', '<p align=\"justify\"><strong>Uma experi&ecirc;ncia maior de visualiza&ccedil;&atilde;o</strong></p>\r\n<p align=\"justify\">Ecr&atilde; exterior de 6.2&rsquo;&rsquo; polegadas conseguir&aacute; uma experi&ecirc;ncia de visualiza&ccedil;&atilde;o verdadeiramente imersiva. Abra-o como um livro e desfrute de um ecr&atilde; incr&iacute;vel de 7.6&rsquo;&rsquo; polegadas.</p>\r\n<p align=\"justify\">Ecr&atilde; Inifinity Flex de 7.6&rsquo;&rsquo; possui a mais avan&ccedil;ada tecnologia que garante a m&aacute;xima durabilidade. Poder&aacute; abrir e fech&aacute;-lo sem problemas, sempre que precisar.</p>\r\n<p align=\"justify\">Tecnologia Dynamic AMOLED 2x num ecr&atilde; 12 maior e com uma taxa de atualiza&ccedil;&atilde;o de 120 Hz.</p>\r\n<p align=\"justify\">O Fold 2 vem equipado com tecnologia inteligente que ajusta automaticamente a taxa de atualiza&ccedil;&atilde;o do ecr&atilde;, dependendo do conte&uacute;do que est&aacute; a ser visualizado, para um menor consumo de bateria.</p>\r\n<p align=\"justify\"><strong>Multitasking e app continuity</strong></p>\r\n<p align=\"justify\">Pode usar at&eacute; tr&ecirc;s aplica&ccedil;&otilde;es simultaneamente ajustando o tamanho de cada uma de acordo com as suas necessidades.</p>\r\n<p align=\"justify\">Com a App Continuity pode abrir e fechar o seu Galaxy Z Fold 2 mantendo sempre a aplica&ccedil;&atilde;o que est&aacute; a usar no seu ecr&atilde; Alterne entre um formato compacto e confort&aacute;vel e um ecr&atilde; grande sempre que precisar, sem perder nada.</p>\r\n<p align=\"justify\"><strong>Para todos os &acirc;ngulos</strong></p>\r\n<p align=\"justify\">Aberto ou fechado, traseira ou frontal, escolha como deseja fotografar, gra&ccedil;as &aacute; versatilidade das suas 6 c&acirc;maras. Mesmo fechado, o seu Z Flip 2 &eacute; capaz de captura selfies.</p>\r\n<p align=\"justify\">Tripla c&acirc;mara traseira: Dupla abertura, Ultra Grande Angular 123 &ordm; e zoom &oacute;ptico.</p>\r\n<p align=\"justify\">Dupla c&acirc;mara interior: Selfie UHD com efeito bokeh.</p>\r\n<p align=\"justify\">C&acirc;mara exterior: Selfies UHD sem abrir o seu Fold.</p>\r\n<p align=\"justify\"><strong>Premium hardware</strong></p>\r\n<p align=\"justify\">O desempenho do Galaxy Fold atinge outro n&iacute;vel com 12 GB de RAM, o que permitir&aacute; que execute todos as aplica&ccedil;&otilde;es sem problemas.</p>\r\n<p align=\"justify\">O Galaxy Fold2 possui uma tecnologia de bateria de c&eacute;lula dupla, o que torna o carregamento e o download muito mais est&aacute;veis. Desfrute de 4.500 mAh de carga com a tecnologia mais inovadora.</p>\r\n<p align=\"justify\">O Power Share permite carregar outros dispositivos m&oacute;veis e werables sem fios. Pode at&eacute; carregar o seu Fold e outro dispositivo simultaneamente. <br /><br /><strong>Como tudo vai mudar com o 5G? </strong><br />O 5G tem a capacidade de mudar a forma como vivemos. Muda a forma como interagimos, muda a forma como nos deslocamos, muda a forma como fazemos compras. Muda a forma como recebemos essas compras. A partir do momento em que o 5G estiver ao alcance de todos, podemos mudar o mundo a partir de onde quer que estejamos.</p>', '2', '1999.00', '1', 'nao');
INSERT INTO produtos VALUES ('2', 'Iphone 11', 'images/Iphone11.jpg', '<p><strong>Alarga os horizontes</strong><br />O sistema de c&acirc;mara dupla alarga os horizontes das fotografias. A nova ultra grande angular capta quatro vezes mais imagem. Fotografa paisagens intermin&aacute;veis ou at&eacute; mesmo locais com pouca ilumina&ccedil;&atilde;o. O modo Noite &eacute; ativado automaticamente para tirar fotos fant&aacute;sticas em locais com pouca luz. Sem recorrer ao flash, as cores s&atilde;o mais realistas e as fotos mais iluminadas.<br /><br /><strong>Retrato Reinventado</strong><br />Agora com mais tipos de retrato e controlo de ilumina&ccedil;&atilde;o. As duas c&acirc;maras do iPhone 11 trabalham em conjunto, criando imagens impressionantes.<br /><br /><strong>C&acirc;mara Lenta</strong><br />Tamb&eacute;m as selfies podem ser em c&acirc;mara lenta, com a nova c&acirc;mara TrueDepth de 12 MP. Tudo ficar&aacute; mais cool a 120 imagens por segunto, seja um acenar de m&atilde;o ou os cabelos a esvoa&ccedil;ar ao vento. Agora, pode acrescentar mais pormenores &agrave;s suas selfies com a nova c&acirc;mara TrueDepth de 12 MP. Basta rodar o iPhone para o modo horizontal e a c&acirc;mara reduz automaticamente o zoom.<br /><br /><strong>Processador Profissional</strong><br />O processador A13 Bionic torna tudo mais r&aacute;pido e fluido e tamb&eacute;m mais eficiente. Otimiza o n&iacute;vel energ&eacute;tico para que a bateria dure ainda mais tempo.</p>', '1', '629.00', '1', 'nao');
INSERT INTO produtos VALUES ('3', 'Iphone 12', 'images/Iphone12.jpg', '<p>O <strong>iPhone 12</strong><br />tem o processador mais r&aacute;pido de sempre num smartphone, o A14 Bionic. Ecr&atilde; OLED de uma ponta &agrave; outra. Ceramic Shield, quatro vezes mais resistente a quedas. E modo Noite em todas as c&acirc;maras. <br /><br /><strong> Ceramic Shield. Essencialmente mais resistente. </strong><br />Feito atrav&eacute;s da introdu&ccedil;&atilde;o no vidro de cristais cer&acirc;micos mais duros do que a maioria dos metais, s&atilde;o t&atilde;o pequenos que s&oacute; podem ser medidos em nan&oacute;metros. O ecr&atilde; fica perfeitamente ajustado &agrave; moldura do telefone, o que ajuda a proteg&ecirc;-lo ainda mais. <br /><br /><strong> Processador A14 Bionic</strong><br />O A14 Bionic &eacute; capaz de coisas verdadeiramente incr&iacute;veis, como processar bili&otilde;es de opera&ccedil;&otilde;es no Neural Engine ou filmar em Dolby Vision, algo que nem as c&acirc;maras de v&iacute;deo profissionais conseguem fazer. Al&eacute;m disso, tem uma incr&iacute;vel efici&ecirc;ncia energ&eacute;tica. <br /><br /><strong> O melhor ecr&atilde; de iPhone de sempre</strong><br />Muito mais contraste, incr&iacute;vel precis&atilde;o de cor. Um grande avan&ccedil;o na densidade de p&iacute;xeis. A tecnologia OLED oferece brancos mais brilhantes, negros mais intensos e uma resolu&ccedil;&atilde;o superior em tudo o que v&ecirc;. <br /><br /><strong> Modo Noite</strong><br />Agora, o modo Noite tamb&eacute;m funciona com as c&acirc;maras Grande angular e Ultra grande angular. A Grande angular deixa entrar 27% mais luz para tirar fotos com um n&iacute;vel de detalhe e cor que at&eacute; agora era imposs&iacute;vel. Tanto de dia como de noite. <br /><br /><strong> A primeira c&acirc;mara de sempre a gravar em Dolby Vision</strong><br />Agora, j&aacute; pode gravar v&iacute;deos HDR em 4K com Dolby Vision. Edite-os depois na app Fotografias ou no iMovie e use o AirPlay para ver todas as cores e detalhes na sua televis&atilde;o. <br /><br /><strong> Wireless. Vamos acelerar. </strong><br />O iPhone 12 alcan&ccedil;a velocidades LTE at&eacute; 2 Gb/s, para que possa fazer download de programas, carregar fotografias e ver v&iacute;deos de alta qualidade em streaming, ainda mais depressa. E pode faz&ecirc;-lo em mais locais, uma vez que o iPhone 12 possui 32 bandas LTE.<br /><br /><strong>Como tudo vai mudar com o 5G? </strong><br />O 5G tem a capacidade de mudar a forma como vivemos. Muda a forma como interagimos, muda a forma como nos deslocamos, muda a forma como fazemos compras. Muda a forma como recebemos essas compras. A partir do momento em que o 5G estiver ao alcance de todos, podemos mudar o mundo a partir de onde quer que estejamos.</p>', '1', '829.00', '1', 'nao');
INSERT INTO produtos VALUES ('4', 'Smartphone SAMSUNG Galaxy S21 Ultra 5G', 'images/Untitled-1.jpg', '<p><strong>Uma c&acirc;mara de outro mundo</strong><br />Para captares todos os momentos importantes e sem que nada te escape, o Galaxy S21 Ultra vem com um m&oacute;dulo inovador de tr&ecirc;s c&acirc;maras para fotografias claras de dia e noite com uma resolu&ccedil;&atilde;o de 108 MP e pro-grade v&iacute;deo de 8K para v&iacute;deos superfluidos. <br />Para al&eacute;m disso, o modo capta&ccedil;&atilde;o &uacute;nica faz com que n&atilde;o se perca nenhuma mem&oacute;ria e com o Space Zoom &eacute; poss&iacute;vel ampliar tudo aquilo que se v&ecirc;. <br />&Eacute; tamb&eacute;m apresentado, um novo modo de v&iacute;deo com as m&uacute;ltiplas c&acirc;maras para se poder escolher aquela que melhor se adequa a cada momento (Modo Realizador). <br /><br /><strong>Uma performance inigual&aacute;vel</strong><br />O Galaxy S21 Ultra vem com o hardware e o software que precisas. Otimizado para jogares os teus jogos favoritos e veres os conte&uacute;dos que mais gosta, um processador 5nm Exynos 2100 e uma bateria de 5.000 mAh que te durar&aacute; para todo o dia. <br />Tudo isto, acompanhado de uma rede m&oacute;vel 5G hyper r&aacute;pida e WI-Fi 6E para poderes fazer todos os teus streams, downloads, pesquisas e muito mais. Para al&eacute;m disto, pela primeira vez na S&eacute;rie S, o teu Galaxy suporta a S Pen para que atinjas toda a produtividade que necessitas numa experi&ecirc;ncia equivalente &agrave; escrita no papel. <br /><br /><strong>Um design revolucion&aacute;rio</strong><br />Com um ecr&atilde; inteligente Dynamic AMOLED 2x, o seu Galaxy S21 Ultra vem com uma taxa de atualiza&ccedil;&atilde;o de 120Hz para que veja todos os seus conte&uacute;dos favoritos de forma fluida num ecr&atilde; mais brilhante e vivido HDR10+ que ajusta automaticamente a taxa de atualiza&ccedil;&atilde;o do ecr&atilde; para um menor consumo de bateria. <br />De forma a maximizar o seu conforto, o novo Galaxy tem um Screen-to-Body Ratio de 90% e uma redu&ccedil;&atilde;o de 50% da luz azul, o que lhe permite ter uma experi&ecirc;ncia de visualiza&ccedil;&atilde;o verdadeiramente imersiva e confort&aacute;vel.<br /><br />Galaxy S21 I S21+ I S21 Ultra 5G n&atilde;o incluem adaptador de corrente.<br /><br /><strong>Como tudo vai mudar com o 5G? </strong><br />O 5G tem a capacidade de mudar a forma como vivemos. Muda a forma como interagimos, muda a forma como nos deslocamos, muda a forma como fazemos compras. Muda a forma como recebemos essas compras. A partir do momento em que o 5G estiver ao alcance de todos, podemos mudar o mundo a partir de onde quer que estejamos.</p>', '2', '1199.00', '1', 'nao');
INSERT INTO produtos VALUES ('5', 'IphoneX ', 'images/Iphonex.jpg', '<p><strong>Recondicionado Reuse | Grade C</strong><br /><br />Todos os artigos foram testados e est&atilde;o 100% funcionais.<br /><br />Todos os equipamentos s&atilde;o rigorosamente testados por profissionais treinados num ambiente t&eacute;cnico controlado e com ferramentas de &uacute;ltima gera&ccedil;&atilde;o. Os equipamentos s&atilde;o submetidos a testes rigorosos e verifica&ccedil;&atilde;o de componentes, como a troca da bateria, para garantir a m&aacute;xima qualidade e seguran&ccedil;a.</p>', '1', '349.00', '1', 'nao');
INSERT INTO produtos VALUES ('6', 'Smartphone SAMSUNG Galaxy S10+', 'images/Galaxy S10.gif', '<p>O smartphone Samsung Galaxy S10 foi desenhado n&atilde;o apenas para ser diferente, mas para ser &uacute;nico. Porque grandes ideias merecem grandes ecr&atilde;s, a Samsung eliminou as distra&ccedil;&otilde;es para uma experi&ecirc;ncia de visualiza&ccedil;&atilde;o cinematogr&aacute;fica inigual&aacute;vel. O corte preciso, a seguran&ccedil;a no ecr&atilde; e o Dynamic AMOLED tornam o ecr&atilde; Infinity-O ainda mais inovador, proporcionando uma experi&ecirc;ncia verdadeiramente imersiva. Por sua vez, com um leitor de impress&atilde;o digital ultrass&oacute;nico no ecr&atilde;, basta tocar para desbloquear. Capte mais do mundo com a C&acirc;mara Ultra Grande Angular para tirar fotografias incr&iacute;veis com um campo de vis&atilde;o de 123 graus e beneficie da c&acirc;mara inteligente, que o ajuda a captar fotografias incr&iacute;veis, sugerindo composi&ccedil;&otilde;es de imagens e otimizando automaticamente as defini&ccedil;&otilde;es da c&acirc;mara para a cena. Al&eacute;m disso, o Wireless PowerShare oferece a capacidade de partilhar a sua bateria com outros dispositivos, quer sejam smartphones ou wearables. A tecnologia Fast Wireless Charging 2.0 traz o seu smartphone de volta aos 100% mais r&aacute;pido do que nunca. Por sua vez, a conetividade Wi-Fi inteligente atinge velocidades mais r&aacute;pidas, ligando-se de forma fi&aacute;vel e segura at&eacute; mesmo em redes p&uacute;blicas e alternando facilmente para LTE para atingir velocidades de dados incr&iacute;veis de at&eacute; 2 Gbps. A trabalhar continuamente para mant&ecirc;-lo um passo &agrave; frente, o hardware avan&ccedil;ado do smartphone Samsung Galaxy S10 reconhece os seus h&aacute;bitos quotidianos, otimizando a forma como interage com o seu smartphone e melhorando o desempenho e a efici&ecirc;ncia. Por fim, a avan&ccedil;ada Intelig&ecirc;ncia Artificial faz com que a sua vida di&aacute;ria seja mais tranquila. Por exemplo, a Bixby Routines sugere aplica&ccedil;&otilde;es e tarefas frequentemente usadas com base no tempo ou no local, para desenvolver uma experi&ecirc;ncia naturalmente inteligente e adaptada a si. Outras caracter&iacute;sticas: tecnologia de rede 4G LTE; sistema operativo Android OS 9.0; processador Octa-Core Exynos 9 9820; capacidade de armazenamento de 512 GB expans&iacute;vel via microSD de at&eacute; 512 GB; 8 GB de RAM; ecr&atilde; Dynamic AMOLED de 6,1&rsquo;&rsquo; (1440 x 3040 p&iacute;xeis); prote&ccedil;&atilde;o Corning Gorilla Glass 6; c&acirc;mara frontal Single de 10 MP; c&acirc;mara traseira Triple de 12 MP + 12 MP + 16 MP; conetividade Wi-Fi e Bluetooth 5.0; NFC; sensor de impress&atilde;o digital (embutido no ecr&atilde;); bateria Li-Ion de 3400 mAh.</p>', '2', '749.00', '1', 'nao');
INSERT INTO produtos VALUES ('7', 'Kit Carregador + cabo Micro-USB GOODIS W1-24-11 Preto', 'images/carregadorkit.gif', '<p>O Carregador com cabo de carregamento e sincroniza&ccedil;&atilde;o Micro-USB da GOODIS tem um design elegante com acabamento em piano. Compat&iacute;vel com dispositivos com entrada Micro-USB , este cabo sincroniza os dados do teu dispositivo com o computador port&aacute;til. Esta combina&ccedil;&atilde;o de artigos permite desfrutar das aplica&ccedil;&otilde;es do teu dispositivo em casa ou em estadias de viagens.</p>', '3', '25.00', '3', 'nao');
INSERT INTO produtos VALUES ('8', 'Carregador apple rÃ¡pido', 'images/carregadorapplefast.gif', '', '1', '30.00', '3', 'nao');
INSERT INTO produtos VALUES ('9', 'Carregador MagSafe APPLE Wireless', 'images/carregadorwire.gif', '', '1', '41.00', '3', 'nao');
INSERT INTO produtos VALUES ('10', 'Cabo MOPHIE USB Lightning 1m Branco', 'images/carregador1m.gif', '', '4', '19.00', '3', 'nao');
INSERT INTO produtos VALUES ('11', 'Cabo MOPHIE USB Lightning 9 cm Branco', 'images/carregador9cm.gif', '', '4', '15.00', '3', 'nao');
INSERT INTO produtos VALUES ('12', 'Cabo APPLE de 1 metro', 'images/carregadorapple1m.gif', '', '1', '35.00', '3', 'nao');
INSERT INTO produtos VALUES ('13', 'Capa de Iphone 12 cinzenta', 'images/capaiphone12.gif', '', '1', '19.00', '4', 'nao');
INSERT INTO produtos VALUES ('14', 'Capa de Iphone 12 roza', 'images/capaiphone12f.gif', '', '1', '19.00', '4', 'nao');
INSERT INTO produtos VALUES ('15', 'Capa de Iphone X preta', 'images/capaiphonex.gif', '', '1', '17.00', '4', 'nao');
INSERT INTO produtos VALUES ('16', 'Capa SAMSUNG Galaxy S10 Transparente', 'images/Capa SAMSUNG Galaxy S10 Clear View Transparente.gif', '', '2', '10.00', '4', 'nao');
INSERT INTO produtos VALUES ('17', 'Capa Samsung Galaxy S21 Ultra SBS Transparente', 'images/Capa Samsung Galaxy S21 Ultra SBS Transparente.gif', '', '2', '11.00', '4', 'nao');
INSERT INTO produtos VALUES ('18', 'Capa de Iphone 11 branca', 'images/capaiphone11.gif', '', '1', '18.00', '4', 'nao');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userLogin` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`) USING BTREE,
  UNIQUE KEY `userLogin_UNIQUE` (`userLogin`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'luis@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');
