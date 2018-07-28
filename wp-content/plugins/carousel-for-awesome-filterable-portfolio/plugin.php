<?php
/*
Plugin Name: Carousel for Awesome Filterable Portfolio
Plugin URI: http://tympanus.net/codrops/2011/09/12/elastislide-responsive-carousel/
Description: Elastic Slide or Carousel used in conjunction with Awesome Filterable Portfolio plugin. All the items added in the portfolio section of Awesome Filterable Portfolio will automatically appear in the Elastic Slider or Carousel.
Version: 1.0
Author: NrichSystems 
Author URI: http://www.nrichsystems.com

*/

define('ESLIDER_PLUGIN_VER', '1.0');
define('ESLIDER_PLUGIN', plugin_basename(__FILE__));
define('ESLIDER_PLUGIN_PATH', dirname(__FILE__));
define('ESLIDER_PLUGIN_FOLDER', basename(ESLIDER_PLUGIN_PATH));
define('ESLIDER_PLUGIN_URL',plugins_url().'/'.ESLIDER_PLUGIN_FOLDER);
define('ESLIDER_RESOURCES_URL',ESLIDER_PLUGIN_URL.'/resources');
define('ESLIDER_RESOURCES_PATH',ESLIDER_PLUGIN_PATH.'/resources');

// load frontend assets on init
function loadElasticSlideFrontendResources() 
{
    // register resources and assign them to footer
     
    wp_enqueue_style('custom', ESLIDER_RESOURCES_URL.'/css/custom.css', null, ESLIDER_PLUGIN_VER);
    wp_print_styles('custom');
    wp_enqueue_style('elastislide', ESLIDER_RESOURCES_URL.'/css/elastislide.css', null, ESLIDER_PLUGIN_VER);
    wp_print_styles('elastislide');
    
    wp_register_script('modernizr.custom.17475', ESLIDER_RESOURCES_URL.'/js/modernizr.custom.17475.js', array('jquery'), ESLIDER_PLUGIN_VER, 1);
    wp_enqueue_script('modernizr.custom.17475');
    wp_register_script('jquerypp.custom', ESLIDER_RESOURCES_URL.'/js/jquerypp.custom.js', array('jquery'), ESLIDER_PLUGIN_VER, 1);
    wp_enqueue_script('jquerypp.custom');
    wp_register_script('jquery.elastislide', ESLIDER_RESOURCES_URL.'/js/jquery.elastislide.js', array('jquery'), ESLIDER_PLUGIN_VER, 1);
    wp_enqueue_script('jquery.elastislide');
    
   
   
}

function isESlideLoaded($what=null)
{
    static $res=false;
    
    if (null!==$what)
        $res=$what;
    
    return $res;
}

// unload frontend assets if no form rendered on page
function unloadElasticSlideFrontendResources() 
{
    // unload them when not needed
    if (!isESlideLoaded())
    {
        wp_dequeue_script('elastic-slide');
        wp_deregister_script('elastic-slide');
    }
    else
    {
        // load css first 
        //wp_enqueue_style('elastic-slide-css', ESLIDER_RESOURCES_URL.'/css/elastislide.min.css', null, ESLIDER_PLUGIN_VER);
        //wp_print_styles('elastic-slide-css');
    }
}

function carouselRenderPortfolio()
{
    static $sliders=0;
    
    $defaults=array(
		'thumbnail_size' => 'large',
        // orientation 'horizontal' || 'vertical'
		'orientation' => 'horizontal',
		// sliding speed
		'speed' => 700,
		
		// sliding easing
		'easing' => 'ease-in-out',
		// the minimum number of items to show. 
		// when we resize the window, this will make sure minItems are always shown 
		// (unless of course minItems is higher than the total number of elements)
		'minItems' => 2,
		// index of the current item (left most item of the carousel)
		'start' => 0,
        
        'title'=>'true',
        'order_by'=>'date',
        'ordering'=>'DESC'
    );
    
    $id='elastic-slider-'.(++$sliders);
    
       
    global $wpdb;
    $results = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'afp_items');
    
		
    
    if (!empty($results))
    {
        // signify that shortcode is loaded
        isESlideLoaded(true);
        
        // generate output
        ob_start();
        foreach($results as $result)
        {           
        ?>
        <li>
          
            <a href="<?php echo $result->item_link; ?>" title="<?php echo $title; ?>" target="_blank">
                <img style="" src="<?php echo $result->item_thumbnail; ?>" alt="<?php echo $result->item_title; ?>" title="<?php echo $result->item_description; ?>" />
            
            <?php /*if ($result->item_title) : ?><span><?php echo ucwords($result->item_title); ?></span><?php endif;*/ ?>
        	
            </a>
        </li> 
        
        <?php
        }
        $list=ob_get_clean();
        ob_start();
        ?> 
        	
            <ul style="" id="<?php echo $id; ?>" class="elastic-slide" >
            <?php echo $list; ?>
            </ul>
            
            <script type="text/javascript">
                jQuery(function(){
                    jQuery("#<?php echo $id; ?>").elastislide(<?php echo json_encode($atts); ?>);
                });
            </script>
        <?php
        $output=ob_get_clean();
    }
    return $output;
}

function carouselShortcode()
{
    return carouselRenderPortfolio();
    //return '';
}
add_shortcode('af_carousel','carouselShortcode');

// load front end form assets
add_action('wp_head','loadElasticSlideFrontendResources');
add_action('wp_footer','unloadElasticSlideFrontendResources');

