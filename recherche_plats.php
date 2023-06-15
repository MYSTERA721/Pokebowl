<?php
$plats = array(
	array(
		'nom' => 'Salade de poulet     550RS',
		'ingredients' => array('poulet', 'avocat', 'fromage', 'sauce')
	),
	array(
		'nom' => 'Boeuf bourguignon',
		'ingredients' => array('boeuf', 'légumes', 'sauce')
	),
	array(
		'nom' => 'Poisson grillé',
		'ingredients' => array('poisson', 'légumes', 'sauce')
	),
	array(
		'nom' => 'Ratatouille',
		'ingredients' => array('légumes', 'sauce')
	),
	array(
		'nom' => 'Pizza',
		'ingredients' => array('fromage', 'sauce')
	),
	array(
		'nom' => 'Ragoût de poulet 1110RS',
		'ingredients' => array('poulet', 'légumes', 'sauce')
	)
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['ingredients'])) {
		$ingredients = $_POST['ingredients'];
		$resultats = array();
		foreach ($plats as $plat) {
			$plat_correspond = true;
			foreach ($ingredients as $ingredient) {
				if (!in_array($ingredient, $plat['ingredients'])) {
					$plat_correspond = false;
					break;
				}
			}
			if ($plat_correspond) {
				$resultats[] = $plat;
			}
		}
		echo json_encode($resultats);
	}
}
?>
