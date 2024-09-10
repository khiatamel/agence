<x-guest-layout>
    <form method="POST" action="{{ route('verify.phone') }}">
        @csrf
        <div>
            <x-input-label for="verification_code" :value="__('Code de vérification')" />
            <x-text-input id="verification_code" class="block mt-1 w-full" type="text" name="verification_code" required autofocus />
            <x-input-error :messages="$errors->get('verification_code')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Vérifier') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
