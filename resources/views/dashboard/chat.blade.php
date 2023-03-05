@extends("dashboard.default")

@section("title")
    Messageries
@endsection

@section("main")
    <div class="grid grid-cols-custom relative">
        <main class="m-2">
            <div class="bg-dark-secondary/30 backdrop-blur-sm flex items-center p-4">
                <img src="{{ asset("images/avatar.png") }}" alt="username" class="w-60 h-60">
                <div class="ml-4">
                    <h5 class="text-gray-100 font-bold uppercase">zgenius gamer</h5>
                    <span class="text-green-600">online</span>
                </div>
            </div>
            <div>
                {{--               outgoing--}}
                <div class="flex items-end">
                    <div class="ml-auto mr-4 bg-dark-secondary dark:text-gray-100 p-4 mt-2 rounded-md"
                         style="width: calc(100% - 130px)">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, corporis.</p>
                    </div>
                </div>
                {{--               incoming--}}
                <div class="flex items-center">
                    <div class="ml-4 mr-auto bg-dark-secondary dark:text-gray-100 p-4 mt-2 rounded-md"
                         style="width: calc(100% - 130px)">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at beatae blanditiis
                            culpa delectus dolor earum enim fuga libero molestiae omnis optio quae quia, recusandae
                            similique vel voluptatem. Corporis culpa dignissimos doloremque error maxime molestias
                            quisquam, sit soluta vitae voluptates.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
