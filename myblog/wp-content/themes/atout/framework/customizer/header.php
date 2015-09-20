<?php
/**
* Makes the header look all nice even when logged in, even when previewing site from customizer
* even when settings are changed.
*
* @since atout 1.0
* @author frenchtastic.eu
*/

function atout_header_output(){
  if(get_theme_mod('navbar_state') == 'fixed' && get_theme_mod('topbar_show') == 'block'){ 
  ?>

  <style type="text/css"> 
  .topbar{position: fixed;top: 0;right: 0;left: 0;z-index: 1030;}
  .navbar-fixed-top{top: 32px;}
  </style>

<?php }
// -----------------------------------------------------------------------------

  if(get_theme_mod('navbar_state') == 'fixed' && get_theme_mod('topbar_show') == 'block' && is_user_logged_in() != true){ 
?>

  <style type="text/css"> 
  body#fixed {padding-top: 143px;}
  @media(max-width: 768px){
  .navbar-fixed-top{
    top: 0;
  }
  body#fixed{
    padding-top: 100px;
  }
  }
  </style>

<?php }
// -----------------------------------------------------------------------------

  if(isset($GLOBALS['wp_customize']) && get_theme_mod('navbar_state') == 'fixed' && get_theme_mod('topbar_show') == 'none'){ 
?>
  
  <style type="text/css"> 
  body#fixed.logged-in .navbar-fixed-top {top: 0;}
  </style>

<?php }
// -----------------------------------------------------------------------------

  if(isset($GLOBALS['wp_customize']) && get_theme_mod('navbar_state') == 'fixed' && get_theme_mod('topbar_show') == 'block'){ 
?>

  <style type="text/css"> 
  body#fixed {padding-top: 143px;}
  </style>
<?php }
}
add_action('wp_head', 'atout_header_output');
