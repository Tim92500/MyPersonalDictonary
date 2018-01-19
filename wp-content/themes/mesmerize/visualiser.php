            <!--*****************************************************************************************************************************-->
            <!--                                                                                                                             -->
            <!--                                                      VIUSALISATION                                                          -->
            <!--                                                                                                                             -->
            <!--*****************************************************************************************************************************-->



          <div id="block_visualisation">
            <h2><span class="glyphicon glyphicon-eye-open" aria-hidden="false"></span> Visualiser</h2>
            
            <div class="btn-group" role="group">
              <button type="button" onclick="toggle_div_visualisation(this, 'grp_theme');"  class="btn btn-secondary"> Thèmes</button>
              <button type="button" onclick="toggle_div_visualisation(this, 'table_a_z');" class="btn btn-secondary">A-Z</button>
              <button type="button" onclick="toggle_div_visualisation(this, 'grp_type');" class="btn btn-secondary">Types</button>
              <!--<button type="button" class="btn btn-secondary">Dates d'ajouts</button>-->
            </div>


            <!--*****************************************************************************************************************************-->
            <!--                                            GROUPE VIUSALISATION THEMES                                                      -->
            <!--*****************************************************************************************************************************-->


            <div id="grp_theme" class="btn-group" role="group" style="display:none;" >
              <?php  
                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes"); 
                if (count($results)> 0){ //Si results n'est pas vide Tester si le theme "sans theme" est vide où non avant dafficher le message warning
                    foreach($results as $ligne){ ?> 
                    <button theme="button" class="btn sous_btn" onclick="toggle_div_tables_theme(this,'tables_theme','table_theme_<?php echo $ligne->id_themes;?>');" id="btn_theme_<?php echo $ligne->id_themes;?>">
                      <?php echo $ligne->theme;?></button> <?php 
                    } // Fin du Foreach
                } //Fin du IF
                else{
                  echo '<div class="alert alert-warning" role="alert">
                        <p>Vous n\'avez saisi aucun thème.</p>
                        </div>';
                } //fin du Else
                
            echo '</div>'; // Fin Grp_theme
                  foreach($results as $ligne){
                  echo '<div class="tables_theme" id="table_theme_'.$ligne->id_themes.'" class="btn-group" role="group" style="display:none;">';
                  echo '<div class="table-responsive">';

                      $results_themes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes WHERE id_themes = $ligne->id_themes");
                      foreach($results_themes as $ligne_themes){$theme = $ligne_themes->theme;}

                      $results_items = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}items WHERE id_themes = $ligne->id_themes ORDER BY english ASC"); 
                      if (count($results_items)> 0){ //Si results_items n'est pas vide
                          echo '<label>Thème : '.$theme.' '.count($results_items).' mots.</label>';
                          echo '<table class="table table-striped">
                                  <tr>
                                    <th>Anglais</th>
                                    <th>Français</th>
                                    <th>Type</th>
                                  </tr>';
                          
                            
                            foreach($results_items as $ligne_items){
                              $english = $ligne_items->english;
                              if ($ligne_items->id_themes == "1")$english = "To ".strtolower($ligne_items->english); //verbe
                              if ($ligne_items->id_themes == "2")$english = "(The) ".strtolower($ligne_items->english); //nom

                              echo "<tr>";
                              echo '<td>'.$english.'</td>';
                              echo '<td>'.$ligne_items->french.'</td>';

                              $results_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types WHERE id_types = $ligne_items->id_types");
                              foreach($results_types as $ligne_types){echo '<td>'.$ligne_types->type.'</td>';}
                              
                              echo "</tr>";
                            }
                          echo '</table>';
                        }
                        else{ //Si results_items est vide
                          echo '<div class="alert alert-warning" role="alert">
                                <p>Il y a aucun élément pour le thème : '.$theme.'.</p>
                              </div>';
                        }
                      
                  echo '</div>'; // Fin de table-responsive
                echo '</div>';  // Fin de tables_theme

                }  //fin de la boucle création des boutons des differents themes + des tableaux
                ?>

            <!--*****************************************************************************************************************************-->
            <!--                                            GROUPE VIUSALISATION TYPES                                                       -->
            <!--*****************************************************************************************************************************-->


            <div id="grp_type" class="btn-group" role="group" style="display:none;" >
              <?php  
                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types"); 
                if (count($results)> 1){ //Si results n'est pas vide.   Tester si le type "sans type" est vide où non avant dafficher le message warning
                    foreach($results as $ligne){ ?> 
                        <button type="button" class="btn sous_btn" onclick="toggle_div_tables_type(this,'tables_type','table_type_<?php echo $ligne->id_types;?>');" id="btn_type_<?php echo $ligne->id_types;?>">
                          <?php echo $ligne->type;?></button> <?php 
                    } // Fin du foreach
                  } //Fin de IF
                  else{
                    echo '<div class="alert alert-warning" role="alert">
                          <p>Vous n\'avez saisi aucun type.</p>
                          </div>';
                  } // Fin du Else
            echo '</div>'; // Fin Grp_type

                  foreach($results as $ligne){
                  echo '<div class="tables_type" id="table_type_'.$ligne->id_types.'" class="btn-group" role="group" style="display:none;">';
                  echo '<div class="table-responsive">';

                      $results_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types WHERE id_types = $ligne->id_types");
                      foreach($results_types as $ligne_types){$type = $ligne_types->type;}

                      $results_items = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}items WHERE id_types = $ligne->id_types ORDER BY english ASC"); 
                      if (count($results_items)> 0){ //Si results_items n'est pas vide
                          echo '<label>Type : '.$type.' '.count($results_items).' mots.</label>';
                          echo '<table class="table table-striped">
                                  <tr>
                                    <th>Anglais</th>
                                    <th>Français</th>
                                    <th>Thème</th>
                                  </tr>';
                          
                            
                            foreach($results_items as $ligne_items){
                              $english = $ligne_items->english;
                              if ($ligne_items->id_types == "5")$english = "To ".strtolower($ligne_items->english); //verbe
                              if ($ligne_items->id_types == "2")$english = "(The) ".strtolower($ligne_items->english); //nom

                              echo "<tr>";
                              echo '<td>'.$english.'</td>';
                              echo '<td>'.$ligne_items->french.'</td>';

                              $results_themes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes WHERE id_themes = $ligne_items->id_themes");
                              foreach($results_themes as $ligne_themes){echo '<td>'.$ligne_themes->theme.'</td>';}
                              
                              echo "</tr>";
                            }
                          echo '</table>';
                        }
                        else{ //Si results_items est vide
                          echo '<div class="alert alert-warning" role="alert">
                                <p>Il y a aucun élément pour le type : '.$type.'.</p>
                              </div>';
                        }
                      
                  echo '</div>'; // Fin de table-responsive
                echo '</div>';  // Fin de tables_type

                }  //fin de la boucle création des boutons des differents types + des tableaux
                ?>
            
            <!--*****************************************************************************************************************************-->
            <!--                                            GROUPE VIUSALISATION A-Z                                                         -->
            <!--*****************************************************************************************************************************-->


            <div id="table_a_z" class="btn-group" role="group" style="display:none;">
              <div class="table-responsive">
                    <?php 
                      $results_items = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}items ORDER BY english ASC"); 
                      if (count($results_items)> 0){ //Si results_items n'est pas vide

                          echo '<label>A-Z '.count($results_items).' mots</label>
                          <table class="table table-striped">
                          <tr>
                          <th>Anglais</th>
                          <th>Français</th>
                          <th>Type</th>
                          <th>Thème</th>
                          </tr>';

                          foreach($results_items as $ligne_items){
                            $english = $ligne_items->english;
                            if ($ligne_items->id_types == "5")$english = "To ".strtolower($ligne_items->english); //verbe
                            if ($ligne_items->id_types == "2")$english = "(The) ".strtolower($ligne_items->english); //nom

                            echo "<tr>";
                            echo '<td>'.$english.'</td>';
                            echo '<td>'.$ligne_items->french.'</td>';

                            $results_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types WHERE id_types = $ligne_items->id_types");
                            foreach($results_types as $ligne_types){echo '<td>'.$ligne_types->type.'</td>';}
                            $results_themes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes WHERE id_themes = $ligne_items->id_themes");
                            foreach($results_themes as $ligne_themes){echo '<td>'.$ligne_themes->theme.'</td>';}
                            
                            echo "</tr>";
                          } //Fin du foreach
                          echo "</table>";
                        } //Fin du If
                        else{
                          echo '<div class="alert alert-warning" role="alert">
                                <p>Vous n\'avez saisi aucun mot ou expression.</p>
                                </div>';
                        } // Fin du Else
                    ?>
              </div> <!-- Fin de table-responsive-->
            </div> <!-- Fin de table_a_z-->
          </div>  <!-- Fin block visualisation-->