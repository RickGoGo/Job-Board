<x-card {{ $attributes->class([]) }}>
    <div class="mb-4 flex justify-between">
        <div class="text-xl text-slate-700">{{ $job->title }}@if ($job->deleted_at)
                <span class="text-xs text-red-500">deleted</span>
            @endif
        </div>
        <div class="text-sm text-slate-500">${{ number_format($job->salary) }}</div>
    </div>
    <div class="mb-4 flex justify-between">
        <div class="flex gap-x-4 text-sm text-slate-400">
            <div>{{ $job->employer->company_name }}</div>
            <div>{{ $job->location }}</div>
        </div>
        <div>
            <x-tag>
                <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">{{ $job->experience }}</a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', ['category' => $job->category]) }}">{{ $job->category }}</a>
            </x-tag>
        </div>
    </div>
    {{ $slot }}
</x-card>
