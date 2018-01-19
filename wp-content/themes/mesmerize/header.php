<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <style type="text/css">
        
        #mainmenu_container{
            display: none !important;
        }

        .alert{
            margin-bottom: 0px !important;
        }

        .sous_btn{
            background-color: #3F51B5 !important;
            border-color: #3F51B5 !important;
        }
        .sous_btn:hover{
            background-color: #536DFE !important;
            border-color: #536DFE !important;
        }

        .valid_btn{
            background-color: #009688 !important;
            border-color: #009688 !important;
        }

        .valid_btn:hover{
            background-color: #1DE9B6 !important;
            border-color: #1DE9B6 !important;
        }
    </style>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> onload="setTimeout(cacherAlertDanger,5000);">

<div  id="page-top" class="header-top">
	<?php mesmerize_print_header_top_bar(); ?>
	<?php mesmerize_get_navigation(); ?>
</div>

<div id="page" class="site">
    <div class="header-wrapper">
        <div <?php echo mesmerize_header_background_atts(); ?>>
            <?php do_action( 'mesmerize_before_header_background' ); ?>
			<?php mesmerize_print_video_container(); ?>
					<?php mesmerize_print_inner_pages_header_content(); ?>
            <?php mesmerize_print_header_separator(); ?>
        </div>
    </div>