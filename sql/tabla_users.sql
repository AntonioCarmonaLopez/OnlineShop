CREATE TABLE usuarios (
id INT (10) NOT NULL AUTO_INCREMENT,
alias VARCHAR (30),
pass VARCHAR (30),
email VARCHAR (45),
permisos INT (1),
avatar VARCHAR (100) NULL,
fecha DATE,
PRIMARY KEY(id)
)
