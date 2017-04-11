DROP DATABASE baseLo07v2;
CREATE DATABASE baseLo07v2;
use baseLo07v2;
CHARSET utf8;
SET FOREIGN_KEY_CHECKS=0;
-- ============================================================
--   Table : T_MEMBRE 
-- ============================================================
CREATE TABLE IF NOT EXISTS users(
	id 					INT(10) 		NOT NULL 	AUTO_INCREMENT,
	pseudoMembre 		VARCHAR(20) 	NOT NULL,
	prenomMembre 		VARCHAR(25) 	NOT NULL,
	name 				VARCHAR(25) 	NOT NULL,
	password 			VARCHAR(20) 	NOT NULL,
	dnMembre 			DATE 			NOT NULL,
	email 				VARCHAR(75)		NOT NULL,
	telFixeMembre 		VARCHAR(13),
	telPortMembre 		VARCHAR(13) 	NOT NULL,
	numRueMembre 		VARCHAR(10),
	nomRueMembre 		VARCHAR(25),
	cpMembre 			VARCHAR(5),
	villeMembre 		VARCHAR(45),
	vehiculeMembre		INT(10),
	dateInscription 	DATE 			NOT NULL,
	photoMembre 		BLOB,
	updated_at 			timestamp 		NOT NULL,
	created_at 			timestamp 		NOT NULL,
	remember_token 		VARCHAR(100),
	CONSTRAINT C_PK_Membre PRIMARY KEY(id),
	INDEX ind_MEMBRE_vehiculeMembre(vehiculeMembre),
	CONSTRAINT C_FK_MEMBRE_vehiculeMembre_VEHICULE FOREIGN KEY (vehiculeMembre) REFERENCES T_VEHICULE(idVehicule),
	CONSTRAINT C_CHK_cpMembre_MEMBRE CHECK (cpMembre LIKE REPLICATE('[0-9]', 5)),
	CONSTRAINT C_CHK_telFixeMembre_MEMBRE CHECK (telFixeMembre LIKE REPLICATE('[0-9]', 10)),
	CONSTRAINT C_CHK_telPortMembre_MEMBRE CHECK (telPortMembre LIKE REPLICATE('[0-9]', 10))
	) ENGINE=InnoDB;
-- ============================================================
--   Table : T_VEHICULE 
-- ============================================================
CREATE TABLE IF NOT EXISTS T_VEHICULE(
	idVehicule 			INT(10) 		NOT NULL 	AUTO_INCREMENT,
	couleurVehicule 	VARCHAR(15) 	NOT NULL, 	
	marqueVehicule 		VARCHAR(15) 	NOT NULL,
	nomVehicle 			VARCHAR(25) 	NOT NULL,
	dateMiseEnService 	DATE 			NOT NULL,
	nbPlaces          	INT(10) 		NOT NULL,
	CONSTRAINT C_PK_Vehicule PRIMARY KEY(idVehicule),
	CONSTRAINT C_CHK_nbPlaces CHECK (nbPlaces <=5 AND nbPlaces>=1)
	) ENGINE=InnoDB;
-- ============================================================
--   Table : T_TRAJET
-- ============================================================
CREATE TABLE IF NOT EXISTS T_TRAJET(
	idTrajet 			INT(10) 		NOT NULL 	AUTO_INCREMENT,
	idConducteur 		INT(10) 		NOT NULL,
	villeDepartTrajet 	VARCHAR(15) 	NOT NULL,
	villeArriveeTrajet 	VARCHAR(15) 	NOT NULL,
	dateTrajet 			DATE 			NOT NULL,
	appreciationTrajet 	INT(10) 		NOT NULL,
	nbPlaces 			INT(10)			NOT NULL,
	statutTrajet 		BOOLEAN 		NOT NULL,
	pppTrajet 			INT(10) 		NOT NULL,
	CONSTRAINT C_PK_Trajet PRIMARY KEY(idTrajet),
	INDEX ind_TRAJET_appreciationTrajet(appreciationTrajet),
	INDEX ind_TRAJET_idConducteur(idConducteur),
	CONSTRAINT C_FK_TRAJET_appreciationTrajet_APPRECIATION FOREIGN KEY (appreciationTrajet) REFERENCES T_APPRECIATION(idAppreciation),
	CONSTRAINT C_FK_TRAJET_idConducteur_users FOREIGN KEY (idConducteur) REFERENCES users(id)
	) ENGINE=InnoDB;
-- ============================================================
--   Table : T_APPRECIATION
-- ============================================================
CREATE TABLE IF NOT EXISTS T_APPRECIATION(
	idAppreciation 					INT(10) 		NOT NULL,
	valeurAppreciation 				INT(1),
	commentaireAppreciation 		VARCHAR(100),
	CONSTRAINT C_PK_Appreciation PRIMARY KEY(idAppreciation),
	CONSTRAINT C_CHK_valeurAppreciation CHECK (valeurAppreciation <= 10 AND valeurAppreciation>= 0)
	) ENGINE=InnoDB;
-- ============================================================
--   Table : T_ADMIN
-- ============================================================
CREATE TABLE IF NOT EXISTS T_ADMIN(
	idAdmin			INT(10) 		NOT NULL 	AUTO_INCREMENT,
	pseudoAdmin		VARCHAR(20) 	NOT NULL,
	prenomAdmin		VARCHAR(25) 	NOT NULL,
	nomAdmin		VARCHAR(25) 	NOT NULL,
	mdpAdmin		VARCHAR(20) 	NOT NULL,
	emailAdmin		VARCHAR(75)		NOT NULL,
	telFixeAdmin	VARCHAR(13),
	telPortAdmin	VARCHAR(13) 	NOT NULL,
	CONSTRAINT C_PK_Admin PRIMARY KEY(idAdmin),
	CONSTRAINT C_CHK_telPortAdmin CHECK (telPortAdmin LIKE REPLICATE('[0-9]', 10))
	) ENGINE=InnoDB;
-- ============================================================
--   Table : TJ_RESERVATION
-- ============================================================
CREATE TABLE IF NOT EXISTS TJ_RESERVATION(
	idReservation			INT(10) 		NOT NULL 	AUTO_INCREMENT,
	idClientReservation 	INT(10)			NOT NULL,
	trajetReservation 		INT(10) 		NOT NULL,
	CONSTRAINT C_PK_Admin PRIMARY KEY(idReservation),
	INDEX ind_RESERVATION_idClientReservation(idClientReservation),
	INDEX ind_RESERVATION_trajetReservation(trajetReservation),
	CONSTRAINT C_FK_RESERVATION_idClientReservation_MEMBRE FOREIGN KEY (idClientReservation) REFERENCES T_MEMBRE(id),
	CONSTRAINT C_FK_RESERVATION_trajetReservation_TRAJET FOREIGN KEY (trajetReservation) REFERENCES T_TRAJET(idTrajet)
	) ENGINE=InnoDB;