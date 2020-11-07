<?php


namespace Podnik;


use Tracy\IBarPanel;

class ApiPanel implements IBarPanel
{
    static $apis = [];

    static function registerApi($api) {
        self::$apis[] = $api;
    }

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
        $output = "";
        foreach (self::$apis as $api) {
            $output .= "<li>$api</li>";
        }
        return "APIS: <br> $output";
    }
}