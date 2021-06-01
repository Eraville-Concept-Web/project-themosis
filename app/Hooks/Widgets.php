<?php

	namespace App\Hooks;

	use Themosis\Hook\Hookable;

	/**
	 * Project mybibletour-themosis
	 * Author Steve
	 * Class Widgets
	 * @package App\Hooks
	 */
	class Widgets extends Hookable {

		/**
		 * Widgets action hook.
		 *
		 * @var string
		 */
		public $hook = 'widgets_init';

		/**
		 * Widgets to register.
		 *
		 * @var array
		 */
		public array $widgets = [
			//
		];

		/**
		 * Register the widgets.
		 */
		public function register() {
			if ( ! empty( $this->widgets ) ) :
				foreach ( $this->widgets as $widget ) :
					register_widget( $widget );
				endforeach;
			endif;

		}

	}
