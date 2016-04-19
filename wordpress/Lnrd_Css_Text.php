<?php
    class Lnrd_Css_Text extends Lnrd_Customizer_Base {
        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE VARIABLES
         * --------------------------------------------------------------------------------
         */

        /**
         * @var string $section_id The name of the Lnrd_Css_Section object
         * that this Lnrd_Css_Text object will be linked to.
         */
        private $section_id;

        /**
         * @var mixed[] $text_default_values The default values for the
         * css text properties.
         */
        private $text_default_values;

        /**
         * @var string[] $required_text_properties The required css
         * text properties to render. Expected values -> 'color',
         * 'direction', 'letter-spacing', 'line-height', 'text-align',
         * 'text-decoration', 'text-indent', 'text-transform',
         * 'vertical-align', 'white-space', 'word-spacing' or 'all'. 
         */
        private $required_text_properties;


        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE METHODS
         * --------------------------------------------------------------------------------
         */

        /**
         * TODO
         */
        function __construct($section_id, $required_text_properties) {
            $this->section_id = $section_id;
            $this->required_text_properties = $required_text_properties;
            $this->text_default_values = array(
                'color' => '#000000',
                'direction' => 'value1', // direction -> ltr.
                'letter-spacing' => 'normal',
                'letter-spacing-unit' => 'value1', // letter-spacing-unit -> px.
                'line-height' => 'normal',
                'line-height-unit' => 'value1', // line-height-unit -> px.
                'text-align' => 'value1', // text-align -> left.
                'text-decoration' => 'value1', // text-decoration -> none.
                'text-indent' => 0,
                'text-indent-unit' => 'value1', // text-indent-unit -> px.
                'text-transform' => 'value1', // text-transform -> none.
                'vertical-align' => 'baseline',
                'vertical-align-unit' => 'value1', // vertical-align-unit -> px.
                'white-space' => 'value1', // white-space -> normal.
                'word-spacing' => 'normal',
                'word-spacing-unit' => 'value1', // word-spacing-unit -> px.
                'text-shadow-h' => 'none',
                'text-shadow-h-unit' => 'value1', // text-shadow-h-unit -> px.
                'text-shadow-v' => 'none',
                'text-shadow-v-unit' => 'value1', // text-shadow-v-unit -> px.
                'text-shadow-blur' => 'none',
                'text-shadow-blur-unit' => 'value1', // text-shadow-blur-unit -> px.
                'text-shadow-color' => '#000000'
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
         * Gets the unique section id of the Lnrd_Css_Section object to which this
         * Lnrd_Css_Text object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which
         * this Lnrd_Css_Text object is associated with. 
         */
        public function get_section_id() {
            return $this->section_id;
        }


        /**
         * Gets the required css text properties.
         *
         * Gets the names of the required text properties that were
         * requested by the Lnrd_Css_Section object to which this Lnrd_Css_Text
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string[] The names of the text properties that this text
         * object has rendered.
         */
        public function get_required_text_properties() {
            return $this->required_text_properties;
        } 


        /**
         * Gets the text properties default values.
         *
         * Gets the default values of the text properties for this
         * Lnrd_Css_Text object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return mixed[] The default values for the text
         * properties for this Lnrd_Css_Text object.
         */
        public function get_text_default_values() {
            return $this->text_default_values;
        }


        /**
         * TODO
         */
        public function get_text_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_text_properties as $property) {
                    switch ($property) {
                        case 'color':
                            $this->get_color($wp_customize);
                            break;
                        case 'direction':

                            break;
                        case 'letter-spacing':
                            $this->get_letter_spacing($wp_customize);
                            break;
                        case 'line-height':
                            $this->get_line_height($wp_customize);
                            break;
                        case 'text-align':
                            $this->get_text_align($wp_customize);
                            break;
                        case 'text-decoration':
                            $this->get_text_decoration($wp_customize);
                            break;
                        case 'text-indent':
                            $this->get_text_indent($wp_customize);
                            break;
                        case 'text-transform':
                            $this->get_text_transform($wp_customize);
                            break;
                        case 'vertical-align':
                            $this->get_vertical_align($wp_customize);
                            break;
                        case 'white-space':
                            $this->get_white_space($wp_customize);
                            break;
                        case 'word-spacing':
                            $this->get_word_spacing($wp_customize);
                            break;
                        case 'text-shadow':
                            $this->get_text_shadow($wp_customize);
                            break;
                        case 'all':
                            $this->get_color($wp_customize);
                            $this->get_letter_spacing($wp_customize);
                            $this->get_line_height($wp_customize);
                            $this->get_text_align($wp_customize);
                            $this->get_text_decoration($wp_customize);
                            $this->get_text_indent($wp_customize);
                            $this->get_text_transform($wp_customize);
                            $this->get_vertical_align($wp_customize);
                            $this->get_white_space($wp_customize);
                            $this->get_word_spacing($wp_customize);
                            $this->get_text_shadow($wp_customize);
                            break;
                    } // END switch statement.
                } // END foreach statement.
            } // END if statement.
        }


        /**
         * TODO
         */
        private function get_letter_spacing_css() {
            $letter_spacing_css = '';

            if (is_numeric(get_theme_mod($this->section_id . '_css_letter_spacing'))) {
                $letter_spacing_css .= 'letter-spacing:' . get_theme_mod($this->section_id . '_css_letter_spacing') . $this->select_value_to_css_length(get_theme_mod($this->section_id . '_css_letter_spacing_unit')) . ';';     
            } else if (get_theme_mod($this->section_id . '_css_letter_spacing') == 'normal' || get_theme_mod($this->section_id . '_css_letter_spacing') == 'inherit') {
                $letter_spacing_css .= 'letter-spacing:' . get_theme_mod($this->section_id . '_css_letter_spacing') . ';';
            }

            return $letter_spacing_css;
        }


        /**
         * TODO
         */
        private function get_line_height_css() {
            $line_height_css = '';

            if (is_numeric(get_theme_mod($this->section_id . '_css_line_height'))) {
                $line_height_css .= 'line-height:' . get_theme_mod($this->section_id . '_css_line_height') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_line_height_unit')) . ';';     
            } else if (get_theme_mod($this->section_id . '_css_line_height') == 'normal' || get_theme_mod($this->section_id . '_css_line_height') == 'inherit') {
                $line_height_css .= 'line-height:' . get_theme_mod($this->section_id . '_css_letter_spacing') . ';';
            }

            return $line_height_css;
        }


        /**
         * TODO
         */
        private function get_text_align_css() {
            $text_align_css = '';
            $text_align_select_value = get_theme_mod($this->section_id . '_css_text_align');
            $text_align_value = '';

            switch ($text_align_select_value) {
                case 'value1':
                    $text_align_value = 'left';
                    break;
                case 'value2':
                    $text_align_value = 'right';
                    break;
                case 'value3':
                    $text_align_value = 'center';
                    break;
                case 'value4':
                    $text_align_value = 'justify';
                    break;
                case 'value5':
                    $text_align_value = 'inherit';
                    break;
            }
            $text_align_css = 'text-align:' . $text_align_value . ';';
            return $text_align_css;
        }


        /**
         * TODO
         */
        private function get_text_decoration_css() {
            $text_decoration_css = '';
            $text_decoration_select_value = get_theme_mod($this->section_id . '_css_text_decoration');
            $text_decoration_value = '';

            switch ($text_decoration_select_value) {
                case 'value1':
                    $text_decoration_value = 'none';
                    break;
                case 'value2':
                    $text_decoration_value = 'underline';
                    break;
                case 'value3':
                    $text_decoration_value = 'overline';
                    break;
                case 'value4':
                    $text_decoration_value = 'line-through';
                    break;
                case 'value5':
                    $text_decoration_value = 'inherit';
                    break;
            }
            $text_decoration_css = 'text-decoration:' . $text_decoration_value . ';';
            return $text_decoration_css;
        }


        /**
         * TODO
         */
        private function get_text_indent_css() {
            $text_indent_css = '';

            if (is_numeric(get_theme_mod($this->section_id . '_css_text_indent'))) {
                $text_indent_css .= 'text-indent:' . get_theme_mod($this->section_id . '_css_text_indent') . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_text_indent_unit')) . ';';     
            } else if (get_theme_mod($this->section_id . '_css_text_indent') == 'inherit') {
                $text_indent_css .= 'text-indent:' . get_theme_mod($this->section_id . '_css_text_indent') . ';';
            }

            return $text_indent_css;
        }


        /**
         * TODO
         */
        private function get_text_transform_css() {
            $text_transform_css = '';
            $text_transform_select_value = get_theme_mod($this->section_id . '_css_text_transform');
            $text_transform_value = '';

            switch ($text_transform_select_value) {
                case 'value1':
                    $text_transform_value = 'none';
                    break;
                case 'value2':
                    $text_transform_value = 'capitalize';
                    break;
                case 'value3':
                    $text_transform_value = 'uppercase';
                    break;
                case 'value4':
                    $text_transform_value = 'lowercase';
                    break;
                case 'value5':
                    $text_transform_value = 'inherit';
                    break;
            }
            $text_transform_css = 'text-transform:' . $text_transform_value . ';';
            return $text_transform_css;
        }


        /**
         * TODO
         */
        private function get_vertical_align_css() {
            $legal_values = array(
                'baseline', 'sub', 'super',
                'top', 'text-top', 'middle',
                'bottom', 'text-bottom', 'inherit'
            );
            $vertical_align_value = get_theme_mod($this->section_id . '_css_vertical_align');
            $vertical_align_css = '';

            if (is_numeric($vertical_align_value)) {
                $vertical_align_css .= 'vertical-align:' . $vertical_align_value . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_vertical_align_unit')) . ';';     
            } else if (in_array(strtolower($vertical_align_value), $legal_values)) {
                $vertical_align_css .= 'vertical-align:' . $vertical_align_value . ';';
            }

            return $vertical_align_css;
        }


        /**
         * TODO
         */
        private function get_white_space_css() {
            $white_space_css = '';
            $white_space_select_value = get_theme_mod($this->section_id . '_css_white_space');
            $white_space_value = '';

            switch ($white_space_select_value) {
                case 'value1':
                    $white_space_value = 'normal';
                    break;
                case 'value2':
                    $white_space_value = 'nowrap';
                    break;
                case 'value3':
                    $white_space_value = 'pre';
                    break;
                case 'value4':
                    $white_space_value = 'pre-line';
                    break;
                case 'value5':
                    $white_space_value = 'pre-wrap';
                    break;
                case 'value6':
                    $white_space_value = 'inherit';
                    break;
            }
            $white_space_css = 'white-space:' . $white_space_value . ';';
            return $white_space_css;
        }


        /**
         * TODO
         */
        private function get_word_spacing_css() {
             $word_spacing_css = '';

            if (is_numeric(get_theme_mod($this->section_id . '_css_word_spacing'))) {
                $word_spacing_css .= 'word-spacing:' . get_theme_mod($this->section_id . '_css_word_spacing') . $this->select_value_to_css_length(get_theme_mod($this->section_id . '_css_word_spacing_unit')) . ';';     
            } else if (get_theme_mod($this->section_id . '_css_word_spacing') == 'normal' || get_theme_mod($this->section_id . '_css_word_spacing') == 'inherit') {
                $word_spacing_css .= 'word-spacing:' . get_theme_mod($this->section_id . '_css_word_spacing') . ';';
            }

            return $word_spacing_css;
        }


        /**
         * TODO
         */
        private function get_text_shadow_css() {
            if (get_theme_mod($this->section_id . '_css_text_shadow_h') != 'none') {
                $shadow_h = get_theme_mod($this->section_id . '_css_text_shadow_h') . $this->select_value_to_css_length(get_theme_mod($this->section_id . '_css_text_shadow_h_unit'));
            }

            if (get_theme_mod($this->section_id . '_css_text_shadow_v') != 'none') {
                $shadow_v = get_theme_mod($this->section_id . '_css_text_shadow_v') . $this->select_value_to_css_length(get_theme_mod($this->section_id . '_css_text_shadow_v_unit'));
            }

            if (get_theme_mod($this->section_id . '_css_text_shadow_blur') != 'none') {
                $shadow_blur = get_theme_mod($this->section_id . '_css_text_shadow_blur') . $this->select_value_to_css_length(get_theme_mod($this->section_id . '_css_text_shadow_blur_unit'));
            }

            if ($shadow_h && $shadow_v) {
                $shadow_color = get_theme_mod($this->section_id . '_css_text_shadow_color');
            }


            $text_shadow_css = 'text-shadow:' . $shadow_h . ' ' . $shadow_v . ' ' . $shadow_blur . ' ' . $shadow_color .';';

            if ($shadow_h && $shadow_v) {
                return $text_shadow_css;
            }
        }



        /**
         * TODO
         */
        public function get_text_css() {
            $css = '';
            foreach ($this->required_text_properties as $property) {
                switch ($property) {
                    case 'color':
                        $css .= 'color:' . get_theme_mod($this->section_id . '_css_color') . ';';
                        break;
                    case 'letter-spacing':
                        $css .= $this->get_letter_spacing_css();
                        break;
                    case 'line-height':
                        $css .= $this->get_line_height_css();
                        break;
                    case 'text-align':
                        $css .= $this->get_text_align_css();
                        break;
                    case 'text-decoration':
                        $css .= $this->get_text_decoration_css();
                        break;
                    case 'text-indent':
                        $css .= $this->get_text_indent_css();
                        break;
                    case 'text-transform':
                        $css .= $this->get_text_transform_css();
                        break;
                    case 'vertical-align':
                        $css .= $this->get_vertical_align_css();
                        break;
                    case 'white-space':
                        $css .= $this->get_white_space_css();
                        break;
                    case 'word-spacing':
                        $css .= $this->get_word_spacing_css();
                        break;
                    case 'text-shadow':
                        $css .= $this->get_text_shadow_css();
                        break;
                    case 'all':
                        $css .= 'color:' . get_theme_mod($this->section_id . '_css_color') . ';';
                        $css .= $this->get_letter_spacing_css();
                        $css .= $this->get_line_height_css();
                        $css .= $this->get_text_align_css();
                        $css .= $this->get_text_decoration_css();
                        $css .= $this->get_text_indent_css();
                        $css .= $this->get_text_transform_css();
                        $css .= $this->get_vertical_align_css();
                        $css .= $this->get_white_space_css();
                        $css .= $this->get_word_spacing_css();
                        $css .= $this->get_text_shadow_css();
                        break;
                } // END switch statement.
            } // END foreach statement.
            return $css;
        }


        /**
         * TODO
         */
        private function get_color($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_color',
                $this->text_default_values['color'],
                'sanitize_color_input'
            );

            $this->get_color_control(
                $wp_customize,
                $this->section_id . '_css_color',
                'Text color',
                $this->section_id,
                98
            );
        }


        /**
         * TODO
         */
        private function get_direction($wp_customize) {

        }


        /**
         * TODO
         */
        private function get_letter_spacing($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_letter_spacing',
                $this->text_default_values['letter-spacing'],
                'sanitize_letter_spacing_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_letter_spacing',
                'Letter spacing',
                $this->section_id,
                100
            );

             $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_letter_spacing_unit',
                $this->text_default_values['letter-spacing-unit'],
                'sanitize_letter_spacing_unit_input'
            );

            $this->get_select_control_css_length(
                $wp_customize,
                $this->section_id . '_css_letter_spacing_unit',
                '',
                $this->section_id,
                101
            );
        }


        /**
         * TODO
         */
        private function get_line_height($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_line_height',
                $this->text_default_values['line-height'],
                'sanitize_line_height_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_line_height',
                'Line height',
                $this->section_id,
                102
            );

             $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_line_height_unit',
                $this->text_default_values['line-height-unit'],
                'sanitize_line_height_unit_input'
            );

            $this->get_select_control_css_percentage(
                $wp_customize,
                $this->section_id . '_css_line_height_unit',
                '',
                $this->section_id,
                103
            );
        }


        private function get_text_align($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_align',
                $this->text_default_values['text-align'],
                'sanitize_text_align_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_text_align',
                'Text align',
                $this->section_id,
                104,
                array(
                    'value1' => 'left',
                    'value2' => 'right',
                    'value3' => 'center',
                    'value4' => 'justify',
                    'value5' => 'inherit',
                )
            );
        }


        /**
         * TODO
         */
        private function get_text_decoration($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_decoration',
                $this->text_default_values['text-decoration'],
                'sanitize_text_decoration_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_text_decoration',
                'Text decoration',
                $this->section_id,
                105,
                array(
                    'value1' => 'none',
                    'value2' => 'underline',
                    'value3' => 'overline',
                    'value4' => 'line-through',
                    'value5' => 'inherit',
                )
            );
        }


        /**
         * TODO
         */
        private function get_text_indent($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_indent',
                $this->text_default_values['text-indent'],
                'sanitize_text_indent_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_text_indent',
                'Text indent',
                $this->section_id,
                106
            );

             $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_indent_unit',
                $this->text_default_values['text-indent-unit'],
                'sanitize_text_indent_unit_input'
            );

            $this->get_select_control_css_percentage(
                $wp_customize,
                $this->section_id . '_css_text_indent_unit',
                '',
                $this->section_id,
                107
            );   
        }


        /**
         * TODO
         */
        private function get_text_transform($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_transform',
                $this->text_default_values['text-transform'],
                'sanitize_text_transform_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_text_transform',
                'Text transform',
                $this->section_id,
                108,
                array(
                    'value1' => 'none',
                    'value2' => 'capitalize',
                    'value3' => 'uppercase',
                    'value4' => 'lowercase',
                    'value5' => 'inherit',
                )
            );
        }


        /**
         * TODO
         */
        private function get_vertical_align($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_vertical_align',
                $this->text_default_values['vertical-align'],
                'sanitize_vertical_align_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_vertical_align',
                'Vertical align',
                $this->section_id,
                109
            );

             $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_vertical_align_unit',
                $this->text_default_values['vertical-align-unit'],
                'sanitize_vertical_align_unit_input'
            );

            $this->get_select_control_css_percentage(
                $wp_customize,
                $this->section_id . '_css_vertical_align_unit',
                '',
                $this->section_id,
                110
            );
        }


        /**
         * TODO
         */
        private function get_white_space($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_white_space',
                $this->text_default_values['white-space'],
                'sanitize_white_space_input'
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_white_space',
                'White space',
                $this->section_id,
                111,
                array(
                    'value1' => 'normal',
                    'value2' => 'nowrap',
                    'value3' => 'pre',
                    'value4' => 'pre-line',
                    'value5' => 'pre-wrap',
                    'value6' => 'inherit',
                )
            );
        }


        /**
         * TODO
         */
        private function get_word_spacing($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_word_spacing',
                $this->text_default_values['word-spacing'],
                'sanitize_word_spacing_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_word_spacing',
                'Word spacing',
                $this->section_id,
                112
            );

             $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_word_spacing_unit',
                $this->text_default_values['word-spacing-unit'],
                'sanitize_word_spacing_unit_input'
            );

            $this->get_select_control_css_length(
                $wp_customize,
                $this->section_id . '_css_word_spacing_unit',
                '',
                $this->section_id,
                113
            );
        }


        /**
         * TODO
         */
        private function get_text_shadow($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_shadow_h',
                $this->text_default_values['text-shadow-h'],
                'sanitize_text_shadow_h_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_text_shadow_h',
                'Text shadow H',
                $this->section_id,
                114
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_shadow_h_unit',
                $this->text_default_values['text-shadow-h-unit'],
                'sanitize_text_shadow_h_unit_input'
            );

            $this->get_select_control_css_length(
                $wp_customize,
                $this->section_id . '_css_text_shadow_h_unit',
                '',
                $this->section_id,
                115
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_shadow_v',
                $this->text_default_values['text-shadow-v'],
                'sanitize_text_shadow_h_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_text_shadow_v',
                'Text shadow V',
                $this->section_id,
                116
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_shadow_v_unit',
                $this->text_default_values['text-shadow-v-unit'],
                'sanitize_text_shadow_h_unit_input'
            );

            $this->get_select_control_css_length(
                $wp_customize,
                $this->section_id . '_css_text_shadow_v_unit',
                '',
                $this->section_id,
                117
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_shadow_blur',
                $this->text_default_values['text-shadow-blur'],
                'sanitize_text_shadow_h_input'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_text_shadow_blur',
                'Text shadow blur',
                $this->section_id,
                118
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_shadow_blur_unit',
                $this->text_default_values['text-shadow-blur-unit'],
                'sanitize_text_shadow_h_unit_input'
            );

            $this->get_select_control_css_length(
                $wp_customize,
                $this->section_id . '_css_text_shadow_blur_unit',
                '',
                $this->section_id,
                119
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_text_shadow_color',
                $this->text_default_values['text-shadow-color'],
                'sanitize_color_input'
            );

            $this->get_color_control(
                $wp_customize,
                $this->section_id . '_css_text_shadow_color',
                'Text shadow color',
                $this->section_id,
                120
            );
        }


        /* 
         * --------------------------------------------------------------------------------
         * USER INPUT SANITIZERS
         * --------------------------------------------------------------------------------
         */

        /**
         * TODO
         */
        public function sanitize_color_input($color_input) {
            return $color_input;
        }


        /**
         * TODO
         */
        public function sanitize_letter_spacing_input($letter_spacing_input) {
            return $letter_spacing_input;
        }


        /**
         * TODO
         */
        public function sanitize_letter_spacing_unit_input($letter_spacing_unit_input) {
            return $letter_spacing_unit_input;
        }


        /**
         * TODO
         */
        public function sanitize_line_height_input($line_height_input) {
            return $line_height_input;
        }


        /**
         * TODO
         */
        public function sanitize_line_height_unit_input($line_height_unit_input) {
            return $line_height_unit_input;
        }


       /**
        * TODO
        */
        public function sanitize_text_align_input($text_align_input) {
            return $text_align_input;
        } 


        /**
         * TODO
         */
        public function sanitize_text_decoration_input($text_decoration_input) {
            $legal_values = array('none', 'underline', 'overline', 'line-through', 'inherit');

            if (in_array(strtolower($text_decoration_input),  $legal_values)) {
                return $text_decoration_input;
            }
        }


        /**
         * TODO
         */
        public function sanitize_text_indent_input($text_indent) {
            if (strtolower($text_indent) == 'inherit') {
                return strtolower($text_indent);
            } else if (is_numeric($text_indent)) {
                return $text_indent;
            }
        }


        /**
         * TODO
         */
        public function sanitize_text_indent_unit_input($text_indent_unit) {
            return $text_indent_unit;
        }


        /**
         * TODO
         */
        public function sanitize_text_transform_input($text_transform) {
            return $text_transform;
        }


        /**
         * TODO
         */
        public function sanitize_vertical_align_input($vertical_align) {
            return $vertical_align;
        }


        /**
         * TODO
         */
        public function sanitize_vertical_align_unit_input($vertical_align_unit) {
            return $vertical_align_unit;
        }


        /**
         * TODO
         */
        public function sanitize_white_space_input($white_space_input) {
            return $white_space_input;
        }


        /**
         * TODO
         */
        public function sanitize_word_spacing_input($word_spacing) {
            $legal_values = array('normal', 'inherit');

            if (in_array(strtolower($word_spacing), $legal_values)) {
                return strtolower($word_spacing);
            } else if (is_numeric($word_spacing)) {
                return $word_spacing;
            }
        }


        /**
         * TODO
         */
        public function sanitize_word_spacing_unit_input($word_spacing_unit) {
            
            return $word_spacing_unit;
        }


        /**
         * TODO
         */
        public function sanitize_text_shadow_h_input($shadow_h) {
            return $shadow_h;
        }


        /**
         * TODO
         */
        public function sanitize_text_shadow_h_unit_input($shadow_h_input) {
            return $shadow_h_input;
        }


        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
         */
        
        /**
         * TODO
         */
        public function set_color($color) {
            $this->text_default_values['color'] = $color;
        }


        /**
         * TODO
         */
        public function set_letter_spacing($letter_spacing) {
            $this->text_default_values['letter-spacing'] = $letter_spacing[0];
            $this->text_default_values['letter-spacing-unit'] = $letter_spacing[1];
        }


        /**
         * TODO
         */
        public function set_line_height($line_height) {
            $this->text_default_values['line-height'] = $line_height[0];
            $this->text_default_values['line-height-unit'] = $line_height[1];
        }


        /**
         * TODO
         */
        public function set_text_align($text_align) {
            $this->text_default_values['text-align'] = $text_align;
        }


        /**
         * TODO
         */
        public function set_text_decoration($text_decoration) {
            $this->text_default_values['text-decoration'] = $text_decoration;
        }


        /**
         * TODO
         */
        public function set_text_indent($text_indent) {
            $this->text_default_values['text-indent'] = $text_indent[0];
            $this->text_default_values['text-indent-unit'] = $text_indent[1];
        }


        /**
         * TODO
         */
        public function set_text_transform($text_transform) {
            $this->text_default_values['text-transform'] = $text_transform;
        }


        /**
         * TODO
         */
        public function set_vertical_align($vertical_align) {
            $this->text_default_values['vertical-align'] = $vertical_align[0];
            $this->text_default_values['vertical-align-unit'] = $vertical_align[1];
        }


        /**
         * TODO
         */
        public function set_white_space($white_space) {
             $this->text_default_values['white-space'] = $white_space;
        }


        
        /**
         * TODO
         */
        public function set_word_spacing($word_spacing) {
            $this->text_default_values['word-spacing'] = $word_spacing[0];
            $this->text_default_values['word-spacing-unit'] = $word_spacing[1];
        }
    } // END Lnrd_Css_Text class.
?>
