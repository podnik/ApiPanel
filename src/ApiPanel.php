<?php


namespace Podnik;


use Tracy\Debugger;
use Tracy\IBarPanel;

class ApiPanel implements IBarPanel
{
    static $apis = [];

    static function startQuery($apiName, $method, $params = []) {
        Debugger::timer($apiName."_".$method);
    }

    static function endQuery($apiName, $method, $params = []) {
        $time = Debugger::timer($apiName."_".$method);
        self::$apis[$apiName][] = [
            "method" => $method,
            "params" => $params,
            "time" => round($time, 4)." s"
        ];
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
        $output = "<h1>API Queries</h1><div class='tracy-inner tracy-InfoPanel'><div class='tracy-inner-container'><table class='tracy-sortable'><tbody>";
        foreach (self::$apis as $api => $queries) {
            $output .= "<strong>$api</strong>";
            foreach ($queries as $query) {
                $params = json_encode($query["params"]);
                $output .= "<tr><td>$query[method]</td><td>$params</td><td>$query[time]</td></tr>";
            }
        }
        $output .= "</tbody></div></div>";
        return "$output";
    }
}