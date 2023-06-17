<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;
use Alkoumi\LaravelHijriDate\Hijri;

class TodayDate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $todayDate = $this->getTodayDate();
        return view('components.today-date',compact('todayDate'));
    }

    private function getTodayDate()
    {
        /**
         * Render date to be format as
         * 25 جمادى الأول 1439 هجري - الخميس 10 فبراير 2018 ميلادي
         */
        $date = Carbon::now();
        $today = Hijri::DateIndicDigits('l ، j F ، Y', $date);
        $today .= ' هجري ';
        $today .= ' | ';
        $date = Carbon::today()->locale('ar');
        $today .= $date->translatedFormat('d F Y');
        $today .= ' ميلادي ';
        return $today;//'25 جمادى الأول 1439 هجري - الخميس 10 فبراير 2018 ميلادي';
    }
}
