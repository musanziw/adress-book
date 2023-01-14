<x-app-layout>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-sm overline-title">{{ $group->name }}</span>

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
                                <x-input-label for="name" :value="__('Group Name')"/>
                                <div class="form-control-wrap">
                                    <x-text-input name="name" value="{{ old('name', $group->name) }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <x-primary-button>
                                    {{ __('Ediion du groupe') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>