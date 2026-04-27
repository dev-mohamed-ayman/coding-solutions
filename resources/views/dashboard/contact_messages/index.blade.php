@extends('dashboard.layouts.app')

@section('title', 'Contact Messages')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-zinc-900">Contact Messages</h1>
            <p class="mt-1 text-sm text-zinc-500">Manage inquiries and messages from the website contact form.</p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('success') }}</div>
    @endif

    <div class="rounded-2xl border border-zinc-200/80 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-zinc-100 bg-zinc-50/80 text-xs font-medium uppercase tracking-wide text-zinc-500">
                        <th class="px-5 py-3 w-40">Date</th>
                        <th class="px-5 py-3">Name</th>
                        <th class="px-5 py-3">Email</th>
                        <th class="px-5 py-3">Subject</th>
                        <th class="px-5 py-3 w-24 text-center">Status</th>
                        <th class="px-5 py-3 w-20 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100 text-zinc-700">
                    @forelse ($messages as $message)
                        <tr class="transition-colors hover:bg-zinc-50/80 {{ !$message->is_read ? 'bg-indigo-50/30' : '' }}">
                            <td class="px-5 py-3.5 whitespace-nowrap text-zinc-500">{{ $message->created_at->format('M d, Y h:i A') }}</td>
                            <td class="px-5 py-3.5 font-medium text-zinc-900">{{ $message->name }}</td>
                            <td class="px-5 py-3.5">{{ $message->email }}</td>
                            <td class="px-5 py-3.5 text-zinc-500">{{ $message->subject ?: '-' }}</td>
                            <td class="px-5 py-3.5 text-center">
                                @if($message->is_read)
                                    <span class="rounded-full bg-zinc-100 px-2.5 py-0.5 text-xs font-medium text-zinc-600">Read</span>
                                @else
                                    <span class="rounded-full bg-indigo-50 px-2.5 py-0.5 text-xs font-medium text-indigo-700">New</span>
                                @endif
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('dashboard.contact-messages.show', $message) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">View</a>
                                    <form action="{{ route('dashboard.contact-messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-600 hover:text-rose-900 text-sm font-medium">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-8 text-center text-zinc-500">No contact messages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($messages->hasPages())
            <div class="border-t border-zinc-100 p-4">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@endsection
