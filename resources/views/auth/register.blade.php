<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        @include('components.input',["nom"=>'nom'])
        @include('components.input',["nom"=>'prenom','label'=>'Prénom'])
        @include('components.input',["nom"=>'addresse'])
        @include('components.input',["nom"=>'telephone','type'=>'number'])
        @include('components.input',["nom"=>'nationalite'])
        @include('components.input',["nom"=>'email','type'=>'email'])
        @include('components.input',["nom"=>'dob','type'=>'date','label' => 'Date de Naissance'])
        @include('components.input',["nom"=>'photo','type'=>'file'])
        @include('components.input',["nom"=>'genre','type'=>'radio','options'=>[['name'=>'Homme','value'=>'H'],['name'=>'Femme','value'=>'F']]])

        


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
