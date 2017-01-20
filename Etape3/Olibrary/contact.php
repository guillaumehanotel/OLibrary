<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>page contacte</title>
</head>
<body>

<form action="/ma-page-de-traitement" method="post">
    <div>
        <label for="nom">*Nom :</label>
        <input type="text" id="nom" />
    </div>
    <div>
        <label for="prenom">*Prenom :</label>
        <input type="text" id="prenom" />
    </div>
    <div>
        <label for="courriel">*Courriel :</label>
        <input type="email" id="courriel" />
    </div>
    <div>
        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" />
    </div>
    <div>
        <label for="message">Message :</label>
        <textarea id="message"></textarea>
    </div>
    <div class="button">
        <button type="submit">Envoyer votre message</button>
    </div>
<p>(*) Champ obligatoire </p>
</form>




</body>
</html>


