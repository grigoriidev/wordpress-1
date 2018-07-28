<?php global $virtue; ?>
<header class="banner headerclass" role="banner">
<?php if (kadence_display_topbar()) : ?>
  <section id="topbar" class="topclass">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 kad-topbar-left">
          <div class="topbarmenu clearfix">
          <?php if (has_nav_menu('topbar_navigation')) :
              wp_nav_menu(array('theme_location' => 'topbar_navigation', 'menu_class' => 'sf-menu'));
            endif;?>
            <?php if(kadence_display_topbar_icons()) : ?>
            <div class="topbar_social">
              <ul>
                <?php $top_icons = $virtue['topbar_icon_menu'];
                foreach ($top_icons as $top_icon) {
                  if(!empty($top_icon['target']) && $top_icon['target'] == 1) {
                    $target = '_blank';
                  } else {
                    $target = '_self';
                  }
                  echo '<li><a href="'.esc_url($top_icon['link']).'" target="'.esc_attr($target).'" title="'.esc_attr($top_icon['title']).'" data-toggle="tooltip" data-placement="bottom" data-original-title="'.esc_attr($top_icon['title']).'">';
                  if(!empty($top_icon['url'])) {
                    echo '<img src="'.esc_url($top_icon['url']).'"/>' ;
                  } else {
                    echo '<i class="'.esc_attr($top_icon['icon_o']).'"></i>';
                  }
                  echo '</a></li>';
                } ?>
              </ul>
            </div>
          <?php endif; ?>
            <?php if(isset($virtue['show_cartcount'])) {
               if($virtue['show_cartcount'] == '1') { 
                if (class_exists('woocommerce')) {
                  global $woocommerce; ?>
                    <ul class="kad-cart-total">
                      <li>
                      <a class="cart-contents" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'woocommerce'); ?>">
                          <i class="icon-shopping-cart" style="padding-right:5px;"></i> <?php _e('Your Cart', 'virtue');?> <span class="kad-cart-dash">-</span> <?php echo $woocommerce->cart->get_cart_total(); ?>
                      </a>
                    </li>
                  </ul>
                <?php } } }?>
          </div>
        </div><!-- close col-md-6 --> 
        <div class="col-md-6 col-sm-6 kad-topbar-right">
          <div id="topbar-search" class="topbar-widget">
            <?php if(kadence_display_topbar_widget()) { if(is_active_sidebar('topbarright')) { dynamic_sidebar('topbarright'); } 
              } else { if(kadence_display_top_search()) {get_search_form();} 
          } ?>
        </div>
        </div> <!-- close col-md-6-->
      </div> <!-- Close Row -->
    </div> <!-- Close Container -->
  </section>
<?php endif; ?>
<?php if(isset($virtue['logo_layout'])) {
  if($virtue['logo_layout'] == 'logocenter') {$logocclass = 'col-md-12'; $menulclass = 'col-md-12';}
  else if($virtue['logo_layout'] == 'logohalf') {$logocclass = 'col-md-6'; $menulclass = 'col-md-6';}
  else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8';} 
} else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8'; }?>
  <div class="container">
    <div class="row">
          <div class="<?php echo esc_attr($logocclass); ?> clearfix kad-header-left">
            <div id="logo" class="logocase">
              <a class="brand logofont" href="<?php echo home_url(); ?>/">
                <?php if (!empty($virtue['x1_virtue_logo_upload']['url'])) { ?>
                  <div id="thelogo">
                    <img src="<?php echo esc_url($virtue['x1_virtue_logo_upload']['url']); ?>" alt="<?php bloginfo('name');?>" class="kad-standard-logo" />
                    <?php if(!empty($virtue['x2_virtue_logo_upload']['url'])) {?>
                    <img src="<?php echo esc_url($virtue['x2_virtue_logo_upload']['url']);?>" class="kad-retina-logo" style="max-height:<?php echo esc_attr($virtue['x1_virtue_logo_upload']['height']);?>px" /> <?php } ?>
                  </div>
                <?php } else { 
                  bloginfo('name'); 
                } ?>
              </a>
              <?php if (isset($virtue['logo_below_text']) && !empty($virtue['logo_below_text'])) { ?>
                <p class="kad_tagline belowlogo-text"><?php echo $virtue['logo_below_text']; ?></p>
              <?php }?>
           </div> <!-- Close #logo -->
       </div><!-- close logo span -->
       <?php if (has_nav_menu('primary_navigation')) : ?>
         <div class="<?php echo esc_attr($menulclass); ?> kad-header-right">
           <nav id="nav-main" class="clearfix" role="navigation">
              <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'sf-menu')); ?>
           </nav> 
          </div> <!-- Close menuclass-->
        <?php endif; ?>       
    </div> <!-- Close Row -->
    <?php if (has_nav_menu('mobile_navigation')) : ?>
           <div id="mobile-nav-trigger" class="nav-trigger">
              <button class="nav-trigger-case mobileclass collapsed" data-toggle="collapse" data-target=".kad-nav-collapse">
                <span class="kad-navbtn"><i class="icon-reorder"></i></span>
                <span class="kad-menu-name"><?php echo __('Menu', 'virtue'); ?></span>
              </button>
            </div>
            <div id="kad-mobile-nav" class="kad-mobile-nav">
              <div class="kad-nav-inner mobileclass">
                <div class="kad-nav-collapse">
                <?php if(isset($virtue['mobile_submenu_collapse']) && $virtue['mobile_submenu_collapse'] == '1') {
                    wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav', 'walker' => new kadence_mobile_walker()));
                  } else {
                  wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav')); 
                  } ?>
               </div>
            </div>
          </div>   
          <?php  endif; ?> 
  </div> <!-- Close Container -->
  <?php
            if (has_nav_menu('secondary_navigation')) : ?>
  <section id="cat_nav" class="navclass">
    <div class="container">
     <nav id="nav-second" class="clearfix" role="navigation">
     <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'sf-menu')); ?>
   </nav>
    </div><!--close container-->
    </section>
    <?php endif; ?> 
     <?php if (!empty($virtue['virtue_banner_upload']['url'])) { ?> <div class="container"><div class="virtue_banner"><img src="<?php echo esc_url($virtue['virtue_banner_upload']['url']); ?>" /></div></div> <?php } ?>
