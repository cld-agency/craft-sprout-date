<?php
/**
 * Craft Sprout Date plugin for Craft CMS 3.x
 *
 * Uses flatpickr.js to create a date field for Sprout Forms. Requires Sprout Forms.
 *
 * @link      https://cld.agency
 * @copyright Copyright (c) 2018 James Smith
 */

namespace cld\craftsproutdate;

use Craft;
use craft\base\Plugin;
use yii\base\Event;

use barrelstrength\sproutforms\services\Fields;
use barrelstrength\sproutforms\events\RegisterFieldsEvent;

use cld\craftsproutdate\fields\SproutDate;

/**
 * Class CraftSproutDate
 *
 * @author    James Smith
 * @package   CraftSproutDate
 * @since     1.0.0
 *
 */
class CraftSproutDate extends Plugin
{
	public static $plugin;

	// don't touch this unless you need to run actions on the database, as it
	// will cause the site to go down until someone presses the "Finish Up"
	// button on the Craft CP!!!
	public $schemaVersion = '1.0.1';

	// =========================================================================

	public function init()
	{
		parent::init();

		Event::on(
			Fields::class,
			Fields::EVENT_REGISTER_FIELDS,
			function(RegisterFieldsEvent $event) {
				$event->fields[] = new SproutDate();
			}
		);
	}
}
