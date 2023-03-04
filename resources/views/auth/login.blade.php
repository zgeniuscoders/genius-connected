@extends("auth.auth")

@section("title")
    Se connecter
@endsection

@section("main_content")
    <div class="dark:bg-dark-secondary/30  bg-white/30 w-80 h-96 rounded p-4 shadow-md flex items-center flex-columns backdrop-blur-sm">
        <form action="{{ route("login") }}" method="post" class="w-full">
            @csrf
            <div class="w-full mb-2">
                <label for="email" class="text-white block mb-2">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="exemple@domain.com" class="w-full border border-gray-500 outline-none p-2 text-sm rounded" required>
                @error('email')
                    <p class="text-red-500 text-sm">{{ $errors->first('email') }}</p>
                @enderror
            </div>

            <div class="w-full mb-2">
                <label for="password" class="text-white block mb-2">Mot de passe</label>
                <input type="password" name="password" placeholder="******" class="w-full border border-gray-500 outline-none text-sm p-2 rounded" required>
                @error('password')
                    <p class="text-red-500 text-sm">{{ $errors->first("password") }}</p>
                @enderror
            </div>

            <div class="w-full mb-2">
                <button class="bg-f hover:bg-dark transition hover:ease-in-out w-full p-2 text-white rounded uppercase text-sm" type="submit">se connecter</button>
            </div>

            <p class="text-center w-full text-gray-300 text-sm hover:text-gray-200 flex-end">
                <a href="{{ route("register") }}">vous n'avez pas de compte ?</a>
            </p>
        </form>
    </div>
@endsection
