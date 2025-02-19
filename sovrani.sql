create database anticaroma;



CREATE TABLE anticaroma.Sovrani (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100),
    DataInizioRegno DATE,
    DataFineRegno DATE,
    Immagine VARCHAR(255),
    Predecessore INT,
    Successore INT,
    FOREIGN KEY (Predecessore) REFERENCES Sovrani(ID),
    FOREIGN KEY (Successore) REFERENCES Sovrani(ID)
);


INSERT INTO anticaroma.Sovrani (Nome, DataInizioRegno, DataFineRegno, Immagine, Predecessore, Successore) 
VALUES
('Re Utopio I', '1500-01-01', '1520-12-31', 'utopio1.jpg', NULL, NULL);

INSERT INTO anticaroma.Sovrani (Nome, DataInizioRegno, DataFineRegno, Immagine, Predecessore, Successore) 
VALUES
('Re Utopio II', '1521-01-01', '1550-12-31', 'utopio2.jpg', NULL, NULL);

INSERT INTO anticaroma.Sovrani (Nome, DataInizioRegno, DataFineRegno, Immagine, Predecessore, Successore) 
VALUES
('Regina Mirabella', '1551-01-01', '1575-12-31', 'mirabella.jpg', NULL, NULL);

INSERT INTO anticaroma.Sovrani (Nome, DataInizioRegno, DataFineRegno, Immagine, Predecessore, Successore) 
VALUES
('Re Utopio III', '1576-01-01', '1600-12-31', 'utopio3.jpg', NULL, NULL);

INSERT INTO anticaroma.Sovrani (Nome, DataInizioRegno, DataFineRegno, Immagine, Predecessore, Successore) 
VALUES
('Regina Eleonora', '1601-01-01', '1620-12-31', 'eleonora.jpg', NULL, NULL);

INSERT INTO anticaroma.Sovrani (Nome, DataInizioRegno, DataFineRegno, Immagine, Predecessore, Successore) 
VALUES
('Re Utopio IV', '1621-01-01', '1650-12-31', 'utopio4.jpg', NULL, NULL);


SELECT s.ID , s.Nome , s.DataInizioRegno, s.DataFineRegno,
    (SELECT p.Nome FROM anticaroma.Sovrani p WHERE p.ID = s.Predecessore) AS PredecessoreNome,
    (SELECT su.Nome FROM anticaroma.Sovrani su WHERE su.ID = s.Successore) AS SuccessoreNome
    FROM anticaroma.Sovrani s;
