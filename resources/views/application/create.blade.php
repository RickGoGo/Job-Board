<x-layout>
    <x-breadcrumb :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" />
    <div class="m-4">
        <x-job-card :$job />
        <x-card class="mt-4">
            <h2 class="text-lg">You Job Application</h2>

            <form action="{{ route('job.application.store', $job) }}" method="POST">
                @csrf
                <x-text-input class="mb-4 mt-4" name="expected_salary" label="Expected Salary"
                    value="{{ old('expected_salary') }}" placeholder="Enter your expected salary for this position."
                    type="number" :required="true" />
                <x-text-input name="cv" type="file" label="Upload CV" :required="true" class="mb-4" />
                <x-button type="submit" class="w-full">Apply</x-button>
            </form>
        </x-card>
    </div>
</x-layout>
