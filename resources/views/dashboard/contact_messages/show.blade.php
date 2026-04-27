@extends('dashboard.layouts.app')

@section('title', 'View Message')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Message Details</h1>
            <p class="mt-1 text-sm text-zinc-500">View contact inquiry from {{ $message->name }}.</p>
        </div>
        <a href="{{ route('dashboard.contact-messages.index') }}" class="inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2 text-sm font-medium text-zinc-700 shadow-sm ring-1 ring-inset ring-zinc-300 hover:bg-zinc-50">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Messages
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Message Details -->
        <div class="md:col-span-2 space-y-6">
            <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm p-6">
                <h3 class="text-lg font-medium text-zinc-900 mb-4">{{ $message->subject ?: 'No Subject' }}</h3>
                <div class="prose prose-zinc max-w-none text-zinc-700 whitespace-pre-wrap">{{ $message->message }}</div>
            </div>
        </div>

        <!-- Contact Info Sidebar -->
        <div class="space-y-6">
            <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm p-6">
                <h3 class="text-sm font-semibold text-zinc-900 uppercase tracking-wide mb-4">Contact Information</h3>
                <dl class="space-y-4 text-sm">
                    <div>
                        <dt class="text-zinc-500 font-medium">Name</dt>
                        <dd class="mt-1 text-zinc-900">{{ $message->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-zinc-500 font-medium">Email</dt>
                        <dd class="mt-1 text-indigo-600"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>
                    </div>
                    <div>
                        <dt class="text-zinc-500 font-medium">Phone</dt>
                        <dd class="mt-1 text-zinc-900">
                            @if($message->phone)
                                <a href="tel:{{ $message->phone }}" class="hover:underline">{{ $message->phone }}</a>
                            @else
                                -
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-zinc-500 font-medium">Received At</dt>
                        <dd class="mt-1 text-zinc-900">{{ $message->created_at->format('F j, Y, g:i A') }}</dd>
                    </div>
                </dl>

                <div class="mt-6 pt-6 border-t border-zinc-100">
                    <form action="{{ route('dashboard.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex justify-center items-center gap-2 rounded-xl bg-rose-50 px-4 py-2 text-sm font-medium text-rose-700 hover:bg-rose-100 transition">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
