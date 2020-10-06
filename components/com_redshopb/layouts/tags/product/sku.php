<?php
/**
 * @package     Aesir.E-Commerce.Tag
 * @subpackage  Layouts
 *
 * @copyright   Copyright (C) 2012 - 2019 Aesir. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

if (isset($displayData['product']) && !is_null($displayData['product']))
{
	$product = $displayData['product'];

	echo $product->sku;
}