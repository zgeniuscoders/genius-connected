@extends("player.layoutPlayer")

@section("title")
    Création d'un joueur
@endsection

@section("main")

    <div class="fixed dark:bg-dark-secondary dark:text-gray-100 bg-gray-100 z-20 rounded-md overflow-hidden"
         style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 600px">
        <form action="{{ route("player.store") }}" method="post" class="p-4" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-2 dark:text-gray-100">
                <label for="username">Pseudo</label>
                <input type="text" name="username" id="username" class="p-2 dark:text-gray-900 rounded-sm" required>
            </div>
            <div class="flex flex-col gap-2 dark:text-gray-100 mt-4">
                <label for="profile">Profile</label>
                <input type="file" name="profile" id="profile" class="p-2 dark:text-dark rounded-sm" required>
            </div>
            <button type="submit" class="bg-my-indigo text-gray-100 p-2 rounded-sm">cree mon profile</button>
        </form>
    </div>

@endsection
