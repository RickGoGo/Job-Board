<x-layout>
    <x-breadcrumb :links="['My Applications' => '#']" />
    <div class="mt-4">
        @forelse ($applications as $applicant)
            <x-job-card :job="$applicant->job" class="mb-4">
                <div class="flex justify-between text-xs text-slate-400">
                    <div>
                        <div>Applied {{ $applicant->created_at->diffForHumans() }}</div>
                        <div>Other {{ $applicant->job->applications_count - 1 }} applicants applied</div>
                        <div>Your asking salary is ${{ number_format($applicant->expected_salary) }}</div>
                        <div>Average asking salry of this job is
                            ${{ number_format($applicant->job->applications_avg_expected_salary) }}</div>
                    </div>
                    <div>
                        <form
                            action="{{ route('job.application.destroy', ['job' => $applicant->job, 'application' => $applicant]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit">Cancel</x-button>
                        </form>
                    </div>
                </div>
            </x-job-card>
        @empty
            <div class="rounded-md border border-dashed border-slate-300 p-8">
                <div class="text-center font-medium">
                    No job applied yet.
                </div>
                <div class="text-center">
                    Go find some jobs <a href="{{ route('jobs.index') }}"
                        class="text-indigo-500 hover:underline">here!</a>
                </div>
            </div>
        @endforelse
    </div>
</x-layout>
