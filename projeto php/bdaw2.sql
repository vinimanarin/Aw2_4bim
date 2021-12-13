SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `votacao` (
  `id_vot` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `num_candi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Maria', 'mariaxxx@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'João', 'joaozzz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

ALTER TABLE `votacao`
  ADD PRIMARY KEY (`id_vot`),
  ADD KEY `id_usuario` (`id_usuario`);

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `votacao`
  MODIFY `id_vot` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `votacao`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;
