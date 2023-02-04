<x-app-layout>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Mon profil</h4>
            <div class="nk-block-des text-soft">
                <p>Inscrit {{ auth()->user()->created_at->diffForHumans() }}.</p>
            </div>
        </div>
        @if($errors->any())
            @foreach($errors->all() as $messages)
                <x-input-error :messages="$messages"/>
            @endforeach
        @endif

        @if(session('status') === 'profile-updated')
            <x-input-success :message="__('Les informations ont été mis à jour avec succès.')"/>
        @endif

        @if(session('status') === 'password-updated')
            <x-input-success :message="__('Le mot de passe a bien été modifié.')"/>
        @endif
    </div>

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-sm overline-title">Changer le mot de passe</span>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')
                    <div class="form-group mt-4">
                        <x-input-label for="current_password" :value="__('Mot de passe actuel')"/>
                        <x-text-input id="current_password" placeholder="Saisir le mot de paasse"
                                      name="current_password" type="password"/>
                    </div>
                    <div class="form-group">
                        <x-input-label for="password" :value="__('Nouveu mot de passe')"/>
                        <x-text-input id="password" placeholder="Saisir le mot de passe" name="password"
                                      type="password"/>
                    </div>
                    <div class="form-group">
                        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')"/>
                        <x-text-input id="password_confirmation" placeholder="Conformation du mot de passe"
                                      name="password_confirmation" type="password"/>
                    </div>
                    <div class="form-group">
                        <x-primary-button>{{ __('Changer le mot de passe') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


