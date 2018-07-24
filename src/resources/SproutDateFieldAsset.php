<?php
/**
 * Craft Sprout Date plugin for Craft CMS 3.x
 *
 * Uses flatpickr.js to create a date field for Sprout Forms. Requires Sprout Forms.
 *
 * @link      https://cld.agency
 * @copyright Copyright (c) 2018 James Smith
 */

namespace cld\craftsproutdate\resources;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    James Smith
 * @package   CraftSproutDate
 * @since     1.0.0
 */
class SproutDateFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@cld/craftsproutdate/resources";
        $this->depends = [CpAsset::class];
        $this->js = ['flatpickr.js'];
        $this->css = ['flatpickr.css'];
        parent::init();
    }
}