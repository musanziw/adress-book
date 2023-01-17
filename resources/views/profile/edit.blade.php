<x-app-layout>
    @if($errors->any())
        @foreach($errors->all() as $messages)
            <x-input-error :messages="$messages"/>
        @endforeach
    @endif

    @if(session('status') === 'profile-updated')
        <x-input-success :message="__('Informations updated successfully')"/>
    @endif

    @if(session('status') === 'password-updated')
        <x-input-success :message="__('Passoword updated successfully')"/>
    @endif

    <div class="card card-bordered card-preview">
        <div class="card-inner">
                <div class="preview-block">
                <span class="preview-title-sm mt-3 overline-title">Change informations</span>

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div class="row mb-4 mt-4">
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <x-input-label for="firstname" :value="__('FirstName')"/>
                                <x-text-input id="firstname" name="firstname" type="text"
                                              :value="old('firstname', $user->firstname)"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-input-label for="name" :value="__('Name')"/>
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                              :value="old('name', $user->name)"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-input-label for="lastname" :value="__('LastName')"/>
                                <x-text-input id="lastname" name="lastname" type="text"
                                              :value="old('lastname', $user->lastname)"/>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-input-label for="email" :value="__('Email')"/>
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                              :value="old('email', $user->email)"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group mt-3">
                        <x-primary-button>{{ __('Enregistrer les modifications') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-sm overline-title">Change Passord</span>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="form-group mt-4">
                        <x-input-label for="current_password" :value="__('Current Password')"/>
                        <x-text-input id="current_password" name="current_password" type="password"/>
                    </div>

                    <div class="form-group">
                        <x-input-label for="password" :value="__('New Password')"/>
                        <x-text-input id="password" name="password" type="password" />
                    </div>

                    <div class="form-group">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password"/>
                    </div>

                    <div class="form-group">
                        <x-primary-button>{{ __('Changer le mot de passe') }}</x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>


