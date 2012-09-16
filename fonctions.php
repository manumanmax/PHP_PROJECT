<?php

putenv("ORACLE_SID=XE");
putenv("ORACLE_HOME=/usr/lib/oracle/xe/app/oracle/product/10.2.0/server");
putenv("LD_LIBRARY_PATH=/usr/lib/oracle/xe/app/oracle/product/10.2.0/server/lib");

function annee_participation() {
    $selected = '';

    echo '<select name="ANNEE_TDF">', "\n";
    for ($i = 2012; $i >= 1913; $i--)
        echo "\t", '<option value="', $i, '"', $selected, '>', $i, '</option>', "\n";
    echo '</select>', "\n";
}

function annee_naissance() {
    $selected = '';

    echo '<select name="ANNEE_NAISSANCE">', "\n";
    for ($i = 1995; $i >= 1864; $i--)
        echo "\t", '<option value="', $i, '"', $selected, '>', $i, '</option>', "\n";
    echo '</select>', "\n";
}

// fonction du prof permettant la conservation des données après soumission du formulaire

  function verif_rempli($n)
  {  
    if (isset($_POST[$n]))
    {
		$var = $_POST[$n];
		if ($var <> "")
		echo $var; 
		else
			echo $n ," ?";
	}
	else 
	  echo $n ," ?";
  }

//______________________________________________________________________________
//_____________________FONCTIONS_BDD____________________________________________
//______________________________________________________________________________

function OuvrirConnexion($session, $mdp, $instance) {
    $conn = oci_connect($session, $mdp, $instance);

    if (!$conn) {
        $e = oci_error();
        print htmlentities($e['message']);
        exit;
    }
    return $conn;
}

function FermerConnexion($conn) {
    oci_close($conn);
}

function PreparerRequete($conn, $req) {
    $cur = oci_parse($conn, $req);

    if (!$cur) {
        $e = oci_error($conn);
        print htmlentities($e['message']);
        exit;
    }
    return $cur;
}

function ExecuterRequete($conn, $req) {
    $cur = oci_parse($conn, $req);
    if (!$cur) {
        $e = oci_error($conn);
        print htmlentities($e['message']);
        exit;
    }
    $r = oci_execute($cur, OCI_DEFAULT);
    if (!$r) {
        $e = oci_error($stid);
        echo htmlentities($e['message']);
        exit;
    }
    return $cur;
}

?>
