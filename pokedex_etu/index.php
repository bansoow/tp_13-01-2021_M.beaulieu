<?php
try{
  $bdd = new PDO('mysql:host=localhost;dbname=pokedex;charset=UTF8','root', '');
  $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
  catch (PDOException $e){
    echo "Erreur: " .$e->getMessage()."<br/>";
    die();
  }
$pokedex = $bdd->query('SELECT * FROM pokemon');
$pokedex->setFetchmode(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Pokedex</title>
  </head>
  <body>
 <h1>My Pokedex</h1>
 <p>There are 151 pokemons from the database.</p>
    <table>
      <thead>
        <tr>
          <th>Sprite</th>
          <th>ID</th>
          <th>Name</th>
          <th>Height</th>
          <th>Weight</th>
          <th>Base exp</th>
        </tr>
      </thead>
      <tbody>
      <tbody>
          <?php foreach ($pokedex as $key){
            $sprites = "sprites/". $key['identifier'].".png";
            if ($key['base_experience'] > 200){ ?>
              <tr class="super">
                <th><img class="img" src="<?php echo $sprites ?>"></a></th>
                <th><?php echo $key['id']?></th>
                <th><?php echo $key['identifier']?></th>
                <th><?php echo $key['height']?></th>
                <th><?php echo $key['weight']?></th>
                <th><?php echo $key['base_experience']?></th>
              </tr> <?php }else{ ?>
          <tr>
            <th><img class="img" src="<?php echo $sprites ?>"></a></th>
            <th><?php echo $key['id']?></th>
            <th><?php echo $key['identifier']?></th>
            <th><?php echo $key['height']?></th>
            <th><?php echo $key['weight']?></th>
            <th><?php echo $key['base_experience']?></th>
        </tr>
        <?php }?>
      <?php }?>

      </tbody>
    </table>
  </body>
</html>
