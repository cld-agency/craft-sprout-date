<?php
/**
 * Craft Sprout Date plugin for Craft CMS 3.x
 *
 * Uses flatpickr.js to create a date field for Sprout Forms. Requires Sprout Forms.
 *
 * @link      https://cld.agency
 * @copyright Copyright (c) 2018 James Smith
 */

namespace cld\craftsproutdate\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\PreviewableFieldInterface;

use barrelstrength\sproutforms\base\FormField;

use cld\craftsproutdate\resources\SproutDateFieldAsset;

/**
 * @author    James Smith
 * @package   CraftSproutDate
 * @since     1.0.0
 */
class SproutDate extends FormField implements PreviewableFieldInterface
{

	public $cssClasses;
	public $defaultValue;
	public $titleText;
	public $options;

	// Static Methods
	// =========================================================================

	public static function displayName(): string
	{
		return Craft::t('craft-sprout-date', 'Date');
	}

	// Public Methods
	// =========================================================================

	public function init()
	{
		parent::init();
	}

	public function rules()
	{
		$rules = parent::rules();
		return $rules;
	}

	public function getSettingsHtml()
	{
		// Render the settings template
		// return Craft::$app->getView()->renderTemplate(
		//     'craft-sprout-date/SproutDate_settings',
		//     [
		//         'field' => $this,
		//     ]
		// );
	}

	// This is for Craft's native fields, don't think it applies to Sprout fields...
	public function getInputHtml($value, ElementInterface $element = null): string
	{

	}

	/**
	 *
	 * This is for the UI that gets output into the drag n drop form builder
	 *
	 * @throws \Twig_Error_Loader
	 * @throws \yii\base\Exception
	 */
	public function getExampleInputHtml()
	{

		return Craft::$app->getView()->renderTemplate('craft-sprout-date/SproutDate_input_example',
			[
				'name' => $this->handle,
				'field' => $this,
			]
		);
	}

	/**
	 *
	 * This is for the UI that gets output on the front end
	 *
	 * @throws \Twig_Error_Loader
	 * @throws \yii\base\Exception
	 */
	public function getFrontEndInputHtml($value, array $renderingOptions = null): string
	{
		// Register our asset bundle
		Craft::$app->getView()->registerAssetBundle(SproutDateFieldAsset::class);
		Craft::$app->getView()->registerJs("flatpickr('.js-flatpickr', {});");

		// Get our id and namespace
		$id = Craft::$app->getView()->formatInputId($this->handle);
		$namespacedId = Craft::$app->getView()->namespaceInputId($id);

		// Render the input template
		return Craft::$app->getView()->renderTemplate(
			'SproutDate_input',
			[
				'name' => $this->handle,
				'title' => $this->handle,
				'value' => $value,
				'field' => $this,
				'id' => $id,
				'namespacedId' => $namespacedId,
				'renderingOptions' => $renderingOptions
			]
		);
	}

	public function getTemplatesPath()
	{
		return Craft::getAlias('@cld/craftsproutdate/templates/');
	}
}