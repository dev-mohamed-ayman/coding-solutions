<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = \App\Models\ContactMessage::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.contact_messages.index', compact('messages'));
    }

    public function show(string $id)
    {
        $message = \App\Models\ContactMessage::findOrFail($id);
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        return view('dashboard.contact_messages.show', compact('message'));
    }

    public function destroy(string $id)
    {
        $message = \App\Models\ContactMessage::findOrFail($id);
        $message->delete();
        return redirect()->route('dashboard.contact-messages.index')->with('success', 'Message deleted successfully.');
    }
}
