<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $pdo = new PDO('mysql:host=localhost;dbname=table_test_php', "root", "");

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    // TODO votre code ici.
    $date = date("l");
    $req = "INSERT INTO utilisateur (nom,prenom,email,password,adresse,code_postal,pays,date_join) VALUES ('tyburczy','yann','132@123.com','1234','18','59740','france',NOW())";
    $pdo->exec($req);

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    // TODO votre code ici.
    $req = "INSERT INTO produit (titre,prix,description_courte,description_longue) VALUES ('science','15.5','descipt','descript')";
    $pdo->exec($req);

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    // TODO Votre code ici.
    $req = "INSERT INTO utilisateur (nom,prenom,email,password,adresse,code_postal,pays,date_join) VALUES ('tyburczy2','yann','132@123.com2','1234','18','59740','france',NOW()), ('tyburczy2','yann','132@123.com3','1234','18','59740','france',NOW())";
    $pdo->exec($req);
    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    // TODO Votre code ici.
    $req = "INSERT INTO produit (titre,prix,description_courte,description_longue) VALUES ('science2','15.5','descipt','descript'), ('science3','15.5','descipt','descript')";
    $pdo->exec($req);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    // TODO Votre code ici.
    $pdo->beginTransaction();
    $req = "INSERT INTO utilisateur (nom,prenom,email,password,adresse,code_postal,pays,date_join) ";
    $req1 = $req . "VALUES ('daez','fd','faefa1','dad','12345','58524','france',NOW())";
    $req2 = $req . "VALUES ('daez','fd','faefa2','dad','12345','58524','france',NOW())";
    $req3 = $req . "VALUES ('daez','fd','faefa3','dad','12345','58524','france',NOW())";

    $pdo->exec($req1);
    $pdo->exec($req2);
    $pdo->exec($req3);
    $pdo->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
}
catch(PDOException $exception){
    echo $exception->getMessage();
    $pdo->rollBack();
}
