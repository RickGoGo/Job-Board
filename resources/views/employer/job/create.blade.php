<x-layout>
    <x-card class="m-4">
        <form action="{{ route('employer-jobs.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <x-text-input name="title" label="Title" placeholder="Enter the job title"
                    value="{{ old('title') ?? '' }}" :required="true" />
                <x-text-input name="location" label="Location" placeholder="Enter the city"
                    value="{{ old('location') ?? '' }}" :required="true" />
                <div class="col-span-2 w-full">
                    <x-text-input name="salary" type="number" label="Salary" placeholder="Enter the salary"
                        value="{{ old('salary') ?? '' }}" :required="true" />
                </div>
                <div class="col-span-2">
                    <x-text-input name="description" type="textarea" label="Description"
                        placeholder="Enter the job description" value="{{ old('title') ?? '' }}" :required="true" />
                </div>
                <x-radio-group name="category" value="{{ old('category') }}" label="Category" :required="true"
                    :options="\App\Models\Job::$category" />
                <x-radio-group name="experience" value="{{ old('experience') }}" label="Experience" :required="true"
                    :options="array_combine(
                        \App\Models\Job::$experience,
                        array_map('ucfirst', \App\Models\Job::$experience),
                    )" />
                <div class="col-span-2">
                    <x-button type="submit" class="w-full">Create</x-button>
                </div>
            </div>
        </form>

    </x-card>
</x-layout>
