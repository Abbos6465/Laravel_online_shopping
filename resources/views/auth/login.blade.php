<x-layouts.auth>

    <x-slot:title>
        Login Page
        </x-slot>

        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
                    <div class="panel border bg-white">
                        <div class="panel-heading">
                            <h3 class="pt-3 font-weight-bold">Kirish</h3>
                        </div>
                        <div class="panel-body p-3">
                            <form action="{{route('authenticate')}}" method="POST">
                                @csrf
                                <div class="form-group py-2">
                                    <div class="input-field">
                                        <span class="far fa-user p-2"></span>
                                        <input name="email" type="text" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group py-1 pb-2">
                                    <div class="input-field">
                                        <span class="fas fa-lock px-2"></span>
                                        <input name="password" type="password" placeholder="Parol" required>
                                        <button class="btn bg-white text-muted">
                                            <span class="far fa-eye-slash"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-inline">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember" class="text-muted">Eslab qolish</label>
                                    <a href="#" id="forgot" class="font-weight-bold">Parolni unutdingizmi?</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3 text-white">Kirish</button>
                                <div class="text-center pt-4 text-muted">Ro'yxatdan o'tmaganmisiz?
                                    <a href="{{route('register')}}">Ro'yxatdan o'tish</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layouts.auth>