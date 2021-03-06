<?php
/**
 * @package     Aesir.E-Commerce.Frontend
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2019 Aesir. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

?>
<form id="modalOfferForm" name="modalOfferForm" method="post">
	<button onclick="Joomla.submitform('myoffer.checkoutCart', document.getElementById('modalOfferForm'))"
			class="btn"><?php echo Text::_('JYES'); ?></button>
	<button onclick="Joomla.submitform('myoffers.accept', document.getElementById('modalOfferForm'))"
			class="btn btn-primary"><?php echo Text::_('COM_REDSHOPB_OFFER_JUST_ACCEPT_LBL'); ?></button>
	<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><?php echo Text::_('JCANCEL'); ?></button>
	<input type="hidden" name="option" value="com_redshopb"/>
	<?php echo HTMLHelper::_('form.token'); ?>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="cid[]" value="" id="modalIdField"/>
	<?php if (isset($displayData['return'])): ?>
	<input type="hidden" name="return" value="<?php echo $displayData['return']; ?>">
	<?php endif; ?>
</form>
