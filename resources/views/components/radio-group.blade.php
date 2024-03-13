<div>
    @if ($label)
        <label class="block text-sm text-gray-500 dark:text-gray-300">{{ $label }}@if ($required)
                <span>*</span>
            @endif
        </label>

    @endif
    @foreach ($options as $key => $text)
        <div class="mt-2 flex items-center gap-x-2">
            <input type="radio" value="{{ $key }}" id="{{ $name }}-{{ $key }}"
                name="{{ $name }}"
                class="peer h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                @checked($value == $key) />
            <label for="{{ $name }}-{{ $key }}"
                class="text-sm text-gray-500 peer-checked:text-blue-500 dark:text-gray-300">{{ $text }}</label>
        </div>
    @endforeach
    @error($name)
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
