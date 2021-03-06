<?php
/**
 * @package     Aesir.E-Commerce.Frontend
 * @subpackage  Layouts.Shop.Pages
 *
 * @copyright   Copyright (C) 2012 - 2019 Aesir. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

$input          = Factory::getApplication()->input;
$array          = $input->getArray();
$categories     = $displayData['categories'];
$showPagination = isset($displayData['showPagination']) ? $displayData['showPagination'] : false;
$colsPerPage    = RedshopbApp::getConfig()->get('categories_number_of_columns_per_page', 2);

switch ($colsPerPage)
{
	case "1":
		$span = "span12";
		break;

	case "3":
		$span = "span4";
		break;

	case "4":
		$span = "span3";
		break;

	default:
		$span = "span6";
}


$i = 1;

if ($showPagination)
{
	$numberOfPages = $displayData['numberOfPages'];
	$currentPage   = $displayData['currentPage'];
	$ajaxJS        = $displayData['ajaxJS'];
}

$useCollections      = Factory::getApplication()->input->get('mycollections');
$collectionsGetParam = '';

if ($useCollections)
{
	$collectionsGetParam = '&mycollections=' . $useCollections;
}

?>
<div class="row-fluid categories">

	<?php foreach ($categories as $category) : ?>
		<?php if (!isset($category->imageHTML)) : ?>
			<?php $category->imageHTML = RedshopbHelperMedia::drawDefaultImg(100, 100, Text::_('COM_REDSHOPB_NO_IMAGE_LABEL')); ?>
		<?php endif; ?>
		<?php $calc = $i % $colsPerPage; ?>

		<?php if ($calc == 1 && $colsPerPage !== 1) : ?>
			<div class="row-fluid category-row">
		<?php endif; ?>

		<div class="<?php echo $span; ?>">
			<a href="<?php echo RedshopbRoute::_('index.php?option=com_redshopb&view=shop&layout=category&id=' . $category->id . $collectionsGetParam); ?>">
				<div class="row-fluid category-container pagination-centered">
					<div class="category-image">
						<?php echo $category->imageHTML; ?>
					</div>
					<div class="category-title">
						<span class="redshopb-shop-category-title"><?php echo $category->name; ?></span>
					</div>
				</div>
			</a>
		</div>

		<?php if ($calc == 0 && $colsPerPage != 1) : ?>
			</div>
		<?php endif; ?>
		<?php $i++; ?>

	<?php endforeach; ?>
</div>

<?php if ($showPagination) : ?>
	<?php if (RedshopbApp::isUseAjaxReadMorePagination()) : ?>
		<?php echo RedshopbLayoutHelper::render(
			'shop.pages.nopagination',
			array(
				'numberOfPages' => $numberOfPages,
				'currentPage'   => $currentPage,
				'ajaxJS'        => $ajaxJS
			)
		);?>
	<?php else : ?>
		<?php echo RedshopbLayoutHelper::render(
			'shop.pages.pagination.links',
			array(
				'numberOfPages' => $numberOfPages,
				'currentPage'   => $currentPage,
				'ajaxJS'        => $ajaxJS
			)
		);?>
	<?php endif; ?>
<?php endif;
