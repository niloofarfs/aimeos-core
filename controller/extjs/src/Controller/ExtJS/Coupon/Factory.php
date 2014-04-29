<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2013
 * @license LGPLv3, http://www.arcavias.com/en/license
 * @package Controller
 * @subpackage ExtJS
 */


/**
 * ExtJS coupon controller factory.
 *
 * @package Controller
 * @subpackage ExtJS
 */
class Controller_ExtJS_Coupon_Factory
	extends Controller_ExtJS_Common_Factory_Abstract
	implements Controller_ExtJS_Common_Factory_Interface
{
	public static function createController( MShop_Context_Item_Interface $context, $name = null )
	{
		/** classes/controller/extjs/coupon/name
		 * Class name of the used ExtJS coupon controller implementation
		 *
		 * Each default ExtJS controller can be replace by an alternative imlementation.
		 * To use this implementation, you have to set the last part of the class
		 * name as configuration value so the client factory knows which class it
		 * has to instantiate.
		 *
		 * For example, if the name of the default class is
		 *
		 *  Controller_ExtJS_Coupon_Default
		 *
		 * and you want to replace it with your own version named
		 *
		 *  Controller_ExtJS_Coupon_Mycoupon
		 *
		 * then you have to set the this configuration option:
		 *
		 *  classes/controller/extjs/coupon/name = Mycoupon
		 *
		 * The value is the last part of your own class name and it's case sensitive,
		 * so take care that the configuration value is exactly named like the last
		 * part of the class name.
		 *
		 * The allowed characters of the class name are A-Z, a-z and 0-9. No other
		 * characters are possible! You should always start the last part of the class
		 * name with an upper case character and continue only with lower case characters
		 * or numbers. Avoid chamel case names like "MyCoupon"!
		 *
		 * @param string Last part of the class name
		 * @since 2014.05
		 * @category Developer
		 */
		if ( $name === null ) {
			$name = $context->getConfig()->get('classes/controller/extjs/coupon/name', 'Default');
		}

		if ( ctype_alnum($name) === false )
		{
			$classname = is_string($name) ? 'Controller_ExtJS_Coupon_' . $name : '<not a string>';
			throw new Controller_ExtJS_Exception( sprintf( 'Invalid class name "%1$s"', $classname ) );
		}

		$iface = 'Controller_ExtJS_Common_Interface';
		$classname = 'Controller_ExtJS_Coupon_' . $name;

		$manager = self::_createController( $context, $classname, $iface );
		return self::_addControllerDecorators( $context, $manager, 'coupon' );
	}
}
