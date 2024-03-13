<x-layout>
    <x-breadcrumb :links="['Register' => '#']" />
    <x-card class="m-5">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-text-input name="name" label="User Name" placeholder="enter your user name"
                    value="{{ old('name') ?? '' }}" :required="true" />
            </div>
            <div class="mb-4">
                <x-text-input name="email" label="Email Address" placeholder="example@holder.com"
                    value="{{ old('email') ?? '' }}" :required="true" />
            </div>
            <div class="mb-4">
                <x-text-input name="password" label="Password" type="password" placeholder="*******"
                    :required="true" />
            </div>
            <x-button type="submit" class="w-full">Register</x-button>
        </form>
    </x-card>
</x-layout>
