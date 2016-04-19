<?php
    class Lnrd_Css_Position extends Lnrd_Customizer_Base {
        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE VARIABLES
         * --------------------------------------------------------------------------------
         */

        /**
         * @var string $section_id The name of the Lnrd_Css_Section object
         * that this Lnrd_Css_Border object will be linked to.
         */
        private $section_id;

        /**
         * @var mixed[] $position_default_values The default values for the
         * css position properties.
         */
        private $position_default_values;

        /**
         * @var string[] $required_position_properties The required css
         * position properties to render. Expected values -> 'bottom',
         * 'clear', 'clip', 'cursor', 'display', 'float', 'left',
         * 'overflow', 'position', 'right', 'top', 'visibility'
         * or 'z-index'. 
         */
        private $required_position_properties;

        /**
         * TODO
         */
        private $default_clear_values;

        /**
         * TODO
         */
        private $default_display_values;

        /**
         * TODO
         */
        private $default_float_values;

        /**
         * TODO
         */
        private $default_overflow_values;

        /**
         * TODO
         */
        private $default_visibility_values;


        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE METHODS
         * --------------------------------------------------------------------------------
         */


        /**
         * Creates a new css border object.
         *
         * Creates a new instance of the Lnrd_Css_Border class. Sets the $section_id instance variable to the desired value, sets the $required_border_properties to the desired value and sets the $border_default_values instance variable to the correct css border standard default values.
         *<pre>Example call:
         *    new Lnrd_Css_Border('post_text', array('border-top','border-right','border-bottom')); -> creates a new css border object and sets the $section_id instance variable to the value 'post_text' and sets the $required_border_properties instance variable with the values 'border-top', 'border-right', 'border-bottom'.
         *    new Lnrd_Css_Border('post_text', array('all')); -> creates a new css border object that will render all of the border css properties.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::get_css_property_objs() To create a new Lnrd_Css_Border object for the calling Lnrd_Css_Section.
         *
         * @param string $section_id The unique section id(name) of the calling Lnrd_Css_Section object.
         * @param string[] $required_border_properties The required css border properties to render within the WordPress theme customizer page.
         *
         * @return self
         */
        function __construct($section_id, $required_position_properties) {
            $this->section_id = $section_id;
            $this->required_position_properties = $required_position_properties;
            $this->position_default_values = array(
                'bottom' => 'auto',
                'clear' => 'value4',
                'clip' => 'value2',
                'cursor' => 'value3',
                'display' => 'value1',
                'float' => 'value3',
                'left' => 'auto',
                'overflow' => 'value1',
                'position' => 'value1',
                'right' => 'auto',
                'top' => 'auto',
                'visibility' => 'value1',
                'z-index' => 'auto',
            );

            $this->default_clear_values = array(
                'value1' => 'left',
                'value2' => 'right',
                'value3' => 'both',
                'value4' => 'none',
                'value5' => 'inherit',
            );

            $this->default_display_values = array(
                'value1' => 'inline',
                'value2' => 'block',
                'value3' => 'inline-block',
                'value4' => 'inline-table',
                'value5' => 'list-item',
                'value6' => 'run-in',
                'value7' => 'table',
                'value8' => 'table-caption',
                'value9' => 'table-column-group',
                'value10' => 'table-header-group',
                'value11' => 'table-footer-group',
                'value12' => 'table-row-group',
                'value13' => 'table-cell',
                'value14' => 'table-column',
                'value15' => 'table-row',
                'value16' => 'none',
                'value17' => 'inherit',
            );

            $this->default_float_values = array(
                'value1' => 'left',
                'value2' => 'right',
                'value3' => 'none',
                'value4' => 'inherit'
            );

            $this->default_overflow_values = array(
                'value1' => 'visible',
                'value2' => 'hidden',
                'value3' => 'scroll',
                'value4' => 'auto',
                'value5' => 'inherit'
            );

            $this->default_visibility_values = array(
                'value1' => 'visible',
                'value2' => 'hidden',
                'value3' => 'collapse',
                'value4' => 'inherit',
            );
            
            //$this->set_z_index(22.87665537399827772665543638989900);    
        }


        /* 
         * --------------------------------------------------------------------------------
         * GETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Gets the unique section id.
         *
         * Gets the unique section id of the Lnrd_Css_Section object to which this
         * Lnrd_Css_Position object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which
         * this Lnrd_Css_Position object is associated with. 
         */
        public function get_section_id() {
            return $this->section_id;
        } // CHECKED.


        /**
         * Gets the required css position properties.
         *
         * Gets the names of the required position properties that were
         * requested by the Lnrd_Css_Section object to which this Lnrd_Css_Position
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string[] The names of the position properties that this position
         * object has rendered.
         */
        public function get_required_position_properties() {
            return $this->required_position_properties;
        } // CHECKED.


        /**
         * Gets the position properties default values.
         *
         * Gets the default values of the position properties for this
         * Lnrd_Css_Position object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return mixed[] The default values for the position
         * properties for this Lnrd_Css_Position object.
         */
        public function get_position_default_values() {
            return $this->position_default_values;
        } // CHECKED.



        /**
         * TODO
         */
        public function get_position_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_position_properties as $property) {
                    switch ($property) {
                        case 'clear':
                            $this->get_clear($wp_customize);
                            break;
                         case 'display':
                             $this->get_display($wp_customize);
                             break;
                         case 'float':
                             $this->get_float($wp_customize);
                             break;
                         case 'overflow':
                             $this->get_overflow($wp_customize);
                             break;
                         case 'visibility':
                             $this->get_visibility($wp_customize);
                             break;
                         case 'z-index':
                             $this->get_z_index($wp_customize);
                             break;
                        case 'all':
                            $this->get_clear($wp_customize);
                            $this->get_display($wp_customize);
                            $this->get_float($wp_customize);
                            $this->get_overflow($wp_customize);
                            $this->get_visibility($wp_customize);
                            $this->get_z_index($wp_customize);
                            break;
                    } // END switch statement.
                } // END foreach statement.
            } // END if statement.
        }


        /**
         * TODO
         */
        private function get_clear_css() {
            $css = '';
            $clear_css = '';
        
            switch (strtolower(get_theme_mod($this->section_id . '_css_position_clear'))) {
                case 'value1':
                    $clear_css .= 'left';
                    break;
                case 'value2':
                    $clear_css .= 'right';
                    break;
                case 'value3':
                    $clear_css .= 'both';
                    break;
                case 'value4':
                    $clear_css .= 'none';
                    break;
                case 'value5':
                    $clear_css .= 'inherit';
                    break;
            } // END switch statement.
  
            $css = 'clear:' . $clear_css . ';';
            if ($css) return $css;
        }


        /**
         * TODO
         */
        private function get_display_css() {
            $css = '';
            $display_css = '';
            
            switch (strtolower(get_theme_mod($this->section_id . '_css_position_display'))) {
                case 'value1':
                    $display_css .= 'inline';
                    break;
                case 'value2':
                    $display_css .= 'block';
                    break;
                case 'value3':
                    $display_css .= 'inline-block';
                    break;
                case 'value4':
                    $display_css .= 'inline-table';
                    break;
                case 'value5':
                    $display_css .= 'list-item';
                    break;
                case 'value6':
                    $display_css .= 'run-in';
                    break;
                case 'value7':
                    $display_css .= 'table';
                    break;
                case 'value8':
                    $display_css .= 'table-caption';
                    break;
                case 'value9':
                    $display_css .= 'table-column-group';
                    break;
                case 'value10':
                    $display_css .= 'table-header-group';
                    break;
                case 'value11':
                    $display_css .= 'table-footer-group';
                    break;
                case 'value12':
                    $display_css .= 'table-row-group';
                    break;
                case 'value13':
                    $display_css .= 'table-cell';
                    break;
                case 'value14':
                    $display_css .= 'table-column';
                    break;
                case 'value15':
                    $display_css .= 'table-row';
                    break;
                case 'value16':
                    $display_css .= 'none';
                    break;
                case 'value17':
                    $display_css .= 'inherit';
                    break;
            } // END switch statement.
            
            $css = 'display:' . $display_css . ';';
            if ($css) return $css;
        }


        /**
         * TODO
         */
        private function get_float_css() {
            $css = '';
            $float_css = '';
            
            switch (strtolower(get_theme_mod($this->section_id . '_css_position_float'))) {
                case 'value1':
                    $float_css .= 'left';
                    break;
                case 'value2':
                    $float_css .= 'right';
                    break;
                case 'value3':
                    $float_css .= 'none';
                    break;
                case 'value4':
                    $float_css .= 'inherit';
                    break;
            } // END switch statement.
            
            $css = 'float:' . $float_css . ';';
            if ($css) return $css;
        }


        /**
         * TODO
         */
        private function get_overflow_css() {
            $css = '';
            $overflow_css = '';
        
            switch (strtolower(get_theme_mod($this->section_id . '_css_position_overflow'))) {
                case 'value1':
                    $overflow_css .= 'visible';
                    break;
                case 'value2':
                    $overflow_css .= 'hidden';
                    break;
                case 'value3':
                    $overflow_css .= 'scroll';
                    break;
                case 'value4':
                    $overflow_css .= 'auto';
                    break;
                case 'value5':
                    $overflow_css .= 'inherit';
                    break;
            } // END switch statement.
  
            $css = 'overflow:' . $overflow_css . ';';
            if ($css) return $css;
        }


        /**
         * TODO
         */
        private function get_visibility_css() {
            $css = '';
            $visibility_css = '';
        
            switch (strtolower(get_theme_mod($this->section_id . '_css_position_visibility'))) {
                case 'value1':
                    $visibility_css .= 'visible';
                    break;
                case 'value2':
                    $visibility_css .= 'hidden';
                    break;
                case 'value3':
                    $visibility_css .= 'collapse';
                    break;
                case 'value4':
                    $visibility_css .= 'inherit';
                    break;
            } // END switch statement.
  
            $css = 'visibility:' . $visibility_css . ';';
            if ($css) return $css;
        }


        /**
         * TODO
         */
        private function get_z_index_css() {
            $css = '';
            if (strtolower(get_theme_mod($this->section_id . '_css_position_z_index')) == 'auto' || strtolower(get_theme_mod($this->section_id . '_css_position_z_index')) == 'inherit') {
                $css .= 'z-index:' . strtolower(get_theme_mod($this->section_id . '_css_position_z_index')) . ';';
            } else if (is_numeric(get_theme_mod($this->section_id . '_css_position_z_index'))) {
                $css .= 'z-index:' . get_theme_mod($this->section_id . '_css_position_z_index') . ';';
            }
            return $css;
        }

        
        /**
         * TODO
         */
        public function get_position_css() {
            $css = '';

            foreach ($this->required_position_properties as $property) {
                switch ($property) {
                    case 'clear':
                        $css .= $this->get_clear_css();
                        break;
                    case 'display':
                        $css .= $this->get_display_css();
                        break;
                    case 'float':
                        $css .= $this->get_float_css();
                        break;
                    case 'overflow':
                        $css .= $this->get_overflow_css();
                        break;
                    case 'visibility':
                        $css .= $this->get_visibility_css();
                        break;
                    case 'z-index':
                        $css .= $this->get_z_index_css();
                        break;
                    case 'all':
                        $css .= $this->get_clear_css();
                        $css .= $this->get_display_css();
                        $css .= $this->get_float_css();
                        $css .= $this->get_overflow_css();
                        $css .= $this->get_visibility_css();
                        $css .= $this->get_z_index_css();
                        break;
                }
            } // END switch statement.
            return $css;
        }


        /**
         * TODO
         */
        private function get_clear($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_position_clear',
                $this->position_default_values['clear'],
                'sanitize_clear_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_position_clear',
                'Clear',
                $this->section_id,
                81,
                $this->default_clear_values
            );
        }


        /**
         * TODO
         */
        private function get_display($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_position_display',
                $this->position_default_values['display'],
                'sanitize_display_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_position_display',
                'Display',
                $this->section_id,
                82,
                $this->default_display_values
            );
        }


        /**
         * TODO
         */
        private function get_float($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_position_float',
                $this->position_default_values['float'],
                'sanitize_float_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_position_float',
                'Float',
                $this->section_id,
                83,
                $this->default_float_values
            );
        }


         /**
         * TODO
         */
        private function get_overflow($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_position_overflow',
                $this->position_default_values['overflow'],
                'sanitize_overflow_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_position_overflow',
                'Overflow',
                $this->section_id,
                84,
                $this->default_overflow_values
            );
        }


        /**
         * TODO
         */
        private function get_visibility($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_position_visibility',
                $this->position_default_values['visibility'],
                'sanitize_visibility_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_position_visibility',
                'Visibility',
                $this->section_id,
                85,
                $this->default_visibility_values
            );
        }


        /**
         * TODO
         */
        private function get_z_index($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_position_z_index',
                $this->position_default_values['z-index'],
                'sanitize_z_index_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_position_z_index',
                'z-index',
                $this->section_id,
                86
            );
        }


        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * TODO
         */
        public function set_clear($clear_value) {
            $legal_clear_values = array();
            foreach ($this->default_clear_values as $value) {
                array_push($legal_clear_values, $value);
            }

            if (in_array(strtolower($clear_value), $legal_clear_values)) {
                switch (strtolower($clear_value)) {
                case 'left':
                    $this->position_default_values['clear'] = 'value1';
                    break;
                case 'right':
                    $this->position_default_values['clear'] = 'value2';
                    break;
                case 'both':
                    $this->position_default_values['clear'] = 'value3';
                    break;
                case 'none':
                    $this->position_default_values['clear'] = 'value4';
                    break;
                case 'inherit':
                    $this->position_default_values['clear'] = 'value5';
                    break;
                } // END switch statement.
            } // End if statement.
        }


        /**
         * TODO
         */
        public function set_display($display_value) {
            $legal_dispaly_values = array();
            foreach ($this->default_display_values as $value) {
                array_push($legal_dispaly_values, $value);
            }

            if (in_array(strtolower($display_value), $legal_dispaly_values)) {
                switch (strtolower($display_value)) {
                case 'inline':
                    $this->position_default_values['display'] = 'value1';
                    break;
                case 'block':
                    $this->position_default_values['display'] = 'value2';
                    break;
                case 'inline-block':
                    $this->position_default_values['display'] = 'value3';
                    break;
                case 'inline-table':
                    $this->position_default_values['display'] = 'value4';
                    break;
                case 'list-item':
                    $this->position_default_values['display'] = 'value5';
                    break;
                case 'run-in':
                    $this->position_default_values['display'] = 'value6';
                    break;
                case 'table':
                    $this->position_default_values['display'] = 'value7';
                    break;
                case 'table-caption':
                    $this->position_default_values['display'] = 'value8';
                    break;
                case 'table-column-group':
                    $this->position_default_values['display'] = 'value9';
                    break;
                case 'table-header-group':
                    $this->position_default_values['display'] = 'value10';
                    break;
                case 'table-footer-group':
                    $this->position_default_values['display'] = 'value11';
                    break;
                case 'table-row-group':
                    $this->position_default_values['display'] = 'value12';
                    break;
                case 'table-cell':
                    $this->position_default_values['display'] = 'value13';
                    break;
                case 'table-column':
                    $this->position_default_values['display'] = 'value14';
                    break;
                case 'table-row':
                    $this->position_default_values['display'] = 'value15';
                    break;
                case 'none':
                    $this->position_default_values['display'] = 'value16';
                    break;
                case 'inherit':
                    $this->position_default_values['display'] = 'value17';
                    break;
                } // END switch statement.
            } // End if statement.
        }


        /**
         * TODO
         */
        public function set_float($float_value) {
            $legal_float_values = array();
            foreach ($this->default_float_values as $value) {
                array_push($legal_float_values, $value);
            }

            if (in_array(strtolower($float_value), $legal_float_values)) {
                switch (strtolower($float_value)) {
                case 'left':
                    $this->position_default_values['float'] = 'value1';
                    break;
                case 'right':
                    $this->position_default_values['float'] = 'value2';
                    break;
                case 'none':
                    $this->position_default_values['float'] = 'value3';
                    break;
                case 'inherit':
                    $this->position_default_values['float'] = 'value4';
                    break;
                } // END switch statement.
            } // End if statement.
        }


        /**
         * TODO
         */
        public function set_overflow($overflow_value) {
            $legal_overflow_values = array();
            foreach ($this->default_overflow_values as $value) {
                array_push($legal_overflow_values, $value);
            }

            if (in_array(strtolower($overflow_value), $legal_overflow_values)) {
                switch (strtolower($overflow_value)) {
                case 'visible':
                    $this->position_default_values['overflow'] = 'value1';
                    break;
                case 'hidden':
                    $this->position_default_values['overflow'] = 'value2';
                    break;
                case 'scroll':
                    $this->position_default_values['overflow'] = 'value3';
                    break;
                case 'auto':
                    $this->position_default_values['overflow'] = 'value4';
                    break;
                case 'inherit':
                    $this->position_default_values['overflow'] = 'value5';
                    break;
                } // END switch statement.
            } // End if statement.
        }


        /**
         * TODO
         */
        public function set_visibility($visibility_value) {
            $legal_visibility_values = array();
            foreach ($this->default_visibility_values as $value) {
                array_push($legal_visibility_values, $value);
            }

            if (in_array(strtolower($visibility_value), $legal_visibility_values)) {
                switch (strtolower($visibility_value)) {
                case 'visible':
                    $this->position_default_values['visibility'] = 'value1';
                    break;
                case 'hidden':
                    $this->position_default_values['visibility'] = 'value2';
                    break;
                case 'collapse':
                    $this->position_default_values['visibility'] = 'value3';
                    break;
                case 'inherit':
                    $this->position_default_values['visibility'] = 'value4';
                    break;
                } // END switch statement.
            } // End if statement.
        }


        /**
         * TODO
         */
        public function set_z_index($z_index_value) {
            $z_index = $this->sanitize_z_index_input($z_index_value);

            if ($z_index) $this->position_default_values['z-index'] = $z_index;
        }

        /* 
         * --------------------------------------------------------------------------------
         * USER INPUT SANITIZERS
         * --------------------------------------------------------------------------------
         */

        /**
         * TODO
         */
        public function sanitize_clear_input($clear_input) {
            if (array_key_exists($clear_input, $this->default_clear_values)) {
                return $clear_input;
            }
        }


        /**
         * TODO
         */
        public function sanitize_display_input($display_input) {
            if (array_key_exists($display_input, $this->default_display_values)) {
                return $display_input;
            }
        }


        /**
         * TODO
         */
        public function sanitize_float_input($float_input) {
            if (array_key_exists($float_input, $this->default_float_values)) {
                return $float_input;
            }
        }


        /**
         * TODO
         */
        public function sanitize_overflow_input($overflow_input) {
            if (array_key_exists($overflow_input, $this->default_overflow_values)) {
                return $overflow_input;
            }
        }


        /**
         * TODO
         */
        public function sanitize_visibility_input($visibility_input) {
            if (array_key_exists($visibility_input, $this->default_visibility_values)) {
                return $visibility_input;
            }
        }


        /**
         * TODO
         */
        public function sanitize_z_index_input($z_index_input) {
            if (strtolower($z_index_input) == 'auto' || strtolower($z_index_input) == 'inherit') {
                return strtolower($z_index_input);
            } else if (is_numeric($z_index_input)) {
                return (string)(int)$z_index_input;
            }
        }
    } // END Lnrd_Css_Position class.
?>
