<?php

/**
 * Product Variation
 *
 * @package           Product Variation
 * @author            Zain Hassan
 *
 */
   


/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class productVariation_widget_elementore  extends \Elementor\Widget_Base {

    public function get_script_depends() {

		wp_register_script( 'html2CanvasJS', plugins_url( 'assets/js/html2canvas.min.js', __FILE__ ) );

		return [
            'html2CanvasJS'
		];

	}
	
	/**
	 * Get widget name.
	 *
	 * Retrieve company widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Product Variation';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve company widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Product Variation', 'product-variation' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve company widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-wordpress';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the company of categories the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the company of keywords the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'product-variation', 'widgets', 'product', 'product varition widgets' ];
	}



	/**
	 * Register company widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Product Variation', 'product-variation' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $this->add_control(
            'item_description',
            [
                'label' => esc_html__( 'Description', 'product-variation' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( '<strong>SIZE SELECTION:</strong>
                <span class="label-info" data-mce-fragment="1">The size you choose is the width of the sign from left to right, at the widest point of the text. If you want to fit more text on one line please select a larger size from the size selection menu below.</span>', 'product-variation' ),
                'placeholder' => esc_html__( 'Type your description here', 'product-variation' ),
            ]
        );
    
    
    
    
        $this->end_controls_section();

    
        $this->start_controls_section(
            'images_Control',
            [
                'label' => esc_html__( 'Images Control', 'product-variation' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'images_name', [
                'label' => esc_html__( 'Title', 'product-variation' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
    
        $repeater->add_control(
			'images_cover',
			[
				'label' => esc_html__( 'Choose Image', 'product-variation' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
    
    
        $this->add_control(
            'images_list',
            [
                'label' => esc_html__( 'Images Options', 'product-variation' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'images_name' => 'An Empty Placeholder',
                        'images_cover' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src()
                        ],
                    ],
                ],
                'title_field' => '{{{ images_name }}}',
            ]
        );
        
        $this->end_controls_section();
    
        $this->start_controls_section(
            'fonts_Control',
            [
                'label' => esc_html__( 'Fonts Control', 'product-variation' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'font_family_add',
			[
				'label' => esc_html__( 'Font Family', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::FONT,
                'selectors' => [
					'{{WRAPPER}}' => 'font-family: {{VALUE}}',
				],

			]
		);
    
    
        $this->add_control(
            'fonts_list',
            [
                'label' => esc_html__( 'Fonts Options', 'product-variation' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'font_family_add' => 'Charmonman',
                    ],
                ],
                'title_field' => '{{{ font_family_add }}}',
            ]
        );
        
        $this->end_controls_section();
    
    
        $this->start_controls_section(
            'Text_Color_Options',
            [
                'label' => esc_html__( 'Text Color Options', 'product-variation' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $repeater = new \Elementor\Repeater();
    
        $repeater->add_control(
            'color_title', [
                'label' => esc_html__( 'Title', 'product-variation' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
    
        $repeater->add_control(
            'color_code',
            [
                'label' => esc_html__( 'Color', 'product-variation' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
                ],
            ]
        );
    
        $this->add_control(
            'color_list',
            [
                'label' => esc_html__( 'Repeater List', 'product-variation' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'color_title' => esc_html__( 'White', 'product-variation' ),
                        'color_code' => esc_html__( '#ffffff', 'product-variation' ),
                    ],
                    [
                        'color_title' => esc_html__( 'Black', 'product-variation' ),
                        'color_code' => esc_html__( '#000000', 'product-variation' ),
                    ],
                ],
                'title_field' => '{{{ color_title }}}',
            ]
        );
        
        
        $this->end_controls_section();

        $this->start_controls_section(
			'email_and_general_settings',
			[
				'label' => esc_html__('Email and General Settings', 'posttype-search-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'submit_button',
			[
				'label' => esc_html__( 'Submit Button Text', 'posttype-search-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Send to', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Send to', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'email_to',
			[
				'label' => esc_html__( 'Email to', 'posttype-search-elementor' ),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'iluvphotobooths@gmail.com', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
                'description' => esc_html__( 'If This field is empty then form will be submitted to the Admin Email.', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'email_from',
			[
				'label' => esc_html__( 'Email From', 'posttype-search-elementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'default' => esc_html__( '', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
				'description' => esc_html__( 'If This field is empty then form will be submitted from the Clients Email. Enter the email address to sent it from custom email.', 'posttype-search-elementor' ),
			]
		);


		$this->end_controls_section();

    
        $this->start_controls_section(
			'ajax_search_styling',
			[
				'label' => esc_html__('Menu Styling', 'posttype-search-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'font_family',
			[
				'label' => esc_html__( 'Font Family', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::FONT,
                'default' => 'Arial',
				'selectors' => [
					'{{WRAPPER}}, {{WRAPPER}} button, {{WRAPPER}} a, {{WRAPPER}}  select, {{WRAPPER}}  input, {{WRAPPER}}  label, {{WRAPPER}}  strong, {{WRAPPER}}  span, {{WRAPPER}}  p' => 'font-family: {{VALUE}}',
				],
			]
		);
	

		$this->add_control(
			'side_bar_background',
			[
				'label'     => esc_html__('Side Bar Color', 'posttype-search-elementor'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .preview__data' => 'background-color: {{VALUE}} !important'
				],
			]
		);

		$this->add_control(
			'brand_color',
			[
				'label'     => esc_html__('Brand Color', 'posttype-search-elementor'),
				'type'      => \Elementor\Controls_Manager::COLOR,
                'default' => '#03a196',
				'label_block' => true,
				'selectors' => [
					'{{WRAPPER}} .add_to_cart' => 'background-color: {{VALUE}} !important',
				],
			]
		);



		$this->end_controls_section();
    
    }

	/**
	 * Render company widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

    <style>

        .d-none{
            display: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            margin: 20px auto;
            border: 5px solid rgba(0, 0, 0, .1);
            border-left: 5px solid #F00;
            border-right: 5px solid #F00;
            animation: spinner 1s linear infinite forwards;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
                -o-border-radius: 50%;
                -ms-border-radius: 50%;
                    border-radius: 50%
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg)
            }
            
            100% {
                transform: rotate(360deg)
            }
        }

        .product_section1 {
        margin-left: auto !important;
        margin-right: auto !important;
        }
        @media (max-width: 1440px) and (min-width: 1370px) {
        .product_section1 {
            width: 80%;
        }
        }
        @media (max-width: 1369px) and (min-width: 1281px) {
        .product_section1 {
            width: 80%;
        }
        }
        @media (max-width: 1280px) and (min-width: 1101px) {
        .product_section1 {
            width: 80%;
        }
        }
        @media (max-width: 1100px) and (min-width: 992px) {
        .product_section1 {
            width: 80%;
        }
        }
        @media (max-width: 991px) {
        .product_section1 {
            width: 90%;
        }
        }
        @media all {
        section {
            display: block;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            margin: 0;
        }
        button,
        input {
            line-height: normal;
            width: -webkit-fill-available;
            min-height: 44px;
            margin-bottom: 15px;
        }
        button {
            -webkit-appearance: button;
            cursor: pointer;
        }
        input[type="radio"] {
            box-sizing: border-box;
            padding: 0;
        }
        textarea {
            overflow: auto;
            vertical-align: top;
        }
        button::-moz-focus-inner,
        input::-moz-focus-inner {
            border: 0;
            padding: 0;
        }
        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }
        * {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        /* ::-moz-selection {
            background-color: #000;
            color: #fff;
        }
        ::selection {
            background: #fff7b6;
            color: #000;
        } */
        img[data-sizes="100vw"] {
            display: block;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .image__container {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        h1 {
            font-family: sans-serif;
            font-style: normal;
            font-size: 30px;
            text-transform: uppercase;
            line-height: 1.5;
            color: #333;
            display: block;

            margin: 0 auto 15px;
            clear: both;
            font-weight: 300;
            padding-top: 4px;
        }
        @media only screen and (max-width: 798px) {
            h1 {
            font-size: 24px;
            }
        }
        h1 a:link,
        h1 a:visited {
            font-weight: inherit;
            color: #333;
        }
        h1 a:hover,
        h1 a:active {
            color: <?php echo $settings['brand_color']?>;
        }
        p {
            margin: 0 0 15px;
            font-style: normal;
            line-height: 1.6em;
        }
        strong {
            font-weight: 700;
        }
        .feature_divider {
            width: 100%;
            margin-bottom: 20px;
            display: block;
            border: 0;
            border-color: #aaa;
            border-bottom-width: 1px;
            border-bottom-style: solid;
        }
        @media only screen and (max-width: 798px) {
            .feature_divider {
            margin-bottom: 10px;
            }
        }
        .page .feature_divider {
            margin-bottom: 15px;
        }
        a,
        a:visited {
            color: <?php echo $settings['brand_color']?>;
            text-decoration: none;
            position: relative;
            transition: color 0.1s linear;
        }
        a:hover,
        a:focus {
            color: #03857c;
        }
        a,
        button,
        input,
        select,
        textarea,
        label {
            touch-action: manipulation;
        }
        ::-webkit-input-placeholder {
            color: #888;
        }
        :-moz-placeholder {
            color: #888;
        }
        ::-moz-placeholder {
            color: #888;
        }
        :-ms-input-placeholder {
            color: #888;
        }
        .section img,
        .page img,
        .columns img {
            max-width: 100%;
            height: auto;
        }
        .featured-products-section .section {
            margin: 30px 0;
        }
        button,
        .action_button {
            background: <?php echo $settings['brand_color']?>;
            color: #fff;
            border: 1px solid <?php echo $settings['brand_color']?>;
            padding: 0 20px;
            text-align: center;
            cursor: pointer;
            min-height: 44px;
            height: 40px;
            line-height: 1.2;
            vertical-align: top;
            font-family: sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            -ms-flex-pack: center;
            transition: all 0.2s linear;
            border-radius: 0;
        }
        .action_button:hover {
            background-color: #04736b;
            border: 1px solid #04736b;
        }
        button:active,
        .action_button:active {
            box-shadow: inset 0 2px 4px #00000026, 0 1px 2px #0000000d;
            outline: 0;
        }

        button.add_to_cart .text {
            display: block;
            width: 100%;
            -webkit-animation-duration: 0.5s;
            animation-duration: 0.5s;
        }
        @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
            button .checkmark path {
            stroke-dashoffset: 0;
            opacity: 0;
            }
        }

        .purchase-details {
            display: flex;
            /* align-items: end; */
            align-items: end;
            /* flex-wrap: wrap; */
        }
        @media only screen and (max-width: 480px) {
            .product-quantity-box.purchase-details__quantity {
            width: 100%;
            }
        }
        .product-quantity-box.purchase-details__quantity input.quantity {
            padding-top: 11px;
            padding-bottom: 11px;
            line-height: 1.4;
            min-height: 44px;
            margin-bottom: 0;
            width: calc(100% - 88px);
        }
        .purchase-details__buttons button {
            width: 100%;
        }
        .purchase-details__buttons {
            display: flex;
            flex: 1 0 calc(50% - 12px);
            flex-wrap: wrap;
            width: 50%;
        }
        button {
            border: none;
            appearance: none;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="number"],
        select,
        textarea {
            display: block;
            width: 100%;
            height: 44px;
            min-height: 44px;
            padding: 0 10px;
            margin: 0 0 15px;
            line-height: 22px;
            border: 1px solid #cccccc;
            outline: none;
            background: #fff;
            color: #5f6a7d;
            font: 13px HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue,
            Helvetica, Arial, sans-serif;
        }
        @media only screen and (max-width: 480px) {
            input[type="number"],
            select,
            textarea {
            font-size: 16px;
            }
        }
        input[type="number"]:active,
        input[type="number"]:focus,
        select:active,
        select:focus,
        textarea:active,
        textarea:focus {
            border: 1px solid #aaa;
            color: #444;
        }
        input[type="number"] {
            -moz-appearance: textfield !important;
        }
        select::-ms-expand {
            display: none;
        }
        select, input {
            background: white
            url(<?php echo plugin_dir_url( __FILE__ ) ?>assets/images/arrow.png)
            no-repeat 96% 50%;
            background-size: 18px 12px;
            padding: 8px 14px;
            border-radius: 0;
            border: 1px solid #d9dbdc;
            -webkit-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            -moz-appearance: none;
            text-indent: 0.01px;
            text-overflow: "";
            font-size: 13px;
        }
        label {
            display: block;
            font-weight: 700;
            font-size: 13px;
            text-align: left;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        textarea {
            min-height: 120px;
            padding: 15px 9px;
        }
        .contact-form label {
            margin-bottom: 12px;
        }
        input.quantity {
            width: 48px;
            display: inline;
            margin-bottom: 0;
            padding: 8px 5px;
        }
        .section.product_section {
            margin-top: 0;
        }
        .product_section .description {
            margin-bottom: 15px;
            overflow-wrap: break-word;
            word-wrap: break-word;
            -ms-word-break: break-word;
            word-break: break-word;
        }
        .modal_price {
            padding-bottom: 8px;
            display: block;
        }
        .product-quantity-box .quantity,
        .product-quantity-box .quantity:focus,
        .product-quantity-box .product-plus,
        .product-quantity-box .product-minus {
            border: #e2e2e2 1px solid;
            color: #000;
        }

        .product-quantity-box .quantity a{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: black;
        }
        .product-quantity-box label {
            margin-bottom: 0.5em;
        }
        .product-quantity-box {
            margin-right: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .product-quantity-box label {
            text-align: left;
        }
        .product-quantity-box .quantity {
            text-align: center;
            width: 100%;
            height: 44px;
            border-radius: 0;
            -webkit-appearance: none;
            float: left;
        }
        @media only screen and (max-width: 798px) {
            .product-quantity-box .quantity {
            width: calc(100% - 18px);
            }
        }
        .product-quantity-box .product-plus,
        .product-quantity-box .product-minus {
            background: #f2f2f2;
            font-weight: 300;
            position: relative;
            cursor: pointer;
            height: 44px;
            display: block;
            width: 44px;
            text-align: center;
            float: left;
        }
        .product-quantity-box .product-plus:hover,
        .product-quantity-box .product-minus:hover {
            background: #d9d9d9;
        }
        @media only screen and (max-width: 798px) {
            .product-quantity-box .product-plus,
            .product-quantity-box .product-minus {
            display: inline;
            display: initial;
            margin: 0;
            }
        }
        .product-quantity-box .product-plus {
            border-left: 0;
            font-size: 16px;
            line-height: 44px;
        }
        .product-quantity-box .product-minus {
            border-right: 0;
            line-height: 44px;
            font-size: 18px;
        }
        .product_section .product_form,
        .product_section .contact-form {
            max-width: 400px;
        }
        @media only screen and (max-width: 798px) {
            .product_section .product_form,
            .product_section .contact-form {
            max-width: 100%;
            }
        }
        .visuallyhidden {
            position: absolute !important;
            overflow: hidden;
            clip: rect(0 0 0 0);
            height: 1px;
            width: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
        }
        .sale {
            color: #d54d4d;
        }
        .was_price {
            text-decoration: line-through;
            color: #8c8b8b;
            text-shadow: none;
            font-weight: 400;
        }
        .savings {
            font-size: 15px;
            display: block;
        }
        .modal_price {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .product_section .modal_price {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            -moz-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .product_section .modal_price .price__container,
        .product_section .modal_price .sold-out__container {
            display: inline-block;
        }
        .flickity-enabled {
            position: relative;
        }
        .flickity-enabled:focus {
            outline: 0;
        }
        .flickity-viewport {
            overflow: hidden;
            position: relative;
            height: 100%;
        }
        .flickity-slider {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .flickity-enabled {
            position: relative;
            overflow: hidden;
        }
        .flickity-enabled:focus {
            outline: none;
        }
        .flickity-viewport {
            overflow: hidden;
            position: relative;
            height: 100%;
        }
        .flickity-slider {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .slideshow_animation--fade .flickity-slider {
            transform: none !important;
        }
        .slideshow_animation--fade .gallery-cell {
            left: 0 !important;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            z-index: -1;
        }
        .slideshow_animation--fade .gallery-cell.is-selected {
            opacity: 1;
            z-index: 0;
        }
        .product_gallery {
            margin-bottom: 30px;
            position: relative;
            opacity: 0;
            transition: opacity 0.2s;
        }
        @media only screen and (min-width: 799px) and (max-width: 1024px) {
            .product_gallery {
            margin-bottom: 30px;
            }
        }
        @media only screen and (min-width: 481px) and (max-width: 798px) {
            .product_gallery {
            margin-bottom: 0;
            padding-bottom: 50px;
            }
        }
        .product_gallery .gallery-cell {
            width: 100%;
            display: block;
            margin-right: 10px;
            position: relative;
        }
        .product_gallery.flickity-enabled {
            opacity: 1;
        }
        .product_gallery img {
            background-color: #fff;
        }
        .product_gallery_nav {
            text-align: center;
            margin-bottom: 30px;
        }
        .product_gallery .gallery-cell a {
            cursor: zoom-in;
        }
        .gallery-wrap .flickity-viewport {
            margin-top: 0;
        }
        @media only screen and (max-width: 798px) {
            select {
            width: 100%;
            margin-left: 0;
            }
        }
        @media only screen and (max-width: 479px) {
            h1 {
            font-size: 110%;
            line-height: 1.5em;
            }
            h1 {
            padding: 0;
            }
        }
        [class^="icon-"]:before {
            font-family: turbo;
            font-style: normal;
            font-weight: 400;
            speak: none;
            display: inline-block;
            text-decoration: inherit;
            width: 1em;
            margin-right: 0.2em;
            text-align: center;
            font-variant: normal;
            text-transform: none;
            line-height: 1em;
            margin-left: 0.15em;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .icon-plus:before {
            content: "\e911";
        }
        .icon-minus:before {
            content: "\e90e";
        }
        .product_gallery .gallery-cell {
            visibility: hidden;
        }
        .product_gallery .gallery-cell.is-selected {
            visibility: visible;
        }
        .collection-in-detail .section {
            margin: 0;
        }
        .collection-in-detail .half {
            width: 50%;
            float: left;
            position: relative;
        }
        @media only screen and (max-width: 798px) {
            .collection-in-detail .half {
            width: 100%;
            }
        }
        .collection-in-detail .product-details {
            padding: 0 2rem 40px;
        }
        @media (max-width: 767px) {
            .collection-in-detail .product-details {
            padding: 40px 1rem;
            }
        }
        }
        /*! CSS Used from: Embedded */
        .image_text--generator {
        position: absolute;
        top: 100px;
        color: #fff;
        width: 100%;
        font-family: "Brittany Signature";
        padding: 0 20px;
        }
        .image_text--generator span {
        font-size: 42px;
        line-height: 42px;
        text-shadow: rgb(255 255 255) 0px 0px 10px, rgb(255 255 255) 0px 0px 20px,
            rgb(235 246 252) 0px 0px 30px, rgb(235 246 252) 0px 0px 40px,
            rgb(235 246 252) 0px 0px 50px, rgb(235 246 252) 0px 0px 60px,
            rgb(235 246 252 / 50%) 4.4px 4.4px 2.2px;
        }
        .gallery-thumbnails--bottom{
            position: relative;
        }

        #f1 label {
        padding: 6px;
        margin-top: 0;
        min-width: initial;
        transition: background-color 0.2s ease-in-out;
        background-color: #fff;
        border: 1px solid #ddd;
        cursor: pointer;
        margin: 0 2px;
        }
        #f1 label svg {
        max-width: 30px;
        display: inline-block;
        vertical-align: middle;
        width: 100%;
        }
        .neon-customizer {
        display: flex;
        margin: 0 -8px;
        }
        .neon-customizer .textPr__ps,
        .neon-customizer .Text__color {
        flex-basis: 100%;
        max-width: 100%;
        padding: 0 8px;
        }
        .preview__data {
        background-color: #f3f3f3;
        border: 1px solid #ddd;
        padding: 15px;
        margin-top: 15px;
        position: relative;
        }
        .neon_text_lines p.txtfld {
        font-size: 13px;
        color: #444;
        text-align: center;
        }
        .spn__txt {
        text-align: center;
        }
        label,
        p {
        font-family: open sans-serif;
        }


        .text__pos {
        display: flex;
        justify-content: center;
        max-width: 300px;
        margin: auto;
        }
        #f1 input[type="radio"] {
        display: none;
        }
        #f1 label {
        padding: 6px;
        margin-top: 0;
        min-width: initial;
        transition: background-color 0.2s ease-in-out;
        background-color: #fff;
        border: 1px solid #ddd;
        cursor: pointer;
        margin: 0 2px;
        }
        #f1 label svg {
        max-width: 30px;
        display: inline-block;
        vertical-align: middle;
        width: 100%;
        }
        .neon-customizer {
        display: flex;
        margin: 0 -8px;
        }
        .neon-customizer .textPr__ps,
        .neon-customizer .Text__color {
        flex-basis: 100%;
        max-width: 100%;
        padding: 0 8px;
        }
        .description {
        margin-bottom: 10px;
        }
        .preview__data {
        background-color: #f3f3f3;
        border: 1px solid #ddd;
        padding: 15px;
        margin-top: 15px;
        position: relative;
        margin-bottom: 15px;
        }
        .neon_text_lines p.txtfld {
        font-size: 13px;
        color: #444;
        text-align: center;
        }
        .spn__txt {
        text-align: center;
        }

        .bg-product-img img {
        position: absolute;
        top: 0px;
        }
        .product_section1 {
        position: relative;
        }
        .quantity {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        }
        .quantity__minus,
        .quantity__plus {
        display: block;
        width: 30%;
        height: 30px;
        margin: 0;
        background: #fff;
        text-decoration: none;
        text-align: center;
        line-height: 30px;
        }
        .quantity__minus:hover,
        .quantity__plus:hover {
        color: #fff;
        }
        .quantity__minus {
        border-radius: 3px 0 0 3px;
        }
        .quantity__plus {
        border-radius: 0 3px 3px 0;
        }
        .quantity__input {
        width: 80%;
        height: 30px;
        margin: 0;
        padding: 0;
        text-align: center;
        border-top: 2px solid #dee0ee;
        border-bottom: 2px solid #dee0ee;
        border-left: 1px solid #dee0ee;
        border-right: 2px solid #dee0ee;
        background: #fff;
        color: #8184a1;
        pointer-events: none;
        }
        .quantity__minus:link,
        .quantity__plus:link {
        color: #8184a1;
        }
        .quantity__minus:visited,
        .quantity__plus:visited {
        color: #fff;
        }
        .wrap {
        display: flex;
        align-items: center;
        }
        .wrap .col {
        flex: 1 1 50%;
        }
        .wrap .col img {
        width: 100%;
        display: none;
        transition: 0.5s ease all;
        max-width: 500px;
        min-height: 375px;
        object-fit: cover;
        }

        .wrap img.active {
        display: block;
        transition: 0.5s ease all;
        animation: fadeIn ease 1s;
        -webkit-animation: fadeIn ease 1s;
        -moz-animation: fadeIn ease 1s;
        -o-animation: fadeIn ease 1s;
        -ms-animation: fadeIn ease 1s;
        }

        @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
        }

        @-moz-keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
        }

        @-webkit-keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
        }

        @-o-keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
        }

        @-ms-keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
        }

        /* .container__img-holder img{
        max-width:300px;
        } */

        /* Popup Styling */
        .img-popup {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(255, 255, 255, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
        }

        .img-popup img {
        max-width: 900px;
        width: 100%;
        opacity: 0;
        transform: translateY(-100px);
        -webkit-transform: translateY(-100px);
        -moz-transform: translateY(-100px);
        -ms-transform: translateY(-100px);
        -o-transform: translateY(-100px);
        }

        .close-btn {
        width: 35px;
        height: 30px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: absolute;
        top: 20px;
        right: 20px;
        cursor: pointer;
        }

        .close-btn .bar {
        height: 4px;
        background: #333;
        }

        .close-btn .bar:nth-child(1) {
        transform: rotate(45deg);
        }

        .close-btn .bar:nth-child(2) {
        transform: translateY(-4px) rotate(-45deg);
        }
        .opened.img-popup {
        background-color: #000000a8;
        z-index: 99;
        }
        .opened {
        display: flex;
        }

        .opened img {
        animation: animatepopup 1s ease-in-out 0.8s;
        -webkit-animation: animatepopup 0.3s ease-in-out forwards;
        }

        @keyframes animatepopup {
        to {
            opacity: 1;
            transform: translateY(0);
            -webkit-transform: translateY(0);
            -moz-transform: translateY(0);
            -ms-transform: translateY(0);
            -o-transform: translateY(0);
        }
        }

        .user_email_con{
            margin-left: 10px;
        }

        @media screen and (max-width: 1120px) {
            .user_email_con {
            margin-left: 0px;
        }
        }

        @media screen and (max-width: 880px) {
        .container .container__img-holder:nth-child(3n + 1) {
            margin-left: 16px;
        }
        }

        .opened.img-popup .contain{
            position: relative;
        }

        input {
            background: white;
            background-size: 18px 12px;
            padding: 8px 14px;
            border-radius: 0;
            border: 1px solid #d9dbdc;
            -webkit-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            -moz-appearance: none;
            text-indent: 0.01px;
            text-overflow: "";
            color: #757575;
        }

        .user-info-one{
            display: flex;
        }

        @media ( max-width: 1442px ){
            .user-info-one{
                display: inherit;
                margin-bottom: 0;
            }
            .user-info-one input{
                width: -webkit-fill-available;
                margin-left: 0 !important;
                margin-bottom:10px;
            }
        }
    </style>

    <section class="collection-in-detail">
        <div class="clearfix frontpage_product_stagger--false">
            <div  class=" product_section1 ">
                <div id="product_section1_image" class="product-images half wrap">
                    <div class="clearfix gallery-wrap gallery-arrows--true gallery-thumbnails--bottom">
                        <div class="image_text--generator"> 
                            <span class="spn__txt" id="split" data-binding="name" style="display: block; font-family: Charmonman; color: rgb(255, 0, 102); text-shadow: rgb(255 255 255 / 70%) 0px 0px 10px, rgb(255 255 255 / 70%) 0px 0px 20px, rgb(255 0 102) 0px 0px 30px, rgb(255 0 102) 0px 0px 40px, rgb(255 0 102) 0px 0px 50px, rgb(255 0 102) 0px 0px 60px, rgb(255 0 102 / 50%) 4.4px 4.4px 2.2px; text-align: center;">Hello</span>
                        </div>
                    
                        <div class="product_gallery_nav product_gallery_nav--bottom product-6699954208877-gallery-nav">
                            <div class="col">
                                <?php
                                if( $settings['images_list'] ){
                                        
                                    $nos = 1;
                                    foreach($settings['images_list'] as $item){
                                        // print_r($item['images_cover']);
                                        // exit;
                                        ?>
                                        <div class="container__img-holder">
                                        <img src="<?php echo $item['images_cover']['url']; ?>" id="opt-<?php echo $nos; ?>" class="<?php echo $nos === 1 ? 'active' : '' ?>" >
                                        </div>
                                        <?php
                                        $nos++;
                                    }
                                    $nos = 1;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="img-popup">
                            <div class="contain">
                                <img src="" alt="Popup Image">
                                <div class="close-btn">
                                    <div class="bar"></div>
                                    <div class="bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-details half">

                    <div class="description"> 
                        <?php echo $settings['item_description'] ?>
                    </div>

                
                <div class="js-product_section product_section">
                    <div class="neon-customizer--addElements fff">
                        <div class="preview__data">
                            <!-- userinfo -->
                            <div class="user-info user-info-one" style="">
                                <div class="col" style="flex: 1;">
                                    <label for="user_name">Name</label>
                                    <input type="text" name="user_name" id="user_name" placeholder="" required style="width: -webkit-fill-available;">
                                </div>
                                <div class="col user_email_con" style="flex: 1;">
                                    <label for="user_email">Email</label>
                                    <input type="email" name="email" id="user_email" placeholder="" required style="width: -webkit-fill-available; ">
                                </div>
                            </div>
                            <div class="user-info" style="justify-content: space-between;">
                                <div class="col">
                                    <label for="event_date">Event Date</label>
                                    <input type="date" name="event_date" id="event_date" placeholder="dd/mm/yyyy" required style="width: 100%; margin-bottom: 10px;height:min-content;">
                                </div>
                                <div class="col">
                                    <label for="special_event">Special Request</label>
                                    <input name="special sequet and evnet area" id="special_event" placeholder="Special Request" style="flex: 1;" >
                                </div>
                                
                            </div>
                            <!--background image -->
                            <div class="wrap bg-cover-image">
                                <div class="col">
                                    <label for="photos">Backdrop Style</label>
                                    <select id="photos">
                                    <?php
                                        if( $settings['images_list'] ){
                                            $nos = 1;
                                            foreach($settings['images_list'] as $key => $item){
                                                ?>
                                                <option value="photo-<?php echo $nos; ?>" data-image="#opt-<?php echo $nos; ?>" <?php echo $nos === 1 ? 'selected' : ''; ?> ><?php echo $item['images_name']; ?></option>
                                                <?php
                                                $nos++;
                                            }
                                            $nos = 1;
                                        }
                                        ?>
                                    </select>      
                                </div>
                            </div>
                            <!--custom text -->
                            <div class="Custom__txt--value">
                                <label for="eng__text" class="font__control">NEON TEXT</label> 
                                <input id="eng__text" name="properties[Your-Text]" data-model="name" maxlength="64" class="" >
                                <div class="neon_text_lines">
                                    <!-- <p class="txtfld">*If you want a logo or other design created in neon, please <a href="">upload your logo</a> and our Custom Design Team will be happy to help you!</p> -->
                                </div>
                            </div>
                            <!-- font-style -->
                            <div class="Fonts-family ">
                                <div class="Text__style">
                                    <label for="clsFnt" class="font__control">FONT STYLE</label> 
                                    <select id="clsFnt" onchange="preferedStyle()" name="properties[Font Style]">
                                        <?php
                                        if( $settings['fonts_list'] ){
                                            foreach($settings['fonts_list'] as $item){
                                                ?>
                                                <option value="<?php echo $item['font_family_add']; ?>" style='font-family: "<?php echo $item['font_family_add']; ?>" !important; font-size: 20px;'><?php echo $item['font_family_add']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
            
                                    </select>
                                </div>
                            </div>
            
                            <!-- text-color -->
                            <div class="neon-customizer">
                                <div class="Text__color">
                                    <label for="clss" class="font__control">TEXT COLOR</label> 
                                    <select id="clss" onchange="preferedBrowser()" name="properties[Font Colors]">
                                        <?php
                                        
                                            if( $settings['color_list'] ){
                                                foreach($settings['color_list'] as $item){
                                                    ?>
                                                    <option value="<?php echo $item['color_code']; ?>"><?php echo $item['color_title']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- purchase-qty -->
                            <div class="purchase-details">
                                <div class="purchase-details__quantity product-quantity-box"> 
                                    <label for="quantity">Font Size (px)</label>
                                    <div class="quantity">
                                        <a href="#" class="quantity__minus"><span>-</span></a>
                                        <input name="quantity" type="text" class="quantity__input" value="42">
                                        <a href="#" class="quantity__plus"><span>+</span></a>
                                    </div> 
                                </div>
                            </div>
                    </div>

                    <input type="hidden" name="screenshot_image" id="screenshot_image">
                    
                    <!-- purchase-qty -->
                    <div class="purchase-details">
                        <!-- add to cart -->
                        <div class="purchase-details__buttons purchase-details__spb--false">
                            <button type="button" name="add" class="add_to_cart" data-label="Add to Cart" onClick="verifyFields()"><?php echo $settings['submit_button'] ?></button>
                        </div>
                    </div>

                    <div class="spinner d-none"></div>
                    <div class="notice d-none" style="text-align:center; font-size: 20px; font-weight:bold; color: green;" >Email Sent! Thank You!</div>
                    <div class="email_name_error d-none" style="text-align:center; font-size: 20px; font-weight:bold; color: red;" >Make Sure Name and Email Fields are not Empty!</div>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>

    </section>

    <!-- custom-js-code -->
    <script>
      // creating text editor and
        const createState = (stateObj) => {
          return new Proxy(stateObj, {
            set(target, property, value) {
              target[property] = value;
              render();
              return true;
            }
          });
        };
      
        const state = createState({
          name: 'Hello'
        });
      
        const listeners = document.querySelectorAll('[data-model]');
      
        listeners.forEach((element) => {
          const name = element.dataset.model;
          element.addEventListener('keyup', (event) => {
            state[name] = element.value;
            console.log(state);
          });
        });
      
        const render = () => {
          const bindings = Array.from(document.querySelectorAll('[data-binding]')).map(
            e => e.dataset.binding
          );
          bindings.forEach((binding) => {
            document.querySelector(`[data-binding=${binding}]`).innerHTML = state[binding];
            document.querySelector(`[data-model=${binding}]`).value = state[binding];
          })
        }
      
        render();
        function preferedBrowser(){
          var valf = document.querySelector('#clss').value;
          var valfClr = document.querySelector('.spn__txt');
          var lavfOpt = document.querySelector('#clss option');
    
            valfClr.style.color = valf;
            valfClr.style.textShadow = "#ffffff 0px 0px 10px, #ffffff 0px 0px 20px, "+valf+" 0px 0px 30px, "+valf+" 0px 0px 40px, "+valf+" 0px 0px 50px, "+valf+" 0px 0px 60px, "+valf+"80 4.4px 4.4px 2.2px";
      
        }
  


        // Fonts Option
        function preferedStyle(){
          var valfont = document.querySelector('#clsFnt').value;
          var valfontxt = document.querySelector('.spn__txt');
          var lavfOnt = document.querySelector('#clsFnt option');

            valfontxt.style.fontFamily = valfont;
        }
       var box = document.getElementById('eng__text');
      var charlimit = 15; // char limit per line
      box.onkeyup = function() {
          var lines = box.value.split('\n');
          for (var i = 0; i <lines.length; i++) {
              if (lines[i].length <= charlimit) continue;
           document.getElementById('split').innerHTML += "<br>";
              var j = 0; space = charlimit;
              while (j++ <= charlimit) {
                  if (lines[i].charAt(j) === ' ') space = j;
                
              }
              lines[i + 1] = lines[i].substring(space + 1) + (lines[i + 1] || "");
              lines[i] = lines[i].substring(0, space);
            
          }
          box.value = lines.slice(0, 10).join('\n');
      
      var str = document.getElementById('split').innerHTML;
        var str2 = '\n';
        for (str2 in str){
      str = str.replace('\n','<br>');
       document.getElementById('split').innerHTML = str;
        }
      };
   
      // changeing cover images
      jQuery("#photos").change(function () {
      _data_image = jQuery("option:selected", this).data("image");
      jQuery(".active").removeClass("active");
      jQuery(_data_image).addClass("active");
      });
  
      // image popup card
      jQuery(document).ready(function() {

      // required elements
      var imgPopup = jQuery('.img-popup');
      var imgPopupcontain = jQuery('.img-popup .contain');
      var imgCont  = jQuery('.container__img-holder');
      var popupImage = jQuery('.img-popup img');
      var closeBtn = jQuery('.close-btn');

      // handle events
      imgCont.on('click', function() {
      var img_src = jQuery(this).children('img').attr('src');
      imgPopupcontain.children('img').attr('src', img_src);
      imgPopup.addClass('opened');
      jQuery( ".image_text--generator" ).clone().appendTo( imgPopupcontain );
      });

      jQuery(imgPopup, closeBtn).on('click', function() {
      imgPopup.removeClass('opened');
      imgPopupcontain.children('img').attr('src', '');
      jQuery( ".img-popup  .image_text--generator" ).remove();
      });

      popupImage.on('click', function(e) {
      e.stopPropagation();
      });

   });

   // quantity operator
   jQuery(document).ready(function() {
      const minus = jQuery('.quantity__minus');
      const span_color = jQuery('.image_text--generator span');
      const plus = jQuery('.quantity__plus');
      const input = jQuery('.quantity__input');
      minus.click(function(e) {
         e.preventDefault();
         var value = input.val();
         if (value > 1) {
            value--;
         }
         input.val(value);
         span_color.css("font-size", value + "px");
      });
      
      plus.click(function(e) {
         e.preventDefault();
         var value = input.val();
         value++;
         input.val(value);
         span_color.css("font-size", value + "px");
      })
      });

    // getting all the values     

   function verifyFields() {
        document.querySelector('.spinner').classList.remove('d-none');
        html2canvas(document.getElementById('product_section1_image'),{
            background :'#000000',
            }).then(canvas => {
            var imageData = canvas.toDataURL();
            document.getElementById("screenshot_image").setAttribute("value", imageData);
            var engText = document.querySelector("#eng__text").value;
            var styleValue = document.querySelector("#clsFnt").value;
            var textcolorvalue = document.querySelector("#clss").value;
            var userName = document.querySelector("#user_name");
            var userEmail = document.querySelector("#user_email");
            var dateEvent = document.querySelector('#event_date').value;
            var specialEventReques = document.querySelector('#special_event').value;
            var screenshotImg = document.getElementById("screenshot_image").value;
            var fontSize = document.querySelector(".quantity__input").value;

            
            if(userName.value === '' || userEmail.value === ''){
                if(userName.value === ''){
                    userName.style.borderColor = 'red';
                }
                if(userEmail.value === ''){
                    userEmail.style.borderColor = 'red';
                }
                document.querySelector('.spinner').classList.add('d-none');
                document.querySelector('.email_name_error').classList.remove('d-none');
                return;
            }

            
            userName.style.borderColor = 'black';
            userEmail.style.borderColor = 'black';

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: { 
                    action: 'data_send_toEmail',
                    security: '<?php echo wp_create_nonce( 'form_submitNeon' ); ?>',
                    emailTo: '<?php echo $settings['email_to'] ?>', 
                    emailFrom: '<?php echo $settings['email_from'] ?>', 
                    engText: engText, 
                    styleValue: styleValue, 
                    textcolorvalue: textcolorvalue, 
                    userName: userName.value, 
                    userEmail: userEmail.value,
                    dateEvent: dateEvent,
                    fontSize: fontSize,
                    specialEventReques: specialEventReques,
                    canvas2: screenshotImg, 
                    
                },
                success: function(data) {
                    if(data === "email sent"){
                        document.querySelector('.email_name_error').classList.add('d-none');
                        document.querySelector('.spinner').classList.add('d-none');
                        document.querySelector('.notice').classList.remove('d-none');

                        const myTimeout = setTimeout(myGreeting, 1000);

                            function myGreeting() {
                                location.reload();
                            }
                    }
                    
                }
            });
            return;

        });
        return;
   }

 </script>

        <?php
	}


}