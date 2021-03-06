<?php
function shiftkey_h6_typography_options( $args = array() ){
    $options  = array(
        array(
            'id'       => 'h6',
            'type'     => 'typography',
            'title'    => esc_attr__( 'H6', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the global h6 font properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',            
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                 
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'h6-xs',
            'type'     => 'typography',
            'title'    => esc_attr__( 'H6 extra small', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the global h6 font properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                 
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'h6-sm',
            'type'     => 'typography',
            'title'    => esc_attr__( 'H6 small', 'shiftkey' ),
            'subtitle'    => esc_attr__( 'h6.h6-sm', 'shiftkey' ),
            'desc' => esc_attr__( 'Specify the h6 small properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                 
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'h6-md',
            'type'     => 'typography',
            'title'    => esc_attr__( 'H6 medium', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the h6 medium properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                 
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'h6-lg',
            'type'     => 'typography',
            'title'    => esc_attr__( 'H6 large', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the h6 large properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                 
                'font-size'     => '',               
            ),
        ),
        array(
            'id'       => 'h6-xl',
            'type'     => 'typography',
            'title'    => esc_attr__( 'H6 extra large', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the h6 extra large properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                 
                'font-size'     => '',               
            ),
        ), 
        array(
            'id'       => 'h6-huge',
            'type'     => 'typography',
            'title'    => esc_attr__( 'H6 huge', 'shiftkey' ),
            'subtitle' => esc_attr__( 'Specify the h6 huge properties.', 'shiftkey' ),
            'font_family_clear' => true,
            'google'   => true,
            'letter-spacing'=> true,
            'font-size'     => true,
            'line-height'   => true,
            'text-align'   => false,
            'units'       => 'rem',
            'default'  => array(
                'color'       => '',
                'font-style'  => '',
                'font-family' => '',                 
                'font-size'     => '',               
            ),
        ),
    );
    return $options;
}