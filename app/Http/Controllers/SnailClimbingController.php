<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnailClimbingController extends Controller
{
    public function showForm()
    {
        return view('snail_climb');
    }

    public function calculateDays(Request $request)
    {
        $wellDepth = 11;
        $climbDay = 3;
        $dropNight = 2;

        $daysRequired = $this->calculateSnailClimb($wellDepth, $climbDay, $dropNight);

        return view('snail_climb', ['days' => $daysRequired]);
    }

    private function calculateSnailClimb($wellDepth, $climbDay, $dropNight)
    {

        $effectiveClimb = $climbDay - $dropNight;
        $remainingDistance = $wellDepth - $climbDay;

        $days = ceil($remainingDistance / $effectiveClimb) + 1;

        return $days;
    }
}
