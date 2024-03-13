<div {{ $attributes->class([]) }}>
    <label for="inp-{{ $name }}" class="block text-sm text-gray-500 dark:text-gray-300">{{ $label }}
        @if ($required)
            <span>*</span>
        @endif
    </label>

    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="inp-{{ $name }}" placeholder="{{ $placeholder }}"
            @class([
                'mt-2 block w-full rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 placeholder-gray-400/70 focus:outline-none focus:ring focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300',
                'border-red-400 focus:border-red-400 dark:border-red-400 dark:focus:border-red-300 dark:placeholder-gray-500' => $errors->has(
                    $name),
                'border-blue-400 focus:border-blue-400 dark:border-blue-400 dark:focus:border-blue-300' => !$errors->has(
                    $name),
            ])>{{ $value }}
        </textarea>
    @else
        <input name="{{ $name }}" id="inp-{{ $name }}" type="{{ $type }}"
            value="{{ $value }}" placeholder="{{ $placeholder }}" @class([
                'mt-2 block w-full rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 placeholder-gray-400/70 focus:outline-none focus:ring focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300',
                'border-red-400 focus:border-red-400 dark:border-red-400 dark:focus:border-red-300 dark:placeholder-gray-500' => $errors->has(
                    $name),
                'border-blue-400 focus:border-blue-400 dark:border-blue-400 dark:focus:border-blue-300' => !$errors->has(
                    $name),
            ]) />
    @endif


    @error($name)
        <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
    @enderror
</div>
