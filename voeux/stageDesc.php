<?php
	// Page de voeux : /voeux/index.php
	header("Content-Type: text/html; charset=UTF-8"); 
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once $root.'/config.inc.php';
    require_once $root.'/inc/checksession.php';
    require_once $root.'/inc/dbconnect.php';

    if (!isset($_GET["stageID"]) || $_GET["stageID"] == "")
    {
    	echo "<h1>Probleme avec le paramètre</h1>";
    	die();
    }
    else
    {
    	$id = $_GET["stageID"];
    	$sth = $connexion->prepare('SELECT titreStage as titre, nomEtudiant as etudiant, uv, descriptionComplete as full FROM stages where idStage="'.$id.'"');
		$sth->execute();
		$result = $sth -> fetch(PDO::FETCH_ASSOC);
		$titre = $result['titre'];
		$etudiant = $result['etudiant'];
		$uv = $result['uv'];
		$full = $result['full'];

		echo '<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title">'.$titre.'</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6" style="text-align:left;display: inline;"><b>Étudiant : </b><div id="descName" style="display: inline;">'.$etudiant.'</div></div>
								<div class="col-md-6" style="text-align:left;"><b>Type de Stage : </b><div id="descType" style="display: inline;">'.$uv.'</div></div>
							</div>
							<hr>
							<div id="descFull" >
								'.$full.'
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" data-dismiss="modal" class="btn btn-info">Close</a>
						</div>
					</div>
				</div>';
    }

	
					

