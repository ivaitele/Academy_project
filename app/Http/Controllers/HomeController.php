<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        $events = Event::query()
            ->where('start_date',  '>=', now())
            ->where('tickets_left', '>', 0)
            ->limit(3)
            ->get();

        return view('events.list', ['events' => $events, 'header' => 'Naujausi renginiai']);
    }
}
