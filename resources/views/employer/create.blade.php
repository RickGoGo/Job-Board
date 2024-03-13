<x-layout>
    <x-card>
        <form action="{{ route('employers.store') }}" method="POST">
            @csrf
            <x-text-input name="company_name" label="Company Name" value="{{ old('company_name') }}" :required="true"
                class="mb-4" />
            <x-button type="submit" class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>
