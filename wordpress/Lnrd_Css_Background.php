<?php
    /**
     * @author Marc Kennedy
     * @copyright 2013 Lucid Nerd
     * @license GNU General Public License, version 3
     * @version 1.0.0
     */
    class Lnrd_Css_Background {
        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE VARIABLES
         * --------------------------------------------------------------------------------
         */

        /**
         * @var string $section_id The name of the Lnrd_Css_Section object
         * that this Lnrd_Css_Background object will be linked to.
         */
        private $section_id;

        /**
         * @var mixed[] $bg_default_values The default values for the
         * css background properties.
         */
        private $bg_default_values;

        /**
         * @var string[] $required_background_properties The required css background properties
         * to render. Expected values -> 'all', 'attachment', 'color', 'image', 'position_x',
         * 'position_y', 'repeat', 'clip', 'origin', 'size'. 
         */
        private $required_background_properties;


        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE METHODS
         * --------------------------------------------------------------------------------
        */
        
        /**
         * Creates a new css background object.
         *
         * Creates a new instance of the Lnrd_Css_Background class. Sets the $section_id instance variable to the desired value, sets the $required_background_properties to the desired value and sets the $bg_default_values instance variable to the correct css background standard default values.
         *<pre>Example call:
         *    new Lnrd_Css_Background('post_text', array('attachment','color','origin')) -> creates a new css background object and sets the $section_id instance variable to the value 'post_text' and sets the $required_background_properties instance variable with the values 'attachment', 'color', 'origin'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::get_css_property_objs() To create a new Lnrd_Css_Background object for the calling Lnrd_Css_Section.
         *
         * @param string $section_id The unique section id(name) of the calling Lnrd_Css_Section object.
         * @param string[] The required css background properties to render within the WordPress theme customizer page.
         *
         * @return self
         */
        function __construct($section_id, $required_background_properties) {
            $this->section_id = $section_id;
            $this->required_background_properties = $required_background_properties;
            $this->bg_default_values = array(
                'attachment' => 'value1', // value1 = scroll.
                'color' => 'transparent',
                'image' => 'none',
                'position' => 'value1', // value1 = left top.
                'repeat' => 'value1', // value1 = repeat.
                'clip' => 'value1', // value1 = border-box.
                'origin' => 'value1', // value1 = padding-box.
                'size_x' => 'auto',
                'size_y' => 'auto',
                'size_x_units' => 'value1', // value1 = 'px'.
                'size_y_units' => 'value1', // value1 = 'px'.
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
         * Gets the unique section id of the Lnrd_Css_Section object to which this Lnrd_Css_Background
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which this Lnrd_Css_Background object is associated with. 
         */
        public function get_section_id() {
            return $this->section_id;
        } // CHECKED.


        /**
         * Gets the required css background properties.
         *
         * Gets the names of the required background properties that were requested by the Lnrd_Css_Section object to which this Lnrd_Css_Background object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string[] The names of the background properties that this Lnrd_Css_Background object has rendered.
         */
        public function get_required_background_properties() {
            return $this->required_background_properties;
        } // CHECKED.


        /**
         * Gets the background properties default values.
         *
         * Gets the default values of the background properties for this Lnrd_Css_Background object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return mixed[] The default values for the background properties for this Lnrd_Css_Background object.
         */
        public function get_background_default_values() {
            return $this->bg_default_values;
        } // CHECKED. 


        /**
         * Renders the background properties.
         * 
         * Renders all of the required css background property settings and
         * controllers for the calling Lnrd_Css_Section.
         *<pre>Example call:
         *    get_background_properties($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Background::get_background_attachment() To render the
         * css background attachment setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_color() To render the
         * css background color setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_image() To render the
         * css background image setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_position_x() To render the
         * css background X position setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_position_y() To render the
         * css background Y position setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_repeat() To render the
         * css background repeat setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_clip() To render the
         * css background clip setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_origin() To render the
         * css background origin setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_size_x() To render the
         * css background X size setting and controller.
         *
         * @uses Lnrd_Css_Background::get_background_size_y() To render the
         * css background Y size setting and controller.
         *
         * @used-by Lnrd_Css_Section::lnrd_render_section To render the css
         * background properties for the calling section.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        public function get_background_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_background_properties as $property) {
                    switch ($property) {
                        case 'attachment':
                            $this->get_background_attachment($wp_customize);
                            break;
                        case 'color':
                            $this->get_background_color($wp_customize);
                            break;
                        case 'image':
                            $this->get_background_image($wp_customize);
                            break;
                        case 'position':
                            $this->get_background_position($wp_customize);
                            break;
                        case 'repeat':
                            $this->get_background_repeat($wp_customize);
                            break;
                        case 'clip':
                            $this->get_background_clip($wp_customize);
                            break;
                        case 'origin':
                            $this->get_background_origin($wp_customize);
                            break;
                        case 'size':
                            $this->get_background_size_x($wp_customize);
                            $this->get_background_size_y($wp_customize);
                            break;
                        case 'all':
                            $this->get_background_attachment($wp_customize);
                            $this->get_background_color($wp_customize);
                            $this->get_background_image($wp_customize);
                            $this->get_background_position($wp_customize);
                            $this->get_background_repeat($wp_customize);
                            $this->get_background_clip($wp_customize);
                            $this->get_background_origin($wp_customize);
                            $this->get_background_size_x($wp_customize);
                            $this->get_background_size_y($wp_customize);
                            break;     
                    } // END switch statement.   
                } // END foreach statement.
            } // END if statement.    
        }

        
        /**
         * Generates the CSS for this background object.
         *
         * Returns a string which is the CSS that is required for this background
         * object. The Css will enable the WordPress theme customizer preview window
         * to update the css to reflect the new changes.
         *<pre>Example:
         *    get_background_css() -> string 'background-attachment:scroll;background-color:#FFFFFF;' etc.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Background::convert_values() To covert the database
         * stored values into useable css values, i.e. 'px', 'em' 'scroll',
         * 'padding-box' etc.
         *
         * @used-by Lnrd_Css_Section::get_section_css() To render the css
         * background styles for the calling section.
         *
         * @return string $css The css background property rules for this background
         * object. See example above.
         */
        public function get_background_css() {
            $css = '';
            foreach ($this->required_background_properties as $property) {
                switch($property) {
                    case 'attachment':
                        $css .= 'background-attachment:' . $this->convert_values('attachment', get_theme_mod($this->section_id . '_css_background_attachment')) . ';';
                        break; 
                    case 'color':
                        $css .= 'background-color:' . get_theme_mod($this->section_id . '_css_background_color') . ';';    
                        break;
                    case 'image':
                        $css .= $this->get_background_image_css();   
                        break;
                    case 'position':
                        $css .= 'background-position:' . $this->convert_values('position', get_theme_mod($this->section_id . '_css_background_position')) . ';';
                        break;
                    case 'repeat':
                        $css .= 'background-repeat:' . $this->convert_values('repeat', get_theme_mod($this->section_id . '_css_background_repeat')) . ';';
                        break;
                    case 'clip':
                        $css .= 'background-clip:' . $this->convert_values('clip', get_theme_mod($this->section_id . '_css_background_clip')) . ';';
                        break;
                    case 'origin':
                        $css .= 'background-origin:' . $this->convert_values('origin', get_theme_mod($this->section_id . '_css_background_origin')) . ';';
                        break;
                    case 'size':
                        $css .= $this->get_background_size_css();
                        break;
                    case 'all':
                        $css .= 'background-attachment:' . $this->convert_values('attachment', get_theme_mod($this->section_id . '_css_background_attachment')) . ';';
                        $css .= 'background-color:' . get_theme_mod($this->section_id . '_css_background_color') . ';';
                        $css .= $this->get_background_image_css();
                        $css .= 'background-position:' . $this->convert_values('position', get_theme_mod($this->section_id . '_css_background_position')) . ';';
                        $css .= 'background-repeat:' . $this->convert_values('repeat', get_theme_mod($this->section_id . '_css_background_repeat')) . ';';
                        $css .= 'background-clip:' . $this->convert_values('clip', get_theme_mod($this->section_id . '_css_background_clip')) . ';';
                        $css .= 'background-origin:' . $this->convert_values('origin', get_theme_mod($this->section_id . '_css_background_origin')) . ';';
                        $css .= $this->get_background_size_css();
                        break;
                }
            }
            return $css;
        } // CHECKED.

        /**
         * Creates the background image css rule.
         *
         * Check to see if we have a background image. If we do it adds url("") to the output.
         *<pre>Examples:
         *    If the backround image is set to the default 'none'
         *    we return the string 'background-image:none;'
         *
         *    If we have a background image we add 'url("")' to 
         *    the string 'background-image:url("image_one.jpg")'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_css() To render the
         * background-image css style rule.
         *
         * @return string The background image style rule. See above examples.
         */
        private function get_background_image_css() {
            $css = '';
            if (get_theme_mod($this->section_id . '_css_background_image') == 'none') {
                $css .= 'background-image:' . get_theme_mod($this->section_id . '_css_background_image') . ';';
            } else {
                $css .= 'background-image: url("' . get_theme_mod($this->section_id . '_css_background_image') . '");';
            }
            return $css;
        } // CHECKED.

        /**
         *
         */
        private function get_background_size_css() {
            $css ='';
            if (is_numeric(get_theme_mod($this->section_id . '_css_background_size_x')) && is_numeric(get_theme_mod($this->section_id . '_css_background_size_y'))) {
                $css .= 'background-size:' . get_theme_mod($this->section_id . '_css_background_size_x') . $this->convert_values('size', get_theme_mod($this->section_id . '_css_background_size_x_units')) . ' ' . get_theme_mod($this->section_id . '_css_background_size_y') . $this->convert_values('size', get_theme_mod($this->section_id . '_css_background_size_y_units')) .';';
            } else if (get_theme_mod($this->section_id . '_css_background_size_x') == 'cover' || get_theme_mod($this->section_id . '_css_background_size_y') == 'cover') {
                $css .= 'background-size:cover;';
            } else if (get_theme_mod($this->section_id . '_css_background_size_x') == 'contain' || get_theme_mod($this->section_id . '_css_background_size_y') == 'contain') {
                $css .= 'background-size:contain;';
            } else if (is_numeric(get_theme_mod($this->section_id . '_css_background_size_x'))) {
                $css .= 'background-size:' . get_theme_mod($this->section_id . '_css_background_size_x') . $this->convert_values('size', get_theme_mod($this->section_id . '_css_background_size_x_units')) . ' auto;';
            } else if (is_numeric(get_theme_mod($this->section_id . '_css_background_size_y'))) {
                $css .= 'background-size:auto ' . get_theme_mod($this->section_id . '_css_background_size_y') . $this->convert_values('size', get_theme_mod($this->section_id . '_css_background_size_y_units')) .';';
            } else {
                $css .= 'background-size:' . get_theme_mod($this->section_id . '_css_background_size_x') . ' ' . get_theme_mod($this->section_id . '_css_background_size_y') . ';';
            }
            return $css;
        }


        /**
         * Creates a background attachment setting and control within the
         * required section on the WordPress theme customizer page.
         *
         * Creates a background attachment setting and controller on the
         * WordPress theme customizer page for choosing the required css
         * background attachment setting. Legal values are the strings 'scroll',
         * 'fixed', 'local'.
         *<pre>Example Call:
         *    get_background_attachment($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses Lnrd_Css_Background::sanitize_background_attachment_input()
         * To check the users input is valid before we store it to the database.
         *
         * @used-by Lnrd_Css_Background::get_background_properties() To render the
         * background attachment control within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class. 
         */
        private function get_background_attachment($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id . '_css_background_attachment', array(
                    'default' => $this->bg_default_values['attachment'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_attachment_input'),
                ));

                $wp_customize->add_control($this->section_id . '_css_background_attachment', array(
                        'label' => __('Background attachment', 'lnrd_ultimate_css'),
                        'section' => $this->section_id,
                        'settings' => $this->section_id . '_css_background_attachment',
                        'priority' => 3,
                        'type' => 'select',
                        'choices' => array(
                            'value1' => 'scroll',
                            'value2' => 'fixed',
                            'value3' => 'local',
                        ),
                ));
            }
        } // CHECKED.


        /**
         * Creates a background color setting and control within the required
         * section on the WordPress theme customizer page.
         *
         * Creates a background color setting and controller on the WordPress
         * theme customizer page for choosing the required css background color.
         *<pre>Example Call:
         *    get_background_color($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses Lnrd_Css_Background::sanitize_background_color_input()
         * To check the users input is valid before we store it to the database.
         *
         * @used-by Lnrd_Css_Background::get_background_properties()
         * To render the background color control within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class. 
         */
        private function get_background_color($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id . '_css_background_color', array(
                    'default' => $this->bg_default_values['color'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_color_input'),
                ));

                $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $this->section_id . '_css_background_color', array(
                    'label' => __('Background color', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_color',
                    'priority' => 4,
                )));
            }
        } // CHECKED.


        /**
         * Creates a background image setting and control within the required
         * section on the WordPress theme customizer page.
         *
         * Creates a background image setting and controller on the WordPress
         * theme customizer page for choosing the required css background image.
         *<pre>Example Call:
         *    get_background_image($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses Lnrd_Css_Background::sanitize_background_image_input() To check the background
         * image input for a legal value.
         *
         * @used-by Lnrd_Css_Background::get_background_properties()
         * To render the background image control within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_background_image($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id . '_css_background_image', array(
                    'default' => $this->bg_default_values['image'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_image_input'),
                ));

                $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $this->section_id . '_css_background_image', array(
                    'label' => __('Background image', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_image',
                    'priority' => 5,
                ))); 
            }
        } // CHECKED.


        /**
         * Creates a background position setting and control within the required
         * section on the WordPress theme customizer page.
         *
         * Creates a background position setting and controller on the WordPress
         * theme customizer page for choosing the required css background position.
         *<pre>Example Call:
         *    get_background_position($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses lnrd_Css_Background::sanitize_background_position_input() To check the user input
         * for a legal background position value.
         *
         * @used-by Lnrd_Css_Background::get_background_properties()
         * To render the background position control within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_background_position($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id .'_css_background_position', array(
                    'default' => $this->bg_default_values['position'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_position_input'),
                ));

                $wp_customize->add_control($this->section_id .'_css_background_position', array(
                    'label' => __('Background position', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id .'_css_background_position',
                    'priority' => 6,
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'left top',
                        'value2' => 'left center',
                        'value3' => 'left bottom',
                        'value4' => 'right top',
                        'value5' => 'right center',
                        'value6' => 'right bottom',
                        'value7' => 'center top',
                        'value8' => 'center center',
                        'value9' => 'center bottom',
                        'value10' => 'inherit',
                    ),
                ));
            }    
        } // CHECKED.


        /**
         * Creates a background repeat setting and control within the required
         * section on the WordPress theme customizer page.
         *
         * Creates a background repeat setting and controller on the WordPress
         * theme customizer page for choosing the required css background repeat setting.
         *<pre>Example Call:
         *    get_background_repeat($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses Lnrd_Css_Background::sanitize_background_repeat_input() To check user input
         * for a valid background repeat value.
         *
         * @used-by Lnrd_Css_Background::get_background_properties()
         * To render the background repeat control within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_background_repeat($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id . '_css_background_repeat', array(
                    'default' => $this->bg_default_values['repeat'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_repeat_input'),
                ));

                $wp_customize->add_control($this->section_id . '_css_background_repeat', array(
                    'label' => __('Background repeat', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_repeat',
                    'priority' => 7,
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'repeat',
                        'value2' => 'repeat-x',
                        'value3' => 'repeat-y',
                        'value4' => 'no-repeat',
                        'value5' => 'inherit',
                    ),
                ));
            }
        } // CHECKED.


        /**
         * Creates a background clip setting and control within the required
         * section on the WordPress theme customizer page.
         *
         * Creates a background clip setting and controller on the WordPress
         * theme customizer page for choosing the required css background clip setting.
         *<pre>Example Call:
         *    get_background_clip($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses Lnrd_Css_Background::sanitize_background_clip_input() To check user input for
         * a valid background clip value.
         *
         * @used-by Lnrd_Css_Background::get_background_properties()
         * To render the background clip control within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_background_clip($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id . '_css_background_clip', array(
                    'default' => $this->bg_default_values['clip'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_clip_input'),
                ));

                $wp_customize->add_control($this->section_id . '_css_background_clip', array(
                    'label' => __('Background clip', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_clip',
                    'priority' => 8,
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'border-box',
                        'value2' => 'padding-box',
                        'value3' => 'content-box',
                    ),                    
                ));
            }
        } // CHECKED.


        /**
         * Creates a background origin setting and control within the required
         * section on the WordPress theme customizer page.
         *
         * Creates a background origin setting and controller on the WordPress
         * theme customizer page for choosing the required css background origin setting.
         *<pre>Example Call:
         *    get_background_origin($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses Lnrd_Css_Background::sanitize_background_origin_input() To check user input
         * for a valid background origin value.
         *
         * @used-by Lnrd_Css_Background::get_background_properties()
         * To render the background origin control within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_background_origin($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id . '_css_background_origin', array(
                    'default' => $this->bg_default_values['origin'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_origin_input'),
                ));

                $wp_customize->add_control($this->section_id . '_css_background_origin', array(
                    'label' => __('Background origin', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_origin',
                    'priority' => 9,
                    'type' => 'select',
                    'choices' => array(
                        'value1' => 'padding-box',
                        'value2' => 'border-box',
                        'value3' => 'content-box',
                    ),                    
                ));
            }
        } // CHECKED.


        /**
         * Creates a background X size setting and control within the required
         * section on the WordPress theme customizer page.
         *
         * Creates a background X size setting and controller on the WordPress
         * theme customizer page for choosing the required css background X size
         * and background X size length setting.
         *<pre>Example Call:
         *   get_background_size_x($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses Lnrd_Css_Background::sanitize_background_size_input() To check user input
         * for a valid background size value.
         * @uses Lnrd_Css_Background::sanitize_background_size_units_input() To check user input
         * for a valid background size css length.
         *
         * @used-by Lnrd_Css_Background::get_background_properties()
         * To render the background X size controls within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_background_size_x($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id . '_css_background_size_x', array(
                    'default' => $this->bg_default_values['size_x'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_size_input'),
                ));

                $wp_customize->add_control($this->section_id . '_css_background_size_x', array(
                    'label' => __('Background X size', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_size_x',
                    'priority' => 10,      
                ));

                $wp_customize->add_setting($this->section_id . '_css_background_size_x_units', array(
                    'default' => $this->bg_default_values['size_x_units'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_size_units_input'),
                ));


                $wp_customize->add_control($this->section_id . '_css_background_size_x_units', array(
                    'label' => __('', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_size_x_units',
                    'priority' => 11,
                    'type' => 'select',
                    'choices' => array(
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
                    ),    
                ));
            }
        } // CHECKED.


        /**
         * Creates a background Y size setting and control within the required
         * section on the WordPress theme customizer page.
         *
         * Creates a background Y size setting and controller on the WordPress
         * theme customizer page for choosing the required css background Y size
         * and background Y size length setting.
         *<pre>Example Call:
         *   get_background_size_y($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_setting()
         * To create a customizer setting.
         * @uses \wp-includes\class-wp-customize-manager.php\WP_Customize_Manager::add_control()
         * To create a customizer control.
         * @uses Lnrd_Css_Background::sanitize_background_size_input() To check user input
         * for a valid background size value.
         * @uses Lnrd_Css_Background::sanitize_background_size_units_input() To check user input
         * for a valid background size css length.
         *
         * @used-by Lnrd_Css_Background::get_background_properties()
         * To render the background y size controls within the WordPress theme customizer page.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         */
        private function get_background_size_y($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                $wp_customize->add_setting($this->section_id . '_css_background_size_y', array(
                    'default' => $this->bg_default_values['size_y'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_size_input'),
                ));

                $wp_customize->add_control($this->section_id . '_css_background_size_y', array(
                    'label' => __('Background Y size', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_size_y',
                    'priority' => 12,      
                ));

                $wp_customize->add_setting($this->section_id . '_css_background_size_y_units', array(
                    'default' => $this->bg_default_values['size_y_units'],
                    'transport' => 'refresh',
                    'sanitize_callback' => array($this, 'sanitize_background_size_units_input'),
                ));


                $wp_customize->add_control($this->section_id . '_css_background_size_y_units', array(
                    'label' => __('', 'lnrd_ultimate_css'),
                    'section' => $this->section_id,
                    'settings' => $this->section_id . '_css_background_size_y_units',
                    'priority' => 13,
                    'type' => 'select',
                    'choices' => array(
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
                    ),    
                ));
            }
        } // CHECKED.

        /* 
         * --------------------------------------------------------------------------------
         * SANITIZERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Checks the users input for a valid css background size unit value.
         *
         * Checks the user input coming in from the theme customizer background size unit value select boxes.
         * If the value is legal then we can allow the value to be saved to the database. Legal
         * values: 'px', '%', 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt' and 'pc'.
         *<pre>Example call:
         *    set_sanitized_padding_unit_input('value1') -> value1 is a legal value so the theme customizer screen updates.
         *    set_sanitized_padding_unit_input('value5') -> value5 is a legal value so the theme customizer screen updates.
         *    set_sanitized_padding_unit_input('foo') -> foo is not a legal value so the theme customizer screen does not update.
         *    set_sanitized_padding_unit_input('value12') -> value12 is not a legal value so the theme customizer screen does not update.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_size_x() To check the
         * user input for a valid value.
         * @used-by Lnrd_Css_Background::get_background_size_y() To check the
         * user input for a valid value.
         *
         * @param string $bg_size_units_input The background size unit value to be checked. See example call above. 
         *
         * @return string The new background size value if it is a legal value.
         */
        public function sanitize_background_size_units_input($bg_size_units_input) {
            $legal_size_unit_values = array(
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

            if (array_key_exists($bg_size_units_input, $legal_size_unit_values)) {
                return $bg_size_units_input;       
            }
        } // CHECKED.


        /**
         * Checks the user input for the background size setting.
         *
         * Validates the user input for the background size setting on the
         * WordPress theme customizer page. If the value is legal it returns the
         * new value, which updates the setting and the preview window. If the
         * value is not legal the value and the preview remain unchanged.
         *<pre>Example Call:
         *    sanitize_background_size_input('contain')
         *    Legal values are 'auto', 'cover', 'contain' or numbers,
         *    i.e. 2, 47, 3.1415 etc. Anything else will be ignored and leave
         *    the current setting unchanged.</pre> 
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_size_x() To check the
         * user input for a valid value.
         * @used-by Lnrd_Css_Background::get_background_size_y() To check the
         * user input for a valid value.
         *
         * @param string $bg_size_input The new user submitted value to validate.
         *
         * @return string The new background size value if it is a legal value.
         */
        public function sanitize_background_size_input($bg_size_input) {
            $legal_size_values = array('auto', 'cover', 'contain',);

            if (in_array($bg_size_input, $legal_size_values)) {
                return $bg_size_input;
            } else if (is_numeric($bg_size_input)) {
                return $bg_size_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the background origin setting.
         *
         * Validates the user input for the background origin setting on the
         * WordPress theme customizer page. If the value is legal it returns the
         * new value, which updates the setting and the preview window. If the
         * value is not legal the value and the preview remain unchanged.
         *<pre>Example Call:
         *    sanitize_background_origin_input('value2')
         *    Legal values are 'value1', 'value2' and 'value3'.
         *    Anything else will be ignored and leave the current setting unchanged.</pre> 
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_origin() To check the
         * user input for a valid value.
         *
         * @param string $bg_origin_input The new user submitted value to validate.
         *
         * @return string The new user submtted valid value.
         */
        public function sanitize_background_origin_input($bg_origin_input) {
            $legal_origin_values = array(
                'value1' => 'padding-box',
                'value2' => 'border-box',
                'value3' => 'content-box',
            );

            if (array_key_exists($bg_origin_input, $legal_origin_values)) {
                return $bg_origin_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the background clip setting.
         *
         * Validates the user input for the background clip setting on the
         * WordPress theme customizer page. If the value is legal it returns the
         * new value, which updates the setting and the preview window. If the
         * value is not legal the value and the preview remain unchanged.
         *<pre>Example Call:
         *    sanitize_background_clip_input('value2')
         *    Legal values are 'value1', 'value2' and 'value3'.
         *    Anything else will be ignored and leave the current setting unchanged.</pre> 
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_clip() To check the
         * user input for a valid value.
         *
         * @param string $bg_clip_input The new user submitted value to validate.
         *
         * @return string The new user submitted valid value.
         */
        public function sanitize_background_clip_input($bg_clip_input) {
            $legal_clip_values = array(
                'value1' => 'border-box',
                'value2' => 'padding-box',
                'value3' => 'content-box',
            );

            if (array_key_exists($bg_clip_input, $legal_clip_values)) {
                return $bg_clip_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the background repeat setting.
         *
         * Validates the user input for the background repeat setting on the
         * WordPress theme customizer page. If the value is legal it returns the
         * new value, which updates the setting and the preview window. If the
         * value is not legal the value and the preview remain unchanged.
         *<pre>Example Call:
         *    sanitize_background_repeat_input('value2')
         *    Legal values are 'value1', 'value2' upto and including 'value5'.
         *    Anything else will be ignored and leave the current setting unchanged.</pre> 
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_repeat() To check the
         * user input for a valid value.
         *
         * @param string $bg_repeat_input The new user submitted value to validate.
         *
         * @return string The new user submitted valid value.
         */
        public function sanitize_background_repeat_input($bg_repeat_input) {
            $legal_repeat_values = array(
                'value1' => 'repeat',
                'value2' => 'repeat-x',
                'value3' => 'repeat-y',
                'value4' => 'no-repeat',
                'value5' => 'inherit',
            );

            if (array_key_exists($bg_repeat_input, $legal_repeat_values)) {
                return $bg_repeat_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the background position setting.
         *
         * Validates the user input for the background position setting on the
         * WordPress theme customizer page. If the value is legal it returns the
         * new value, which updates the setting and the preview window. If the
         * value is not legal the value and the preview remain unchanged.
         *<pre>Example Call:
         *    sanitize_background_position_input('value2')
         *    Legal values are 'value1', 'value2' upto and including 'value10'.
         *    Anything else will be ignored and leave the current setting unchanged.</pre> 
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_position() To check the
         * user input for a valid value.
         *
         * @param string bg_position_input The new user submitted value to validate.
         *
         * @return string The new user submitted valid value.
         */
        public function sanitize_background_position_input($bg_position_input) {
            $legal_position_values = array(
                'value1' => 'left top',
                'value2' => 'left center',
                'value3' => 'left bottom',
                'value4' => 'right top',
                'value5' => 'right center',
                'value6' => 'right bottom',
                'value7' => 'center top',
                'value8' => 'center center',
                'value9' => 'center bottom',
                'value10' => 'inherit',
            );

            if (array_key_exists($bg_position_input, $legal_position_values)) {
                return $bg_position_input;
            }
        } // CHECKED.


        /**
         * TODO
         */
        public function sanitize_background_image_input($bg_image_input) {
            return $bg_image_input;
        }


        /**
         * TODO
         * Checks the user input for the background color setting.
         *
         * Validates the user input for the background color setting on the
         * WordPress theme customizer page. If the value is legal it returns the
         * new value, which updates the setting and the preview window. If the
         * value is not legal the value and the preview remain unchanged.
         *<pre>Example Call:
         *    sanitize_background_color_input('#EEEEEE')</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_color() To check the
         * user input for a valid value.
         *
         * @param string $bg_color_input The new user submitted value to validate.
         *
         * @return string $bg_color_input the new user submited valid value.
         */
        public function sanitize_background_color_input($bg_color_input) {
            if ($bg_color_input == FALSE) {
                $bg_color_input = 'transparent';
            }
            return $bg_color_input;
        }


        /**
         * Checks the user input for the background attachment setting.
         *
         * Validates the user input for the background attachment setting on the
         * WordPress theme customizer page. If the value is legal it returns the
         * new value, which updates the setting and the preview window. If the
         * value is not legal the value and the preview remain unchanged.
         *<pre>Example Call:
         *    sanitize_background_attachment_input('value2')
         *    Legal values are 'value1', 'value2' and 'value3'. Anything else will
         *    be ignored and leave the current setting unchanged.</pre> 
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::get_background_attachment() To check the
         * user input for a valid value.
         *
         * @param string $bg_attachment_input The new user submitted value to validate.
         *
         * @return string The new user submitted valid value.
         */
        public function sanitize_background_attachment_input($bg_attachment_input) {
            $legal_attachment_values = array(
                'value1' => 'scroll',
                'value2' => 'fixed',
                'value3' => 'local',
            );

            if (array_key_exists($bg_attachment_input, $legal_attachment_values)) {
                return $bg_attachment_input;
            }
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
         */

         /**
          * Sets the background size unit.
          *
          * Converts the css length value to a WordPress theme customizer HTML
          * select value then sets the $bg_default_values instance variable to
          * the new value.
          *<pre>Example call:
          *    set_background_size_units('size_y_units', 'em')
          *    Sets the $bg_default_values['size_y_units'] instance variable to the value 'em'.</pre>
          *
          * @author Marc Kennedy
          *
          * @since 1.0.0
          *
          * @used-by Lnrd_Css_Background::set_background_size_y_unit() To set the background Y
          * size unit length.
          * @used-by Lnrd_Css_Background::set_background_size_x_unit() To set the background X
          * size unit length.
          *
          * @param string $property The backround size unit to set. Legal values
          * are: 'size_y_units', 'size_x_units'.
          * @param string $default_size_unit The new css length value. Legal values
          * are: 'px', '%', 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', and 'pc'.
          *
          * @return void
         */
        private function set_background_size_units($property, $default_size_unit) {
            switch ($default_size_unit) {
                case 'px':
                    $this->bg_default_values[$property] = 'value1';
                    break;
                case '%':
                    $this->bg_default_values[$property] = 'value2';
                    break;
                case 'em':
                    $this->bg_default_values[$property] = 'value3';
                    break;
                case 'ex':
                    $this->bg_default_values[$property] = 'value4';
                    break;
                case 'rem':
                    $this->bg_default_values[$property] = 'value5';
                    break;
                case 'cm':
                    $this->bg_default_values[$property] = 'value6';
                    break;
                case 'mm':
                    $this->bg_default_values[$property] = 'value7';
                    break;
                case 'in':
                    $this->bg_default_values[$property] = 'value8';
                    break;
                case 'pt':
                    $this->bg_default_values[$property] = 'value9';
                    break;
                case 'pc':
                    $this->bg_default_values[$property] = 'value10';
                    break;
            }
        } // CHECKED.


        /**
         * Sets the background Y sizes css length.
         *
         * Sets the background Y size css length to the desired value.
         *<pre>Example call:
         *    set_background_size_y_unit('px') -> sets the $bg_default_values['size_y_units'] variable to the value 'value1'.
         *    set_background_size_y_unit('cm') -> sets the $bg_default_values['size_y_units'] variable to the value 'value6'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Background::set_background_size_units() To convert
         * and set the css length value to a WordPress theme customizer HTML
         * select value.
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_size_y_unit The new css length value. Legal values
          * are: 'px', '%', 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', and 'pc'.
         *
         * @return void
         */
        public function set_background_size_y_unit($default_size_y_unit) {
            $this->set_background_size_units('size_y_units', $default_size_y_unit);
        } // CHECKED.


        /**
         * Sets the background X sizes css length.
         *
         * Sets the background X size css length to the desired value.
         *<pre>Example call:
         *    set_background_size_x_unit('px') -> sets the $bg_default_values['size_y_units'] variable to the value 'value1'.
         *    set_background_size_x_unit('cm') -> sets the $bg_default_values['size_y_units'] variable to the value 'value6'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Background::set_background_size_units() To convert
         * and set the css length value to a WordPress theme customizer HTML
         * select value.
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_size_x_unit The new css length value. Legal values
          * are: 'px', '%', 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', and 'pc'.
         *
         * @return void
         */
        public function set_background_size_x_unit($default_size_x_unit) {
            $this->set_background_size_units('size_x_units', $default_size_x_unit);
        } // CHECKED.


        /**
         * Sets the background size value.
         *
         * Sets the $bg_default_values instance variable to the desired value.
         *<pre>Example call:
         *    set_background_size('size_y', 'cover'); -> Sets the $bg_default_values['size_y'] variable to the value 'cover'.
         *    set_background_size('size_y', 3.1415); -> Sets the $bg_default_values['size_y'] variable to the value 3.1415.
         *    set_background_size('size_x', 20); -> Sets the $bg_default_values['size_x'] variable to the value 20.
         *    set_background_size('size_y', 'contain'); -> Sets the $bg_default_values['size_y'] variable to the value 'contain'.
         *    set_background_size('size_x', 'foo'); -> Does nothing as 'foo' is not a legal value for the background size property.'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Background::set_background_size_y() To set the
         * background size to a new default value.
         * @used-by Lnrd_Css_Background::set_background_size_x() To set the
         * background size to a new default value.
         *
         * @param string $property The background size property to change. Legal
         * values are: 'size_y', 'size_x'. Sets the $bg_default_values['size_y'/'size_x']
         * variable to the new default value.
         * @param mixed $default_size_value The background size new default
         * value. Legal values are: 'auto', 'cover', 'contain' or a number. See example above.
         *
         * @return void
         */
        private function set_background_size($property, $default_size_value) {
            $legal_str_values = array('auto', 'cover', 'contain');
            if (in_array($default_size_value,  $legal_str_values)) {
                $this->bg_default_values[$property] = $default_size_value;
            } else if (is_numeric($default_size_value)) {
                $this->bg_default_values[$property] = $default_size_value;
            }
        } // CHECKED.


        /**
         * Sets the background Y size default value.
         *
         * Sets the $bg_default_values['size_y'] instance variables default value.
         *<pre>Example call:
         *    set_background_size_y('contain'); -> Sets the $bg_default_values['size_y'] variable to the value 'contain'.
         *    set_background_size_y(3.1415); -> Sets the $bg_default_values['size_y'] variable to the value 3.1415.
         *    set_background_size_y(22); -> Sets the $bg_default_values['size_y'] variable to the value 22.
         *    set_background_size_y('foo'); -> Does nothing as 'foo' is not a legal value for the background size property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Background::set_background_size() To set the
         * $bg_default_values['size_y'] instance variable if the new value is legal.
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param mixed $default_size_y_value The new background size default
         * value. Legal values are: 'auto', 'cover', 'contain' or a number. See example above.
         *
         * @return void 
         */
        public function set_background_size_y($default_size_y_value) {
            $this->set_background_size('size_y', $default_size_y_value);
        } // CHECKED.


        /**
         * Sets the background X size default value.
         *
         * Sets the $bg_default_values['size_x'] instance variables default value.
         *<pre>Example call:
         *    set_background_size_x('contain'); -> Sets the $bg_default_values['size_x'] variable to the value 'contain'.
         *    set_background_size_x(3.1415); -> Sets the $bg_default_values['size_x'] variable to the value 3.1415.
         *    set_background_size_x(22); -> Sets the $bg_default_values['size_x'] variable to the value 22.
         *    set_background_size_x('foo'); -> Does nothing as 'foo' is not a legal value for the background size property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Background::set_background_size() To set the
         * $bg_default_values['size_x'] instance variable if the new value is legal.
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param mixed $default_size_x_value The new background size default
         * value. Legal values are: 'auto', 'cover', 'contain' or a number. See example above.
         *
         * @return void 
         */
        public function set_background_size_x($default_size_x_value) {
            $this->set_background_size('size_x', $default_size_x_value);
        } // CHECKED.


        /**
         * Sets the background origin default value.
         *
         * Sets the background origins default value, if the new value is
         * valid it sets the $bg_default_values['origin'] instance variable
         * to the new value. Valid values are 'padding-box', 'border-box' and 'content-box'.
         *<pre>Example calls:
         *    set_background_origin('content-box') -> sets the default origin
         *    value to 'content-box'.
         *    set_background_origin('foo') -> leaves the default value
         *    unchanged as foo is not a valid value for the background origin property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_origin_value The new background origin default
         * value. Valid values are 'padding-box', 'border-box' and 'content-box'.
         *
         * @return void
         */
        public function set_background_origin($default_origin_value) {
            if (is_string($default_origin_value)) {
                $default_origin_value = strtolower($default_origin_value);
                switch ($default_origin_value) {
                    case 'padding-box':
                        $default_origin_value = 'value1';
                        $this->bg_default_values['origin'] = $default_origin_value;
                        break;
                    case 'border-box':
                        $default_origin_value = 'value2';
                        $this->bg_default_values['origin'] = $default_origin_value;
                        break;
                    case 'content-box':
                        $default_origin_value = 'value3';
                        $this->bg_default_values['origin'] = $default_origin_value;
                        break;
                }
            }
       } // CHECKED.


        /**
         * Sets the background clip default value.
         *
         * Sets the background clips default value, if the new value is
         * valid it sets the $bg_default_values['clip'] instance variable
         * to the new value. Valid values are 'border-box', 'padding-box' and 'content-box'.
         *<pre>Example calls:
         *    set_background_clip('content-box') -> sets the default clip
         *    value to 'content-box'.
         *    set_background_clip('foo') -> leaves the default value
         *    unchanged as foo is not a valid value for the background clip property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_clip_value The new background clip default
         * value. Valid values are 'border-box', 'padding-box' and 'content-box'.
         *
         * @return void
         */
        public function set_background_clip($default_clip_value) {
            if (is_string($default_clip_value)) $default_clip_value = strtolower($default_clip_value);
            switch ($default_clip_value) {
                case 'border-box':
                    $default_clip_value = 'value1';
                    $this->bg_default_values['clip'] = $default_clip_value;
                    break;
                case 'padding-box':
                    $default_clip_value = 'value2';
                    $this->bg_default_values['clip'] = $default_clip_value;
                    break;
                case 'content-box':
                    $default_clip_value = 'value3';
                    $this->bg_default_values['clip'] = $default_clip_value;
                    break;
            }
        } // CHECKED.


        /**
         * Sets the background repeat default value.
         *
         * Sets the background repeats default value, if the new value is
         * valid it sets the $bg_default_values['repeat'] instance variable
         * to the new value. Valid values are 'repeat', 'repeat-x', 'repeat-y',
         * 'no-repeat' and 'inherit'.
         *<pre>Example calls:
         *    set_background_repeat('no-repeat') -> sets the default repeat
         *    value to 'no-repeat'.
         *    set_background_repeat('foo') -> leaves the default value
         *    unchanged as foo is not a valid value</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_repeat_value The new background repeat default
         * value. Valid values are 'repeat', 'repeat-x', 'repeat-y',
         * 'no-repeat' and 'inherit'.
         *
         * @return void
         */
        public function set_background_repeat($default_repeat_value) {
            if (is_string($default_repeat_value)) {
                $default_repeat_value = strtolower($default_repeat_value); 
                switch ($default_repeat_value) {
                    case 'repeat':
                        $default_repeat_value = 'value1';
                        $this->bg_default_values['repeat'] = $default_repeat_value;
                        break;
                    case 'repeat-x':
                        $default_repeat_value = 'value2';
                        $this->bg_default_values['repeat'] = $default_repeat_value;
                        break;
                    case 'repeat-y':
                        $default_repeat_value = 'value3';
                        $this->bg_default_values['repeat'] = $default_repeat_value;
                        break;
                    case 'no-repeat':
                        $default_repeat_value = 'value4';
                        $this->bg_default_values['repeat'] = $default_repeat_value;
                        break;
                    case 'inherit':
                        $default_repeat_value = 'value5';
                        $this->bg_default_values['repeat'] = $default_repeat_value;
                        break;
                }
            }
        } // CHECKED.


        /**
         * Sets the background position default value.
         *
         * Sets the background positions default value, if the new value is
         * valid it sets the $bg_default_values['position'] instance variable
         * to the new value. Valid values are 'left top', 'left center', 'left bottom',
         * 'right top', 'right center', 'right bottom', 'center top', 'center center',
         * 'center bottom' and 'inherit'.
         *<pre>Example calls:
         *    set_background_position('center center') -> sets the default position
         *    value to 'center center'.
         *    set_background_position('foo') -> leaves the default value
         *    unchanged as foo is not a valid value</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_position_value The new background position
         * default value. Valid values are 'left top', 'left center', 'left bottom',
         * 'right top', 'right center', 'right bottom', 'center top', 'center center',
         * 'center bottom' and 'inherit'.
         *
         * @return void 
         */
        public function set_background_position($default_position_value) {
            if (is_string($default_position_value)) {
                $default_position_value = strtolower($default_position_value); 
                switch ($default_position_value) {
                    case 'left top':
                        $default_position_value = 'value1';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'left center':
                        $default_position_value = 'value2';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'left bottom':
                        $default_position_value = 'value3';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'right top':
                        $default_position_value = 'value4';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'right center':
                        $default_position_value = 'value5';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'right bottom':
                        $default_position_value = 'value6';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'center top':
                        $default_position_value = 'value7';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'center center':
                        $default_position_value = 'value8';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'center bottom':
                        $default_position_value = 'value9';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                    case 'inherit':
                        $default_position_value = 'value10';
                        $this->bg_default_values['position'] = $default_position_value;
                        break;
                }
            }
        } // CHECKED.


        /**
         * TODO
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_image_value The new backgroung image default value.
         */
        public function set_background_image($default_image_value) {
            $this->bg_default_values['image'] = $default_image_value;
        }


        /**
         * TODO
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_color_value The new background color default value.
         */
        public function set_background_color($default_color_value) {
            $this->bg_default_values['color'] = $default_color_value;
        }


        /**
         * Sets the background attachment default value.
         *
         * Sets the background attachments default value, if the new value is
         * valid it sets the $bg_default_values['attachment'] instance variable
         * to the new value. Valid values are 'scroll', 'fixed', 'local'.
         *<pre>Example calls:
         *    set_background_attachment('scroll') -> sets the default attachment
         *    value to scroll.
         *    set_background_attachment('foo') -> leaves the default value
         *    unchanged as foo is not a valid value</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::set_background_default_values() To set the
         * default background properties for the calling Lnrd_Css_Section object.
         *
         * @param string $default_attachment_value The new background attachment
         * default value. Valid values are 'scroll', 'fixed', 'local'.
         *
         * @return void
         */
        public function set_background_attachment($default_attachment_value) {
            if (is_string($default_attachment_value)) {
                $default_attachment_value = strtolower($default_attachment_value);
                switch ($default_attachment_value) {
                    case 'scroll':
                        $default_attachment_value = 'value1';
                        $this->bg_default_values['attachment'] = $default_attachment_value;
                        break;
                    case 'fixed':
                        $default_attachment_value = 'value2';
                        $this->bg_default_values['attachment'] = $default_attachment_value;
                        break;
                    case 'local':
                        $default_attachment_value = 'value3';
                        $this->bg_default_values['attachment'] = $default_attachment_value;
                        break;
                }
            }
        } // CHECKED.

        /* 
         * --------------------------------------------------------------------------------
         * Helpers
         * --------------------------------------------------------------------------------
         */

         /**
          * TODO Clean up code.
          * Converts WordPress theme customizer HTML select list values.
          *
          * Converts WordPress theme customizer HTML select list values to
          * their corresponding css background property values.
          *<pre>Example calls:
          *    convert_values('attachment', 'value1'); -> returns the value 'scroll'.
          *    convert_values('position', 'value3'); -> returns the value 'left bottom'.
          *    convert_values('repeat', 'value4'); -> returns the value 'no-repeat'.
          *    convert_values('clip', 'value2'); -> returns the value 'padding-box'.
          *    convert_values('origin', 'value3'); -> returns the value 'content-box'.
          *    convert_values('size', 'value5'); -> returns the value 'rem'.</pre>
          *
          * @author Marc Kennedy
          *
          * @since 1.0.0
          *
          * @used-by Lnrd_Css_Background::get_background_css() To convert
          * WordPress theme customizer HTML select list values to their
          * corresponding css background property values.
          *
          * @param string $property The background property name. Legal values
          * are: 'attachment', 'position', 'repeat', 'clip', 'origin', 'size'.
          * @param string $value The WordPress theme customizer HTML select list
          * value to convert.
          *
          * @return string The WordPress theme customizer HTML select list converted value. See example calls above.
         */
        private function convert_values($property, $value) {
            switch($property) {
                case 'attachment':
                    if ($value == 'value1') {
                        $value = 'scroll';
                    } else if ($value == 'value2') {
                        $value = 'fixed';
                    } else if ($value == 'value3') {
                        $value = 'local';
                    }
                    break;
                case 'position':
                    switch($value) {
                        case 'value1':
                            $value = 'left top';
                            break;
                        case 'value2':
                            $value = 'left center';
                            break;
                        case 'value3':
                            $value = 'left bottom';
                            break;
                        case 'value4':
                            $value = 'right top';
                            break;
                        case 'value5':
                            $value = 'right center';
                            break;
                        case 'value6':
                            $value = 'right bottom';
                            break;
                        case 'value7':
                            $value = 'center top';
                            break;
                        case 'value8':
                            $value = 'center center';
                            break;
                        case 'value9':
                            $value = 'center bottom';
                            break;
                        case 'value10':
                            $value = 'inherit';
                            break;
                    }
                case 'repeat':
                    switch ($value) {
                        case 'value1':
                            $value = 'repeat';
                            break;
                        case 'value2':
                            $value = 'repeat-x';
                            break;
                        case 'value3':
                            $value = 'repeat-y';
                            break;
                        case 'value4':
                            $value = 'no-repeat';
                            break;
                        case 'value5':
                            $value = 'inherit';
                            break;
                    }
                    break;
                case 'clip':
                    switch ($value) {
                         case 'value1':
                            $value = 'border-box';
                            break;
                        case 'value2':
                            $value = 'padding-box';
                            break;
                        case 'value3':
                            $value = 'content-box';
                            break;
                    }
                    break;
                case 'origin':
                    switch ($value) {
                         case 'value1':
                            $value = 'padding-box';
                            break;
                        case 'value2':
                            $value = 'border-box';
                            break;
                        case 'value3':
                            $value = 'content-box';
                            break;
                    }
                    break;
                case 'size':
                    switch ($value) {
                        case 'value1':
                            $value = 'px';
                             break;
                        case 'value2':
                            $value = '%';
                            break;
                        case 'value3':
                            $value = 'em';
                            break;
                        case 'value4':
                            $value = 'ex';
                            break;
                        case 'value5':
                            $value = 'rem';
                            break;
                        case 'value6':
                            $value = 'cm';
                            break;
                        case 'value7':
                            $value = 'mm';
                            break;
                        case 'value8':
                            $value = 'in';
                            break;
                        case 'value9':
                            $value = 'pt';
                            break;
                        case 'value10':
                            $_value = 'pc';
                            break;
                    }
                    break;
            }
            return $value;
        } // CHECKED.

    } // END Lnrd_Css_Background class.
?>

