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
                    <div class="row gy-4 mt-1">
                        <div class="col-sm-6 mb-4">
                            <div class="form-group">
                                <x-input-label for="name" :value="__('Nom du groupe')"/>
                                <x-text-input name="name" placeholder="Saisir le nom du groupe" value="{{ old('name', ' ') }}"/>
                            </div>

                            <div class="form-group">
                                <x-primary-button>
                                    {{ __('Ajouter le groupe') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>