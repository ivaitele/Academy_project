<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Managers\FileManager;
use App\Models\Event;


class AdminEventsController extends Controller
{
    public function __construct(protected FileManager $fileManager)
    {
    }

    public function index()
    {
        $events = Event::query()->with(['category'])->get();

        return view('admin.events.index', ['active' => 'events', 'events' => $events]);
    }

    public function show(Event $event)
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
        $file = $this->fileManager->storeFile($request, 'image','images/event');

        $data = $request->all();
        $data['image'] = $file->url;

        $event = Event::create($data);

        return redirect()->route('admin.events.index', $event);
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

        return redirect()->route('admin.events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index');
    }
}
