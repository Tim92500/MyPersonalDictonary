<?php
/* Traitement formulaire Themes */
if(isset($_POST['theme'])) {
    $theme = $_POST['theme'];

    $sql = "INSERT INTO `mpd_themes`
              (`theme`) 
       values ('$theme')";

    $wpdb->query($sql);
    
    echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Votre thème '.$theme.' a bien été enregistré.</p>
      </div>';
}

/* Traitement formulaire Types */
if(isset($_POST['type'])) {
    $type = $_POST['type'];

    $sql = "INSERT INTO `mpd_types`
              (`type`) 
       values ('$type')";

    $wpdb->query($sql);
    
    echo '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Votre type '.$type.' a bien été enregistré.</p>
      </div>';
}


/* Traitement formulaire Items */
if(isset($_POST['francais_item'])) {
    if (empty($_POST['francais_item'])) {
      echo '<div class="alert alert-danger" role="alert">
          <h4 class="alert-heading"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Insertion mot ou expression!</h4>
          <p>Le champs Français est vide.</p>
        </div>';
    }elseif (empty($_POST['anglais_item'])) {
      echo '<div class="alert alert-danger" role="alert">
          <h4 class="alert-heading"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Insertion mot ou expression!</h4>
          <p>Le champs Anglais est vide.</p>
        </div>';
    }else{

      $francais_item = $_POST['francais_item'];
      $anglais_item = $_POST['anglais_item'];
      $type_item = $_POST['type_item'];
      $theme_item = $_POST['theme_item'];

      $sql = "INSERT INTO `mpd_items`
                (`french`, `english`, `id_types`, `id_themes`) 
         values ('$francais_item', '$anglais_item' ,$type_item, $theme_item)";

      $wpdb->query($sql);

    
      if ($type_item == "5")$anglais_item = "To ".strtolower($anglais_item); //verbe
      if ($type_item == "2")$anglais_item = "(The) ".strtolower($anglais_item); //nom

      echo '<div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Well done!</h4>
          <p>Le mot ou l\'expression '.$francais_item.' - '.$anglais_item.' a bien été enregistré.</p>
        </div>';
    }
}
?>