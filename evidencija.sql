CREATE DATABASE evidencija;
USE evidencija;

CREATE TABLE ocjene (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  predmet varchar(100) NOT NULL,
  ocjena int(11) NOT NULL,
  studenti_id int(11) NOT NULL,
  FOREIGN KEY (studenti_id) REFERENCES studenti (id)
) ENGINE=InnoDB;

CREATE TABLE studenti (
  id int(11) NOT NULL PRIMARY KEY,
  ime varchar(100) NOT NULL,
  prezime varchar(100) NOT NULL
) ENGINE=InnoDB;

INSERT INTO studenti (id, ime, prezime) VALUES
(101, "Pero", "Perić"),
(102, "Sara", "Sarić");

INSERT INTO ocjene (predmet, ocjena, studenti_id) VALUES
("php osnove", 3, 101),
("php oop", 2, 101),
("laravel", 5, 102);