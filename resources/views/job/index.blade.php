<x-layout>
    <x-breadcrumb :links="['Jobs' => '#']" />
    <div class="mt-4">
        <x-card class="">
            <form action="{{ route('jobs.index') }}" method="GET">
                <div class="grid grid-cols-2 gap-2">
                    <x-text-input name="search" label="Search" placeholder="Serach for any text"
                        value="{{ request('search') }}" />
                    <div class="grid grid-cols-2 gap-x-2">
                        <x-text-input name="salary_from" label="Salary From" placeholder="From"
                            value="{{ request('salary_from') }}" />
                        <x-text-input name="salary_to" label="To" placeholder="To"
                            value="{{ request('salary_to') }}" />
                    </div>
                    <x-radio-group name="experience" label="Experience" :options="array_combine(
                        \App\Models\Job::$experience,
                        array_map('ucfirst', \App\Models\Job::$experience),
                    )" :hasAllOption="true"
                        value="{{ request('experience') ?? '' }}" />

                    <x-radio-group name="category" label="Category" :options="\App\Models\Job::$category" :hasAllOption="true"
                        value="{{ request('category') ?? '' }}" />
                    <div class="col-span-2">
                        <x-button class="w-full">Search</x-button>
                    </div>
                </div>
            </form>
        </x-card>
        @forelse ($jobs as $job)
            <x-job-card :$job class="mt-4">
                <div>
                    <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
                </div>
            </x-job-card>
        @empty
            <div class="ml-10">No available job.</div>
        @endforelse
    </div>
</x-layout>
