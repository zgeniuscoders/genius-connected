@extends("auth.auth")

@section("title")
    Mot de passe oublier
@endsection

@section("main_content")
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
@endsection
