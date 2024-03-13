<x-layout>
    <x-card class="m-5">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-text-input name="email" label="Email Address" placeholder="example@holder.com"
                    value="{{ old('email') ?? '' }}" :required="true" />
            </div>
            <div class="mb-4">
                <x-text-input name="password" label="Password" type="password" placeholder="*******" :required="true" />
            </div>
            <x-button type="submit" class="w-full">Login</x-button>
        </form>
    </x-card>
</x-layout>
