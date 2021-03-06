-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/08/2018 às 02:17
-- Versão do servidor: 10.1.10-MariaDB
-- Versão do PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meusite`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artigos`
--

CREATE TABLE `artigos` (
  `ID` int(1) NOT NULL,
  `data` datetime NOT NULL,
  `autor` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `resumo` varchar(255) NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `texto` longtext NOT NULL,
  `categorias` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `artigos`
--

INSERT INTO `artigos` (`ID`, `data`, `autor`, `titulo`, `resumo`, `imagem`, `texto`, `categorias`, `status`) VALUES
(1, '2018-07-29 12:18:34', 'Mateus Sodré', 'Cuidado! Você pode estar cuidando ERRADO do seu Cachorro!', 'Quem tem cão costuma tratar os bichos como filhos e tenta educá-los da melhor maneira possível. O problema é que, às vezes, alguns erros dos humanos passam despercebidos e acabam por atrapalhar o desenvolvimento dos dos animais...', '/img/artigos/1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non mollis justo, sed varius eros.</p>\r\n<p>Mauris sem nisl, faucibus dictum ligula in, fringilla laoreet erat. Donec volutpat eleifend nunc vitae mattis. Morbi in pharetra risus, vel commodo velit.</p>\r\n<p>Mauris condimentum bibendum elit sit amet rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque porta laoreet neque vitae tempus.</p>\r\n<p>In hac habitasse platea dictumst. Duis eget suscipit nisl, id ultrices mauris.</p>\r\n<p>Etiam volutpat elit a nulla efficitur, nec lobortis mauris dignissim.</p>', 'Loren, Ipsum, Artigo', '1'),
(2, '2018-07-29 13:15:32', 'Paulo Yago', 'Como acabar com carrapatos!', 'Quando nosso cachorro pega carrapatos, não é apenas a tranquilidade de seu animal de estimação que deve ser considerada. Descubra!', '/img/artigos/2.jpg', '<p>Maecenas pretium convallis dui, sit amet tincidunt enim aliquet consectetur. Sed sodales lorem vitae magna maximus mollis.</p>\r\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n<p>Quisque nec velit in enim rhoncus convallis. Phasellus nibh justo, lacinia scelerisque arcu eget, consequat ultricies ante.</p>\r\n<p>Vestibulum volutpat id nisi sit amet feugiat. Etiam finibus diam in magna porttitor, efficitur porttitor elit tempor.</p>\r\n<p>Maecenas eu eros id nunc tempus vulputate sit amet eget elit.</p>\r\n<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n<p>Duis ac massa auctor, placerat turpis ac, pellentesque orci. Sed gravida ligula vel nisi venenatis venenatis.</p>', 'Loren, Ipsum, Novidades', '1'),
(3, '2018-07-30 13:48:16', 'Aureo Fernandes', 'Faça em casa um delicioso petisco pro seu cão!', 'Aprenda a preparar um delicioso petisco natural para seu cãozinho!', '/img/artigos/3.jpg', '<p>Nullam nec neque elit. Vestibulum ac justo molestie, porttitor mi eu, tincidunt nisi.</p>\r\n<p>Sed in leo ligula.</p>\r\n<p>Duis egestas tellus vitae porta mollis. Nunc aliquet diam sed velit faucibus, nec efficitur lorem consequat.</p>\r\n<p>Maecenas scelerisque, dolor vitae lacinia iaculis, nunc justo aliquet sem, in vestibulum augue lacus nec orci.</p>\r\n<p>Maecenas ut mauris commodo, varius justo non, condimentum ex. Proin vitae placerat neque.</p>\r\n<p>Sed consectetur felis eu augue ultrices, maximus pharetra est placerat. Maecenas pretium elit nec diam finibus luctus.</p>\r\n<p>Etiam suscipit purus purus. Praesent rhoncus sem lorem, viverra molestie dolor pellentesque nec.</p>\r\n<p>Aliquam eu consectetur turpis.</p>', 'Loren, Artigos, Tecnologia', '1'),
(4, '2018-07-30 16:14:35', 'Lucas Souza', 'Mau Hálito, TEM CURA?', 'Gengivite em cães. O que é doença periodontal em cães, ou doença periodontal canina?', '/img/artigos/4.jpg', '<p>Praesent auctor libero eget felis luctus congue. Nunc eleifend dictum bibendum.</p>\r\n<p>Aliquam orci lorem, placerat nec ante eu, iaculis tincidunt orci. Quisque non malesuada velit. Maecenas dictum at lectus vel luctus.</p>\r\n<p>Donec leo massa, mattis in enim vel, bibendum commodo velit. Nulla luctus neque eu ex porta aliquet.</p>', 'Ipsum, Tecnologia', '1'),
(5, '2018-07-30 19:50:24', 'Mateus Sodré', 'Quanto tempo dura o cio da cadela?', 'Esta é certamente uma das perguntas mais frequentes sobre este assunto, entre novos proprietários de fêmeas. Confira!', '/img/artigos/5.jpg', '<p>Nullam in porta tellus. Aliquam erat volutpat. Pellentesque pellentesque auctor ipsum, eu pulvinar massa.</p>\r\n<p>Nunc sed condimentum sapien, ac pellentesque enim.</p>\r\n<p>Proin ipsum lectus, mollis et tristique non, sodales vitae dui. Donec vel fringilla eros, ut malesuada dolor.</p>\r\n<p>Duis et scelerisque dolor, sed consectetur orci. Sed vel dui metus. Phasellus viverra eros a lectus ultricies eleifend.</p>\r\n<p>Duis finibus lectus ac purus mattis condimentum. Vivamus tortor urna, vulputate id leo eget, interdum gravida magna.</p>\r\n<p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n<p>Donec velit quam, semper sed dolor sit amet, mollis pellentesque magna.</p>', 'Ipsum, Notícias, Tecnologia', '1');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
