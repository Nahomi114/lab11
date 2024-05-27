<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContactController extends Controller
{
    use AuthorizesRequests;

    public function create(): View
    {
        return view('contacts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email:strict',
            'profile_picture' => 'nullable|image|max:2048', // Agregado para manejar la foto de perfil
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures');
        }

        $request->user()->contacts()->create($validated);

        return redirect()->route('contacts.index');
    }

    public function index(Request $request): View
    {
        return view('contacts.index', [
            'contacts' => $request->user()->contacts()->get(),
        ]);
    }

    public function edit(Contact $contact): View
    {
        return view('contacts.edit', [
            'contact' => $contact,
        ]);
    }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email:strict',
            'profile_picture' => 'nullable|image|max:2048', // Agregado para manejar la foto de perfil
        ]);

        if (!is_null($contact->profile_picture)) {
            Storage::delete($contact->profile_picture);
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures');
        }

        $contact->update($validated);

        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('contacts.index');
    }
}

