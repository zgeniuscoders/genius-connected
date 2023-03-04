@extends("layout")

@section("title")
    Accueil
@endsection


@section("main_content")
    <section class="relative h-screen dark:text-white container mx-auto flex items-center">
        <div>
            <h1 class="text-4xl text-bold mb-2">Genius Connected</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus cumque doloribus, expedita, facilis
                harum in maxime obcaecati odio perspiciatis quae, repudiandae sed sequi sint vel velit. Aliquid,
                distinctio ducimus, error impedit maiores maxime nemo nobis perferendis quaerat quam similique,
                sunt.</p>
        </div>
        <div class="h-4 w-4">
            <img src="{{asset("images/dot.png")}}" alt="dot">
        </div>
    </section>
@endsection
