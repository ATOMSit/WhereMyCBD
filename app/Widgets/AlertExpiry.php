<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;

class AlertExpiry extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'website' => null
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        if ($this->config['website'] === null) {
            return null;
        } else {
            if ($this->config['website']->expires_on > Carbon::now()->subWeeks(2)) {
                return view('widgets.alert_expiry', [
                    'config' => $this->config,
                ]);
            }
        }
    }
}
