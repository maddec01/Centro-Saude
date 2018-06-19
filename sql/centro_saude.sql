CREATE DATABASE IF NOT EXISTS centro_saude;
USE centro_saude;

-- Tables
CREATE TABLE IF NOT EXISTS funcionarios (
	idFuncionario 		INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cargo			VARCHAR(10) NOT NULL,
	nome			VARCHAR(20) NOT NULL,
	sexo			VARCHAR(1) NOT NULL,
	username 		VARCHAR(20) NOT NULL,
	pass 			VARCHAR(20) NOT NULL,
	estado			VARCHAR(1) NOT NULL,
	email 			VARCHAR(50) NOT NULL,
	bi			BIGINT(10) NOT NULL,
	nif			BIGINT(10) NOT NULL,
	morada			VARCHAR(100) NOT NULL,
	codPostal		INT(7) NOT NULL,
	dataNascimento		DATE NOT NULL,
	telefone		INT(9) NOT NULL,
	telemovel		INT(9) NOT NULL,
	numLicenca		VARCHAR(10) NOT NULL
) ENGINE=InnoDB COLLATE = latin1_general_ci;

CREATE TABLE IF NOT EXISTS pacientes (
	idPaciente	 	INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nome			VARCHAR(20) NOT NULL,
	sexo			VARCHAR(1) NOT NULL,
	username 		VARCHAR(20) NOT NULL,
	pass 			VARCHAR(20) NOT NULL,
	estado			VARCHAR(1) NOT NULL,
	email 			VARCHAR(50) NOT NULL,
	bi			BIGINT(10) NOT NULL,
	nif			BIGINT(10) NOT NULL,
	morada			VARCHAR(100) NOT NULL,
	codPostal		INT(7) NOT NULL,
	dataNascimento		DATE NOT NULL,
	telefone		INT(9) NOT NULL,
	telemovel		INT(9) NOT NULL,
	cartaoUtente		VARCHAR(10) NOT NULL
) ENGINE=InnoDB COLLATE = latin1_general_ci;

CREATE TABLE IF NOT EXISTS locais (
	idLocal		 	INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	tipo			VARCHAR(12) NOT NULL,
	andar			INT(1) NOT NULL,
	porta			INT(4) NOT NULL,
	lotacao			INT(4),
	observacoes		VARCHAR(100)
) ENGINE=InnoDB COLLATE = latin1_general_ci;

CREATE TABLE IF NOT EXISTS consultas (
	idConsulta	 	INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	tipo			VARCHAR(10) NOT NULL,
	estado			VARCHAR(1) NOT NULL,
	dataConsulta		DATE NOT NULL,
	horaConsulta		TIME NOT NULL,
	duracao			INT(10) NOT NULL,
	observacoes		VARCHAR(100),
	idFuncionario		INT(11) NOT NULL,
	idPaciente	 	INT(11) NOT NULL,
	idLocal		 	INT(11)
) ENGINE=InnoDB COLLATE = latin1_general_ci;

CREATE TABLE IF NOT EXISTS receitas (
	idReceita	 	INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	receita			VARCHAR(100) NOT NULL,
	observacoes		VARCHAR(100),
	idConsulta 		INT(11) NOT NULL
) ENGINE=InnoDB COLLATE = latin1_general_ci;

CREATE TABLE IF NOT EXISTS registo_acessos (
	idAcesso	 	INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	dataAcesso		DATE NOT NULL,
	horaAcesso		TIME NOT NULL,
	tipo			VARCHAR(1) NOT NULL,
	idFuncionario		INT(11) NOT NULL
) ENGINE=InnoDB COLLATE = latin1_general_ci;

CREATE TABLE IF NOT EXISTS produtos (
	idProduto		INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	refProduto	 	INT(11) NOT NULL,
	quantidade	 	INT(11) NOT NULL,
	tipo			VARCHAR(20) NOT NULL,
	estado			VARCHAR(10) NOT NULL,
	fornecedor		VARCHAR(30) NOT NULL,
	marca			VARCHAR(30) NOT NULL,
	descricao		VARCHAR(50) NOT NULL,
	validadeProd		DATE NOT NULL,
	idLocal			INT(11)
) ENGINE=InnoDB COLLATE = latin1_general_ci;

CREATE TABLE IF NOT EXISTS registo_salarios (
	idRegistoSal		INT(11) PRIMARY KEY AUTO_INCREMENT,
	dataPagamento 		DATE,
	estado 			VARCHAR(1) NOT NULL,
	idFuncionario		INT(11) NOT NULL,
	idSalario		INT(11) NOT NULL
) ENGINE=InnoDB COLLATE = latin1_general_ci;

CREATE TABLE IF NOT EXISTS salarios (
	idSalario		INT(11) PRIMARY KEY AUTO_INCREMENT,
	descricao		VARCHAR(50) NOT NULL,
	valor 			DOUBLE NOT NULL DEFAULT 0
) ENGINE=InnoDB COLLATE = latin1_general_ci;

-- Foreign Keys
ALTER TABLE consultas
ADD CONSTRAINT fk_id1Funcionario_Funcionarios
FOREIGN KEY (idFuncionario)
REFERENCES funcionarios(idFuncionario),
ADD CONSTRAINT fk_id1Paciente_Pacientes
FOREIGN KEY (idPaciente)
REFERENCES pacientes(idPaciente),
ADD CONSTRAINT fk_id1Local_Locais
FOREIGN KEY (idLocal)
REFERENCES locais(idLocal);

ALTER TABLE receitas
ADD CONSTRAINT fk_id1Consulta_Consultass
FOREIGN KEY (idConsulta)
REFERENCES consultas(idConsulta);

ALTER TABLE registo_acessos
ADD CONSTRAINT fk_id2Funcionario_Funcionarios
FOREIGN KEY (idFuncionario)
REFERENCES funcionarios(idFuncionario);

ALTER TABLE produtos
ADD CONSTRAINT fk_id2Local_Locais
FOREIGN KEY (idLocal)
REFERENCES locais(idLocal);

ALTER TABLE registo_salarios
ADD CONSTRAINT fk_id3Funcionario_Funcionarios
FOREIGN KEY (idFuncionario)
REFERENCES funcionarios(idFuncionario),
ADD CONSTRAINT fk_id1Salario_Salarios
FOREIGN KEY (idSalario)
REFERENCES salarios(idSalario);