<center><div id="mobile_hidden" style="margin-top: -50px; width: 1140px; text-align: right;"><a href="#elementid" class="hs-rsp-popup hiddendiv"><img style="margin-right: 30px; height: 50px; width: auto; cursor: pointer;" src="http://totallytent.com/wp-content/uploads/2016/01/requestaquote2-1.png"></a></center>
</header>

<div id="elementid" style="display:none">
<center><h1 style="color: #2c3959; margin-bottom: 30px;"><span style="border-bottom: 5px #2c3959 double; padding-bottom: 3px;">Request a Quote:</span></h1>
<form action="" name="quote" method="post">
<input type="text" name="clientname" placeholder="Name" style="width: 250px; border: 2px solid #2c3959; border-radius: 10px; padding: 5px; margin-bottom: 15px;">
<input type="text" name="email" id="email" placeholder="Email Address" style="border: 2px solid #2c3959; width: 250px; border-radius: 10px; padding: 5px; margin-bottom: 15px;">
<input type="text" name="phone" id="phone" placeholder="Phone Number" style="border: 2px solid #2c3959; width: 250px; border-radius: 10px; padding: 5px; margin-bottom: 15px;">
<input type="text" name="address" id="address" placeholder="Event Address" style="border: 2px solid #2c3959; width: 250px; border-radius: 10px; padding: 5px; margin-bottom: 15px;">
<input type="text" name="date" id="date" placeholder="Event Date" style="border: 2px solid #2c3959; width: 250px; border-radius: 10px; padding: 5px; margin-bottom: 15px;">
<textarea rows="4" name="comment" id="comment" placeholder="What are you interested in renting?" style="width: 250px; border-radius: 10px; border: 2px solid #2c3959; padding: 5px; margin-bottom: 15px; resize: none;"></textarea>
<p style="display:none;">Nothing here:<input type="text" name="info" /></p>
<input type="image" name="submit" id="submit" alt="Submit" src="http://totallytent.com/wp-content/uploads/2016/01/submit.png" value="Submit">
</form>
</center>
</div>
</div>

<?php 
if (isset($_POST['submit']) && $_POST['info'] == ''){
 if (!empty($_POST['clientname']) && (!empty($_POST['phone']) || !empty($_POST['email'])) ) {
$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message = "Name: " . $_POST['clientname'] . 
"<br>Email: " . $_POST['email'] . 
"<br>Phone Number: " . $_POST['phone'] . 
"<br>Event Address: " . $_POST['address'] .
"<br>Event Date: " . $_POST['date'] . 
"<br>Details: " . $_POST['comment'];
$first = "totallytent";
$second = "gma";
$third = "il";
$fourth = "com";
wp_mail($first . "@" . $second . $third . "." . $fourth,"New Quote Request",$message, $headers);
echo '<center><h2>Thank you for submitting your quote request. We will get back to you shortly.</h2></center>';
}
else
{
echo '<center><h2>Please provide your name and either an email or phone number so that we may contact you.<br>Thank you.</h2></center>';
}
}
?>