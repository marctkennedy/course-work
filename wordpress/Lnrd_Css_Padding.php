<?php
    /**
     * @author Marc Kennedy
     * @copyright 2013 Lucid Nerd
     * @license GNU General Public License, version 3
     * @version 1.0.0
     */

    class Lnrd_Css_Padding {
        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE VARIABLES
         * --------------------------------------------------------------------------------
        */

        /**
         * @var string $section_id The name of the Lnrd_Css_Section object
         * that this Lnrd_Css_Padding object will be linked to.
         */
        private $section_id;

        /**
         * @var mixed[] $padding_default_values The default values for the
         * css padding properties.
         */
        private $padding_default_values;

        /**
         * @var string[] $required_padding_properties The required css padding properties
         * to render. Expected values -> 'all', 'padding_top', 'padding_right',
         * 'padding_bottom', 'padding_left'. 
         */
        private $required_padding_properties;


        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE METHODS
         * --------------------------------------------------------------------------------
        */

        /**
         * Class constructor, called whenever new Lnrd_Css_Padding() is called.
         *
         * Creates a new Lnrd_Css_Padding object that will be able to set the css
         * padding default properties, and render the required theme customizer
         * settings and controls for required css padding properties.
         *<pre>Example calls:
         *    new Lnrd_Css_Padding('post_title', array('all')) -> renders all the padding settings and controls.
         *    new Lnrd_Css_Padding('post_title', array('padding_top', 'padding_bottom')) -> renders only the padding top and padding bottom settings and controls.
         * Both of the above calls will create a new Lnrd_Css_Padding object that is associated to the Lnrd_Css_Section object with the id of post_title.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @used-by Lnrd_Css_Section::get_css_property_objs().
         * 
         * @param string $section_id The name of the Lnrd_Css_Section object that this Lnrd_Css_Padding object will be associated with.
         * @param string[] $required_padding_properties The required css padding properties to render. Allowed values 'all', 'padding_top', 'padding_right', 'padding_bottom', 'padding_left'.
         * @return self A new Lnrd_Css_Padding object.
         *
         */
        function __construct($section_id, $required_padding_properties) {
            $this->section_id = $section_id;
            $this->required_padding_properties = $required_padding_properties;
            $this->padding_default_values = array(
                'padding_top_default_value' => 0,
                'padding_right_default_value' => 0,
                'padding_bottom_default_value' => 0,
                'padding_left_default_value' => 0,
                'padding_top_units_default_value' => 'value1',
                'padding_right_units_default_value' => 'value1',
                'padding_bottom_units_default_value' => 'value1',
                'padding_left_units_default_value' => 'value1',
            );
           
        }
        
        
        /* 
         * --------------------------------------------------------------------------------
         * GETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Gets the unique section id.
         *
         * Gets the unique section id of the Lnrd_Css_Section object to which this Lnrd_Css_Padding
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which this Lnrd_Css_Padding
         * object is associated with. 
         */
        public function get_section_id() {
            return $this->section_id;
        }


        /**
         * Gets the required css padding properties.
         *
         * Gets the names of the required padding properties that were requested by the Lnrd_Css_Section
         * object to which this Lnrd_Css_Padding object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return string[] The names of the padding properties that this object has rendered.
         */
        public function get_required_padding_properties() {
            return $this->required_padding_properties;
        }


        /**
         * Gets the padding properties default values.
         *
         * Gets the default values of the padding properties for this Lnrd_Css_Padding object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return (int/string)[] The default values for the padding properties for this Lnrd_Css_Padding
         * object.
         */
        public function get_padding_default_values() {
            return $this->padding_default_values;
        }


        /**
         * Creates the padding top setting and control within the required section on the theme customizer page.
         *
         * Creates the padding top setting and control for entering in the required size value and also creates a padding top setting and control for choosing the desired units e.g. 'px', '%', 'em' etc. within the required section on the theme customizer page.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting() To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control() To create a customizer control.
         * @uses Lnrd_Css_Padding::set_sanitized_padding_value_input() To check the users input is valid before we store it to the database.
         * @uses Lnrd_Css_Padding::set_sanitized_padding_unit_input() To check the users input is valid before we store it to the database. 
         *
         * @used-by Lnrd_Css_Padding::get_padding_properties().
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_padding_top($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                // Create the padding top value setting.
                $wp_customize->add_setting($this->section_id . '_css_padding_top', array(
                    'default' => $this->padding_default_values['padding_top_default_value'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'set_sanitized_padding_value_input'),
                ));

                // Create the padding top value control.
                $wp_customize->add_control($this->section_id . '_css_padding_top', array(
                    'label' => __('Padding top', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_padding_top',
                    'priority' => 87,
                ));

                // Create the padding top units setting.
                $wp_customize->add_setting($this->section_id . '_css_padding_top_units', array(
                    'default' => $this->padding_default_values['padding_top_units_default_value'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'set_sanitized_padding_unit_input'),
                ));
            
                // Create the padding top units control.
                $wp_customize->add_control($this->section_id . '_css_padding_top_units', array(
                    'label' => __('', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_padding_top_units',
                    'priority' => 88,
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'px',
                        'value2' => '%',
                        'value3' => 'em',
                        'value4' => 'ex',
                        'value5' => 'ch',
                        'value6' => 'rem',
                        'value7' => 'vh',
                        'value8' => 'vw',
                        'value9' => 'vmin',
                        'value10' => 'vmax',    
                    ),
                ));
            }       
        }


        /**
         * Creates the padding right setting and control within the required section on the theme customizer page.
         *
         * Creates the padding right setting and control for entering in the required size value and also creates a padding right setting and control for choosing the desired units e.g. 'px', '%' 'em' etc. within the required section on the theme customizer page.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting() To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control() To create a customizer control.
         * @uses Lnrd_Css_Padding::set_sanitized_padding_value_input() To check the users input is valid before we store it to the database.
         * @uses Lnrd_Css_Padding::set_sanitized_padding_unit_input() To check the users input is valid before we store it to the database. 
         *
         * @used-by Lnrd_Css_Padding::get_padding_properties().
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_padding_right($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                // Create the padding right value setting.
                $wp_customize->add_setting($this->section_id . '_css_padding_right', array(
                    'default' => $this->padding_default_values['padding_right_default_value'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'set_sanitized_padding_value_input'),
                ));

                // Create the padding right value control.
                $wp_customize->add_control($this->section_id . '_css_padding_right', array(
                    'label' => __('Padding right', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_padding_right',
                    'priority' => 89,
                ));

                // Create the padding right units setting.
                $wp_customize->add_setting($this->section_id . '_css_padding_right_units', array(
                    'default' => $this->padding_default_values['padding_right_units_default_value'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'set_sanitized_padding_unit_input'),
                ));
            
                // Create the padding right units control.
                $wp_customize->add_control($this->section_id . '_css_padding_right_units', array(
                    'label' => __('', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_padding_right_units',
                    'priority' => 90,
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'px',
                        'value2' => '%',
                        'value3' => 'em',
                        'value4' => 'ex',
                        'value5' => 'ch',
                        'value6' => 'rem',
                        'value7' => 'vh',
                        'value8' => 'vw',
                        'value9' => 'vmin',
                        'value10' => 'vmax',
                    ),
                ));
            }
        }

        
        /**
         * Creates the padding bottom setting and control within the required section on the theme customizer page.
         *
         * Creates the padding bottom setting and control for entering in the required size value and also creates a padding bottom setting and control for choosing the desired units e.g. 'px', '%', 'em' etc. within the required section on the theme customizer page.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting() To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control() To create a customizer control.
         * @uses Lnrd_Css_Padding::set_sanitized_padding_value_input() To check the users input is valid before we store it to the database.
         * @uses Lnrd_Css_Padding::set_sanitized_padding_unit_input() To check the users input is valid before we store it to the database. 
         *
         * @used-by Lnrd_Css_Padding::get_padding_properties().
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_padding_bottom($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                // Create the padding bottom value setting.
                $wp_customize->add_setting($this->section_id . '_css_padding_bottom', array(
                    'default' => $this->padding_default_values['padding_bottom_default_value'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'set_sanitized_padding_value_input'),
                ));

                // Create the padding bottom control.
                $wp_customize->add_control($this->section_id . '_css_padding_bottom', array(
                    'label' => __('Padding bottom', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_padding_bottom',
                    'priority' => 91,
                ));

                // Create the padding bottom units setting.
                $wp_customize->add_setting($this->section_id . '_css_padding_bottom_units', array(
                    'default' => $this->padding_default_values['padding_bottom_units_default_value'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'set_sanitized_padding_unit_input'),
                ));
            
                // Create the padding bottom units control.
                $wp_customize->add_control($this->section_id . '_css_padding_bottom_units', array(
                    'label' => __('', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_padding_bottom_units',
                    'priority' => 92,
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'px',
                        'value2' => '%',
                        'value3' => 'em',
                        'value4' => 'ex',
                        'value5' => 'ch',
                        'value6' => 'rem',
                        'value7' => 'vh',
                        'value8' => 'vw',
                        'value9' => 'vmin',
                        'value10' => 'vmax',
                    ),
                ));
            }
        }

        
        /**
         * Creates the padding left setting and control within the required section on the theme customizer page.
         *
         * Creates the padding left setting and control for entering in the required size value and also creates a padding left setting and control for choosing the desired units e.g. 'px', '%', 'em' etc. within the required section on the theme customizer page.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting() To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control() To create a customizer control.
         * @uses Lnrd_Css_Padding::set_sanitized_padding_value_input() To check the users input is valid before we store it to the database.
         * @uses Lnrd_Css_Padding::set_sanitized_padding_unit_input() To check the users input is valid before we store it to the database. 
         *
         * @used-by Lnrd_Css_Padding::get_padding_properties().
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_padding_left($wp_customize) {
            // Check for a  WP_Customize_Manager object, before we try to render the setttings and controls.
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                // Create the padding top left setting.
                $wp_customize->add_setting($this->section_id . '_css_padding_left', array(
                    'default' => $this->padding_default_values['padding_left_default_value'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'set_sanitized_padding_value_input'),
                ));

                // Create the padding left value control.
                $wp_customize->add_control($this->section_id . '_css_padding_left', array(
                    'label' => __('Padding left', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_padding_left',
                    'priority' => 93,
                ));

                // Create the padding left units setting.
                $wp_customize->add_setting($this->section_id . '_css_padding_left_units', array(
                    'default' => $this->padding_default_values['padding_left_units_default_value'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'set_sanitized_padding_unit_input'),
                ));
            
                // Create the padding left units control.
                $wp_customize->add_control($this->section_id . '_css_padding_left_units', array(
                    'label' => __('', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_padding_left_units',
                    'priority' => 94,
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'px',
                        'value2' => '%',
                        'value3' => 'em',
                        'value4' => 'ex',
                        'value5' => 'ch',
                        'value6' => 'rem',
                        'value7' => 'vh',
                        'value8' => 'vw',
                        'value9' => 'vmin',
                        'value10' => 'vmax',
                    ),
                ));
            }
        } 


        /**
         * Renders the required css padding properties.
         *
         *
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::get_padding_top() To create the theme customizer settings and controls for the css padding top property.
         * @uses Lnrd_Css_Padding::get_padding_right() To create the theme customizer settings and controls for the css padding right property.
         * @uses Lnrd_Css_Padding::get_padding_bottom() To create the theme customizer settings and controls for the css padding bottom property.
         * @uses Lnrd_Css_Padding::get_padding_left() To create the theme customizer settings and controls for the css padding left property.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        public function get_padding_properties($wp_customize) {
            // Check $wp_customize for a WP_Customize_Manager object before we render the settings and controls.
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_padding_properties as $property) {

                    switch ($property) {
                        case 'padding_top':
                            $this->get_padding_top($wp_customize);
                            break;
                        case 'padding_right':
                            $this->get_padding_right($wp_customize);
                            break;
                        case 'padding_bottom':
                            $this->get_padding_bottom($wp_customize);
                            break;
                        case 'padding_left':
                            $this->get_padding_left($wp_customize);
                            break;
                        case 'all':
                            if (count($this->required_padding_properties) == 1) {
                                $this->get_padding_top($wp_customize);
                                $this->get_padding_right($wp_customize);
                                $this->get_padding_bottom($wp_customize);
                                $this->get_padding_left($wp_customize);   
                            }
                            break;
                        default:
                            //display error message if $property is not a legal value.
                            echo "<p class='error'><span>ERROR:</span> <b>" . $property . "</b> is not a legal value for the __construct() function call in Lnrd_Css_Padding.php on the " . $this->section_id . " object.<br> <span>LEGAL VALUES:</span> 'padding_top', 'padding_right', 'padding_bottom', 'padding_left'.</p>";
                    } 
                       
                }
            }
        }


        /**
         * Converts the padding units select value.
         *
         * Converts the WordPress stored padding units select value into useable css values. e.g 'px', '%', 'em'.
         *<pre>Example:
         *    string 'value1' -> string 'px' Converts the WordPress stored padding unit value of 'value1' to 'px'.
         *    string 'value2' -> string '%' Converts the WordPress stored padding unit value of 'value2' to '%'.
         *    string 'value3' -> string 'em' Converts the WordPress stored padding unit value of 'value3' to 'em'.</pre> 
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @used-by Lnrd_Css_Padding::get_css().
         *
         * @return string The desired css padding units.
         */
        private function get_padding_units($units_value) {
            $units = '';
            switch ($units_value) {
                case 'value1':
                    $units = 'px';
                    break;
                case 'value2':
                    $units = '%';
                    break;
                case 'value3':
                    $units = 'em';
                    break;
                case 'value4':
                    $units = 'ex';
                    break;
                case 'value5':
                    $units = 'ch';
                    break;
                case 'value6':
                    $units = 'rem';
                    break;
                case 'value7':
                    $units = 'vh';
                    break;
                case 'value8':
                    $units = 'vw';
                    break;
                case 'value9':
                    $units = 'vmin';
                    break;
                case 'value10':
                    $units = 'vmax';
                    break;
                        
            }

            return $units;    
        }


        /**
         * Gets the css for an idividual padding property.
         * 
         * Returns a string of the requires css padding property.
         *<pre>Example call:
         *   get_css('padding-top', '_css_padding_top', '_css_padding_top_units'); -> Returns the string 'padding-top:10px;'.
         *   Assuming the values 10 and 'px' are set in the database via the theme customizer screen.</pre> 
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::get_padding_units() To retrieve the units setting for this padding value, e.g. 'px', 'em', 'rem' etc.
         * 
         * @used-by Lnrd_Css_Padding::get_padding_css().
         *
         * @param string $css_selector The css selector name. Legal values are: 'padding-top', 'padding-right', 'padding-bottom', 'padding-left'. See example call above.
         * @param string $padding_value_id The unique setting id for the required padding property value. Legal values are: '_css_padding_top', '_css_padding_right', '_css_padding_bottom', '_css_padding_left'. See example call above.
         * @param string $padding_unit_id The unique setting id for the required padding propertyunits. Legal values are: '_css_padding_top_units', '_css_padding_right_units', '_css_padding_bottom_units', '_css_padding_left_units' 
         *
         * @return string  The css style rule for the desired padding property.
         */
        private function get_css($css_selector, $padding_value_id, $padding_unit_id) {
            $padding_css = '';
            $units = $this->get_padding_units(get_theme_mod($this->section_id . $padding_unit_id));

            //if(get_theme_mod($this->section_id . $padding_value_id)) {

                if (is_string(get_theme_mod($this->section_id . $padding_value_id)) && strtolower(get_theme_mod($this->section_id . $padding_value_id)) == 'inherit') {
                    $padding_css .=  $css_selector . ':' . get_theme_mod($this->section_id . $padding_value_id) . ';';
                }else if (is_numeric(get_theme_mod($this->section_id . $padding_value_id))) {
                    $padding_css .=  $css_selector . ':' . get_theme_mod($this->section_id . $padding_value_id) . $units . ';'; 
                }

            //}
            return $padding_css; 
        }
        

        /**
         * Gets the css for this padding object.
         *
         * Gets all the css for the required padding properties for this padding object.
         * <pre>Example:
         *     Lets say that this padding objects instance variables are in the state below.
         *     required_padding_properties['padding_top', 'padding_bottom']
         *     padding_default_values['padding_top_default_value'] = 10
         *     padding_default_values['padding_bottom_default_value'] = 20
         *     padding_default_values['padding_top_units_default_value'] = 'px'
         *     padding_default_values['padding_bottom_units_default_value'] = '%'
         *
         *     get_padding_css() -> Will return the string 'padding-top:10px;padding-bottom:20%;'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::get_css() To get the individual padding properties css.
         *
         * @return string $css The css padding property rules for this padding object. See example above.
         *
         */
        public function get_padding_css() {
            $css = '';
            foreach ($this->required_padding_properties as $property) {
                switch($property) {
                    case 'padding_top':
                        $css .= $this->get_css('padding-top', '_css_padding_top', '_css_padding_top_units');
                        break;
                    case 'padding_right':
                        $css .= $this->get_css('padding-right', '_css_padding_right', '_css_padding_right_units');
                        break;
                    case 'padding_bottom':
                        $css .= $this->get_css('padding-bottom', '_css_padding_bottom', '_css_padding_bottom_units');
                        break;
                    case 'padding_left':
                        $css .= $this->get_css('padding-left', '_css_padding_left', '_css_padding_left_units');
                        break;
                    case 'all':
                        $css .= $this->get_css('padding-top', '_css_padding_top', '_css_padding_top_units');
                        $css .= $this->get_css('padding-right', '_css_padding_right', '_css_padding_right_units');
                        $css .= $this->get_css('padding-bottom', '_css_padding_bottom', '_css_padding_bottom_units');
                        $css .= $this->get_css('padding-left', '_css_padding_left', '_css_padding_left_units');
                        break;   
                }    
            }
            return $css;
        }

        
        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
        */ 

        /**
         * Sets the required padding value variable.
         *
         * Sets the required padding_default_values[] instance variable if the input value is
         * legal. Legal values are 'inherit', int or float.
         *<pre>Example call:
         *    set_padding_value('padding_top_default_value', 3.14) -> sets the padding_default_values['padding_top_default_value'] to the value 3.14
         *     set_padding_value('padding_top_default_value', 'inherit') -> sets the padding_default_values['padding_top_default_value'] to the value inherit</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @used-by Lnrd_Css_Padding:set_padding_top_value() To set the padding_default_values['padding_top_default_value'] to the new default value.
         * @used-by Lnrd_Css_Padding:set_padding_right_value() To set the padding_default_values['padding_right_default_value'] to the new default value.
         * @used-by Lnrd_Css_Padding:set_padding_bottom_value() To set the padding_default_values['padding_bottom_default_value'] to the new default value.
         * @used-by Lnrd_Css_Padding:set_padding_left_value() To set the padding_default_values['padding_left_default_value'] to the new default value.
         *
         * @param string $padding_property The padding property value variable to be changed. Legal values are: 'padding_top_default_value', 'padding_right_default_value', 'padding_bottom_default_value', 'padding_left_default_value'.
         * @param mixed $padding_value The new value of the desired property. Legal values are: 
         * string -> 'inherit', int or float. See example call above.
         *
         */
        private function set_padding_value($padding_property, $padding_value) {
            if (is_string($padding_value) || is_numeric($padding_value)) {
                if (is_string($padding_value) && strtolower($padding_value) == 'inherit') {
                    $this->padding_default_values[$padding_property] = strtolower($padding_value);
                } else if (is_numeric($padding_value)) {
                    $this->padding_default_values[$padding_property] = $padding_value;
                }
            }         
        }


        /**
         * Sets the required padding units variable.
         *
         * Sets the required padding_default_values[] instance variable if the input value is
         * legal. Legal values are 'px', '%', 'em', 'ex', 'ch', 'rem', 'vh', 'vw', 'vmin', 'vmax'.
         *<pre>Example call:
         *    set_padding_unit('padding_top_units_default_value', 'rem') -> sets the padding_default_values['padding_top_units_default_value'] to the value 'rem'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @used-by Lnrd_Css_Padding:set_padding_top_unit() To set the padding_default_values['padding_top_units_default_value'] to the new default value.
         *  @used-by Lnrd_Css_Padding:set_padding_right_unit() To set the padding_default_values['padding_right_units_default_value'] to the new default value.
         *   @used-by Lnrd_Css_Padding:set_padding_bottom_unit() To set the padding_default_values['padding_bottom_units_default_value'] to the new default value.
         *    @used-by Lnrd_Css_Padding:set_padding_left_unit() To set the padding_default_values['padding_left_units_default_value'] to the new default value.
         *
         * @param string $padding_property The padding property unit variable to be changed. Legal values are: 'padding_top_units_default_value', 'padding_right_units_default_value', 'padding_bottom_units_default_value', 'padding_left_units_default_value'.
         * @param string $padding_unit The new value of the desired property. Legal values are:
         * 'px', '%', 'em', 'ex', 'ch', 'rem', 'vh', 'vw', 'vmin', 'vmax'. See example call above. 
         */
        private function set_padding_unit($padding_property, $padding_unit) {
            $legal_values = array(
                'px' => 'value1',
                '%' => 'value2',
                'em' => 'value3',
                'ex' => 'value4',
                'ch' => 'value5',
                'rem' => 'value6',
                'vh' => 'value7',
                'vw' => 'value8',
                'vmin' => 'value9',
                'vmax' => 'value10',
            );
            if (array_key_exists($padding_unit, $legal_values)) {
                switch ($padding_unit) {
                    case 'px':
                        $this->padding_default_values[$padding_property] = 'value1';
                        break;
                    case '%':
                        $this->padding_default_values[$padding_property] = 'value2';
                        break;
                    case 'em':
                        $this->padding_default_values[$padding_property] = 'value3';
                        break;
                    case 'ex':
                        $this->padding_default_values[$padding_property] = 'value4';
                        break;
                    case 'ch':
                        $this->padding_default_values[$padding_property] = 'value5';
                        break;
                    case 'rem':
                        $this->padding_default_values[$padding_property] = 'value6';
                        break;
                    case 'vh':
                        $this->padding_default_values[$padding_property] = 'value7';
                        break;
                    case 'vw':
                        $this->padding_default_values[$padding_property] = 'value8';
                        break;
                    case 'vmin':
                        $this->padding_default_values[$padding_property] = 'value9';
                        break;
                    case 'vmax':
                        $this->padding_default_values[$padding_property] = 'value10';
                        break;
                }
            }
        }

        
        /**
         * Sets the padding_default_values['padding_top_default_value'] variable.
         * 
         * Sets the padding_default_values['padding_top_default_value'] instance variable
         * if the input is a legal value. Leagal values are 'inherit', int or float.
         *<pre>Example call:
         *     set_padding_top_value('inherit') -> Sets padding_default_values['padding_top_default_value'] to the value inherit.
         *      set_padding_top_value(3.14) -> Sets padding_default_values['padding_top_default_value'] to the value 3.14.
         *       set_padding_top_value('23') -> Sets padding_default_values['padding_top_default_value'] to the value 23.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::set_padding_value() To check for a legal value and set the new value.
         *
         * @param mixed $padding_top_value The required unit, inherit', int or float. See example call above. 
         */
        public function set_padding_top_value($padding_top_value) {
            if (is_string($padding_top_value) || is_numeric($padding_top_value)) {
                $this->set_padding_value('padding_top_default_value', $padding_top_value);
            }        
        }


        /**
         * Sets the padding_default_values['padding_right_default_value'] variable.
         * 
         * Sets the padding_default_values['padding_right_default_value'] instance variable
         * if the input is a legal value. Leagal values are 'inherit', int or float.
         *<pre>Example call:
         *     set_padding_right_value('inherit') -> Sets padding_default_values['padding_right_default_value'] to the value inherit.
         *      set_padding_right_value(3.14) -> Sets padding_default_values['padding_right_default_value'] to the value 3.14.
         *       set_padding_right_value('23') -> Sets padding_default_values['padding_right_default_value'] to the value 23.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::set_padding_value() To check for a legal value and set the new value.
         *
         * @param mixed $padding_right_value The required unit, inherit', int or float. See example call above. 
         */
        public function set_padding_right_value($padding_right_value) {
            if (is_string($padding_right_value) || is_numeric($padding_right_value)) {
                $this->set_padding_value('padding_right_default_value', $padding_right_value);
            }
        }     


        /**
         * Sets the padding_default_values['padding_bottom_default_value'] variable.
         * 
         * Sets the padding_default_values['padding_bottom_default_value'] instance variable
         * if the input is a legal value. Leagal values are 'inherit', int or float.
         *<pre>Example call:
         *     set_padding_bottom_value('inherit') -> Sets padding_default_values['padding_bottom_default_value'] to the value inherit.
         *      set_padding_bottom_value(3.14) -> Sets padding_default_values['padding_bottom_default_value'] to the value 3.14.
         *       set_padding_bottom_value('23') -> Sets padding_default_values['padding_bottom_default_value'] to the value 23.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::set_padding_value() To check for a legal value and set the new value.
         *
         * @param mixed $padding_bottom_value The required unit, inherit', int or float. See example call above. 
         */
        public function set_padding_bottom_value($padding_bottom_value) {
            if (is_string($padding_bottom_value) || is_numeric($padding_bottom_value)) {
                $this->set_padding_value('padding_bottom_default_value', $padding_bottom_value);
            }
        }


        /**
         * Sets the padding_default_values['padding_left_default_value'] variable.
         * 
         * Sets the padding_default_values['padding_left_default_value'] instance variable
         * if the input is a legal value. Leagal values are 'inherit', int or float.
         *<pre>Example call:
         *     set_padding_left_value('inherit') -> Sets padding_default_values['padding_left_default_value'] to the value inherit.
         *      set_padding_left_value(3.14) -> Sets padding_default_values['padding_left_default_value'] to the value 3.14.
         *       set_padding_left_value('23') -> Sets padding_default_values['padding_left_default_value'] to the value 23.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::set_padding_value() To check for a legal value and set the new value.
         *
         * @param mixed $padding_left_value The required unit, inherit', int or float. See example call above. 
         */
        public function set_padding_left_value($padding_left_value) {
            if (is_string($padding_left_value) || is_numeric($padding_left_value)) {
                $this->set_padding_value('padding_left_default_value', $padding_left_value);
            }
        }


        /**
         * Sets the padding_default_values['padding_top_units_default_value'] variable.
         * 
         * Sets the padding_default_values['padding_top_units_default_value'] instance variable
         * if the input is a legal value. Leagal values are 'px', '%', 'em', 'ex', 'ch', 'rem',
         * 'vh', 'vw', 'vmin', 'vmax'.
         *<pre>Example call:
         *    set_padding_top_unit('px') -> Sets the padding_default_values['padding_top_units_default_value'] instance variable to the value px.
         *    set_padding_top_unit('%') -> Sets the padding_default_values['padding_top_units_default_value'] instance variable to the value %.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::set_padding_unit() To check for a legal value and set the new value.
         *
         * @param string $padding_top_unit The required unit, 'px', 'em' rem' etc See example call above. 
         */
        public function set_padding_top_unit($padding_top_unit) {
            if (is_string($padding_top_unit)) {
                $this->set_padding_unit('padding_top_units_default_value', $padding_top_unit);
            }
        }


        /**
         * Sets the padding_default_values['padding_right_units_default_value'] variable.
         * 
         * Sets the padding_default_values['padding_right_units_default_value'] instance variable
         * if the input is a legal value. Leagal values are 'px', '%', 'em', 'ex', 'ch', 'rem',
         * 'vh', 'vw', 'vmin', 'vmax'.
         *<pre>Example call:
         *    set_padding_right_unit('px') -> Sets the padding_default_values['padding_right_units_default_value'] instance variable to the value px.
         *    set_padding_right_unit('%') -> Sets the padding_default_values['padding_right_units_default_value'] instance variable to the value %.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::set_padding_unit() To check for a legal value and set the new value.
         *
         * @param string $padding_right_unit The required unit, 'px', 'em' rem' etc. See example call above. 
         */
        public function set_padding_right_unit($padding_right_unit) {
            if (is_string($padding_right_unit)) {
                $this->set_padding_unit('padding_right_units_default_value', $padding_right_unit);
            }
        }


        /**
         * Sets the padding_default_values['padding_bottom_units_default_value'] variable.
         * 
         * Sets the padding_default_values['padding_bottom_units_default_value'] instance variable
         * if the input is a legal value. Leagal values are 'px', '%', 'em', 'ex', 'ch', 'rem',
         * 'vh', 'vw', 'vmin', 'vmax'.
         *<pre>Example call:
         *    set_padding_bottom_unit('px') -> Sets the padding_default_values['padding_bottom_units_default_value'] instance variable to the value px.
         *    set_padding_bottom_unit('%') -> Sets the padding_default_values['padding_bottom_units_default_value'] instance variable to the value %.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::set_padding_unit() To check for a legal value and set the new value.
         *
         * @param string $padding_bottom_unit The required unit, 'px', 'em' rem' etc. See example call above. 
         */
        public function set_padding_bottom_unit($padding_bottom_unit) {
            if (is_string($padding_bottom_unit)) {
                $this->set_padding_unit('padding_bottom_units_default_value', $padding_bottom_unit);
            }
        }


        /**
         * Sets the padding_default_values['padding_left_units_default_value'] variable.
         * 
         * Sets the padding_default_values['padding_left_units_default_value'] instance variable
         * if the input is a legal value. Leagal values are 'px', '%', 'em', 'ex', 'ch', 'rem',
         * 'vh', 'vw', 'vmin', 'vmax'.
         *<pre>Example call:
         *    set_padding_left_unit('px') -> Sets the padding_default_values['padding_left_units_default_value'] instance variable to the value px.
         *    set_padding_left_unit('%') -> Sets the padding_default_values['padding_left_units_default_value'] instance variable to the value %.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @uses Lnrd_Css_Padding::set_padding_unit() To check for a legal value and set the new value.
         *
         * @param string $padding_left_unit The required unit, 'px', 'em' rem' etc. See example call above. 
         */
        public function set_padding_left_unit($padding_left_unit) {
            if (is_string($padding_left_unit)) {
                $this->set_padding_unit('padding_left_units_default_value', $padding_left_unit);
            }
        }

       
        /**
         * Checks the users input for a valid css padding value.
         *
         * Checks the user input coming in from the theme customizer padding value input boxes.
         * If the value is legal then we can allow the value to be saved to the database. Legal
         * values: 'inherit', int, float.
         *<pre>Example call:
         *    set_sanitized_padding_value_input(23) -> 23 is a legal value so the theme customizer screen updates.
         *    set_sanitized_padding_value_input(3.14) -> 3.14 is a legal value so the theme customizer screen updates.
         *    set_sanitized_padding_value_input('inherit') -> inherit is a legal value so the theme customizer screen updates.
         *    set_sanitized_padding_value_input('foo') -> foo is not a legal value so the theme customizer screen does not update.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @used-by Lnrd_Css_Padding:get_padding_top() To check the user input for the padding top value.
         * @used-by Lnrd_Css_Padding:get_padding_right() To check the user input for the padding right value.
         * @used-by Lnrd_Css_Padding:get_padding_bottom() To check the user input for the padding bottom value.
         * @used-by Lnrd_Css_Padding:get_padding_left() To check the user input for the padding left value.
         *
         * @param string $input The padding value to be checked. See example call above. 
         *
         * @return int|string The new padding value if it is a legal value.
         */
        public function set_sanitized_padding_value_input($input) {
            if (strtolower($input) == 'inherit' || is_numeric($input)) {
                if (strtolower($input) == 'inherit') {
                    $input = strtolower($input);    
                }
                return $input;
            }  
        }


        /**
         * Checks the users input for a valid css padding unit value.
         *
         * Checks the user input coming in from the theme customizer padding unit value select boxes.
         * If the value is legal then we can allow the value to be saved to the database. Legal
         * values: 'px', '%', 'em', 'ex', 'ch', 'rem', 'vh', 'vw', 'vmin', 'vmax'.
         *<pre>Example call:
         *    set_sanitized_padding_unit_input('px') -> px is a legal value so the theme customizer screen updates.
         *    set_sanitized_padding_unit_input('vmin') ->vmin is a legal value so the theme customizer screen updates.
         *    set_sanitized_padding_unit_input('foo') -> foo is not a legal value so the theme customizer screen does not update.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @used-by Lnrd_Css_Padding:get_padding_top() To check the user input for the padding top unit value.
         * @used-by Lnrd_Css_Padding:get_padding_right() To check the user input for the padding right unit value.
         * @used-by Lnrd_Css_Padding:get_padding_bottom() To check the user input for the padding bottom unit value.
         * @used-by Lnrd_Css_Padding:get_padding_left() To check the user input for the padding left unit value.
         *
         * @param string $input The padding unit value to be checked. See example call above. 
         *
         * @return string The new padding value if it is a legal value. 
         */
        public function set_sanitized_padding_unit_input($input) {
            $legal_values = array(
                'value1' => 'px',
                'value2' => '%',
                'value3' => 'em',
                'value4' => 'ex',
                'value5' => 'ch',
                'value6' => 'rem',
                'value7' => 'vh',
                'value8' => 'vw',
                'value9' => 'vmin',
                'value10' => 'vmax',
            );

            if (array_key_exists($input, $legal_values)) {
                return $input;       
            }   
        }
         
    } // END Lnrd_Css_Padding class.
?>


