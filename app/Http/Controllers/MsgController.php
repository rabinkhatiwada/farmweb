<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MsgController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.Messages.index', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20', // Ensure phone is validated as string
            'msg' => 'nullable|string', // Make msg nullable to avoid validation error if not provided
        ]);

        try {
            $message = new Message();
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->phone = $request->input('phone'); // Correctly assign phone
            $message->msg = $request->input('msg');
            $message->save();

            return redirect()->back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while sending the message. Please try again later.');
        }
    }

    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        return view('admin.Messages.detail', ['message' => $message]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }
}
