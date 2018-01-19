            <!--*****************************************************************************************************************************-->
            <!--                                                                                                                             -->
            <!--                                                          AJOUTER                                                            -->
            <!--                                                                                                                             -->
            <!--*****************************************************************************************************************************-->
<div id="block_ajouter">
            <h2><span class="glyphicon glyphicon-plus" aria-hidden="false"></span> Ajouter</h2>
            
            <div class="btn-group" role="group">
              <button type="button" onclick="toggle_div_ajout(this,'form_item');" class="btn btn-secondary">Mot ou Expression</button>
              <button type="button" onclick="toggle_div_ajout(this,'form_theme');" class="btn btn-secondary">Thème</button>
              <button type="button" onclick="toggle_div_ajout(this,'form_type');" class="btn btn-secondary">Type</button>
            </div>


            <!--*****************************************************************************************************************************-->
            <!--                                            AJOUTER FORMULAIRE THEME                                                         -->
            <!--*****************************************************************************************************************************-->

            <div id="form_theme" style="display:none;">
              <form action="#" method="POST">
                <div class="form-group">
                  <label for="theme">Thème</label>
                  <input type="text" class="form-control" id="nom_theme" name="theme" placeholder="Entrer un thème">
                </div>
                <button type="submit" class="btn valid_btn">Valider</button>
              </form>
            </div>
            

            <!--*****************************************************************************************************************************-->
            <!--                                            AJOUTER FORMULAIRE TYPE                                                          -->
            <!--*****************************************************************************************************************************-->

            <div id="form_type" style="display:none;">
              <form action="#" method="POST">
                <div class="form-group">
                  <label for="type">Type</label>
                  <input type="text" class="form-control" id="nom_theme" name="type" placeholder="Entrer un type">
                </div>
                <button type="submit" class="btn valid_btn">Valider</button>
              </form>
            </div>


            <!--*****************************************************************************************************************************-->
            <!--                                            AJOUTER FORMULAIRE ITEM                                                          -->
            <!--*****************************************************************************************************************************-->

              <div id="form_item" style="display:none;">
              <form action="#" method="POST">
                <div class="form-group">
                  <label for="francais">Mot ou Expression</label>
                  <select class="form-control form-control" id="select_item_type" name="type_item" onchange="selectItemType();">
                    <option value="0">Type</option>
                    <?php  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}types"); foreach($results as $ligne){ ?> <option value="<?php echo $ligne->id_types; ?>"> <?php echo $ligne->type; ?></option> <?php } ?>
                  </select>
                </div>


                <div class="form-group">
                  <input type="text" class="form-control" id="francais" name="francais_item" placeholder="Entrer mot ou expression en Français">
                </div>
                

                <div class="form-group row">
                  <label for="anglais" id="label_type_nom" class="col-xs-1 col-sm-1 col-lg-1 col-form-label" style="display: none;">The</label>
                  <label for="anglais" id="label_type_verbe" class="col-xs-1 col-sm-1 col-lg-1 col-form-label" style="display: none;">To</label>
                  <div class="col-xs col-sm col-lg">
                      <input type="text" class="form-control" id="anglais" name="anglais_item" placeholder="Traduction en Anglais">
                  </div>
                </div>


                <div class="form-group">
                  <select class="form-control" name="theme_item">
                    <option value="0">Theme</option>
                    <?php  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}themes"); foreach($results as $ligne){ ?> <option value="<?php echo $ligne->id_themes; ?>"> <?php echo $ligne->theme; ?></option> <?php } ?>
                  </select>
                </div>

                <button type="submit" class="btn valid_btn">Valider</button>
              </form>
            </div> <!-- Fin Form Item -->
          </div> <!-- Fin block Ajout -->