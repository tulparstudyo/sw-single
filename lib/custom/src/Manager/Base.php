<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2020
 * @package MShop
 * @subpackage Techie
 */

namespace Aimeos\MShop\Techie\Manager;

/**
 * Abstract class for slider managers.
 *
 * @package MShop
 * @subpackage Techie
 */
abstract class Base
	extends \Aimeos\MShop\Common\Manager\Base
{
	use \Aimeos\MShop\Common\Manager\ListRef\Traits;

	/**
	 * Returns the slider provider which is responsible for the slider item.
	 *
	 * @param \Aimeos\MShop\Techie\Item\Iface $item Delivery or payment slider item object
	 * @param string $type Techie type code
	 * @return \Aimeos\MShop\Techie\Provider\Iface Techie provider object
	 * @throws \Aimeos\MShop\Techie\Exception If provider couldn't be found
	 */
	public function getProvider( \Aimeos\MShop\Techie\Item\Iface $item, string $type ) : \Aimeos\MShop\Techie\Provider\Iface
	{
		$type = ucwords( $type );
		$names = explode( ',', $item->getProvider() );

		if( ctype_alnum( $type ) === false ) {
			throw new \Aimeos\MShop\Techie\Exception( sprintf( 'Invalid characters in type name "%1$s"', $type ) );
		}

		if( ( $provider = array_shift( $names ) ) === null ) {
			throw new \Aimeos\MShop\Techie\Exception( sprintf( 'Provider in "%1$s" not available', $item->getProvider() ) );
		}

		if( ctype_alnum( $provider ) === false ) {
			throw new \Aimeos\MShop\Techie\Exception( sprintf( 'Invalid characters in provider name "%1$s"', $provider ) );
		}

		$classname = '\Aimeos\MShop\Techie\Provider\\' . $type . '\\' . $provider;

		if( class_exists( $classname ) === false ) {
			throw new \Aimeos\MShop\Techie\Exception( sprintf( 'Class "%1$s" not available', $classname ) );
		}

		$context = $this->getContext();
		$config = $context->getConfig();
		$provider = new $classname( $context, $item );

		self::checkClass( \Aimeos\MShop\Techie\Provider\Factory\Iface::class, $provider );

		$decorators = $config->get( 'mshop/slider/provider/' . $item->getType() . '/decorators', [] );

		$provider = $this->addTechieDecorators( $item, $provider, $names );
		return $this->addTechieDecorators( $item, $provider, $decorators );
	}


	/**
	 * Wraps the named slider decorators around the slider provider.
	 *
	 * @param \Aimeos\MShop\Techie\Item\Iface $sliderItem Techie item object
	 * @param \Aimeos\MShop\Techie\Provider\Iface $provider Techie provider object
	 * @param array $names List of decorator names that should be wrapped around the provider object
	 * @return \Aimeos\MShop\Techie\Provider\Iface
	 */
	protected function addTechieDecorators( \Aimeos\MShop\Techie\Item\Iface $sliderItem,
		\Aimeos\MShop\Techie\Provider\Iface $provider, array $names ) : \Aimeos\MShop\Techie\Provider\Iface
	{
		$classprefix = '\Aimeos\MShop\Techie\Provider\Decorator\\';

		foreach( $names as $name )
		{
			if( ctype_alnum( $name ) === false ) {
				throw new \Aimeos\MShop\Techie\Exception( sprintf( 'Invalid characters in class name "%1$s"', $name ) );
			}

			$classname = $classprefix . $name;

			if( class_exists( $classname ) === false ) {
				throw new \Aimeos\MShop\Techie\Exception( sprintf( 'Class "%1$s" not available', $classname ) );
			}

			$provider = new $classname( $provider, $this->getContext(), $sliderItem );

			self::checkClass( \Aimeos\MShop\Techie\Provider\Decorator\Iface::class, $provider );
		}

		return $provider;
	}
}
