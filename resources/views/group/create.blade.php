<x-app-layout>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-sm overline-title">{{ __('Add a group') }}</span>

                @if($errors->any())
                    @foreach($errors->all() as $messages)
                        <x-input-error :messages="$messages"/>
                    @endforeach
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="row gy-4 mt-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                <textarea class="form-control no-resize" id="description"
                                          name="description">{{ old('description', '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-4">
                            <div class="form-group">
                                <x-input-label for="name" :value="__('Group Name')"/>
                                <div class="form-control-wrap">
                                    <x-text-input name="name" value="{{ old('name', ' ') }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <x-primary-button>
                                    {{ __('Ajout du groupe') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>