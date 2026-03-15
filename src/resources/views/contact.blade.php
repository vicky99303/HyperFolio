@extends('layouts.app')

@section('content')
    <section class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-3xl font-bold mb-4">Contact Me</h2>

        <form
                hx-post="{{ route('contact.submit') }}"
                hx-target="#form-messages"
                hx-swap="innerHTML"
                class="space-y-4"
        >
            @csrf
            <div>
                <label class="block mb-1 font-semibold">Name</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block mb-1 font-semibold">Message</label>
                <textarea name="message" class="w-full border rounded p-2" rows="4" required></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Send</button>
        </form>

        <div id="form-messages" class="mt-4 text-green-600 font-semibold"></div>
    </section>
@endsection