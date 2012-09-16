<?php
include 'fonctions.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Formulaire du Coureur</title>
    </head>

    <body>
        <h1> "Coureur du Tour de France" </h1>

        <form name="formu_coureur" action = "<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="application/x-www-form-urlencoded">
            <!-- N_COUREUR NOM PRENOM ANNEE_NAISSANCE CODE_TDF ANNEE_TDF -->


            <fieldset>
                <legend>Identité</legend>

                <?php
                $conn = OuvrirConnexion("TEST", "TEST", "xe");
                $req = 'SELECT DISTINCT CODE_TDF FROM tdf_coureur order by CODE_TDF asc';
                $cur = ExecuterRequete($conn, $req);
                ?>
                Nom : <input type="text" name="NOM" size="12" placeholder="<?php verif_rempli("NOM"); ?>"><br>
                Prenom : <input type="text" name="PRENOM" size="12" placeholder="<?php verif_rempli("PRENOM"); ?>"><br>
                Numéro de coureur : <input type="text" name="numero" size="12" placeholder="<?php verif_rempli("numero"); ?>"><br>
                Année de naissance : <?php annee_naissance(); ?> <br>
                Année de participation : <?php annee_participation(); ?> <br>
                Code Nationalité : <select name="CODE_TDF" size="1">
                    <?php
                    while ($row = oci_fetch($cur)) {
                        echo "<option value='" . oci_result($cur, 'CODE_TDF') . "'> " . oci_result($cur, 'CODE_TDF') . "</option>";
                    }
                    ?>
                </select>

            <?php FermerConnexion($conn); ?>
            </fieldset>

            <fieldset>
                <input type="reset" name="reset">
                <input type="submit" name="accept"><br>
            </fieldset>

        </form>
    </body>
</html>
