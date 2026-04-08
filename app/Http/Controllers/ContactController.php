<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function send(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:30',
            'level'   => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        try {
            $to = config('mail.to', 'studyinasia05@gmail.com');

            Mail::raw(
                "Nouveau message de: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Téléphone: {$validated['phone']}\n" .
                "Niveau: " . ($validated['level'] ?? '-') . "\n\n" .
                "Message:\n{$validated['message']}",
                function ($message) use ($validated, $to) {
                    $message->to($to)
                            ->subject("Nouvelle demande - {$validated['name']}")
                            ->replyTo($validated['email'], $validated['name']);
                }
            );

            return redirect()->route('contact')->with('success', __('contact.success'));
        } catch (\Exception $e) {
            return redirect()->route('contact')->with('error', __('contact.error'))->withInput();
        }
    }
}
