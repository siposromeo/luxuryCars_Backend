- BACKEND -

LAPOZÁS?!??!?

táblák létrehozása, és feltöltése.

CREATE TABLE Felhasznalo (
    _id INT PRIMARY KEY,
    teljes_nev VARCHAR(255) NOT NULL,
    email_cim VARCHAR(255) UNIQUE NOT NULL,
    jelszo VARCHAR(255) NOT NULL,
    jogitvany_szam VARCHAR(50),
    telefon_szam VARCHAR(20),
    szamlazasi_cim TEXT
);

CREATE TABLE Auto (
    _id INT PRIMARY KEY,
    marka_modellnev VARCHAR(255) NOT NULL,
    ferohely INT,
    loero INT,
    kep_url VARCHAR(255)
);

CREATE TABLE Naptar (
    _id INT PRIMARY KEY,
    berles_kezdete DATE NOT NULL,
    berles_vege DATE NOT NULL,
    berles_idotartama INT
);

CREATE TABLE Rendeles (
    _id INT PRIMARY KEY,
    felhasznalo_id INT,
    auto_id INT,
    naptar_id INT,
    ar DECIMAL(10, 2) NOT NULL,
    megrendeles_datuma TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (felhasznalo_id) REFERENCES Felhasznalo(_id),
    FOREIGN KEY (auto_id) REFERENCES Auto(_id),
    FOREIGN KEY (naptar_id) REFERENCES Naptar(_id)
);