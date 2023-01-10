<x-guest-layout>
    <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Connexion</h4>
                </div>

                @if($errors->any())
                    @foreach($errors->all() as $messages)
                        <x-input-error :messages="$messages" />
                    @endforeach
                @endif

            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <x-input-label for="email" :value="__('Email')"/>
                    </div>
                    <div class="form-control-wrap">
                        <x-text-input class="form-control-lg" placeholder="Enter your email address" type="email"
                                      name="email" :value="old('email')"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <x-input-label for="email" :value="__('Password')"/>
                    </div>
                    <div class="form-control-wrap">
                        <x-text-input class="form-control-lg" placeholder="Enter your email address" type="password"
                                      name="password" :value="old('password')"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch checked">
                        <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                        <label class="custom-control-label" for="remember_me">Remember me</label>
                    </div>
                </div>

                <div class="form-group">
                    <x-primary-button class="btn-lg btn-block">Se connecter</x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
