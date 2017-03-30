#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        user_num    int (11) Auto_increment  NOT NULL ,
        user_nom    Varchar (50) ,
        user_prenom Varchar (50) ,
        user_mail   Varchar (50) ,
        user_mdp    Varchar (255) ,
        is_admin    Bool ,
        PRIMARY KEY (user_num )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: livre
#------------------------------------------------------------

CREATE TABLE livre(
        livre_id       int (11) Auto_increment  NOT NULL ,
        livre_ISBN     Int ,
        livre_titre    Varchar (100) ,
        nb_exemplaire  Int ,
        date_parution  Date ,
        synopsis       Text ,
        auteur_id      Int ,
        collection_id  Int ,
        fournisseur_id Int ,
        PRIMARY KEY (livre_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: auteur
#------------------------------------------------------------

CREATE TABLE auteur(
        auteur_id     int (11) Auto_increment  NOT NULL ,
        auteur_nom    Varchar (25) ,
        auteur_prenom Varchar (25) ,
        PRIMARY KEY (auteur_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: editeur
#------------------------------------------------------------

CREATE TABLE editeur(
        editeur_id  int (11) Auto_increment  NOT NULL ,
        editeur_nom Varchar (25) ,
        PRIMARY KEY (editeur_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: collection
#------------------------------------------------------------

CREATE TABLE collection(
        collection_id  int (11) Auto_increment  NOT NULL ,
        collection_nom Varchar (25) ,
        editeur_id     Int ,
        PRIMARY KEY (collection_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fournisseur
#------------------------------------------------------------

CREATE TABLE fournisseur(
        fournisseur_id  int (11) Auto_increment  NOT NULL ,
        fournisseur_nom Varchar (25) ,
        PRIMARY KEY (fournisseur_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: emprunte
#------------------------------------------------------------

CREATE TABLE emprunte(
        emprunt_date   Date ,
        emprunt_retour Date ,
        is_reservation Bool ,
        user_num       Int NOT NULL ,
        livre_id       Int NOT NULL ,
        PRIMARY KEY (user_num ,livre_id )
)ENGINE=InnoDB;

ALTER TABLE livre ADD CONSTRAINT FK_livre_auteur_id FOREIGN KEY (auteur_id) REFERENCES auteur(auteur_id);
ALTER TABLE livre ADD CONSTRAINT FK_livre_collection_id FOREIGN KEY (collection_id) REFERENCES collection(collection_id);
ALTER TABLE livre ADD CONSTRAINT FK_livre_fournisseur_id FOREIGN KEY (fournisseur_id) REFERENCES fournisseur(fournisseur_id);
ALTER TABLE collection ADD CONSTRAINT FK_collection_editeur_id FOREIGN KEY (editeur_id) REFERENCES editeur(editeur_id);
ALTER TABLE emprunte ADD CONSTRAINT FK_emprunte_user_num FOREIGN KEY (user_num) REFERENCES utilisateur(user_num);
ALTER TABLE emprunte ADD CONSTRAINT FK_emprunte_livre_id FOREIGN KEY (livre_id) REFERENCES livre(livre_id);
