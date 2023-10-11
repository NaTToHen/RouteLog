CREATE TABLE entregas(
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	dataSaida DATETIME NOT NULL,
	dataChegada DATETIME,
	fk_motorista INT,
	valorTotal FLOAT NOT NULL,
	fk_cidadeInicio INT,
	fk_cidadeDestino INT,
	statusEntrega VARCHAR(50) NOT NULL
);

CREATE TABLE motoristas(
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	nome VARCHAR(100) NOT NULL,
	cpf VARCHAR(14) NOT NULL,
	idade INT NOT NULL,
	caminhao VARCHAR(100) NOT NULL
);


INSERT INTO motoristas (nome, cpf, idade, caminhao)
VALUES
    ('João da Silva', '123.456.789-00', 30, 'Volvo FH12'),
    ('Maria Souza', '987.654.321-00', 28, 'Scania R450'),
    ('Pedro Oliveira', '111.222.333-00', 35, 'Mercedes-Benz Actros'),
    ('Ana Pereira', '444.555.666-00', 33, 'MAN TGX'),
    ('Lucas Santos', '777.888.999-00', 29, 'Iveco Stralis'),
    ('Mariana Costa', '666.777.888-00', 32, 'DAF XF'),
    ('Fernando Ribeiro', '333.444.555-00', 40, 'Renault T440'),
    ('Juliana Fernandes', '222.333.444-00', 27, 'Kenworth W990'),
    ('Carlos Rodrigues', '555.666.777-00', 38, 'Peterbilt 389'),
    ('Luisa Almeida', '999.888.777-00', 31, 'Freightliner Cascadia');

CREATE TABLE lojas(
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	nome VARCHAR(100) NOT NULL,
	endereco VARCHAR(255) NOT NULL,
	telefone VARCHAR(50) NOT NULL
);

INSERT INTO lojas (nome, endereco, telefone) VALUES
	('RouteLog SC', '123 Rua Principal, Cidade A, Estado A', '(123) 456-7890'),
	('RouteLog RS', '456 Rua Secundária, Cidade B, Estado B', '(234) 567-8901'),
	('Correios RS', '789 Rua Terciária, Cidade C, Estado C', '(345) 678-9012'),
	('Seu Claudio', '012 Rua Quaternária, Cidade D, Estado D', '(456) 789-0123'),
	('RouteLog Matriz', '345 Rua Quinária, Cidade E, Estado E', '(567) 890-1234');
	
	
CREATE OR REPLACE VIEW viewEntregas AS
SELECT e.id,
       e.cidadeDestino,
       e.dataSaida,
       e.dataChegada,
       e.fk_loja,
       l.nome AS nome_loja,
       e.fk_produto,
       p.nome AS nome_produto,
       e.fk_motorista,
       m.nome AS nome_motorista,
       e.fk_usuario,
       u.nome AS nome_usuario,
       e.valorTotal,
       e.quantidadeProdutos,
       e.statusEntrega,
       e.updated_at,
       e.created_at
FROM entregas e
LEFT JOIN lojas l ON e.fk_loja = l.id
LEFT JOIN produtos p ON e.fk_produto = p.id
LEFT JOIN motoristas m ON e.fk_motorista = m.id
LEFT JOIN users u ON e.fk_usuario = u.id;

DELIMITER //
CREATE TRIGGER calculaValorTotal
BEFORE INSERT ON entregas FOR EACH ROW
BEGIN
  DECLARE produtoValor DECIMAL(10, 2);
  
  -- Buscar o preço do produto
  SELECT valor INTO produtoValor
  FROM produtos
  WHERE id = NEW.fk_produto;

  -- Verificar se a quantidade de produtos é menor ou igual à quantidade disponível
  IF NEW.quantidadeProdutos <= (SELECT quantidade FROM produtos WHERE id = NEW.fk_produto) THEN
    -- Calcular o valor total
    SET NEW.valorTotal = NEW.quantidadeProdutos * produtoValor;
  ELSE
    -- Caso contrário, definir o valorTotal como 0
    SET NEW.valorTotal = 0;
  END IF;
END;
//
DELIMITER ;

