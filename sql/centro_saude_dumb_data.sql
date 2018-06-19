USE centro_saude;

INSERT INTO funcionarios(cargo,nome,sexo,username,pass,estado,email,bi,nif,morada,codPostal,dataNascimento,telefone,telemovel,numLicenca) 
VALUES ("admin","Anibal","M","anibal","1234","A","anibal@centro.pt",123456789,987654321,"Rua do Capelo",3030987,"1990-10-14",989191918,219187364,000000001),
("medic","Rogério Correia","M","roger","1234","A","roger@centro.pt",123456789,987654321,"Rua do Roger",3030987,"1956-10-12",989191918,219187364,000000002),
("medic","Jorge Madeira","M","madeira","1234","A","madeira@centro.pt",123432489,987654321,"Rua do Continente",3030987,"1963-10-08",989191918,219187364,000000003),
("recep","Amélia Ramalho","F","amelia","password","A","amelia@centro.pt",123456789,987654321,"Rua de Portugal",3030987,"1957-10-12",989191918,219187364,000000004),
("enfer","Joana Alves","F","joo","pass","A","joanaa@centro.pt",123456789,987654321,"Praça D. João",3030987,"1973-10-12",989191918,219187364,000000005);

INSERT INTO pacientes(nome,sexo,username,pass,estado,email,bi,nif,morada,codPostal,dataNascimento,telefone,telemovel,cartaoUtente) 
VALUES ("Paulo França","M","paulof","1234","A","paulo@sapo.pt",123456789,987654321,"Rua do Gaula",3030987,"1990-10-14",989191918,219187364,000000001),
("João Pedro","M","johnny","1234","A","joao@centro.pt",123456789,987654321,"Rua do Roger",3030987,"1956-10-12",989191918,219187364,000000002),
("Maria João","F","maryjohn","password","A","maria@gmail.com",123456789,987654321,"Rua de Portugal",3030344,"1983-10-12",989191918,219187364,000000003),
("Francisca Jodão","F","xika","1234","A","francisca@centro.pt",123456789,987654321,"Rua da Autonomia",3030342,"1967-10-12",989191918,219187364,000000002);

INSERT INTO locais(tipo,andar,porta,lotacao,observacoes) 
VALUES ("consultorio",1,002,2,"Ocupado por Dr. Rogério"),
("consultorio",1,004,2,"Ocupado por Dr. Madeira"),
("quarto",2,010,1,"Ocupado por Dr. Rogério"),
("urgencia",1,022,4,"Sempre a espera.");

INSERT INTO consultas(tipo,estado,dataConsulta,horaConsulta,duracao,observacoes,idFuncionario,idPaciente,idLocal) 
VALUES ("consulta","P","2013-10-14","18:00",30,"nenhuma",2,1,1),
("consulta","F","2011-10-14","10:00",30,"nenhuma",3,4,2),
("urgencia","F","2012-10-14","18:00",30,"nenhuma",2,3,3),
("urgencia","F","2012-11-12","10:00",60,"Fez transferencia",2,3,3);

INSERT INTO receitas(receita,observacoes,idConsulta) 
VALUES ("Nimed de 24 em 24","nenuma",1),
("Proflox de 12 em 12","nenuma",2),
("Nimed de 24 em 24","nenuma",3);

INSERT INTO produtos(refProduto,quantidade,tipo,estado,fornecedor,marca,descricao,validadeProd,idLocal) 
VALUES (1234567890,10,"bisturi","activo","MediFornece","Profacas","Bisturi em inox","2113-10-14",2),
(1234567890,3,"bisturi","activo","MediFornece","Profacas","Bisturi em inox","2113-10-14",1),
(1827263841,1,"equipamento","activo","MediFornece","X-RAY","Raio X","2020-10-14",1),
(1726271617,10,"consumivel","uso","MediFornece","Colex","Pensos Impermiaveis","2030-10-14",2);

INSERT INTO registo_acessos(dataAcesso,horaAcesso,tipo,idFuncionario) 
VALUES ("2013-10-14","12:00","E",2),
("2013-10-14","20:00","S",2),
("2013-10-14","10:00","E",3),
("2013-10-14","19:00","S",3);

INSERT INTO salarios(descricao,valor) 
VALUES ("Medico ordenado base",3000),
("Medico ordenado base + subsidio", 5000),
("Recepção ordenado base", 1200),
("Recepçao ordenado base + subsidio", 2000);

INSERT INTO registo_salarios(dataPagamento,estado,idFuncionario,idSalario) 
VALUES ("2013-11-04","P",2,2),
("2013-01-04","P",2,1),
("2013-01-04","P",4,3),
("2013-11-04","P",4,4);
