<!DOCTYPE html>
<html>
<!--Import the link to work with Material Design Lite-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
<head>
	<title></title>
</head>
<body>
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--2-col"></div>
  <div  style="text-align: center" class="mdl-cell mdl-cell--8-col">
  <!-- Textfield with Floating Label -->

<form action="/" method="post">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="nombre" id="nombre">
    <label class="mdl-textfield__label" for="sample3">Enter ID64 from user.</label>
  </div>
  <div>
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
  Search
	</button>
</div>
</form>
	</div>
  <div class="mdl-cell mdl-cell--2-col"></div>
  <?php if ($_POST) include "templates/list.php";?>
</div>
</body>
</html>