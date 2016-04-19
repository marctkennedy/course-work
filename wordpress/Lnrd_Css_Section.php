<?php
    require get_template_directory() . '/inc/Lnrd_Customizer_Base.php';
    require get_template_directory() . '/inc/Lnrd_Css_Background.php';
    require get_template_directory() . '/inc/Lnrd_Css_Padding.php';
    require get_template_directory() . '/inc/Lnrd_Css_Border.php';
    require get_template_directory() . '/inc/Lnrd_Css_Border_Radius.php';
    require get_template_directory() . '/inc/Lnrd_Css_Dimension.php';
    require get_template_directory() . '/inc/Lnrd_Css_Font.php';
    require get_template_directory() . '/inc/Lnrd_Css_Margin.php';
    require get_template_directory() . '/inc/Lnrd_Css_Multi_Column.php';
    require get_template_directory() . '/inc/Lnrd_Css_Position.php';
    require get_template_directory() . '/inc/Lnrd_Css_Text.php';

    class Lnrd_Css_Section {
        /**
         * @var string $section_id The unique id for this Lnrd_Css_Section
         * object.
         */
        private $section_id;

        /**
         * @var string $section_name The name that will appear as the label for
         * this section on the WordPress theme customizer screen.
         */
        private $section_name;

        /**
         * @var int $section_priority This sections priority. The priority will
         * determing where the section will render on the WordPress theme
         * customizer screen. 
         */
        private $section_priority;

        /**
         * @var string $css_selector The css selector for this section, i.e. '#'
         * for id, '.' for class, 'p' for paragraph etc.
         */
        private $css_selector;

        /**
         *
         */
        private $required_css_property_objs;

        /**
         *
         */
        private $required_css_properties = array();


        /**
         * Creates a new section object.
         *
         * Creates a new section object with all of the required css property objects.
         *
         * @used-by Lnrd_Ultimate_Css::__construct() To create a new section for
         * the WordPress theme customizer page.
         *
         * @param string $section_id The unique id for this section object.
         *
         * @param string $section_name The name of this section that will appear
         * on the WordPress theme customizer screen.
         *
         * @param int $section_priority This sections priority. The priority will
         * determing where the section will render on the WordPress theme
         * customizer screen.
         *
         * @param string $css_selector The css selector for this section, i.e. '#'
         * for id, '.' for class, 'p' for paragraph etc.
         *
         * @param mixed[] $css_properties The required css properties for this
         * section object.
         *
         */
        function __construct($section_id, $section_name, $section_priority, $css_selector,  $css_properties) {
            if (is_string($section_id) && strlen($section_id) <= 50) $this->section_id = $section_id;
            if (is_string($section_name) && strlen($section_name) <= 50) $this->section_name = $section_name;
            if (is_int($section_priority) && $section_priority <= 500) $this->section_priority = $section_priority;
            if (is_string($css_selector) && strlen($css_selector) <= 50) $this->css_selector = $css_selector;
            $this->required_css_properties = $css_properties;
            if (is_array($css_properties) && count($css_properties) <= 40 && $this->section_id) $this->get_css_property_objs($css_properties, $this->section_id);     
        }

        /**
         * Creates the required css property objects.
         *
         * Creates all of the required css property objects for this section and
         * stores them in the required_css_property_objs array variable.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Background::__construct() To create a new
         * Lnrd_Css_Background object for this section.
         *
         * @uses Lnrd_Css_Border::__construct() To create a new
         * Lnrd_Css_Border object for this section.
         *
         * @uses Lnrd_Css_Padding::__construct() To create a new
         * Lnrd_Css_Padding object for this section.
         *
         * @used-by Lnrd_Css_Section::__construct() To get all of the required
         * css property settings and controls for this section object.
         *
         * @param
         *
         * @param string $section_id The unique id for this section object.
         */
        private function get_css_property_objs($required_css_properties, $section_id) {
            if (count($required_css_properties) > 0) {
                foreach ($required_css_properties as $required_property => $value) {
                    switch ($required_property) {
                        case 'background':
                            $this->required_css_property_objs['background'] = new Lnrd_Css_Background($section_id, $value);
                            break;
                        case 'border':
                            $this->required_css_property_objs['border'] = new Lnrd_Css_Border($section_id, $value);
                            break;
                        case 'border-radius':
                            $this->required_css_property_objs['border_radius'] = new Lnrd_Css_Border_Radius($section_id, $value);
                            break;
                        case 'dimension':
                            $this->required_css_property_objs['dimension'] = new Lnrd_Css_Dimension($section_id, $value);
                            break;
                        case 'font':
                            $this->required_css_property_objs['font'] = new Lnrd_Css_Font($section_id, $value);
                            break;
                        case 'margin':
                            $this->required_css_property_objs['margin'] = new Lnrd_Css_Margin($section_id, $value);
                            break;
                        case 'multi-column':
                            $this->required_css_property_objs['multi_column'] = new Lnrd_Css_Multi_Column($section_id, $value);
                            break;
                        case 'padding':
                            $this->required_css_property_objs['padding'] = new Lnrd_Css_Padding($section_id, $value);
                            break;
                        case 'position':
                            $this->required_css_property_objs['position'] = new Lnrd_Css_Position($section_id, $value);
                            break;
                        case 'text':
                             $this->required_css_property_objs['text'] = new Lnrd_Css_Text($section_id, $value);
                            break;       
                    } // End switch statement.    
                } // End foreach statement.
            } // End if statement.  
        }
        

        /**
         * Creates a WordPress customize manager section.
         *
         * Creates an new section on the WordPress theme customizer page.
         * 
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_section()
         * To create a customizer section.
         *
         * @used-by Lnrd_Css_Section::lnrd_render_section() To create a section
         * for the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function lnrd_get_section($wp_customize) {
            if ($this->section_id && $this->section_name && $this->section_priority) {
                $wp_customize->add_section($this->section_id, array(
                    'title' => __($this->section_name, 'lnrd_ultimate_css'),
                    'priority' => $this->section_priority,
                ));    
            } 
        }


        /**
         * Creates a section on the WordPress theme customizer page.
         *
         * Creates a new section on the WordPress theme customizer page with all
         * of the required css property controls.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Section::lnrd_get_section() To create the customizer
         * section.
         *
         * @uses Lnrd_Css_Background::get_background_properties() To get the
         * required css background property settings and controls for this section.
         *
         * @uses Lnrd_Css_Border::get_border_properties() To get the
         * required css border property settings and controls for this section.
         *
         * @uses Lnrd_Css_Padding::get_padding_properties() To get the
         * required css padding property settings and controls for this section.
         *
         * @used-by Lnrd_Ultimate_Css::get_css_sections() To render this section
         * on the WordPress theme customizer page with all of the required css
         * property settings and controls. 
         */
        public  function lnrd_render_section($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {

                $this->lnrd_get_section($wp_customize);

                foreach ($this->required_css_properties as $property => $value) {
                    switch ($property) {
                        case 'background':
                            $this->required_css_property_objs['background']->get_background_properties($wp_customize);
                            break;
                        case 'border':
                            $this->required_css_property_objs['border']->get_border_properties($wp_customize);
                            break;
                        case 'border-radius':
                            $this->required_css_property_objs['border_radius']->get_border_radius_properties($wp_customize);
                            break;
                        case 'dimension':
                            $this->required_css_property_objs['dimension']->get_dimension_properties($wp_customize);
                            break;
                        case 'font':
                            $this->required_css_property_objs['font']->get_font_properties($wp_customize);
                            break;
                        case 'margin':
                            $this->required_css_property_objs['margin']->get_margin_properties($wp_customize);
                            break;
                        case 'multi-column':
                            $this->required_css_property_objs['multi_column']->get_column_properties($wp_customize);
                            break;
                        case 'padding':
                            $this->required_css_property_objs['padding']->get_padding_properties($wp_customize);
                            break;
                        case 'position':
                            $this->required_css_property_objs['position']->get_position_properties($wp_customize);
                            break;
                        case 'text':
                            $this->required_css_property_objs['text']->get_text_properties($wp_customize);
                            break;       
                    } // END switch statement.    
                } // END foreach statement.
            } // END if statement.
        }


        /**
         * Gets the CSS for this section.
         * 
         * Returns all of the required css styles for this section as a string.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Background::get_background_css() To get the css
         * background styles for this section.
         *
         * @uses Lnrd_Css_Border::get_border_css() To get the css border styles
         * for this section.
         *
         * @uses Lnrd_Css_Padding::get_padding_css() To get the css padding
         * styles for this section.
         *
         * @used-by Lnrd_Ultimate_Css::get_css() To render the individual
         * section objects css styles. 
         */
        public function get_section_css() {
            $outer_css ='';
            $inner_css = '';
            $empty_css = FALSE;

            if ($this->css_selector == '#' || $this->css_selector == '.') {
                $outer_css .= $this->css_selector . $this->section_id . ' {';
            } else {
                $outer_css .= $this->css_selector . ' {';
            }

            foreach ($this->required_css_properties as $property => $value) {
                switch ($property) {
                    case 'background':
                        $inner_css .=  $this->required_css_property_objs['background']->get_background_css();
                        break;
                    case 'border':
                        $inner_css .=  $this->required_css_property_objs['border']->get_border_css();
                        break;
                    case 'border-radius':
                        $inner_css .=  $this->required_css_property_objs['border_radius']->get_border_radius_css();
                        break;
                    case 'dimension':
                        $inner_css .=  $this->required_css_property_objs['dimension']->get_dimension_css();
                        break;
                    case 'font':
                        $inner_css .=  $this->required_css_property_objs['font']->get_font_css();
                        break;
                    case 'margin':
                        $inner_css .=  $this->required_css_property_objs['margin']->get_margin_css();
                        break;
                    case 'multi-column':
                        $inner_css .=  $this->required_css_property_objs['multi_column']->get_column_css();
                        break;
                    case 'padding':
                        $inner_css .=  $this->required_css_property_objs['padding']->get_padding_css();
                        break;
                    case 'position':
                        $inner_css .=  $this->required_css_property_objs['position']->get_position_css();
                        break;
                    case 'text':
                        $inner_css .=  $this->required_css_property_objs['text']->get_text_css();
                        break;
                }   
            }
            $empty_css = empty($inner_css);
            $outer_css .= $inner_css . '} ';
            if (! $empty_css) return $outer_css; 
        }

        
        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Sets the css background defaults.
         *
         * Sets the default values for this sections css background object.
         *<pre>Example call:
         *    set_background_default_values(array(
         *        'attachment' => 'fixed',
         *        'color' => '#eeeeee',
         *        'image' => 'none',
         *        'position' => 'center center',
         *        'repeat' => 'no-repeat',
         *        'clip' => 'padding-box',
         *        'origin' => 'border-box',
         *        'size_x_value' => '21',
         *        'size_y_value' => '12',
         *        'size_x_units' => 'em',
         *        'size_y_units' => 'rem',
         *    ));
         *Legal values:
         *    'attachment' => 'scroll', 'fixed', or 'local'
         *    'color' => any valid hex color
         *    'image' => any valid image url
         *    'position' => 'left top', 'left center', 'left bottom', 'right top',
         *    'right center', 'right bottom', 'center top', 'center center', or 'center bottom'
         *    'repeat' => 'repeat', 'repeat-x', 'repeat-y', 'no-repeat' or 'inherit'
         *    'clip' => 'border-box', 'padding-box' or 'content-box'
         *    'origin' => 'border-box', 'padding-box' or 'content-box'
         *    'size_x_value' => 'auto', 'cover', 'contain' or a valid number i.e. 2, 45, 3.1415 etc.
         *    'size_y_value' => 'auto', 'cover', 'contain' or a valid number i.e. 2, 45, 3.1415 etc.
         *    'size_x_units' => 'px', '%', 'em', 'ex', 'ch', 'rem', 'vh', 'vw', 'vmin' or 'vmax'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Background::set_background_attachment()
         * To set the background attachment default value.
         * @uses Lnrd_Css_Background::set_background_color()
         * To set the background color default value.
         * @uses Lnrd_Css_Background::set_background_image()
         * To set the background image default value.
         * @uses Lnrd_Css_Background::set_background_position()
         * To set the background position default value.
         * @uses Lnrd_Css_Background::set_background_repeat()
         * To set the background repeat default value.
         * @uses Lnrd_Css_Background::set_background_clip()
         * To set the background clip default value.
         * @uses Lnrd_Css_Background::set_background_origin()
         * To set the background origin default value.
         * @uses Lnrd_Css_Background::set_background_size_x()
         * To set the background X size default value.
         * @uses Lnrd_Css_Background::set_background_size_y()
         * To set the background Y size default value.
         * @uses Lnrd_Css_Background::set_background_size_x_unit()
         * To set the background X size unit default value.
         * @uses Lnrd_Css_Background::set_background_size_y_unit()
         * To set the background Y size unit default value.
         *
         * @used-by Lnrd_Ultimate_Css::__construct() To set the css background
         * default values before rendering the settings and controls on the
         * WordPress theme customizer page.
         *
         * @param mixed[] $bg_default_values To set the new background default
         * values. see example call above.
         */
        public function set_background_default_values($bg_default_values) {
            if(is_array($bg_default_values) && count($bg_default_values) > 0) {
                foreach ($bg_default_values as $bg_default_property => $bg_default_value) {
                    //echo '<p>' . $bg_default_property . ' = ' . $bg_default_value . '</p>';
                    switch ($bg_default_property) {
                        case 'attachment':
                            $this->required_css_property_objs['background']->set_background_attachment($bg_default_value);
                            break;
                        case 'color':
                            $this->required_css_property_objs['background']->set_background_color($bg_default_value);
                            break;
                        case 'image':
                            $this->required_css_property_objs['background']->set_background_image($bg_default_value);
                            break;
                        case 'position':
                            $this->required_css_property_objs['background']->set_background_position($bg_default_value);
                            break;
                        case 'repeat':
                            $this->required_css_property_objs['background']->set_background_repeat($bg_default_value);
                            break;
                        case 'clip':
                            $this->required_css_property_objs['background']->set_background_clip($bg_default_value);
                            break;
                        case 'origin':
                            $this->required_css_property_objs['background']->set_background_origin($bg_default_value);
                            break;
                        case 'size_x_value':
                            $this->required_css_property_objs['background']->set_background_size_x($bg_default_value);
                            break;
                        case 'size_y_value':
                            $this->required_css_property_objs['background']->set_background_size_y($bg_default_value);
                            break;
                        case 'size_x_units':
                            $this->required_css_property_objs['background']->set_background_size_x_unit($bg_default_value);
                            break;
                        case 'size_y_units':
                            $this->required_css_property_objs['background']->set_background_size_y_unit($bg_default_value);
                            break;
                    } // END switch statement.
                } // END foreach statement.
            } // END if statement.
        }

    } // END Lnrd_Css_Section class.
?>
