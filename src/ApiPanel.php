<?php


namespace Podnik;


use Tracy\IBarPanel;

class ApiPanel implements IBarPanel
{

    /**
     * @inheritDoc
     */
    function getTab()
    {
        return '<span title="Api Panel">
                    <svg>....</svg>
                    <span class="tracy-label">Api Panel</span>
                </span>';
    }

    /**
     * @inheritDoc
     */
    function getPanel()
    {
        return "Here :-)";
    }
}