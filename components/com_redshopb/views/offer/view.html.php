<?php
/**
 * @package     Aesir.E-Commerce.Frontend
 * @subpackage  Views
 *
 * @copyright   Copyright (C) 2012 - 2019 Aesir. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Factory;
use Joomla\CMS\Form\Form;
/**
 * Offer View
 *
 * @package     Aesir.E-Commerce.Frontend
 * @subpackage  Views
 * @since       1.0
 */
class RedshopbViewOffer extends RedshopbView
{
	/**
	 * @var  Form
	 */
	protected $form;

	/**
	 * @var  object
	 */
	protected $item;

	/**
	 * @var  boolean
	 */
	protected $isNew;

	/**
	 * Display method
	 *
	 * @param   string  $tpl  The template name
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		$this->form  = $this->get('Form');
		$this->item  = $this->get('Item');
		$this->isNew = (int) $this->item->id <= 0;

		parent::display($tpl);
	}

	/**
	 * Get the view title.
	 *
	 * @return  string  The view title.
	 */
	public function getTitle()
	{
		$isNew = (int) $this->item->id <= 0;
		$title = Text::_('COM_REDSHOPB_OFFER');
		$state = $isNew ? Text::_('JNEW') : Text::_('JEDIT');

		return $title . ' <small>' . $state . '</small>';
	}

	/**
	 * Get the toolbar to render.
	 *
	 * @return  RToolbar
	 */
	public function getToolbar()
	{
		$group        = new RToolbarButtonGroup;
		$save         = RToolbarBuilder::createSaveButton('offer.apply');
		$saveAndClose = RToolbarBuilder::createSaveAndCloseButton('offer.save');
		$layout       = Factory::getApplication()->input->get('layout');

		if ($layout == 'edit')
		{
			$group->addButton($save)
				->addButton($saveAndClose);

			if (empty($this->item->id))
			{
				$cancel = RToolbarBuilder::createCancelButton('offer.cancel');
			}
			else
			{
				$cancel = RToolbarBuilder::createCloseButton('offer.cancel');
			}

			$group->addButton($cancel);

			$toolbar = new RToolbar;
			$toolbar->addGroup($group);

			$group = new RToolbarButtonGroup;

			if (!in_array($this->item->status, array('sent', 'accepted', 'ordered')))
			{
				$sendOffer = RToolbarBuilder::createStandardButton(
					'offer.send', Text::_('COM_REDSHOPB_OFFER_SEND'), 'btn-success', 'icon-envelope', false
				);
				$group->addButton($sendOffer);
			}

			$toolbar->addGroup($group);
		}
		else
		{
			$toolbar = '';
		}

		return $toolbar;
	}
}