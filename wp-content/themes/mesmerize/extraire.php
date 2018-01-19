  <!--*****************************************************************************************************************************-->
            <!--                                                                                                                             -->
            <!--                                                      EXTRACTION                                                             -->
            <!--                                                                                                                             -->
            <!--*****************************************************************************************************************************-->



          <div id="block_extraction">
            <h2><span class="glyphicon glyphicon-download" aria-hidden="false"></span> Extraire</h2>
            
            <div class="btn-group" role="group">
              <button type="button" onclick="toggle_div_extraction(this, 'grp_extra_theme');"  class="btn btn-secondary"> Thèmes</button>
              <button type="button" onclick="toggle_div_extraction(this, 'extra_table_a_z');" class="btn btn-secondary">A-Z</button>
              <button type="button" onclick="toggle_div_extraction(this, 'grp_extra_type');" class="btn btn-secondary">Types</button>
              <!--<button type="button" class="btn btn-secondary">Dates d'ajouts</button>-->
            </div>



            <!--*****************************************************************************************************************************-->
            <!--                                            GROUPE EXTRACTION THEMES                                                         -->
            <!--*****************************************************************************************************************************-->


            <div id="grp_extra_theme" class="btn-group" role="group" style="display:none;" >
              <?php  
                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes"); 
                if (count($results)> 0){ //Si results n'est pas vide Tester si le theme "sans theme" est vide où non avant dafficher le message warning
                    foreach($results as $ligne){ ?> 
                    <button theme="button" class="btn sous_btn" id="extra_btn_theme_<?php echo $ligne->id_themes;?>" onclick="toggle_div_extra_tables_theme(this,'extra_tables_theme','extra_table_theme_<?php echo $ligne->id_themes;?>');">
                      <span class="glyphicon glyphicon-download" aria-hidden="false"></span> <?php echo $ligne->theme;?></button> <?php 
                    } // Fin du Foreach
                } //Fin du IF
                else{
                  echo '<div class="alert alert-warning" role="alert">
                        <p>Vous n\'avez saisi aucun thème.</p>
                        </div>';
                } //fin du Else
                
            echo '</div>'; // Fin Grp_extra_theme
                  
                  foreach($results as $ligne){
                    echo '<div class="extra_tables_theme" id="extra_table_theme_'.$ligne->id_themes.'" class="btn-group" role="group" style="display:none;">';
                      echo '<div class="alert alert-info" role="alert">
                            <p>Extraction theme '.$ligne->theme.' selectionné.</p>
                            </div>';
                    echo '</div>'; // Fin du div extra_tables_theme
                  }
                ?>

            <!--*****************************************************************************************************************************-->
            <!--                                            GROUPE EXTRACTION TYPES                                                          -->
            <!--*****************************************************************************************************************************-->


            <div id="grp_extra_type" class="btn-group" role="group" style="display:none;" >
              <?php  
                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types"); 
                if (count($results)> 0){ //Si results n'est pas vide Tester si le theme "sans theme" est vide où non avant dafficher le message warning
                    foreach($results as $ligne){ ?> 
                    <button theme="button" class="btn sous_btn" id="extra_btn_types_<?php echo $ligne->id_types;?>" onclick="toggle_div_extra_tables_type(this,'extra_tables_type','extra_table_type_<?php echo $ligne->id_types;?>');">
                      <span class="glyphicon glyphicon-download" aria-hidden="false"></span> <?php echo $ligne->type;?></button> <?php 
                    } // Fin du Foreach
                } //Fin du IF
                else{
                      echo '<div class="alert alert-warning" role="alert">
                        <p>Vous n\'avez saisi aucun type.</p>
                        </div>';
                } //fin du Else
                
                  echo '</div>'; // Fin Grp_extra_types

                  foreach($results as $ligne){
                    echo '<div class="extra_tables_type" id="extra_table_type_'.$ligne->id_types.'" class="btn-group" role="group" style="display:none;">';
                      echo '<div class="alert alert-info" role="alert">
                            <p>Extraction type '.$ligne->type.' selectionné.</p>
                            </div>';
                    echo '</div>'; // Fin du div extra_tables_types
                  }
                ?>

            
            <!--*****************************************************************************************************************************-->
            <!--                                            GROUPE EXTRACTION A-Z                                                          -->
            <!--*****************************************************************************************************************************-->


            <div id="extra_table_a_z" class="btn-group" role="group" style="display:none;" >
              <?php 
                      $results_items = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}items"); 
                      if (count($results_items)> 0){ //Si results_items n'est pas vide
                           
                          $chemin = 'wp-content/themes/mesmerize/fichier.csv';
                          $delimiteur = ';';
                          $fichier_csv = fopen($chemin, 'w+');
                          //fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));


                          foreach($results_items as $ligne_items){
                            
                            $english = $ligne_items->english;
                            $french = $ligne_items->french;

                            $results_types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types WHERE id_types = $ligne_items->id_types");
                            foreach($results_types as $ligne_types){
                              $type = $ligne_types->type;
                            }
                            $results_themes = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes WHERE id_themes = $ligne_items->id_themes");
                            foreach($results_themes as $ligne_themes){
                              $theme = $ligne_themes->theme;
                            }
                            $ligne_csv[] = array($french,$english, $type, $theme);
                          } //Fin du foreach

                          foreach($ligne_csv as $ligne){
                            fputcsv($fichier_csv, $ligne, $delimiteur);
                          }
                          fclose($fichier_csv);


                        } //Fin du If
                        else{
                          echo '<div class="alert alert-warning" role="alert">
                                <p>Vous n\'avez saisi aucun mot ou expression.</p>
                                </div>';
                        } // Fin du Else
                    ?>


            </div> <!-- Fin div extra table a-z-->



          </div>  <!-- Fin block extraction-->