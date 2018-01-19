 function cacherAlertDanger() {
     var x = document.getElementsByClassName("alert-danger");
     var i;

     for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
}

function selectItemType(){
  var x = document.getElementById("select_item_type").value;
  if (x == 1) //verbe
  {
    document.getElementById("label_type_verbe").style.display = "block";
    document.getElementById("label_type_nom").style.display = "none";
  }
  if (x == 2) //nom
  {
    document.getElementById("label_type_verbe").style.display = "none";
    document.getElementById("label_type_nom").style.display = "block";
  }
};


function toggle_div_ajout(button, id_ajout_select) {
  var div_ajout_select = document.getElementById(id_ajout_select);

  var div_theme = document.getElementById("form_theme");
  var div_item = document.getElementById("form_item");
  var div_type = document.getElementById("form_type");


  if (Object.is(div_ajout_select,div_theme)) {
    div_type.style.display = "none";
    div_item.style.display = "none";
  }

  if (Object.is(div_ajout_select,div_item)) {
    div_type.style.display = "none";
    div_theme.style.display = "none";
  }

  if (Object.is(div_ajout_select,div_type)) {
    div_theme.style.display = "none";
    div_item.style.display = "none";
  }


  if (div_ajout_select.style.display == "none"){
    div_ajout_select.style.display = "block";
  }
  else {
    div_ajout_select.style.display = "none";
  }
};


function toggle_div_visualisation(button, id_visu_select) {
  var div_visu_select = document.getElementById(id_visu_select);

  var div_grp_theme = document.getElementById("grp_theme");
  var div_grp_type = document.getElementById("grp_type");
  var div_table_a_z = document.getElementById("table_a_z");
  

  var div_class_tables_themes = document.getElementsByClassName("tables_theme");
  var i;
  for (i = 0; i < div_class_tables_themes.length; i++) {
      div_class_tables_themes[i].style.display = "none";
  }

  var div_class_tables_type = document.getElementsByClassName("tables_type");
  var i;
  for (i = 0; i < div_class_tables_type.length; i++) {
      div_class_tables_type[i].style.display = "none";
  }

  if (Object.is(div_visu_select,div_grp_theme)) {
    div_grp_type.style.display = "none";
    div_table_a_z.style.display = "none";
  }

  if (Object.is(div_visu_select,div_table_a_z)) {
    div_grp_type.style.display = "none";
    div_grp_theme.style.display = "none";
  }

  if (Object.is(div_visu_select,div_grp_type)) {
    div_grp_theme.style.display = "none";
    div_table_a_z.style.display = "none";
  }


  if (div_visu_select.style.display == "none"){
    div_visu_select.style.display = "block";
  }
  else {
    div_visu_select.style.display = "none";
  }
};

function toggle_div_extraction(button, id_extra_select) {
  var div_extra_select = document.getElementById(id_extra_select);

  var div_grp_extra_theme = document.getElementById("grp_extra_theme");
  var div_grp_extra_type = document.getElementById("grp_extra_type");
  var div_extra_table_a_z = document.getElementById("extra_table_a_z");

  var div_class_extra_tables_themes = document.getElementsByClassName("extra_tables_theme");
  var i;
  for (i = 0; i < div_class_extra_tables_themes.length; i++) {
      div_class_extra_tables_themes[i].style.display = "none";
  }

  var div_class_extra_tables_type = document.getElementsByClassName("extra_tables_type");
  var i;
  for (i = 0; i < div_class_extra_tables_type.length; i++) {
      div_class_extra_tables_type[i].style.display = "none";
  }


  if (Object.is(div_extra_select,div_grp_extra_theme)) {
    div_grp_extra_type.style.display = "none";
    div_extra_table_a_z.style.display = "none";
  }

  if (Object.is(div_extra_select,div_extra_table_a_z)) {
    div_grp_extra_type.style.display = "none";
    div_grp_extra_theme.style.display = "none";
  }

  if (Object.is(div_extra_select,div_grp_extra_type)) {
    div_grp_extra_theme.style.display = "none";
    div_extra_table_a_z.style.display = "none";
  }


  if (div_extra_select.style.display == "none"){
    div_extra_select.style.display = "block";
  }
  else {
    div_extra_select.style.display = "none";
  }
};


function toggle_div_tables_type(button, tables_type, table_type_select) {
  var div_class_tables = document.getElementsByClassName(tables_type);
  var div_type_select = document.getElementById(table_type_select);

var i;
for (i = 0; i < div_class_tables.length; i++) {
    div_class_tables[i].style.display = "none";
}
div_type_select.style.display = "block";

};


function toggle_div_tables_theme(button, tables_theme, table_theme_select) {
  var div_class_tables = document.getElementsByClassName(tables_theme);
  var div_theme_select = document.getElementById(table_theme_select);

var i;
for (i = 0; i < div_class_tables.length; i++) {
    div_class_tables[i].style.display = "none";
}
div_theme_select.style.display = "block";

};


function toggle_div_extra_tables_type(button, extra_tables_type, extra_table_type_select) {
  var div_class_extra_tables = document.getElementsByClassName(extra_tables_type);
  var div_extra_type_select = document.getElementById(extra_table_type_select);

var i;
for (i = 0; i < div_class_extra_tables.length; i++) {
    div_class_extra_tables[i].style.display = "none";
}
div_extra_type_select.style.display = "block";

};

function toggle_div_extra_tables_theme(button, extra_tables_theme, extra_table_theme_select) {
  var div_class_extra_tables = document.getElementsByClassName(extra_tables_theme);
  var div_extra_theme_select = document.getElementById(extra_table_theme_select);

var i;
for (i = 0; i < div_class_extra_tables.length; i++) {
    div_class_extra_tables[i].style.display = "none";
}
div_extra_theme_select.style.display = "block";

};