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

