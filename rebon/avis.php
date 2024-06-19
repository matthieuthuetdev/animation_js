<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $note = $_POST['note'];
    $avis = $_POST['avis'];
    
    $filename = 'avis_utilisateurs.json';
    
    $avis_utilisateurs = [];
    if (file_exists($filename)) {
        $avis_utilisateurs = json_decode(file_get_contents($filename), true);
    }
    
    $nouvel_avis = [
        'pseudo' => $pseudo,
        'note' => $note,
        'avis' => $avis
    ];
    $avis_utilisateurs[] = $nouvel_avis;
    
    if (file_put_contents($filename, json_encode($avis_utilisateurs)) !== false) {
        echo "Merci pour votre avis !";
    } else {
        echo "Erreur lors de l'enregistrement de votre avis.";
    }
} else {
    echo "Une erreur s'est produite, veuillez réessayer.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Avis</title>
</head>
<body>
    <h2>Donne ton avis sur l'animation que tu viens de voir :</h2>
    <form  method="post">
        <label for="pseudo">Pseudo :</label><br>
        <input type="text" id="pseudo" name="pseudo" required><br><br>
        
        <label for="note">Note :</label><br>
        <select id="note" name="note">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        
        <label for="avis">Avis :</label><br>
        <textarea id="avis" name="avis" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
