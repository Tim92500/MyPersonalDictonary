<?php mesmerize_get_header(); ?><?php/* Traitement formulaire Themes */if(isset($_POST['theme'])) {    $theme = $_POST['theme'];    $sql = "INSERT INTO `mpd_themes`              (`theme`)        values ('$theme')";    $wpdb->query($sql);        echo '<div class="alert alert-success" role="alert">        <h4 class="alert-heading">Well done!</h4>        <p>Votre thème '.$theme.' a bien été enregistré.</p>      </div>';}/* Traitement formulaire Types */if(isset($_POST['type'])) {    $type = $_POST['type'];    $sql = "INSERT INTO `mpd_types`              (`type`)        values ('$type')";    $wpdb->query($sql);        echo '<div class="alert alert-success" role="alert">        <h4 class="alert-heading">Well done!</h4>        <p>Votre type '.$type.' a bien été enregistré.</p>      </div>';}/* Traitement formulaire Items */if(isset($_POST['francais_item'])) {    if (empty($_POST['francais_item'])) {      echo '<div class="alert alert-danger" role="alert">          <h4 class="alert-heading">Insertion mot ou expression!</h4>          <p>Le champs Français est vide.</p>        </div>';    }elseif (empty($_POST['anglais_item'])) {      echo '<div class="alert alert-danger" role="alert">          <h4 class="alert-heading">Insertion mot ou expression!</h4>          <p>Le champs Anglais est vide.</p>        </div>';    }else{      $francais_item = $_POST['francais_item'];      $anglais_item = $_POST['anglais_item'];      $type_item = $_POST['type_item'];      $theme_item = $_POST['theme_item'];      $sql = "INSERT INTO `mpd_items`                (`french`, `english`, `id_types`, `id_themes`)          values ('$francais_item', '$anglais_item' ,$type_item, $theme_item)";      $wpdb->query($sql);          if ($type_item == "1")$anglais_item = "To ".strtolower($anglais_item); //verbe      if ($type_item == "2")$anglais_item = "The ".strtolower($anglais_item); //nom      echo '<div class="alert alert-success" role="alert">          <h4 class="alert-heading">Well done!</h4>          <p>Le mot ou l\'expression '.$francais_item.' - '.$anglais_item.' a bien été enregistré.</p>        </div>';    }}?>    <div class="content blog-page">        <div class="gridContainer content">          <div id="block_saisie">            <h2>Ajouter</h2>                        <div class="btn-group" role="group">              <button type="button" onclick="toggle_div_item(this,'form_item', 'form_theme', 'form_type');" class="btn btn-secondary">Mot ou Expression</button>              <button type="button" onclick="toggle_div_theme(this,'form_theme', 'form_item', 'form_type');" class="btn btn-secondary">Thème</button>              <button type="button" onclick="toggle_div_type(this,'form_item', 'form_theme', 'form_type');" class="btn btn-secondary">Type</button>            </div>            <div id="form_theme" style="display:none;">              <form action="#" method="POST">                <div class="form-group">                  <label for="theme">Thème</label>                  <input type="text" class="form-control" id="nom_theme" name="theme" placeholder="Entrer un thème">                </div>                <button type="submit" class="btn btn-secondary">Valider</button>              </form>            </div>            <div id="form_type" style="display:none;">              <form action="#" method="POST">                <div class="form-group">                  <label for="type">Type</label>                  <input type="text" class="form-control" id="nom_theme" name="type" placeholder="Entrer un type">                </div>                <button type="submit" class="btn btn-secondary">Valider</button>              </form>            </div>              <div id="form_item" style="display:none;">              <form action="#" method="POST">                <div class="form-group">                  <label for="francais">Mot ou Expression</label>                  <select class="form-control form-control" id="select_item_type" name="type_item" onchange="selectItemType();">                    <option value="0">Type</option>                    <?php  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types"); foreach($results as $ligne){ ?> <option value="<?php echo $ligne->id_types; ?>"> <?php echo $ligne->type; ?></option> <?php } ?>                  </select>                </div>                <div class="form-group">                  <input type="text" class="form-control" id="francais" name="francais_item" placeholder="Entrer mot ou expression Français">                </div>                                <div class="form-group row">                  <label for="anglais" id="label_type_nom" class="col-xs-1 col-sm-1 col-lg-1 col-form-label" style="display: none;">The</label>                  <label for="anglais" id="label_type_verbe" class="col-xs-1 col-sm-1 col-lg-1 col-form-label" style="display: none;">To</label>                  <div class="col-xs col-sm col-lg">                      <input type="text" class="form-control" id="anglais" name="anglais_item" placeholder="Traduction en Anglais">                  </div>                </div>                <div class="form-group">                  <select class="form-control" name="theme_item">                    <option value="0">Theme</option>                    <?php  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes"); foreach($results as $ligne){ ?> <option value="<?php echo $ligne->id_themes; ?>"> <?php echo $ligne->theme; ?></option> <?php } ?>                  </select>                </div>                <button type="submit" class="btn btn-secondary">Valider</button>              </form>            </div>          </div>          <div id="block_visualisation">            <h2>Visualiser</h2>                        <div class="btn-group" role="group">              <button type="button" onclick="toggle_div_grp_theme(this,'grp_theme','grp_type','table_a_z','table_type','table_theme');"  class="btn btn-secondary"> Thèmes</button>              <button type="button" onclick="toggle_div_table_a_z(this,'grp_theme','grp_type','table_a_z','table_type','table_theme');" class="btn btn-secondary">A-Z</button>              <button type="button" onclick="toggle_div_grp_type(this,'grp_theme','grp_type','table_a_z','table_type','table_theme');" class="btn btn-secondary">Types</button>              <!--<button type="button" class="btn btn-secondary">Dates d'ajouts</button>-->            </div>            <div id="grp_theme" class="btn-group-info" role="group" <?php if (!isset($_POST["btn_theme"])) {echo 'style="display:none;"';}else{echo 'style="display:block;"';}?> >              <form action="#" method="POST">              <?php                  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes");                 foreach($results as $ligne){ ?>                 <button type="submit" class="btn btn-info" name="btn_theme" value="<?php echo $ligne->id_themes; ?>">                   <?php echo $ligne->theme; ?></button> <?php }               ?>              </form>            </div>            <div id="grp_type" class="btn-group" role="group" <?php if (!isset($_POST["btn_type"])) {echo 'style="display:none;"';}else{echo 'style="display:block;"';}?> >              <form action="#" method="POST">              <?php                  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types");                 foreach($results as $ligne){ ?>                 <button type="submit" class="btn btn-info" name="btn_type" id="btn_type_<?php echo $ligne->id_types;?>" value="<?php echo $ligne->id_types; ?>">                  <?php echo $ligne->type;?></button> <?php }               ?>              </form>            </div>            <!-- ****** Table A-Z ****** -->            <div id="table_a_z" class="btn-group" role="group" style="display:none;">              <div class="table-responsive">                <label>A-Z</label>                <table class="table table-striped">                  <tr>                    <th>Anglais</th>                    <th>Français</th>                    <th>Type</th>                    <th>Thème</th>                  </tr>                    <?php                       $results_items = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}items");                       foreach($results_items as $ligne_items){                        $english = $ligne_items->english;                        if ($ligne_items->id_types == "1")$english = "To ".strtolower($ligne_items->english); //verbe                        if ($ligne_items->id_types == "2")$english = "The ".strtolower($ligne_items->english); //nom                        echo "<tr>";                        echo '<td>'.$english.'</td>';                        echo '<td>'.$ligne_items->french.'</td>';                        $results_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types WHERE id_types = $ligne_items->id_types");                        foreach($results_types as $ligne_types){echo '<td>'.$ligne_types->type.'</td>';}                        $results_themes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes WHERE id_themes = $ligne_items->id_themes");                        foreach($results_themes as $ligne_themes){echo '<td>'.$ligne_themes->theme.'</td>';}                                                echo "</tr>";                      }                    ?>                </table>              </div>            </div>            <!-- ****** Table Type ****** -->            <div id="table_type" class="btn-group" role="group" <?php if (!isset($_POST["btn_type"])) {echo 'style="display:none;"';}else{echo 'style="display:block;"';}?> >              <div class="table-responsive">                <?php                    if (isset($_POST["btn_type"])) {                      $id_types = $_POST["btn_type"];                                            $results_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types WHERE id_types = $id_types");                      foreach($results_types as $ligne_types){$type = $ligne_types->type;}                      echo '<label>Type : '.$type.'</label>';                      $results_items = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}items WHERE id_types = $id_types");                       if (count($results_items)> 0){ //Si results_items n'est pas vide                          echo '<table class="table table-striped">                                  <tr>                                    <th>Anglais</th>                                    <th>Français</th>                                    <th>Type</th>                                    <th>Thème</th>                                  </tr>';                                                                                  foreach($results_items as $ligne_items){                              $english = $ligne_items->english;                              if ($ligne_items->id_types == "1")$english = "To ".strtolower($ligne_items->english); //verbe                              if ($ligne_items->id_types == "2")$english = "The ".strtolower($ligne_items->english); //nom                              echo "<tr>";                              echo '<td>'.$english.'</td>';                              echo '<td>'.$ligne_items->french.'</td>';                              $results_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types WHERE id_types = $ligne_items->id_types");                              foreach($results_types as $ligne_types){echo '<td>'.$ligne_types->type.'</td>';}                              $results_themes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes WHERE id_themes = $ligne_items->id_themes");                              foreach($results_themes as $ligne_themes){echo '<td>'.$ligne_themes->theme.'</td>';}                                                            echo "</tr>";                            }                          echo '</table>';                        }                        else{ //Si results_items est vide                          echo '<div class="alert alert-warning" role="alert">                                <p>Il y a aucun élément pour le type : '.$type.'.</p>                              </div>';                        }                      }                ?>              </div>            </div>            <!-- ****** Table Theme ****** -->            <div id="table_theme" class="btn-group" role="group" <?php if (!isset($_POST["btn_theme"])) {echo 'style="display:none;"';}else{echo 'style="display:block;"';}?> >              <div class="table-responsive">                <?php                    if (isset($_POST["btn_theme"])) {                      $id_themes = $_POST["btn_theme"];                                            $results_themes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes WHERE id_themes = $id_themes");                      foreach($results_themes as $ligne_themes){$theme = $ligne_themes->theme;}                      echo '<label>Thème : '.$theme.'</label>';                      $results_items = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}items WHERE id_themes = $id_themes");                       if (count($results_items)> 0){ //Si results_items n'est pas vide                          echo '<table class="table table-striped">                                  <tr>                                    <th>Anglais</th>                                    <th>Français</th>                                    <th>Type</th>                                    <th>Thème</th>                                  </tr>';                                                      foreach($results_items as $ligne_items){                              $english = $ligne_items->english;                              if ($ligne_items->id_types == "1")$english = "To ".strtolower($ligne_items->english); //verbe                              if ($ligne_items->id_types == "2")$english = "The ".strtolower($ligne_items->english); //nom                              echo "<tr>";                              echo '<td>'.$english.'</td>';                              echo '<td>'.$ligne_items->french.'</td>';                              $results_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types WHERE id_types = $ligne_items->id_types");                              foreach($results_types as $ligne_types){echo '<td>'.$ligne_types->type.'</td>';}                              $results_themes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes WHERE id_themes = $ligne_items->id_themes");                              foreach($results_themes as $ligne_themes){echo '<td>'.$ligne_themes->theme.'</td>';}                                                            echo "</tr>";                            }                        echo '</table>';                      }                      else{   //Si results_items est vide                          echo '<div class="alert alert-warning" role="alert">                                <p>Il y a aucun élément pour le thème : '.$theme.'.</p>                              </div>';                      }                    }                ?>              </div>            </div>          </div>                  </div>    </div><!-- Le JS --><script type="text/javascript">function selectItemType(){  var x = document.getElementById("select_item_type").value;  if (x == 1) //verbe  {    document.getElementById("label_type_verbe").style.display = "block";    document.getElementById("label_type_nom").style.display = "none";  }  if (x == 2) //nom  {    document.getElementById("label_type_verbe").style.display = "none";    document.getElementById("label_type_nom").style.display = "block";  }};function toggle_div_theme(button, id_theme, id_item, id_type) {  var div_theme = document.getElementById(id_theme);  var div_item = document.getElementById(id_item);  var div_type = document.getElementById(id_type);  if(div_theme.style.display=="none") {    div_theme.style.display = "block";    div_item.style.display = "none";    div_type.style.display = "none";  } else {    div_theme.style.display = "none";  }};function toggle_div_item(button, id_item, id_theme, id_type) {  var div_theme = document.getElementById(id_theme);  var div_item = document.getElementById(id_item);  var div_type = document.getElementById(id_type);  if(div_item.style.display=="none") {    div_item.style.display = "block";    div_theme.style.display = "none";    div_type.style.display = "none";  } else {    div_item.style.display = "none";  }};function toggle_div_type(button, id_item, id_theme, id_type) {  var div_theme = document.getElementById(id_theme);  var div_item = document.getElementById(id_item);  var div_type = document.getElementById(id_type);  if(div_type.style.display=="none") {    div_type.style.display = "block";    div_theme.style.display = "none";    div_item.style.display = "none";  } else {    div_type.style.display = "none";  }};function toggle_div_grp_theme(button, id_grp_theme, id_grp_type, id_table_a_z, id_table_type, id_table_theme) {  var div_grp_theme = document.getElementById(id_grp_theme);  var div_grp_type = document.getElementById(id_grp_type);  var div_table_a_z = document.getElementById(id_table_a_z);  var div_table_type = document.getElementById(id_table_type);  var div_table_theme = document.getElementById(id_table_theme);  if(div_grp_theme.style.display=="none") {    div_grp_theme.style.display = "block";    div_grp_type.style.display = "none";    div_table_a_z.style.display = "none";    div_table_type.style.display = "none";    div_table_theme.style.display = "none";  } else {    div_grp_theme.style.display = "none";  }};function toggle_div_grp_type(button, id_grp_theme, id_grp_type, id_table_a_z, id_table_type, id_table_theme) {  var div_grp_theme = document.getElementById(id_grp_theme);  var div_grp_type = document.getElementById(id_grp_type);  var div_table_a_z = document.getElementById(id_table_a_z);  var div_table_type = document.getElementById(id_table_type);  var div_table_theme = document.getElementById(id_table_theme);  if(div_grp_type.style.display=="none") {    div_grp_type.style.display = "block";    div_grp_theme.style.display = "none";    div_table_a_z.style.display = "none";    div_table_type.style.display = "none";    div_table_theme.style.display = "none";  } else {    div_grp_type.style.display = "none";  }};function toggle_div_table_a_z(button, id_grp_theme, id_grp_type, id_table_a_z, id_table_type, id_table_theme) {  var div_grp_theme = document.getElementById(id_grp_theme);  var div_grp_type = document.getElementById(id_grp_type);  var div_table_a_z = document.getElementById(id_table_a_z);  var div_table_type = document.getElementById(id_table_type);  var div_table_theme = document.getElementById(id_table_theme);  if(div_table_a_z.style.display=="none") {    div_table_a_z.style.display = "block";    div_grp_type.style.display = "none";    div_grp_theme.style.display = "none";    div_table_type.style.display = "none";    div_table_theme.style.display = "none";  } else {    div_table_a_z.style.display = "none";  }};function toggle_div_table_type(button, id_grp_theme, id_grp_type, id_table_a_z, id_table_type, id_table_theme) {  var div_grp_theme = document.getElementById(id_grp_theme);  var div_grp_type = document.getElementById(id_grp_type);  var div_table_a_z = document.getElementById(id_table_a_z);  var div_table_type = document.getElementById(id_table_type);  var div_table_theme = document.getElementById(id_table_theme);  if(div_table_type.style.display=="none") {    div_grp_type.style.display = "block";    div_table_type.style.display = "block";    div_table_a_z.style.display = "none";    div_grp_theme.style.display = "none";    div_table_theme.style.display = "none";  } else {    div_table_type.style.display = "none";  }};function toggle_div_table_theme(button, id_grp_theme, id_grp_type, id_table_a_z, id_table_type, id_table_theme) {  var div_grp_theme = document.getElementById(id_grp_theme);  var div_grp_type = document.getElementById(id_grp_type);  var div_table_a_z = document.getElementById(id_table_a_z);  var div_table_type = document.getElementById(id_table_type);  var div_table_theme = document.getElementById(id_table_theme);  if(div_table_theme.style.display=="none") {    div_table_theme.style.display = "block";    div_grp_type.style.display = "none";    div_table_type.style.display = "none";    div_table_a_z.style.display = "none";    div_grp_theme.style.display = "block";  } else {    div_table_theme.style.display = "none";  }};</script>    <?php get_footer();//*[@id="mainmenu_container"]