<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserNoteStoreRequest;
use App\Models\UserNote;
use Illuminate\Http\Request;

class AdminUserNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = UserNote::where('id', auth()->user()->id)->paginate(10);

        return view('admin.pages.notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserNoteStoreRequest $request)
    {
        UserNote::create([
           'title' => $request->title,
           'description' => $request->description,
           'make_sticky' => $request->make_sticky,
           'user_id' => $request->user_id,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a new note');
        return redirect('admin/notes')->with('success', 'New note created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = UserNote::findOrFail($id);

        return view('admin.pages.notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $note = UserNote::findOrFail($id);

        return view('admin.pages.notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserNoteStoreRequest $request, string $id)
    {
        $note = UserNote::findOrFail($id);

        $note->update([
            'title' => $request->title,
            'description' => $request->description,
            'make_sticky' => $request->make_sticky,
            'user_id' => $request->user_id,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated note ' . $note->title);
        return redirect('admin/notes')->with('success', 'Note has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = UserNote::findOrFail($id);

        $note->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted note ' . $note->title);
        return redirect('admin/notes')->with('success', 'Note has been deleted successfully');
    }
}
