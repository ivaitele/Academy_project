<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Managers\FileManager;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrganizerEventsController extends Controller
{
    public function __construct(protected FileManager $fileManager)
    {
    }

    public function list(): View
    {
        $user_id = Auth::user()->id;
        $events = Event::query()->where('user_id', $user_id)->with(['category'])->get();

        return view('admin.events.list', ['active' => 'events', 'events' => $events]);
    }

    public function show(Event $event): View
    {
        $active = 'events';
        return view('admin.events.show', compact('event', 'active'));
    }

    public function create()
    {
        $active = 'events';
        return view('admin.events.create', compact('active'));
    }

    public function store(EventRequest $request)
    {
        $event = Event::create($request->all());
        $event->user_id = Auth::user()->id;

        $file = $this->fileManager->storeFile($request, 'image','images/event');
        // Ši kodo dalis atsakinga uz paveiksliuko isaugojima produkto lenteleje
        $event->image = $file->url;
        $event->save();

        return redirect()->route('organizer.events.list', $event);
    }

    public function edit(Event $event)
    {
        $active = 'events';
        return view('admin.events.edit', compact('event', 'active'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->all());

        if ($request->image) {
            $this->fileManager->removeFile($event->image, $event->id, Event::class);
            $file = $this->fileManager->storeFile($request, 'image', 'images/event');

            $event->image = $file->url;
        }

        $event->save();

        return redirect()->route('organizer.events.list');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('organizer.events.list');
    }
}
