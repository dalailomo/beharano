<?php

use Behat\Mink\Element\NodeElement;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class BaseContext extends MinkContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I scroll to :elementId
     */
    public function iScrollTo($elementId)
    {
        $this->getSession()->executeScript(
            "window.scrollTo(0, document.getElementById('{$elementId}').getBoundingClientRect().top);"
        );
    }

    /**
     * @Given I resize window
     */
    public function iResizeWindow()
    {
        $this->getSession()->resizeWindow(1440, 900, 'current');
    }

    /**
     * @Then I dump everything that matches :arg1
     */
    public function iDumpEverythingThatMatches($cssSelector)
    {
        $elements = $this->getSession()->getPage()->findAll('css', $cssSelector);
        $elementsContent = '';

        foreach ($elements as $element) {
            /** @var $element NodeElement */
            $elementsContent .= PHP_EOL . $element->getHtml();

            if ($element->hasAttribute('href')) $elementsContent .= ' (href => ' . $element->getAttribute('href') . ')';
        }

        // todo dump to file
        print_r($elementsContent);
    }


}
