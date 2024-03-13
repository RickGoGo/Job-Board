<x-layout>
    <x-breadcrumb :links="['MyJobs' => '#']" />
    <div class="mt-4">
        <div class="mb-4 text-right">
            <x-link-button href="{{ route('employer-jobs.create') }}">Add New </x-link-button>
        </div>

        @forelse ($jobs as $job)
            <x-job-card :$job class="mb-4">
                @forelse ($job->applications as $applicant)
                    <div class="mb-2 flex justify-between text-xs text-slate-400">
                        <div>
                            <div class="text-slate-700">{{ $applicant->user->name }} </div>
                            <div>Applied {{ $applicant->created_at->diffForHumans() }}</div>
                            <div>Download CV</div>
                        </div>
                        <div class="items-center">${{ number_format($applicant->expected_salary) }}</div>
                    </div>
                @empty
                    <div>no applications yet.</div>
                @endforelse
                @if ($job->applications()->count() > 0)
                    <div class="mb-2 text-sm text-slate-500">
                        {{ $job->applications_count }} applications applied in total with the average salary
                        ${{ number_format($job->applications_avg_expected_salary) }}
                    </div>
                @endif
                <div class="mt-4 flex gap-x-4">
                    <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
                    <x-link-button :href="route('employer-jobs.edit', $job)">Edit</x-link-button>
                    <form action="{{ route('employer-jobs.destroy', $job) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit">Delete</x-button>
                    </form>
                </div>
            </x-job-card>
        @empty
            <div>no jobs yet.</div>
        @endforelse
    </div>
</x-layout>
