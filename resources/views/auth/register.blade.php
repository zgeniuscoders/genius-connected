@extends("auth.auth")

@section("title")
    S'enregistrer
@endsection

@section("main_content")
    <div
        class="dark:bg-dark-secondary/30  bg-white/30 w-80 rounded px-4 py-8 shadow-md flex items-center flex-columns backdrop-blur-sm">
        <form action="{{ route("register") }}" method="post" class="w-full">
            @csrf
            <div class="w-full mb-2">
                <label for="email" class="text-white block mb-2">Adresse email</label>
                <input type="email" id="email" name="email" placeholder="exemple@domain.com"
                       class="w-full border border-gray-500 outline-none p-2 text-sm rounded" required>
                @error('email')
                <p class="text-red-500 text-sm">{{ $errors->first('email') }}</p>
                @enderror
            </div>

            <div class="w-full mb-2">
                <label for="name" class="text-white block mb-2">Nom d'utilisateur</label>
                <input type="text" id="name" name="name" placeholder="Your name"
                       class="w-full border border-gray-500 outline-none p-2 text-sm rounded" required>
                @error('name')
                <p class="text-red-500 text-sm">{{ $errors->first('name') }}</p>
                @enderror
            </div>

            <div class="w-full mb-2">
                <label for="password" class="text-white block mb-2">Mot de passe</label>
                <input type="password" name="password" placeholder="******" id="password"
                       class="w-full border border-gray-500 outline-none text-sm p-2 rounded" required>
                @error('password')
                <p class="text-red-500 text-sm">{{ $errors->first("password") }}</p>
                @enderror
            </div>

            <div class="w-full mb-2">
                <label for="password_confirmation" class="text-white block mb-2">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" placeholder="******" id="password_confirmation"
                       class="w-full border border-gray-500 outline-none text-sm p-2 rounded"
                       autocomplete="new-password">
                @error('password_confirmation')
                <p class="text-red-500 text-sm">{{ $errors->first("password_confirmation") }}</p>
                @enderror
            </div>

            <div class="w-full mb-2">
                <button
                    class="bg-f hover:bg-dark transition hover:ease-in-out w-full p-2 text-white rounded uppercase text-sm"
                    type="submit">s'inscrire
                </button>
            </div>

            <p class="text-center w-full text-gray-300 text-sm hover:text-gray-200 flex-end mt-4">
                <a href="{{ route("login") }}">j'ai un compte</a>
            </p>
        </form>
    </div>
@endsection
