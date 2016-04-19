<?php
    class Lnrd_Css_Border_Radius extends Lnrd_Customizer_Base {
        /* ***************************************************************
         * Instance Variables
         * **************************************************************/
        /**
         * @var string $section_id The name of the Lnrd_Css_Section object
         * that this Lnrd_Css_Border_Radius object will be linked to.
         */
        private $section_id;

        /**
         * @var mixed[] $border_radius_default_values The default values for the
         * css border radius properties.
         */
        private $border_radius_default_values;

        /**
         * @var string[] $required_border_radius_properties The required css
         * border radius properties to render. Expected values -> 'all',
         * 'border_top_left_radius', 'border_top_right_radius',
         * 'border_bottom_left_radius', 'border_bottom_right_radius'. 
         */
        private $required_border_radius_properties;

        /**
         * @var string[] $legal_radius_units The legal css length/percentage
         * values for the border radius property. Legal values are: 'px',
         * 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', 'pc', '%'.
         */
        private $legal_radius_units;



        /**
         * Creates a new border radius object.
         * Creates a new border radius object for the calling Lnrd_Css_Section object.
         *<pre>Example call:
         *    new Lnrd_Css_Border_Radius('post_text', array('all'));
         *    new Lnrd_Css_Border_Radius('post_text', array('border_top_left_radius', 'border_top_right_radius'));</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::get_css_property_objs() To create a new
         * border radius object for the calling Lnrd_Css_Section.
         *
         * @param string $section_id The unique id for the calling Lnrd_css_Section object.
         * @param string[] $required_border_radius_properties The required border
         * radius properties to render. Legal values are: 'all', 'border_top_left_radius',
         * 'border_top_right_radius', 'border_bottom_left_radius', 'border_bottom_right_radius'.
         *
         * @return self
         */
        function __construct($section_id, $required_border_radius_properties) {
            $this->section_id = $section_id;
            $this->required_border_radius_properties = $required_border_radius_properties;
            $this->border_radius_default_values = array(
                'border_top_left_radius' => 0,
                'border_top_right_radius' => 0,
                'border_bottom_left_radius' => 0,
                'border_bottom_right_radius' => 0,
                'border_top_left_radius_units' => 'value1',// value1 = 'px'
                'border_top_right_radius_units' => 'value1',// value1 = 'px'
                'border_bottom_left_radius_units' => 'value1',// value1 = 'px'
                'border_bottom_right_radius_units' => 'value1',// value1 = 'px'
            );
           
            $this->legal_radius_units = array(
                'px', 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', 'pc', '%'
            );
        } // CHECKED.


        /* ***************************************************************
         * Getters
         * **************************************************************/
        /**
         * Gets the unique section id.
         *
         * Gets the unique section id of the Lnrd_Css_Section object to which this
         * Lnrd_Css_Border_radius object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which
         * this Lnrd_Css_Border_radius object is associated with. 
         */
        public function get_section_id() {
            return $this->section_id;
        }


        /**
         * Gets the required css border radius properties.
         *
         * Gets the names of the required border radius properties that were
         * requested by the Lnrd_Css_Section object to which this
         * Lnrd_Css_Border_Radius object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return string[] The names of the border radius properties that this
         * object has rendered.
         */
        public function get_required_border_radius_properties() {
            return $this->required_border_radius_properties;
        }


        /**
         * Gets the border radius properties default values.
         *
         * Gets the default values of the border radius properties for this
         * Lnrd_Css_Border_Radius object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return (int/string)[] The default values for the border radius
         * properties for this Lnrd_Css_Border object.
         */
        public function get_border_radius_default_values() {
            return $this->border_radius_default_values;
        }

        /**
         *
         */
        public function get_border_radius_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_border_radius_properties as $property) {
                    switch ($property) {
                        case "border-top-left-radius":
                            $this->get_border_top_left_radius($wp_customize);
                            break;
                        case "border-top-right-radius":
                            $this->get_border_top_right_radius($wp_customize);
                            break;
                        case "border-bottom-left-radius":
                            $this->get_border_bottom_left_radius($wp_customize);
                            break;
                        case "border-bottom-right-radius":
                            $this->get_border_bottom_right_radius($wp_customize);
                            break;
                        case "all":
                            $this->get_border_top_left_radius($wp_customize);
                            $this->get_border_top_right_radius($wp_customize);
                            $this->get_border_bottom_left_radius($wp_customize);
                            $this->get_border_bottom_right_radius($wp_customize);
                            break;
                    } // END switch statement.   
                } // END foreach statement.
            } // END if statement.    
        }


        /**
         *
         */
        private function get_border_size_units($border_value) {
            $border_unit = $this->select_value_to_css_percentage($border_value);
            return $border_unit;
        }


        /**
         * TODO
         */
        public function get_border_radius_css() {
            $css = '';
            
            foreach ($this->required_border_radius_properties as $property) {
                switch ($property) {
                    case 'border-top-left-radius':
                        $css .= 'border-top-left-radius:' . get_theme_mod($this->section_id . '_css_border_top_left_radius') . $this->get_border_size_units(get_theme_mod($this->section_id . '_css_border_top_left_radius_units')) . ';';
                        break;
                    case 'border-top-right-radius':
                        $css .= 'border-top-right-radius:' . get_theme_mod($this->section_id . '_css_border_top_right_radius') . $this->get_border_size_units(get_theme_mod($this->section_id . '_css_border_top_right_radius_units')) . ';';
                        break;
                    case 'border-bottom-left-radius':
                        $css .= 'border-bottom-left-radius:' . get_theme_mod($this->section_id . '_css_border_bottom_left_radius') . $this->get_border_size_units(get_theme_mod($this->section_id . '_css_border_bottom_left_radius_units')) . ';';
                        break;
                    case 'border-bottom-right-radius':
                        $css .= 'border-bottom-right-radius:'. get_theme_mod($this->section_id . '_css_border_bottom_right_radius') . $this->get_border_size_units(get_theme_mod($this->section_id . '_css_border_bottom_right_radius_units')) . ';';
                        break;
                    case 'all':
                        $css .= 'border-top-left-radius:' . get_theme_mod($this->section_id . '_css_border_top_left_radius') . $this->get_border_size_units(get_theme_mod($this->section_id . '_css_border_top_left_radius_units')) . ';';
                        $css .= 'border-top-right-radius:' . get_theme_mod($this->section_id . '_css_border_top_right_radius') . $this->get_border_size_units(get_theme_mod($this->section_id . '_css_border_top_right_radius_units')) . ';';
                        $css .= 'border-bottom-left-radius:' . get_theme_mod($this->section_id . '_css_border_bottom_left_radius') . $this->get_border_size_units(get_theme_mod($this->section_id . '_css_border_bottom_left_radius_units')) . ';';
                        $css .= 'border-bottom-right-radius:'. get_theme_mod($this->section_id . '_css_border_bottom_right_radius') . $this->get_border_size_units(get_theme_mod($this->section_id . '_css_border_bottom_right_radius_units')) . ';';
                        break;
                } // END switch statement.
            } // END foreach statement.
            
            return $css;
        }


        /**
         *
         */
        private function get_border_radius($manager, $id, $default, $sanitize, $label, $priority) {
            $this->get_setting(
                $manager,
                $this->section_id . $id[0],
                $default[0],
                $sanitize[0]
            );
            
            $this->get_input_control(
                $manager,
                $this->section_id . $id[0],
                $label[0],
                $this->section_id,
                $priority[0]
            );

            $this->get_setting(
                $manager,
                $this->section_id . $id[1],
                $default[1],
                $sanitize[1]
            );

            $this->get_select_control_css_percentage(
                $manager,
                $this->section_id . $id[1],
                $label[1],
                $this->section_id,
                $priority[1]
            );
        }


        /**
         *
         */
        private function get_border_top_left_radius($wp_customize) {
            $this->get_border_radius(
                $wp_customize,
                array('_css_border_top_left_radius', '_css_border_top_left_radius_units'),
                array($this->border_radius_default_values['border_top_left_radius'], $this->border_radius_default_values['border_top_left_radius_units']),
                array('sanitize_border_radius_input', 'sanitize_border_radius_unit'),
                array('Border top left radius', ''),
                array(34, 35)
            );
        }


        /**
         *
         */
        private function get_border_top_right_radius($wp_customize) {
            $this->get_border_radius(
                $wp_customize,
                array('_css_border_top_right_radius', '_css_border_top_right_radius_units'),
                array($this->border_radius_default_values['border_top_right_radius'], $this->border_radius_default_values['border_top_right_radius_units']),
                array('sanitize_border_radius_input', 'sanitize_border_radius_unit'),
                array('Border top right radius', ''),
                array(36, 37)
            );
        }


        /**
         *
         */
        private function get_border_bottom_left_radius($wp_customize) {
            $this->get_border_radius(
                $wp_customize,
                array('_css_border_bottom_left_radius', '_css_border_bottom_left_radius_units'),
                array($this->border_radius_default_values['border_bottom_left_radius'], $this->border_radius_default_values['border_bottom_left_radius_units']),
                array('sanitize_border_radius_input', 'sanitize_border_radius_unit'),
                array('Border bottom left radius', ''),
                array(38, 39)
            );
        }


        /**
         *
         */
        private function get_border_bottom_right_radius($wp_customize) {
            $this->get_border_radius(
                $wp_customize,
                array('_css_border_bottom_right_radius', '_css_border_bottom_right_radius_units'),
                array($this->border_radius_default_values['border_bottom_right_radius'], $this->border_radius_default_values['border_bottom_right_radius_units']),
                array('sanitize_border_radius_input', 'sanitize_border_radius_unit'),
                array('Border bottom right radius', ''),
                array(40, 41)
            );
        }

        /* ***************************************************************
         * Setters
         * **************************************************************/

        /* ***************************************************************
         * Sanitizers
         * **************************************************************/
        /**
         * 
         */
        public function sanitize_border_radius_input($border_radius_input) {
            if (is_numeric($border_radius_input)) {
                return $border_radius_input;
            }
        }


        /**
         * 
         */
        public function sanitize_border_radius_unit($radius_unit_input) {
            $legal_values = array(
                'value1' => 'px',
                'value2' => '%',
                'value3' => 'em',
                'value4' => 'ex',
                'value5' => 'rem',
                'value6' => 'cm',
                'value7' => 'mm',
                'value8' => 'in',
                'value9' => 'pt',
                'value10' => 'pc',    
            );

            if (array_key_exists($radius_unit_input, $legal_values)) {
                return $radius_unit_input;
            }     
        }
        /* ***************************************************************
         * Helpers
         * **************************************************************/
    } // END Lnrd_Css_Border_Radius class.
?>
