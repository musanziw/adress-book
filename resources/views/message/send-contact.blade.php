<x-app-layout>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-sm overline-title">{{ __('SEND MESSAGE') }}</span>

                @if($errors->any())
                    @foreach($errors->all() as $messages)
                        <x-input-error :messages="$messages"/>
                    @endforeach
                @endif

                <form action="" method="post">
                    @csrf
                    <div class="row gy-4 mt-3">
                        <div class="col-sm-6 mb-8">
                            <div class="form-group">
                                <x-input-label for="titile" :value="__('Title')"/>
                                    <x-text-input placeholder="Enter title" name="title"
                                                  value="{{ old('title', ' ') }}"/>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="types[]">Message Type.s</label>
                                <select class="form-select select2-input" multiple="multiple" name="types[]"
                                        id="types[]" data-placeholder="Select type.s">
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" class="uppercase">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="contacts[]">Contact.s</label>
                                <select class="form-select select2-input" multiple="multiple" name="contacts[]"
                                        id="contacts[]" data-placeholder="Select contact.s">
                                    @foreach($contacts as $contact)
                                        <option value="{{ $contact->id }}">
                                            {{ $contact->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-4">
                            <div class="form-group">
                                <label class="form-label" for="default-textarea">Message</label>
                                <div class="form-control-wrap">
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" name="content" placeholder="Message..." id="default-textarea"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-primary-button>
                                    {{ __('Envoyez le message') }}
                                </x-primary-button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>


