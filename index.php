<?php

?>
<head>
  <title>Il Belli</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form action="./app.php" method="post">
<label for="pwd">Cittá:</label>
<select name="citta" class="form-control" id="sel1">
	<option value="bergamo">Bergamo</option>
  <option value="brescia">Brescia</option>
  <option value="mantova">Mantova</option>
  <option value="milano">Milano</option>
 </select>
 <label for="pwd">Cosa cerchi?:</label>
 <select name="cosa" class="form-control" id="sel1">
	<option value="pizza">Pizzeria</option>
  <option value="coffe">Caffé</option>
  <option value="parrucchiere">Parrucchiere</option>
  <option value="pub">Pub</option>
 </select>
 <label for="pwd">Quanti risultati?</label>
 <input name="max" type="number" step="1" min="1" max="10" value=1 class="form-control">
  <input type="submit" value="Vai" class="btn">
</form>