<x-app-layout>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-sm overline-title">{{ __('Ajouter un groupe') }}</span>
                @if($errors->any())
                    @foreach($errors->all() as $messages)
                        <x-input-error :messages="$messages"/>
                    @endforeach
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="row gy-4 mt-3">
                        <div class="col-sm-6 mb-4">
                            <div class="form-group">
                                <x-input-label for="firstname" :value="__('Prénom')"/>
                                <x-text-input placeholder="Entrer le prénom" name="firstname" value="{{ old('firstname', ' ') }}"/>
                            </div>
                            <div class="form-group">
                                <x-input-label for="name" :value="__('Nom')"/>
                                <x-text-input placeholder="Entrer le nom" name="name" value="{{ old('name', ' ') }}"/>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-4">
                            <div class="form-group">
                                <x-input-label for="lastname" :value="__('Postnom')"/>
                                <x-text-input placeholder="Entrer le postnom" name="lastname" value="{{ old('lastname', ' ') }}"/>
                            </div>
                            <div class="form-group">
                                <x-input-label for="email" :value="__('E-mail')"/>
                                <x-text-input name="email" placeholder="Entrer l'e-mail" value="{{ old('email', ' ') }}"/>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-4">
                            <div class="form-group">
                                <x-input-label for="address" :value="__('Adresse')"/>
                                <x-text-input placeholder="Entrer l'addresse" name="address" value="{{ old('address', ' ') }}"/>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="groups">Groupe(s) du contact</label>
                                <select class="form-select select2-input" multiple="multiple" name="groups[]" id="groups" data-placeholder="Choix de groupe">
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-input-label for="phone" :value="__('Numéro de télephone')"/>
                                <x-text-input placeholder="Entrer le numéro" name="phone"  value="{{ old('phone', ' ') }}"/>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-primary-button>
                                        {{ __('Ajouter le contact') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="custom-control custom-switch checked">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status">
                                    <label class="custom-control-label" for="status">Inactif / Actif</label>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>


