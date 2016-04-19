<?php
    class Lnrd_Css_Multi_Column extends Lnrd_Customizer_Base {
         /* 
          * --------------------------------------------------------------------------------
          * INSTANCE VARIABLES
          * --------------------------------------------------------------------------------
          */

        /**
         * @var string $section_id The name of the Lnrd_Css_Section object
         * that this Lnrd_Css_Multi_Column object will be linked to.
         */
        private $section_id;

        /**
         * @var mixed[] $column_default_values The default values for the
         * css column properties.
         */
        private $column_default_values;

        /**
         * @var string[] $required_column_properties The required css
         * column properties to render. Expected values -> 'column-count',
         * 'column-fill', 'column-gap', 'column-rule-color',
         * 'column-rule-style', 'column-rule-width', 'column-span',
         * 'column-width' or 'all'. 
         */
        private $required_column_properties;

        /**
         * @var string[] $default_column_rule_style_values The default values
         * for the css column rule style property. Legal values are: 'none',
         * 'hidden', 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge',
         * 'inset' and 'outset'.
         */
        private $default_column_rule_style_values;

        /**
         * @var string[] $default_column_unit_values The legal css length values for
         * the column property. Legal values are: 'px', 'em', 'ex', 'rem', 'cm',
         * 'mm', 'in', 'pt' and 'pc'. 
         */
        private $default_column_unit_values;


        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE METHODS
         * --------------------------------------------------------------------------------
         */

        /**
         * TODO
         */
        function __construct($section_id, $required_column_properties) {
            $this->section_id = $section_id;
            $this->required_column_properties = $required_column_properties;
            $this->column_default_values = array(
                'column-count' => 'auto',
                'column-fill' => 'balance',
                'column-gap' => 'normal',
                'column-gap-unit' => 'value1',
                'column-rule-color' => '#000000',
                'column-rule-style' => 'value1',
                'column-rule-width' => 'medium',
                'column-rule-width-unit' => 'value1',
                'column-span' => 'value1',
                'column-width' => 'auto',
                'column-width-unit' => 'value1'
            );

            $this->default_column_rule_style_values = array(
                'value1' => 'none',
                'value2' => 'hidden',
                'value3' => 'dotted',
                'value4' => 'dashed',
                'value5' => 'solid',
                'value6' => 'double',
                'value7' => 'groove',
                'value8' => 'ridge',
                'value9' => 'inset',
                'value10' => 'outset'
            );

            $this->default_column_unit_values = array(
                'value1' => 'px',
                'value2' => 'em',
                'value3' => 'ex',
                'value4' => 'rem',
                'value5' => 'cm',
                'value6' => 'mm',
                'value7' => 'in',
                'value8' => 'pt',
                'value9' => 'pc', 
            );
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * GETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Gets the unique section id.
         *
         * Gets the unique section id of the Lnrd_Css_Section object to which this
         * Lnrd_Css_Multi_Column object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which
         * this Lnrd_Css_Multi_Column object is associated with. 
         */
        public function get_section_id() {
            return $this->section_id;
        } // CHECKED.


        /**
         * Gets the required css column properties.
         *
         * Gets the names of the required column properties that were
         * requested by the Lnrd_Css_Section object to which this Lnrd_Css_Mulit_Column
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string[] The names of the column properties that this column
         * object has rendered.
         */
        public function get_required_column_properties() {
            return $this->required_column_properties;
        } // CHECKED.


        /**
         * Gets the column properties default values.
         *
         * Gets the default values of the column properties for this
         * Lnrd_Css_Multi_Column object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return mixed[] The default values for the column
         * properties for this Lnrd_Css_Multi_Column object.
         */
        public function get_column_default_values() {
            return $this->column_default_values;
        } // CHECKED.


        /**
         * Creates the required settings and controls.
         *
         * Creates all of the required WordPress theme customizer settings and
         * controls for the required column css properties.
         *<pre>Example call:
         *    get_column_properties($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Multi_Column::get_column_count() To create a
         * WordPress setting and control for the css column count property.
         * @uses Lnrd_Css_Multi_Column::get_column_gap() To create a
         * WordPress setting and control for the css column gap property.
         * @uses Lnrd_Css_Multi_Column::get_column_rule_color() To create a
         * WordPress setting and control for the css column rule color property.
         * @uses Lnrd_Css_Multi_Column::get_column_rule_style() To create a
         * WordPress setting and control for the css column rule style property.
         * @uses Lnrd_Css_Multi_Column::get_column_rule_width() To create a
         * WordPress setting and control for the css column rule width property.
         * @uses Lnrd_Css_Multi_Column::get_column_span() To create a
         * WordPress setting and control for the css column span property.
         * @uses Lnrd_Css_Multi_Column::get_column_width() To create a
         * WordPress setting and control for the css column width property.
         *
         * @used-by Lnrd_Css_Section::lnrd_render_section() To render the
         * column css controls for the calling Lnrd_Css_Section object.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        public function get_column_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_column_properties as $property) {
                    switch ($property) {
                        case 'column-count':
                            $this->get_column_count($wp_customize);
                            break;
                        case 'column-gap':
                            $this->get_column_gap($wp_customize);
                            break;
                        case 'column-rule-color':
                            $this->get_column_rule_color($wp_customize);
                            break;
                        case 'column-rule-style':
                            $this->get_column_rule_style($wp_customize);
                            break;
                        case 'column-rule-width':
                            $this->get_column_rule_width($wp_customize);
                            break;
                        case 'column-span':
                            $this->get_column_span($wp_customize);
                            break;
                        case 'column-width':
                            $this->get_column_width($wp_customize);
                            break;
                        case 'all':
                            $this->get_column_count($wp_customize);
                            $this->get_column_gap($wp_customize);
                            $this-> get_column_rule_color($wp_customize);
                            $this->get_column_rule_style($wp_customize);
                            $this->get_column_rule_width($wp_customize);
                            $this->get_column_span($wp_customize);
                            $this->get_column_width($wp_customize);
                            break;
                    } // END switch statement.
                } // END foreach statement.
            } // END if statement.
        } // CHECKED.


        /**
         * Generate the css style for the column count property.
         *
         * Generates the css style rule for the column count property.
         *<pre>Example call:
         *    get_column_count_css();
         *    -> Returns something like this 'column-count:3;',
         *    and also adds all the vendor prefixes.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_vendor_prefix_css() To add
         * the vendor prefixes to the style rule.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_css() To render
         * the css for this Lnrd_Css_Multi_Column object.
         *
         * @return string The column count css style rule.
         */
        private function get_column_count_css() {
            $column_count_css = '';

            if (is_numeric(get_theme_mod($this->section_id . '_css_column_count')) || get_theme_mod($this->section_id . '_css_column_count') == 'auto') {
                $column_css = 'column-count:' . get_theme_mod($this->section_id . '_css_column_count');
            }

            if ($column_css) {
                $column_count_css .= $this->get_vendor_prefix_css($column_css);
            }
            return $column_count_css;
        } // CHECKED.


        /**
         * Generate the css style for the column gap property.
         *
         * Generates the css style rule for the column gap property.
         *<pre>Example call:
         *    get_column_gap_css();
         *    -> Returns something like this 'column-gap:100px;',
         *    and also adds all the vendor prefixes.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::is_css_length() To check if the
         * value is numeric so we can append the css length value.
         * @uses Lnrd_Customizer_Base::get_vendor_prefix_css() To add
         * the vendor prefixes to the style rule.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_css() To render
         * the css for this Lnrd_Css_Multi_Column object.
         *
         * @return string The column gap css style rule.
         */
        private function get_column_gap_css() {
            $column_gap_css = '';
            if (is_numeric(get_theme_mod($this->section_id . '_css_column_gap')) || get_theme_mod($this->section_id . '_css_column_gap') == 'normal') {
                $column_css = 'column-gap:' . $this->is_css_length(get_theme_mod($this->section_id . '_css_column_gap'), get_theme_mod($this->section_id . '_css_column_gap_unit'));
            }

            if ($column_css) {
                $column_gap_css .= $this->get_vendor_prefix_css($column_css);
            }

            return $column_gap_css;
        } // CHECKED.


        /**
         * Generate the css style for the column rule color property.
         *
         * Generates the css style rule for the column rule color property.
         *<pre>Example call:
         *    get_column_rule color_css();
         *    -> Returns something like this 'column-rule-color:#56d3f9;',
         *    and also adds all the vendor prefixes.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_vendor_prefix_css() To add
         * the vendor prefixes to the style rule.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_css() To render
         * the css for this Lnrd_Css_Multi_Column object.
         *
         * @return string The column rule color css style rule.
         */
        private function get_column_rule_color_css() {
            $column_rule_color_css = '';
            if (get_theme_mod($this->section_id . '_css_column_rule_color')) {
                $column_css = 'column-rule-color:' . get_theme_mod($this->section_id . '_css_column_rule_color');
            }

            if ($column_css) {
                $column_rule_color_css .= $this->get_vendor_prefix_css($column_css);
            }

            return $column_rule_color_css;
        } // CHECKED.


        /**
         * Generate the css style for the column rule style property.
         *
         * Generates the css style rule for the column rule style property.
         *<pre>Example call:
         *    get_column_rule_style_css();
         *    -> Returns something like this 'column-rule-style:solid;',
         *    and also adds all the vendor prefixes.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_vendor_prefix_css() To add
         * the vendor prefixes to the style rule.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_css() To render
         * the css for this Lnrd_Css_Multi_Column object.
         *
         * @return string The column rule style css style rule.
         */
        private function get_column_rule_style_css() {
            $column_rule_style_css = '';
            $value_to_css = '';

            switch (get_theme_mod($this->section_id . '_css_column_rule_style')) {
                case 'value1':
                    $value_to_css = 'none';
                    break;
                case 'value2':
                    $value_to_css = 'hidden';
                    break;
                case 'value3':
                    $value_to_css = 'dotted';
                    break;
                case 'value4':
                    $value_to_css = 'dashed';
                    break;
                case 'value5':
                    $value_to_css = 'solid';
                    break;
                case 'value6':
                    $value_to_css = 'double';
                    break;
                case 'value7':
                    $value_to_css = 'groove';
                    break;
                case 'value8':
                    $value_to_css = 'ridge';
                    break;
                case 'value9':
                    $value_to_css = 'inset';
                    break;
                case 'value10':
                    $value_to_css = 'outset';
                    break;
            }
            $column_css = 'column-rule-style:' . $value_to_css;

            if ($column_css) {
                $column_rule_style_css .= $this->get_vendor_prefix_css($column_css);
            }

            return $column_rule_style_css;
        } // CHECKED.


        /**
         * Generate the css style for the column rule width property.
         *
         * Generates the css style rule for the column rule width property.
         *<pre>Example call:
         *    get_column_rule_width_css();
         *    -> Returns something like this 'column-rule-width:medium;',
         *    and also adds all the vendor prefixes.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::is_css_length() To check if the
         * value is numeric so we can append the css length value.
         * @uses Lnrd_Customizer_Base::get_vendor_prefix_css() To add
         * the vendor prefixes to the style rule.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_css() To render
         * the css for this Lnrd_Css_Multi_Column object.
         *
         * @return string The column rule width css style rule.
         */
        private function get_column_rule_width_css() {
            $column_rule_width_css = '';
            $legal_values = array('thin', 'medium', 'thick');
            
            if (is_numeric(get_theme_mod($this->section_id . '_css_column_rule_width')) || in_array(get_theme_mod($this->section_id . '_css_column_rule_width'), $legal_values)) {
                $column_css = 'column-rule-width:' . $this->is_css_length(get_theme_mod($this->section_id . '_css_column_rule_width'), get_theme_mod($this->section_id . '_css_column_rule_width_unit'));
            }

            if ($column_css) {
                $column_rule_width_css .= $this->get_vendor_prefix_css($column_css);
            }

            return $column_rule_width_css;
        } // CHECKED.


        /**
         * Generate the css style for the column span property.
         *
         * Generates the css style rule for the column span property.
         *<pre>Example call:
         *    get_column_span_css();
         *    -> Returns something like this 'column-span:1;',
         *    and also adds all the vendor prefixes.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_vendor_prefix_css() To add
         * the vendor prefixes to the style rule.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_css() To render
         * the css for this Lnrd_Css_Multi_Column object.
         *
         * @return string The column span css style rule.
         */
        private function get_column_span_css() {
            $column_span_css = '';
            if (get_theme_mod($this->section_id . '_css_column_span') == 'value1' || get_theme_mod($this->section_id . '_css_column_span') == 'value2') {
                $value_to_css = '';
                switch (get_theme_mod($this->section_id . '_css_column_span')) {
                    case 'value1':
                        $value_to_css = '1';
                        break;
                    case 'value2':
                        $value_to_css = 'all';
                }
                $column_css = 'column-span:' . $value_to_css;
            }

            if ($column_css) {
                $column_span_css .= $this->get_vendor_prefix_css($column_css);
            }
            return $column_span_css;
        } // CHECKED.


        /**
         * Generate the css style for the column width property.
         *
         * Generates the css style rule for the column width property.
         *<pre>Example call:
         *    get_column_width_css();
         *    -> Returns something like this 'column-width:auto;',
         *    and also adds all the vendor prefixes.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::is_css_length() To check if the
         * value is numeric so we can append the css length value.
         * @uses Lnrd_Customizer_Base::get_vendor_prefix_css() To add
         * the vendor prefixes to the style rule.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_css() To render
         * the css for this Lnrd_Css_Multi_Column object.
         *
         * @return string The column width css style rule.
         */
        private function get_column_width_css() {
            $column_width_css = '';
            if (is_numeric(get_theme_mod($this->section_id . '_css_column_width')) || get_theme_mod($this->section_id . '_css_column_width') == 'auto') {
                $column_css = 'column-width:' . $this->is_css_length(get_theme_mod($this->section_id . '_css_column_width'), get_theme_mod($this->section_id . '_css_column_width_unit'));
            }

            if ($column_css) {
                $column_width_css .= $this->get_vendor_prefix_css($column_css);
            }

            return $column_width_css;
        } // CHECKED.


        /**
         * Generates the css for this Lnrd_Css_Multi_Column object.
         *
         * Generates the css style rules for the required css column properties
         * for this Lnrd_Css_Multi_Column object.
         *<pre>Example call:
         *    get_column_css();
         *    -> Returns something like this 'column-span:all;column-count:4;
         *    column-width:100px'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Multi_Column::get_column_count_css() To generate
         * the css style rule for the column count property.
         * @uses Lnrd_Css_Multi_Column::get_column_gap_css() To generate
         * the css style rule for the column gap property.
         * @uses Lnrd_Css_Multi_Column::get_column_rule_color_css() To generate
         * the css style rule for the column rule color property.
         * @uses Lnrd_Css_Multi_Column::get_column_rule_style_css() To generate
         * the css style rule for the column rule style property.
         * @uses Lnrd_Css_Multi_Column::get_column_rule_width_css() To generate
         * the css style rule for the column rule width property.
         * @uses Lnrd_Css_Multi_Column::get_column_span_css() To generate
         * the css style rule for the column span property.
         * @uses Lnrd_Css_Multi_Column::get_column_width_css() To generate
         * the css style rule for the column width property.
         *
         * @used-by Lnrd_Css_Section::get_section_css() To generate the css
         * column style rules for the callind Lnrd_Css_Section object.
         *
         * @return string The column css style rules for this Lnrd_Css_Multi_Column
         * object.
         */
        public function get_column_css() {
            $css = '';

            foreach ($this->required_column_properties as $property) {
                switch ($property) {
                    case 'column-count':
                        $css .= $this->get_column_count_css();
                        break;
                    case 'column-gap':
                        $css .= $this->get_column_gap_css();
                        break;
                    case 'column-rule-color':
                        $css .= $this->get_column_rule_color_css();
                        break;
                    case 'column-rule-style':
                        $css .= $this->get_column_rule_style_css();
                        break;
                    case 'column-rule-width':
                        $css .= $this->get_column_rule_width_css();
                        break;
                    case 'column-span':
                        $css .= $this->get_column_span_css();
                        break;
                    case 'column-width':
                        $css .= $this->get_column_width_css();
                        break;
                    case 'all':
                        $css .= $this->get_column_count_css();
                        $css .= $this->get_column_gap_css();
                        $css .= $this->get_column_rule_color_css();
                        $css .= $this->get_column_rule_style_css();
                        $css .= $this->get_column_rule_width_css();
                        $css .= $this->get_column_span_css();
                        $css .= $this->get_column_width_css();
                        break;
                } // END switch statement.
            } // END foreach statement.
            return $css;
        } // CHECKED.


        /**
         * Creates a setting and control for the css column count property.
         *
         * Creates a WordPress setting and input control for the css column
         * count property. The control will be visable on the Wordpress
         * theme customizer page.
         *<pre>Example call:
         *    get_column_count($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create
         * a new WordPress theme customizer input control.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_properties() To create a
         * new setting and control for the css column count property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_column_count($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_count',
                $this->column_default_values['column-count'],
                'sanitize_column_count_input'       
            );
            
            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_column_count',
                'Column count',
                $this->section_id,
                71
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the css column gap property.
         *
         * Creates a WordPress setting and input/select control for the
         * css column gap property. The control will be visable on the
         * Wordpress theme customizer page.
         *<pre>Example call:
         *    get_column_gap($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create
         * a new WordPress theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_length() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_properties() To create a
         * new setting and control for the css column gap property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_column_gap($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_gap',
                $this->column_default_values['column-gap'],
                'sanitize_column_gap_input'       
            );
            
            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_column_gap',
                'Column gap',
                $this->section_id,
                72
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_gap_unit',
                $this->column_default_values['column-gap-unit'],
                'sanitize_column_unit'
            );

            $this->get_select_control_css_length(
                $wp_customize,
                $this->section_id . '_css_column_gap_unit',
                '',
                $this->section_id,
                73
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the css column rule color property.
         *
         * Creates a WordPress setting and color control for the css column
         * rule color property. The control will be visable on the Wordpress
         * theme customizer page.
         *<pre>Example call:
         *    get_column_rule color($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_color_control() To
         * create a new WordPress theme customizer color control.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_properties() To create a
         * new setting and control for the css column rule color property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_column_rule_color($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_rule_color',
                $this->column_default_values['column-rule-color'],
                'sanitize_column_rule_color_input'       
            );

            $this->get_color_control(
                $wp_customize,
                $this->section_id . '_css_column_rule_color',
                'Column rule color',
                $this->section_id,
                74
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the css column rule style property.
         *
         * Creates a WordPress setting and select control for the css column
         * rule style property. The control will be visable on the Wordpress
         * theme customizer page.
         *<pre>Example call:
         *    get_column_rule_style($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_select_control() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_properties() To create a
         * new setting and control for the css column rule style property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_column_rule_style($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_rule_style',
                $this->column_default_values['column-rule-style'],
                'sanitize_column_rule_style_input'       
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_column_rule_style',
                'Column rule style',
                $this->section_id,
                75,
                $this->default_column_rule_style_values
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the css column rule width property.
         *
         * Creates a WordPress setting and input control for the css column
         * rule width property. The control will be visable on the Wordpress
         * theme customizer page.
         *<pre>Example call:
         *    get_column_rule_width($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create
         * a new WordPress theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_length() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_properties() To create a
         * new setting and control for the css column rule width property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_column_rule_width($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_rule_width',
                $this->column_default_values['column-rule-width'],
                'sanitize_column_rule_width_input'       
            );
            
            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_column_rule_width',
                'Column rule width',
                $this->section_id,
                76
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_rule_width_unit',
                $this->column_default_values['column-rule-width-unit'],
                'sanitize_column_unit'
            );

            $this->get_select_control_css_length(
                $wp_customize,
                $this->section_id . '_css_column_rule_width_unit',
                '',
                $this->section_id,
                77
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the css column span property.
         *
         * Creates a WordPress setting and select control for the css column
         * span property. The control will be visable on the Wordpress
         * theme customizer page.
         *<pre>Example call:
         *    get_column_span($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_select_control() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_properties() To create a
         * new setting and control for the css column span property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_column_span($wp_customize) {
             $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_span',
                $this->column_default_values['column-span'],
                'sanitize_column_span_input'       
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_column_span',
                'Column span',
                $this->section_id,
                78,
                array('value1' => '1', 'value2' => 'all')
            );
        } // CHECKED.

        
        /**
         * Creates a setting and control for the css column width property.
         *
         * Creates a WordPress setting and input control for the css column
         * width property. The control will be visable on the Wordpress
         * theme customizer page.
         *<pre>Example call:
         *    get_column_width($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create
         * a new WordPress theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_length() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_properties() To create a
         * new setting and control for the css column width property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_column_width($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_width',
                $this->column_default_values['column-width'],
                'sanitize_column_width_input'       
            );
            
            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_column_width',
                'Column width',
                $this->section_id,
                79
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_column_width_unit',
                $this->column_default_values['column-width-unit'],
                'sanitize_column_unit'
            );

            $this->get_select_control_css_length(
                $wp_customize,
                $this->section_id . '_css_column_width_unit',
                '',
                $this->section_id,
                80
            );
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Sets the column count default value.
         *
         * Sets the $column_default_values['column-count'] variables default
         * value. The new value will be the default value for the css
         * column count property.
         *<pre>Example call:
         *    set_column_count('auto'); -> sets the $column_default_values['column-count']
         *    value to auto.
         *    set_column_count('3'); -> sets the $column_default_values['column-count']
         *    value to 3.
         *    set_column_count('foo'); -> does nothing as 'foo' is not a legal value for
         *    the css column count property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * $param int|string $column_count the new default value for the css column
         * count property. Legal values are: 'auto' or a number.
         *
         * @return void
         */
        public function set_column_count($column_count) {
            $new_column_count = '';
            $new_column_count = $this->sanitize_column_count_input($column_count);
            if ($new_column_count) {
                $this->column_default_values['column-count'] = $new_column_count;
           } 
        } // CHECKED.


        /**
         * Sets the column gap default value.
         *
         * Sets the default value for the column gap setting on the WordPress
         * theme customizer page. If the new setting is valid the
         * $column_default_values['column-gap'] and
         * $column_default_values['column-gap-unit'] variables will be set to
         * the new values.
         *<pre>Example call:
         *    set_column_gap(array('normal'));
         *    -> Sets $column_default_values['column-gap'] to 'normal'.
         *
         *    set_column_gap(array('10'));
         *    -> Sets $column_default_values['column-gap'] to '10'.
         *
         *    set_column_gap(array('10', 'em'));
         *    -> Sets $column_default_values['column-gap'] to '10' and
         *    -> Sets $column_default_values['column-gap-unit'] to 'value2'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::css_length_to_select_value() To convert a
         * css length value to a WordPress theme customizer HTML select list value.
         *
         * @used-by Lnrd_Css_Section::set_column_default_values() To set the
         * default column gap value for the calling Lnrd_Css_Section object.
         *
         * @param mixed[] $column_gap The new column gap default values.
         * Legal values for $column_gap[0] are: 'normal', or a number.
         * Legal values for $column_gap[1] are: 'px', 'em', 'ex', 'rem', 'cm',
         * 'mm', 'in', 'pt' and 'pc'.
         *
         * @return void
         */
        public function set_column_gap($column_gap) {
            // Get legal css lengths.
            $legal_column_gap_units = array();
            foreach ($this->default_column_unit_values as $value) {
                array_push($legal_column_gap_units, $value);
            }

            if (count($column_gap) == 2) {
                if (strtolower($column_gap[0]) == 'normal' || is_numeric($column_gap[0])) {
                    $this->column_default_values['column-gap'] = strtolower($column_gap[0]);
                }
                if (in_array(strtolower($column_gap[1]), $legal_column_gap_units)) {
                    $this->column_default_values['column-gap-unit'] = $this->css_length_to_select_value(strtolower($column_gap[1]));
                }
            } else if (strtolower($column_gap[0]) == 'normal' || is_numeric($column_gap[0])){
                $this->column_default_values['column-gap'] = strtolower($column_gap[0]);
            }
        } // CHECKED.


        /**
         * Sets the column rule color default value.
         *
         * Sets the default value for the column rule color setting on the WordPress
         * theme customizer page. If the new setting is valid the
         * $column_default_values['column-rule-color'] variable will be set to the
         * new value.
         *<pre>Example call:
         *    set_column_rule_color('#AABBCC');
         *    -> Sets $column_default_values['column-rule-color'] to '#AABBCC'.
         *
         *    set_column_rule_color('#36f79d');
         *    -> Sets $column_default_values['column-rule-color'] to '#36f79d'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::sanitize_color_input() To validate the column
         * rule color input.
         *
         * @used-by Lnrd_Css_Section::set_column_default_values() To set the
         * default column rule color value for the calling Lnrd_Css_Section object.
         *
         * @param string $column_rule_color The new column rule color default value.
         * Legal values are: any valid hex color.
         *
         * @return void
         */
        public function set_column_rule_color($column_rule_color) {
            if ($this->sanitize_color_input($column_rule_color)) {
                $this->column_default_values['column-rule-color'] = strtolower($column_rule_color);
            }
        } // CHECKED.


        /**
         * Sets the column rule style default value.
         *
         * Sets the default value for the column rule style setting on the WordPress
         * theme customizer page. If the new setting is valid the
         * $column_default_values['column-rule-style'] variable will be set to the
         * new value.
         *<pre>Example call:
         *    set_column_rule_style('groove');
         *    -> Sets $column_default_values['column-rule-style'] to 'groove'.
         *
         *    set_column_rule_style('solid');
         *    -> Sets $column_default_values['column-rule-style'] to 'solid'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::set_column_default_values() To set the
         * default column rule style value for the calling Lnrd_Css_Section object.
         *
         * @param string $column_rule_style The new column rule style default value.
         * Legal values are: 'none', 'hidden', 'dotted', 'dashed', 'solid',
         * 'double', 'groove', 'ridge', 'inset' and 'outset'.
         *
         * @return void
         */
        public function set_column_rule_style($column_rule_style) {
            // Get legal column rule style values.
            $legal_values = array();
            foreach ($this->default_column_rule_style_values as $value) {
                array_push($legal_values, $value);
            }

            // Convert css column rule style value to a WordPress theme
            // customizer HTML select list value.
            if (in_array(strtolower($column_rule_style), $legal_values)) {
                $css_to_value = '';

                switch (strtolower($column_rule_style)) {
                    case 'none':
                        $css_to_value = 'value1';
                        break;
                    case 'hidden':
                        $css_to_value = 'value2';
                        break;
                    case 'dotted':
                        $css_to_value = 'value3';
                        break;
                    case 'dashed':
                        $css_to_value = 'value4';
                        break;
                    case 'solid':
                        $css_to_value = 'value5';
                        break;
                    case 'double':
                        $css_to_value = 'value6';
                        break;
                    case 'groove':
                        $css_to_value = 'value7';
                        break;
                    case 'ridge':
                        $css_to_value = 'value8';
                        break;
                    case 'inset':
                        $css_to_value = 'value9';
                        break;
                    case 'outset':
                        $css_to_value = 'value10';
                        break;
                } // END switch statement.

                $this->column_default_values['column-rule-style'] = $css_to_value;
            } // END if statement.
        } // CHECKED.


        /**
         * Sets the column rule width default value.
         *
         * Sets the default value for the column rule width setting on the WordPress
         * theme customizer page. If the new setting is valid the
         * $column_default_values['column-rule-width'] and
         * $column_default_values['column-rule-width-unit'] variable will be set to
         * the new values.
         *<pre>Example call:
         *    set_column_rule_width(array('thick'));
         *    -> Sets $column_default_values['column-rule-width'] to 'thick'.
         *
         *    set_column_rule_width(array('10'));
         *    -> Sets $column_default_values['column-rule-width'] to '10'.
         *
         *    set_column_rule_width(array('10', 'em'));
         *    -> Sets $column_default_values['column-rule-width'] to '10' and
         *    -> Sets $column_default_values['column-rule-width-unit'] to 'value2'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::css_length_to_select_value() To convert a
         * css length value to a WordPress theme customizer HTML select list value.
         *
         * @used-by Lnrd_Css_Section::set_column_default_values() To set the
         * default column rule width value for the calling Lnrd_Css_Section object.
         *
         * @param mixed[] $column_rule_width The new column rule width default values.
         * Legal values for $column_rule_width[0] are: 'thin', 'medium', 'thick'
         * or a number. Legal values for $column_rule_width[1] are: 'px', 'em',
         * 'ex', 'rem', 'cm', 'mm', 'in', 'pt' and 'pc'.
         *
         * @return void
         */
        public function set_column_rule_width($column_rule_width) {
            $legal_values = array('thin', 'medium', 'thick');

            // Get the legal css lengths.
            $legal_units = array();
            foreach ($this->default_column_unit_values as $value) {
                array_push($legal_units, $value);
            } // END foreach statement.

            if (count($column_rule_width) == 2) {

                if (is_numeric($column_rule_width[0])) {
                    $this->column_default_values['column-rule-width'] = $column_rule_width[0];
                } else if (in_array(strtolower($column_rule_width[0]), $legal_values)) {
                    $this->column_default_values['column-rule-width'] = strtolower($column_rule_width[0]);
                } // END if/else statement.

                if (in_array(strtolower($column_rule_width[1]), $legal_units)) {
                    $this->column_default_values['column-rule-width-unit'] = $this->css_length_to_select_value(strtolower($column_rule_width[1]));
                } // END if statement.

            } else if (count($column_rule_width) == 1) {

                if (in_array(strtolower($column_rule_width[0]), $legal_values) || is_numeric($column_rule_width[0])) {
                    $this->column_default_values['column-rule-width'] = strtolower($column_rule_width[0]);
                } // END if statement.

            } // END if/else statement.
        } // CHECKED.


        /**
         * Sets the column span default value.
         *
         * Sets the default value for the column span setting on the WordPress
         * theme customizer page. If the new setting is valid the
         * $column_default_values['column-span'] variable will be set to the
         * new value.
         *<pre>Example call:
         *    set_column_span('1');
         *    -> Sets $column_default_values['column-span'] to '1'.
         *
         *    set_column_span('all');
         *    -> Sets $column_default_values['column-span'] to 'all'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::set_column_default_values() To set the
         * default column span value for the calling Lnrd_Css_Section object.
         *
         * @param string $column_span The new column span default value.
         * Legal values are: 'all' or a '1'.
         *
         * @return void
         */
        public function set_column_span($column_span) {
            if ($column_span == '1') {
                $this->column_default_values['column-span'] = 'value1';
            }
            else if (strtolower($column_span) == 'all') {
                $this->column_default_values['column-span'] = 'value2';
            }
        } // CHECKED.


        /**
         * Sets the column width default value.
         *
         * Sets the default value for the column width setting on the WordPress
         * theme customizer page. If the new setting is valid the
         * $column_default_values['column-width'] variable will be set to the
         * new value.
         *<pre>Example call:
         *    set_column_width('auto');
         *    -> Sets $column_default_values['column-width'] to 'auto'.
         *
         *    set_column_width(300);
         *    -> Sets $column_default_values['column-width'] to '300'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Multi_Column::sanitize_column_width_input() To check
         * for a legal column width value.
         *
         * @used-by Lnrd_Css_Section::set_column_default_values() To set the
         * default column width value for the calling Lnrd_Css_Section object.
         *
         * @param mixed $column_width The new column width default value.
         * Legal values are: 'auto' or a number.
         *
         * @return void
         */
        public function set_column_width($column_width) {
            $legal_column_width = '';
            $legal_column_width = $this->sanitize_column_width_input($column_width);
            if ($legal_column_width) $this->column_default_values['column-width'] = $legal_column_width;
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * USER INPUT SANITIZERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Checks the column count input.
         *
         * Checks the user input coming from the column count control on the
         * WordPress theme customizer page for a legal css column count value.
         *<pre>Example call:
         *    sanitize_column_count_input('auto');
         *    -> Returns 'auto' as it is a valid value.
         *
         *    sanitize_column_count_input('3');
         *    -> Returns '3' as it is a valid value.
         *
         *    sanitize_column_count_input('foo');
         *    -> Returns nothing as 'foo' is not a valid value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_count() To check user
         * input for the css column count setting.
         *
         * @param string $column_count_input The column count value to check.
         * Legal values are: 'auto' or an integer.
         *
         * @return string the legal css column count value.
         */
        public function sanitize_column_count_input($column_count_input) {
            if (strtolower($column_count_input) == 'auto') {
                return strtolower($column_count_input);
            } else if (is_numeric($column_count_input)) {
                return (string)(int)$column_count_input;               
            }
        } // CHECKED.


        /**
         * Checks the column gap input.
         *
         * Checks the user input coming from the column gap control on the
         * WordPress theme customizer page for a legal css column gap value.
         *<pre>Example call:
         *    sanitize_column_gap_input('normal');
         *    -> Returns 'normal' as it is a valid value.
         *
         *    sanitize_column_gap_input('300');
         *    -> Returns '300' as it is a valid value.
         *
         *    sanitize_column_gap_input('foo');
         *    -> Returns nothing as 'foo' is not a valid value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_gap() To check user
         * input for the css column gap setting.
         *
         * @param string $column_gap_input The column gap value to check.
         * Legal values are: 'normal' or a number.
         *
         * @return string the legal css column gap value.
         */
        public function sanitize_column_gap_input($column_gap_input) {
            if (strtolower($column_gap_input) == 'normal') {
                return strtolower($column_gap_input);
            } else if (is_numeric($column_gap_input)) {
                return $column_gap_input;               
            }
        }


        /**
         * Validates column css length input.
         *
         * Validates the user input from the WordPress theme customizer page for
         * the column css length value.
         *<pre>Example call:
         *    sanitize_column_unit('value1');
         *    -> Returns 'value1' as it is a valid value.
         *
         *    sanitize_column_unit('value9');
         *    -> Returns 'value9' as it is a valid value.
         *
         *    sanitize_column_unit('foo');
         *    -> Returns nothing as 'foo' is not a valid value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_gap() To validate user
         * input for the column gap unit setting.
         * @used-by Lnrd_Css_Multi_Column::get_column_rule_width() To validate user
         * input for the column rule width unit setting.
         * @used-by Lnrd_Css_Multi_Column::get_column_width() To validate user
         * input for the column width unit setting.
         *
         * @param string $column_unit The column unit css length input to validate.
         * Legal values are: 'value1' upto and including 'value9'.
         *
         * @return string The valid column unit css length value.
         */
        public function sanitize_column_unit($column_unit) {
            if (array_key_exists(strtolower($column_unit), $this->default_column_unit_values)) {
                return strtolower($column_unit);
            }
        } // CHECKED.


        /**
         * Checks the column rule color input.
         *
         * Checks the user input coming from the column rule color control on the
         * WordPress theme customizer page for a legal css column rule color value.
         *<pre>Example call:
         *    sanitize_column_rule_color_input('#AADDFF');
         *    -> Returns '#aaddff' as it is a valid value.
         *
         *    sanitize_column_rule_color_input('#4927f4');
         *    -> Returns '#4927f4' as it is a valid value.
         *
         *    sanitize_column_rule_color_input('foo');
         *    -> Returns nothing as 'foo' is not a valid value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_rule_color() To check user
         * input for the css column rule color setting.
         *
         * @param string $column_rule_color_input The column rule color value to check.
         * Legal values are: Any valid hex color value.
         *
         * @return string the legal css column rule color value.
         */
        public function sanitize_column_rule_color_input($column_rule_color_input) {
            $legal = $this->sanitize_color_input($column_rule_color_input);
            if ($legal) return strtolower($column_rule_color_input);
        } // CHECKED.


        /**
         * Checks the column rule style input.
         *
         * Checks the user input coming from the column rule style control on the
         * WordPress theme customizer page for a legal css column rule style value.
         *<pre>Example call:
         *    sanitize_column_rule_style_input('value1');
         *    -> Returns 'value1' as it is a valid value.
         *
         *    sanitize_column_rule_style_input('value10');
         *    -> Returns 'value10' as it is a valid value.
         *
         *    sanitize_column_rule_style_input('foo');
         *    -> Returns nothing as 'foo' is not a valid value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_rule_style() To check user
         * input for the css column rule style setting.
         *
         * @param string $column_rule_style_input The column rule style value to check.
         * Legal values are: 'value1' upto and including 'value10'.
         *
         * @return string the legal css column rule style value.
         */
        public function sanitize_column_rule_style_input($column_rule_style_input) {
            if (array_key_exists(strtolower($column_rule_style_input), $this->default_column_rule_style_values)) {
                return strtolower($column_rule_style_input);
            }
        } // CHECKED.


        /**
         * Checks the column rule width input.
         *
         * Checks the user input coming from the column rule width control on the
         * WordPress theme customizer page for a legal css column rule width value.
         *<pre>Example call:
         *    sanitize_column_rule_width_input('thick');
         *    -> Returns 'thick' as it is a valid value.
         *
         *    sanitize_column_rule_width_input('12');
         *    -> Returns '12' as it is a valid value.
         *
         *    sanitize_column_rule_width_input('foo');
         *    -> Returns nothing as 'foo' is not a valid value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_rule_width() To check user
         * input for the css column rule width setting.
         *
         * @param string $column_rule_width_input The column rule width value to check.
         * Legal values are: 'thin', 'medium', 'thick' or a number.
         *
         * @return string the legal css column rule width value.
         */
        public function sanitize_column_rule_width_input($column_rule_width_input) {
            $legal_values = array('thin', 'medium', 'thick');
            if (in_array(strtolower($column_rule_width_input), $legal_values)) {
                return strtolower($column_rule_width_input);
            } else if (is_numeric($column_rule_width_input)) {
                return $column_rule_width_input;
            }
        } // CHECKED.


        /**
         * Checks the column span input.
         *
         * Checks the user input coming from the column span control on the
         * WordPress theme customizer page for a legal css column span value.
         *<pre>Example call:
         *    sanitize_column_span_input('value1');
         *    -> Returns 'value1' as it is a valid value.
         *
         *    sanitize_column_span_input('value2');
         *    -> Returns 'value2' as it is a valid value.
         *
         *    sanitize_column_span_input('foo');
         *    -> Returns nothing as 'foo' is not a valid value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_span() To check user
         * input for the css column span setting.
         *
         * @param string $column_span_input The column span value to check.
         * Legal values are: 'value1' or 'value2'.
         *
         * @return string the legal css column span value.
         */
        public function sanitize_column_span_input($column_span_input) {
            if ($column_span_input == 'value1' || $column_span_input == 'value2') {
                return $column_span_input;
            }
        } // CHECKED.


        /**
         * Checks the column width input.
         *
         * Checks the user input coming from the column width control on the
         * WordPress theme customizer page for a legal css column width value.
         *<pre>Example call:
         *    sanitize_column_width_input('auto');
         *    -> Returns 'auto' as it is a valid value.
         *
         *    sanitize_column_width_input('300');
         *    -> Returns '300' as it is a valid value.
         *
         *    sanitize_column_width_input('foo');
         *    -> Returns nothing as 'foo' is not a valid value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Multi_Column::get_column_width() To check user
         * input for the css column width setting.
         *
         * @param string $column_width_input The column width value to check.
         * Legal values are: 'auto' or a number.
         *
         * @return string the legal css column width value.
         */
        public function sanitize_column_width_input($column_width_input) {
            if (strtolower($column_width_input) == 'auto') {
                return strtolower($column_width_input);
            } else if (is_numeric($column_width_input)) {
                return $column_width_input;
            } // CHECKED.
        }
    } // END Lnrd_Css_Multi_Column class.
?>
