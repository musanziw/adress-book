<x-app-layout>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="preview-block">
                <span class="preview-title-sm overline-title">{{ $contact->firstname }} {{ $contact->name }}</span>

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
                                <x-input-label for="firstname" :value="__('Firstname')"/>
                                <div class="form-control-wrap">
                                    <x-text-input placeholder="Enter fristname" name="firstname"
                                                  value="{{ old('firstname', $contact->firstname) }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <x-input-label for="name" :value="__('Name')"/>
                                <div class="form-control-wrap">
                                    <x-text-input placeholder="Enter name" name="name"
                                                  value="{{ old('name', $contact->name) }}"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-4">
                            <div class="form-group">
                                <x-input-label for="lastname" :value="__('Lastname')"/>
                                <div class="form-control-wrap">
                                    <x-text-input placeholder="Enter lastname" name="lastname"
                                                  value="{{ old('lastname', $contact->lastname) }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <x-input-label for="email" :value="__('Email')"/>
                                <div class="form-control-wrap">
                                    <x-text-input name="email" placeholder="Enter email"
                                                  value="{{ old('email', $contact->email) }}"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-4">
                            <div class="form-group">
                                <x-input-label for="address" :value="__('Address')"/>
                                <div class="form-control-wrap">
                                    <x-text-input placeholder="Enter address" name="address"
                                                  value="{{ old('address', $contact->address) }}"/>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="groups">Groups</label>

                                <select class="form-select select2-input" multiple="multiple" name="groups[]"
                                        id="groups" data-placeholder="Select group.s">
                                    @foreach($groups as $group)

                                        <option value="{{ $group->id }}"
                                                @if(in_array($group->id, $contact->groups->pluck('id')->toArray())) selected @endif>{{ $group->name }}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-input-label for="phone" :value="__('Phone')"/>

                                <x-text-input placeholder="Enter address" name="phone"
                                              value="{{ old('phone', $contact->phone) }}"/>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch checked">
                                    <input type="checkbox" class="custom-control-input" id="status"
                                           name="status" @if($contact->status) checked @endif>
                                    <label class="custom-control-label" for="status">Status</label>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <x-primary-button>
                                    {{ __('Modification du contact') }}
                                </x-primary-button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>


