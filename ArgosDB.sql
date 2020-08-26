CREATE DATABASE ArgosDB;
USE ArgosDB;

# Criação Tabelas
CREATE TABLE Patient(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(100) NOT NULL,
	Email VARCHAR(100) NOT NULL,
	Telephone_WhatsApp VARCHAR(100),
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE VisualConditions(
	ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_Patient INT NOT NULL UNIQUE,
    Glasses_Lens VARCHAR(100),
    VisualDifficulty VARCHAR(100),
    Surgery VARCHAR(100)
);

CREATE TABLE HealthConditions(
	ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_Patient INT,
    HealthConditions VARCHAR(100)
);

CREATE TABLE SnellenResult(
	ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_Patient INT NOT NULL UNIQUE,
    RightEye INT NOT NULL,
    LeftEye INT NOT NULL
);

# Implementação Foreign Keys - Tabelas
ALTER TABLE VisualConditions ADD CONSTRAINT FK_VisualConditions_Patient FOREIGN KEY(ID_Patient) REFERENCES Patient(ID);
ALTER TABLE HealthConditions ADD CONSTRAINT FK_HealthConditions_Patient FOREIGN KEY(ID_Patient) REFERENCES Patient(ID);
ALTER TABLE SnellenResult ADD CONSTRAINT FK_SnellenResult_Patient FOREIGN KEY(ID_Patient) REFERENCES Patient(ID);