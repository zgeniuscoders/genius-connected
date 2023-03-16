<template>
    <div
        class="bg-blue-700 backdrop-blur-lg bg-gradient-to-bl from-dark-secondary via-my-indigo to-dark h-200 relative rounded-b-full w-full top-0">
        <h3 class="text-gray-100 text-md rounded-md flex items-center gap-2 justify-center pt-4">
            <i class="fa fa-clock"></i>
            <span id="timer_sec"> 00</span>
        </h3>
    </div>
    <div class="h-screen absolute" style="top: 75%;left: 50%;transform: translateX(-50%)">
        <section class="md:w-600 w-400">
            <!--            question head-->
            <div class="dark:bg-dark-secondary dark:text-gray-100 p-4 rounded-md text-center relative">
                <div class="bg-my-indigo py-2 px-4 rounded-full absolute flex items-center"
                     style="top: -20px;left: 50%;transform: translateX(-50%)">
                    Question
                    <span id="total_que" class="flex items-center mx-2">0/0</span>
                </div>
                <h3 class="text-lg my-4" id="que_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Architecto, dolores
                    explicabo pariatur quidem saepe totam voluptatum. At fuga mollitia reprehenderit ?</h3>
                <div class="bg-my-indigo h-2 w-full absolute bottom-0 left-0 rounded-md" id="time_line"></div>
            </div>
            <!--                      answers-->
            <div class="mt-4 grid md:grid-cols-2 grid-cols-1 md:gap-1" id="option_list">
                <div class="option dark:bg-dark-secondary dark:text-gray-100">
                    <span>Hyper Text Langage</span>
                    <div class="icon tick"><i class="fa fa-check"></i></div>
                </div>
                <div class="option dark:bg-dark-secondary dark:text-gray-100">
                    <span>Hyper Text Langage</span>
                    <div class="icon tick"><i class="fa fa-check"></i></div>
                </div>
                <div class="option dark:bg-dark-secondary dark:text-gray-100">
                    <span>Hyper Text Langage</span>
                    <div class="icon tick"><i class="fa fa-check"></i></div>
                </div>
                <div class="option dark:bg-dark-secondary dark:text-gray-100">
                    <span>Hyper Text Langage</span>
                    <div class="icon tick"><i class="fa fa-check"></i></div>
                </div>
            </div>
            <!--                        bottom-->
            <div class="w-full flex items-center justify-center mt-4">
                <button class="bg-my-indigo py-2 px-4 text-gray-100 rounded-full" id="btn_next_question">suivant
                </button>
            </div>
        </section>
    </div>
</template>

<script setup>

</script>
