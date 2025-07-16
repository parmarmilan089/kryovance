<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Mail\ThankYouMail;
use Mail;
class FeedbackController extends Controller
{
    //
    public function index() {
        $data = [];
        $data['title'] = 'Contact Us';
        $data['menu_active_tab'] = 'contact';
        return view('user.contact')->with($data);
    }
    public function submitForm(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);
        // Store feedback in the database
        Feedback::create($request->all());
        // Send Thank You email
        Mail::to($request->email)->send(new ThankYouMail($request->name));
        return back()->with('success', 'Thank you for your feedback! We will get back to you soon.');
    }
}