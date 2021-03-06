<?php
function perch_modules_service_style(){
    $array = array(
            'Default' => 'fbox',
        );
    return apply_filters( 'perch_modules/service_style', $array );
}

/*
Element Description: VC Title area
*/
 
// Element Class 
class PerchFeatureBox extends PerchVcMap {
     
    private $base = 'perch_feature_box';

    private $title = 'Feature box';
    
    function __construct() {
        // vc map inits
        add_action( 'init', array( $this, 'vc_mapping' ) );

        // Shortcode filter
        add_filter( $this->base, array( $this, 'perch_feature_box_output' ), 30, 2 ); 
        add_filter( $this->base.'_slide', array( $this, 'perch_feature_box_slide_output' ), 30, 2 ); 
    }

   

    // Title element mapping
    private function vc_map_args(){        

        $array = array(
            array(
                 'type' => 'dropdown',
                'heading' => __( 'Feature style', 'perch' ),
                'param_name' => 'display_as',
                'std' => 'fbox',
                'value' => perch_modules_service_style(),            
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-8', 
            ),
            array(
                  'type' => 'dropdown',
                  'heading' => __( 'Alignment', 'perch' ),
                  'param_name' => 'align',
                  'std' => '', 
                  'value' => array(
                      'Inherit' => '',
                      'Left' => 'text-left',
                      'Center' => 'text-center',
                      'Right' => 'text-right',
                      'Justify' => 'text-justify',                    
                  ),
                  'edit_field_class' => 'vc_col-sm-4',
              )
        );    

        $icon_args = PerchVcMapIcons::icon_args();
        $array = array_merge($array, $icon_args);
        $array = array_merge($array, PerchVcMap::_vc_map_input_field_group('title', 'Title'));
        $array = array_merge($array, PerchVcMap::_vc_map_input_field_group('subtitle', 'Sub-Title',true, array('textarea' => true)));
        $array = array_merge($array, PerchVcMap::enable_hero_button_group() );
        $array = array_merge($array, PerchVcMap::element_common_args());
         
        $array = apply_filters( 'perch_modules/vc/'.$this->base , $array);

        return $array;
    } 
     
     
    // Element HTML
    public function perch_feature_box_output( $atts, $content = NULL ) {
        $map_arr = self::vc_mapping(true);
        $args = PerchVcMap::get_vc_element_atts_array($map_arr, $content); 
        // Params extraction
        $atts = shortcode_atts( $args, $atts );

        $wrapper_attributes = perch_modules_shortcode_wrapper_attributes($atts, $this->base );        

        // Used for periodic animation
        PerchVcMap::periodic_animation_start($atts);

        $icon_html = PerchVcMapIcons::icon_html($atts);

        extract($atts);
        $feature_common_class = apply_filters( 'perch_modules/'.$this->base.'/common_class', 'fbox' );       
        $icon_html .= ($display_as ==  $feature_common_class.'-3')? '<div class="box-line"></div>' : '';
        $title_html = perch_modules_get_vc_param_html('title', $atts, $map_arr );
        $subtitle_html = perch_modules_get_vc_param_html('subtitle', $atts, $map_arr );
        $buttons_html = PerchVcMap::buttons_html($atts);

      
        // Fill $html var with data
        $html ='
        <div '. implode( ' ', $wrapper_attributes ).'> 
            <div class="'.$feature_common_class.' '.$icon_color.'-box">
                '.$icon_html.'  
                <div class="'.$atts['display_as'].'-txt">    
                    '.$title_html.'
                    '.$subtitle_html.'
                    '.$buttons_html.'
                </div> 
            </div>        
        </div>'; 

        $html_args = array(
            'wrapper_attributes' => $wrapper_attributes,
            'icon_html' => $icon_html,        
            'title_html' => $title_html,         
            'subtitle_html' => $subtitle_html,
            'buttons_html' => $buttons_html,
        ); 

        $html = apply_filters('perch_modules/feature_box/output', $html, $html_args, $atts);

        PerchVcMap::periodic_animation_end();     
         
        return wpb_js_remove_wpautop($html);
         
    }

    public function perch_feature_box_slide_output( $atts, $content = NULL ) {
        $map_arr = self::vc_map_args();
        $args = PerchVcMap::get_vc_element_atts_array($map_arr, $content); 

        // Params extraction
        $atts = shortcode_atts( $args, $atts );

        $html ='<div class="perch-slide-item">';
        $html .= self::perch_feature_box_output($atts);
        $html .='</div>';

        return $html;
    }


    // Element Mapping
    public function vc_mapping( $return = false ) {
        $params = $this->vc_map_args();
        if($return) {
            return $params;  
        }        
       $name = apply_filters( 'perch_modules/'.$this->base.'/name', $this->title );
       $vc_map = array(
                'class' => perch_shortcodes_vc_class(),
                'category' => perch_shortcodes_vc_category(),
                'base' => $this->base,
                'name' => $name,                
                'description' => __('Display title & subtitle', 'perch'),                 
                'params' => $params,
                'js_view' => 'PerchVcElementPreview',
                'custom_markup' => '<div class="perch_vc_element_container">{{title}}</div>',  
                'admin_enqueue_js' =>   array( PERCH_MODULES_URI. '/assets/js/vc-admin-scripts.js'),       
            ); 
      
        // slide element
        $vc_map_slide = array(
                'class' => perch_shortcodes_vc_class(),
                'category' => perch_shortcodes_vc_category(),
                'base' => $this->base.'_slide',
                'name' => $name,                
                'description' => __('Display title & subtitle', 'perch'),                 
                'as_child'  => array('only' => 'perch_vc_carousel'),           
                'params' => $params,
                'js_view' => 'PerchVcElementPreview',
                'custom_markup' => '<div class="perch_vc_element_container">{{title}}</div>',        
            );
        
        
        vc_map( $vc_map );
        vc_map( $vc_map_slide );
        
    }
    
    
     
} // End Element Class 
 
// Element Class Init
new PerchFeatureBox();