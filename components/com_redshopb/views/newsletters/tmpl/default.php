<?php
/**
 * @package     Aesir.E-Commerce.Frontend
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2019 Aesir. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */
defined('_JEXEC') or die;

echo RedshopbBrowserBreadcrumbs::renderBreadcrumbs();
?>

<div class="redshopb-newsletters">
	<?php
	echo RedshopbLayoutHelper::render('newsletters.newsletters',
		array(
			'this'   => $this,
			'search' => true,
			'action' => RedshopbRoute::_('index.php?option=com_redshopb&view=newsletters')
		)
	);
	?>
</div>
