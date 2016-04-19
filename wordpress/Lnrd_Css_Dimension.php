<?php
    class Lnrd_Css_Dimension extends Lnrd_Customizer_Base {
        /* ***************************************************************
         * Instance variables
         * **************************************************************/
        /**
         * @var string $section_id The name of the Lnrd_Css_Section object
         * that this Lnrd_Css_Dimension object will be linked to.
         */
        private $section_id;

        /**
         * @var mixed[] $dimension_default_values The default values for the
         * css dimension properties.
         */
        private $dimension_default_values;

        /**
         * @var string[] $required_dimension_properties The required css
         * dimension properties to render. Expected values -> 'all',
         * 'height', 'width', 'max-height', 'max-width', 'min-height', 'min-width'. 
         */
        private $required_dimension_properties;

        
        /* ***************************************************************
         * Constructor
         * **************************************************************/
        /**
         *
         */
        function __construct($section_id, $required_dimension_properties) {
            $this->section_id = $section_id;
            $this->required_dimension_properties = $required_dimension_properties;
            $this->dimension_default_values = array(
                'height' => 'auto',
                'width' => 'auto',
                'max_height' => 'none',
                'max_width' => 'none',
                'min_height' => 0,
                'min_width' => 0,
                'height_units' => 'value1',// value1 = 'px'
                'width_units' => 'value1',// value1 = 'px'
                'max_height_units' => 'value1',// value1 = 'px'
                'max_width_units' => 'value1',// value1 = 'px'
                'min_height_units' => 'value1',// value1 = 'px'
                'min_width_units' => 'value1',// value1 = 'px'
            );
        }


        /* ***************************************************************
         * Getters
         * **************************************************************/
        /**
         * Gets the unique section id.
         *
         * Gets the unique section id of the Lnrd_Css_Section object to which this
         * Lnrd_Css_Dimension object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which
         * this Lnrd_Css_Dimension object is associated with. 
         */
        public function get_section_id() {
            return $this->section_id;
        }


        /**
         * Gets the required css dimension properties.
         *
         * Gets the names of the required dimension properties that were
         * requested by the Lnrd_Css_Section object to which this Lnrd_Css_Dimension
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return string[] The names of the border properties that this
         * object has rendered.
         */
        public function get_required_dimension_properties() {
            return $this->required_dimension_properties;
        }


        /**
         * Gets the dimension properties default values.
         *
         * Gets the default values of the dimension properties for this
         * Lnrd_Css_Dimension object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0
         *
         * @return (int/string)[] The default values for the dimension
         * properties for this Lnrd_Css_Dimension object.
         */
        public function get_dimension_default_values() {
            return $this->dimension_default_values;
        }

        /**
         *
         */
        public function get_dimension_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_dimension_properties as $property) {
                    switch ($property) {
                        case "height":
                            $this->get_dimension_height($wp_customize);
                            break;
                        case "width":
                            $this->get_dimension_width($wp_customize);
                            break;
                        case "max-height":
                            $this->get_dimension_max_height($wp_customize);
                            break;
                        case "max-width":
                            $this->get_dimension_max_width($wp_customize);
                            break;
                        case "min-height":
                            $this->get_dimension_min_height($wp_customize);
                            break;
                        case "min-width":
                            $this->get_dimension_min_width($wp_customize);
                            break;
                        case "all":
                            $this->get_dimension_height($wp_customize);
                            $this->get_dimension_width($wp_customize);
                            $this->get_dimension_max_height($wp_customize);
                            $this->get_dimension_max_width($wp_customize);
                            $this->get_dimension_min_height($wp_customize);
                            $this->get_dimension_min_width($wp_customize);
                            break;     
                    } // END switch statement.   
                } // END foreach statement.
            } // END if statement.    
        }

        /**
         * TODO
         */
        public function get_dimension_css() {
            $css = '';

            foreach ($this->required_dimension_properties as $property) {
                switch ($property) {
                    case 'height':
                        $css .= $this->get_css('height');
                        break;
                    case 'width':
                        $css .= $this->get_css('width');
                        break;
                    case 'max-height':
                        $css .= $this->get_css('max-height');
                        break;
                    case 'max-width':
                        $css .= $this->get_css('max-width');
                        break;
                    case 'min-height':
                        $css .= 'min-height:' . get_theme_mod($this->section_id . '_css_dimension_min_height') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_dimension_min_height_units')) . ';';
                        break;
                    case 'min-width':
                        $css .= 'min-width:' . get_theme_mod($this->section_id . '_css_dimension_min_width') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_dimension_min_width_units')) . ';';
                        break;
                    case 'all':
                        $css .= $this->get_css('height');
                        $css .= $this->get_css('width');
                        $css .= $this->get_css('max-height');
                        $css .= $this->get_css('max-width');
                        $css .= 'min-height:' . get_theme_mod($this->section_id . '_css_dimension_min_height') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_dimension_min_height_units')) . ';';
                        $css .= 'min-width:' . get_theme_mod($this->section_id . '_css_dimension_min_width') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_dimension_min_width_units')) . ';';
                        break;
                }
            }
            return $css;
        }


        /**
         *
         */
        private function get_dimension_property($manager, $id, $default, $sanitize, $label, $priority) {
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
        private function get_dimension_height($wp_customize) {
            $this->get_dimension_property(
                $wp_customize,
                array('_css_dimension_height', '_css_dimension_height_units'),
                array($this->dimension_default_values['height'], $this->dimension_default_values['height_units']),
                array('sanitize_height_width_input', 'sanitize_height_width_unit'),
                array('Height', ''),
                array(46, 47)
            );
        }


         /**
         *
         */
        private function get_dimension_width($wp_customize) {
            $this->get_dimension_property(
                $wp_customize,
                array('_css_dimension_width', '_css_dimension_width_units'),
                array($this->dimension_default_values['width'], $this->dimension_default_values['width_units']),
                array('sanitize_height_width_input', 'sanitize_height_width_unit'),
                array('Width', ''),
                array(52, 53)
            );
        }


        /**
         *
         */
        private function get_dimension_max_height($wp_customize) {
            $this->get_dimension_property(
                $wp_customize,
                array('_css_dimension_max_height', '_css_dimension_max_height_units'),
                array($this->dimension_default_values['max_height'], $this->dimension_default_values['max_height_units']),
                array('sanitize_max_height_width_input', 'sanitize_max_height_width_unit'),
                array('Max height', ''),
                array(44, 45)
            );
        }


        /**
         *
         */
        private function get_dimension_max_width($wp_customize) {
            $this->get_dimension_property(
                $wp_customize,
                array('_css_dimension_max_width', '_css_dimension_max_width_units'),
                array($this->dimension_default_values['max_width'], $this->dimension_default_values['max_width_units']),
                array('sanitize_max_height_width_input', 'sanitize_max_height_width_unit'),
                array('Max width', ''),
                array(50, 51)
            );
        }


        /**
         *
         */
        private function get_dimension_min_height($wp_customize) {
            $this->get_dimension_property(
                $wp_customize,
                array('_css_dimension_min_height', '_css_dimension_min_height_units'),
                array($this->dimension_default_values['min_height'], $this->dimension_default_values['min_height_units']),
                array('sanitize_min_height_width_input', 'sanitize_min_height_width_unit'),
                array('Min height', ''),
                array(42, 43)
            );
        }


        /**
         *
         */
        private function get_dimension_min_width($wp_customize) {
            $this->get_dimension_property(
                $wp_customize,
                array('_css_dimension_min_width', '_css_dimension_min_width_units'),
                array($this->dimension_default_values['min_width'], $this->dimension_default_values['min_width_units']),
                array('sanitize_min_height_width_input', 'sanitize_min_height_width_unit'),
                array('Min width', ''),
                array(48, 49)
            );
        }


        /* ***************************************************************
         * Setters
         * **************************************************************/

        /* ***************************************************************
         * Sanitizers
         * **************************************************************/
        /**
         * TODO
         */
        public function sanitize_height_width_input($height_width_input) {
            $legal_values = array('auto', 'inherit');
            if (in_array(strtolower($height_width_input), $legal_values)) {
                return strtolower($height_width_input);
            } else if (is_numeric($height_width_input)) {
                return $height_width_input;
            }
        }


        /**
         * TODO
         */
        public function sanitize_height_width_unit($height_width_unit) {
            return $height_width_unit; 
        }


        /**
         * TODO
         */
        public function sanitize_max_height_width_input($max_height_width_input) {
            $legal_values = array('none', 'inherit');
            if (in_array(strtolower($max_height_width_input), $legal_values)) {
                return strtolower($max_height_width_input);
            } else if (is_numeric($max_height_width_input)) {
                return $max_height_width_input;
            } 
        }


        /**
         * TODO
         */
        public function sanitize_max_height_width_unit($max_height_width_unit) {
            return $max_height_width_unit; 
        }


         /**
         * TODO
         */
        public function sanitize_min_height_width_input($min_height_width_input) {
            if (strtolower($min_height_width_input) == 'inherit') {
                return strtolower($min_height_width_input);
            } else if (is_numeric($min_height_width_input)) {
                return $min_height_width_input;
            }
        }


        /**
         * TODO
         */
        public function sanitize_min_height_width_unit($min_height_width_unit) {
            return $min_height_width_unit; 
        }


        /* ***************************************************************
         * Helpers
         * **************************************************************/
        /**
         *
         */
        private function get_css($dimention_property) {
            $css = '';
            switch ($dimention_property) {
                case 'height':
                    if (is_numeric(get_theme_mod($this->section_id . '_css_dimension_height'))) {
                        $css .= 'height:' . get_theme_mod($this->section_id . '_css_dimension_height') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_dimension_height_units')) . ';';
                    } else {
                        $css .= 'height:' . get_theme_mod($this->section_id . '_css_dimension_height') .';';
                    }
                    break;
                case 'width':
                    if (is_numeric(get_theme_mod($this->section_id . '_css_dimension_width'))) {
                        $css .= 'width:' . get_theme_mod($this->section_id . '_css_dimension_width') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_dimension_width_units')) . ';';
                    } else {
                        $css .= 'width:' . get_theme_mod($this->section_id . '_css_dimension_width') .';';
                    }
                    break;
                case 'max-height':
                    if (is_numeric(get_theme_mod($this->section_id . '_css_dimension_max_height'))) {
                        $css .= 'max-height:' . get_theme_mod($this->section_id . '_css_dimension_max_height') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_dimension_max_height_units')) . ';';
                    } else {
                        $css .= 'max-height:' . get_theme_mod($this->section_id . '_css_dimension_max_height') .';';
                    }
                    break;
                 case 'max-width':
                    if (is_numeric(get_theme_mod($this->section_id . '_css_dimension_max_width'))) {
                        $css .= 'max-width:' . get_theme_mod($this->section_id . '_css_dimension_max_width') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_dimension_max_width_units')) . ';';
                    } else {
                        $css .= 'max-width:' . get_theme_mod($this->section_id . '_css_dimension_max_width') .';';
                    }
                    break;
        }
        return $css;
        }
    } // END Lnrd_Css_Dimension class.
?>
