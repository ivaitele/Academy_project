<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuyRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function list(): View
    {
        $events = Event::query()->where('start_date',  '>=',now())->with(['category'])->get();

        return view('events.list', ['events' => $events, 'header' => 'Latest events']);
    }

    public function archive(): View
    {
        $events = Event::query()->where('start_date',  '<',now())->with(['category'])->get();

        return view('events.list', ['events' => $events, 'header' => 'Past events']);
    }

    public function category(Category $category): View
    {
        $events = Event::query()
            ->where('category_id',$category->id)
            ->where('start_date',  '>=',now())
            ->with(['category'])
            ->get();

        $header = $category->title;

        return view('events.list', ['events' => $events, 'header' => $header]);
    }

    public function show(Request $request, Event $event): View
    {
        $cart = $request->session()->get('cart');
        $event->count = $cart[$event->id] ?? 0;

        return view('events.show', ['event' => $event, 'cart' => $cart]);
    }

    public function add_to_cart(BuyRequest $request, Event $event) {
        $cart = $request->session()->get('cart');

        //jei sesijoj nera sukurto 'cart', sukuriam tuscia masyva
        if (!isset($cart)) {
            $cart = array();
        }

        $cart[$event->id] = $request->count;

        //Istrinti viena bilieta jei count=0
        if ($cart[$event->id] == 0) {
            unset($cart[$event->id]);
        }

        $request->session()->put('cart', $cart);

        if (count($cart) === 0) {
            $request->session()->forget('cart');
        }

        $request->session()->save();

        if ($request->redirect) {
            return redirect()->route($request->redirect)->with('success', 'Sėkmingai istrinta preke');
        }

        return redirect()->route('events.show', $event->id)->with('success', 'Sėkmingai įdėta i krepšelį');
    }

    public function cart(Request $request) {
        $cart = $request->session()->get('cart');

        $ids = array_keys($cart ?? []);

        $events = Event::query()->whereIn('id', $ids)->get();

        return view ('events.cart', ['cart' => $cart, 'events' => $events]);
    }

}
