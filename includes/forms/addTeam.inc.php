<h1>Ajouter une équipe</h1>
<!-- enctype="multipart/form-data" pour envoyer des fichiers -->
<form method="POST" enctype="multipart/form-data">
    <label>Nom</label>
    <input type="text" name="nom">

    <label>Entraineur</label>
    <input type="text" name="entraineur">

    <label>Couleurs</label>
    <input type="text" name="couleurs">

    <br>
    <label>Logo</label>
    <input type="file" name="logo">

    <input type="submit" name="input">
</form>