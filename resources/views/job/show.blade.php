<x-layout>
    <x-breadcrumb :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job class="mt-4">
        <p class="mb-4 text-slate-400">
            {{ $job->description }}
        </p>
        <div class="">
            @if (auth()->user() && auth()->user()->id === $job->employer->user_id)
                <div class="text-center">
                    <p>You owned this job.</p>
                </div>
            @elseif (auth()->user() && auth()->user() && !auth()->user()->can('apply', $job))
                <div class="text-center">
                    <p>You already applied to this job.</p>
                </div>
            @else
                <x-link-button :href="route('job.application.create', $job)">Apply</x-link-button>
            @endif
        </div>
    </x-job-card>
    <x-card class="mt-4">
        <h2 class="text-lg text-slate-700">
            More {{ $job->employer->company_name }} Jobs
        </h2>
        @forelse ($job->employer->jobs as $otherJob)
            @if ($otherJob->id !== $job->id)
                <div class="mt-4 flex justify-between text-sm text-slate-400">
                    <div class="text-sm">
                        <div><a href="{{ route('jobs.show', $otherJob) }}">{{ $otherJob->title }}</a></div>
                        <div class="text-xs">{{ $otherJob->created_at->diffForHumans() }}</div>
                    </div>
                    <div>
                        ${{ number_format($otherJob->salary) }}
                    </div>
                </div>
            @endif
        @empty
            <p>No other jobs fromt this company.</p>
        @endforelse
    </x-card>
</x-layout>
