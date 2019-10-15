<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * @function index()
     * @return Renderable
     * Shows the main home page and associated database queries
     */
    public function index()
    {

        return view('home')->with(compact('home'));
    }

    /**
     * @function secondsToTime()
     * @param $inputSeconds
     * @return int
     * Used to calculate the total input of seconds into years, days, hours, minutes, and seconds
     */
    public function secondsToTime($inputSeconds)
    {
        $secondsInAMinute = 60;
        $secondsInAnHour = 60 * $secondsInAMinute;
        $secondsInADay = 24 * $secondsInAnHour;
        $secondsInAYear = 365 * $secondsInADay;

        // Extract years
        $years = floor($inputSeconds / $secondsInAYear);

        // Extract days
        $daySeconds = $inputSeconds % $secondsInAYear;
        $days = floor($daySeconds / $secondsInADay);

        // Extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        // Extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        // Extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        // Format and return
        $timeParts = [];
        $sections = [
            'yr' => (int)$years,
            'day' => (int)$days,
            'hr' => (int)$hours,
            'min' => (int)$minutes,
            'sec' => (int)$seconds,
        ];
        foreach ($sections as $name => $value) {
            if ($value > 0) {
                $timeParts[] = $value . ' ' . $name . ($value == 1 ? '' : 's');
            }
        }
        return implode(', ', $timeParts);
    }
}
