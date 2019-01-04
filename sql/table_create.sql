CREATE TABLE UTILISATEURS (
    courriel varchar(64) NOT NULL,
    nom varchar(64) NOT NULL,
    prenom varchar(64) NOT NULL,
    motdepasse varchar(64) NOT NULL,
    administrateur varchar(64) NOT NULL,
    PRIMARY KEY (courriel)
);


CREATE TABLE REUNIONS (
    reunionid varchar(8) NOT NULL,
    date date NOT NULL,
    PRIMARY KEY (reunionid)
);


CREATE TABLE DOSSIERS (
    dossierid varchar(8) NOT NULL,
    description text NOT NULL,
    PRIMARY KEY (dossierid)
);


CREATE TABLE POINTDORDRES (
    pointdordreid varchar(8) NOT NULL,
    reunionid varchar(8) NOT NULL,
    titre varchar(64) NOT NULL,
    description text NOT NULL,
    dossierid varchar(8),
    compterendu text NOT NULL,
    PRIMARY KEY (pointdordreid)
);

CREATE INDEX ON POINTDORDRES
    (reunionid);
CREATE INDEX ON POINTDORDRES
    (dossierid);


CREATE TABLE ROLES (
    roleid  NOT NULL,
    nom  NOT NULL,
    description  NOT NULL,
    PRIMARY KEY (roleid)
);


CREATE TABLE PARTICIPATIONS (
    reunionid varchar(8) NOT NULL,
    courriel varchar(64) NOT NULL,
    statusid varchar(4) NOT NULL,
    PRIMARY KEY (reunionid, courriel)
);

CREATE INDEX ON PARTICIPATIONS
    (statusid);


CREATE TABLE COMPTERENDUS (
    pointdordreid varchar(8) NOT NULL,
    contenu text NOT NULL
);

CREATE INDEX ON COMPTERENDUS
    (pointdordreid);


CREATE TABLE LIENSDEPARTEMENT (
    utilisateurid  NOT NULL,
    departementid  NOT NULL,
    roleid  NOT NULL,
    PRIMARY KEY (utilisateurid, departementid)
);

CREATE INDEX ON LIENSDEPARTEMENT
    (roleid);


CREATE TABLE TRAITEMENTDOSSIER (
    reunionid  NOT NULL,
    dossierid  NOT NULL,
    description  NOT NULL,
    PRIMARY KEY (reunionid, dossierid)
);


CREATE TABLE PRIVILEGES (
    privilegeid  NOT NULL,
    nom  NOT NULL,
    description  NOT NULL,
    PRIMARY KEY (privilegeid)
);


CREATE TABLE AUTORISE (
    roleid  NOT NULL,
    privilegeid  NOT NULL,
    PRIMARY KEY (roleid, privilegeid)
);


CREATE TABLE PARTICIPATIONSTATUS (
    statusid varchar(4) NOT NULL,
    nom varchar(64) NOT NULL,
    description varchar(512) NOT NULL,
    PRIMARY KEY (statusid)
);


CREATE TABLE INVITATION (
    courriel varchar(64) NOT NULL,
    cle varchar(64) NOT NULL,
    PRIMARY KEY (courriel)
);

ALTER TABLE INVITATION
    ADD UNIQUE (cle);


CREATE TABLE MESSAGES (
    auteur varchar(64) NOT NULL,
    destinataire varchar(64) NOT NULL,
    date timestamp with time zone NOT NULL,
    message text NOT NULL,
    vue TINYINT NOT NULL,
    PRIMARY KEY (auteur, destinataire, date)
);


ALTER TABLE POINTDORDRES ADD CONSTRAINT FK_pointdordres__reunionid FOREIGN KEY (reunionid) REFERENCES REUNIONS(reunionid);
ALTER TABLE POINTDORDRES ADD CONSTRAINT FK_pointdordres__dossierid FOREIGN KEY (dossierid) REFERENCES DOSSIERS(dossierid);
ALTER TABLE PARTICIPATIONS ADD CONSTRAINT FK_participations__reunionid FOREIGN KEY (reunionid) REFERENCES REUNIONS(reunionid);
ALTER TABLE PARTICIPATIONS ADD CONSTRAINT FK_participations__courriel FOREIGN KEY (courriel) REFERENCES UTILISATEURS(courriel);
ALTER TABLE PARTICIPATIONS ADD CONSTRAINT FK_participations__statusid FOREIGN KEY (statusid) REFERENCES PARTICIPATIONSTATUS(statusid);
ALTER TABLE COMPTERENDUS ADD CONSTRAINT FK_compterendus__pointdordreid FOREIGN KEY (pointdordreid) REFERENCES POINTDORDRES(pointdordreid);
ALTER TABLE TRAITEMENTDOSSIER ADD CONSTRAINT FK_traitementdossier__reunionid FOREIGN KEY (reunionid) REFERENCES REUNIONS(reunionid);
ALTER TABLE TRAITEMENTDOSSIER ADD CONSTRAINT FK_traitementdossier__dossierid FOREIGN KEY (dossierid) REFERENCES DOSSIERS(dossierid);
ALTER TABLE INVITATION ADD CONSTRAINT FK_invitation__courriel FOREIGN KEY (courriel) REFERENCES UTILISATEURS(courriel);
ALTER TABLE MESSAGES ADD CONSTRAINT FK_messages__auteur FOREIGN KEY (auteur) REFERENCES UTILISATEURS(courriel);
ALTER TABLE MESSAGES ADD CONSTRAINT FK_messages__destinataire FOREIGN KEY (destinataire) REFERENCES UTILISATEURS(courriel);