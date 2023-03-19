@extends("game.gameLayout")

@section("title")
    Multi jouereurs
@endsection

@section("main")
    <div class="bg-blue-700 backdrop-blur-lg bg-gradient-to-bl from-dark-secondary via-my-indigo to-dark h-200 relative rounded-b-full w-full top-0">
        <h3 class="text-gray-100 text-md rounded-md flex items-center gap-2 justify-center pt-4">
            <i class="fa fa-clock"></i>
            <span id="timer_sec"> 00</span>
        </h3>
    </div>
    <div class="h-screen absolute" style="top: 75%;left: 50%;transform: translateX(-50%)">
        <section class="md:w-600 w-400">
            {{--            question head--}}
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
            {{--            answers--}}
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
            {{--            bottom--}}
            <div class="w-full flex items-center justify-center mt-4">
                <button class="bg-my-indigo py-2 px-4 text-gray-100 rounded-full" id="btn_next_question">suivant</button>
            </div>
        </section>
    </div>
    <script>
        const timeCounter = document.querySelector("#timer_sec ");
        const timeLine = document.querySelector("#time_line");
        let option_list = document.querySelector("#option_list");
        const bottomQuestionCount = document.querySelector("#total_que");
        const btnNext = document.querySelector("#btn_next_question")

        // if(!document.fullscreenElement){
        //     document.documentElement.requestFullscreen()
        // }

        let question_count = 0;
        let counter;
        let counterLine;
        let timeValue = 15;
        let widthTimeLineValue = 0;
        let userScore = 0;

        let questions = [
            {
                id: 1,
                question: "Que signifie HTML ?",
                answer: "Hyper Text Markup Language",
                options: [
                    "Hyper Tools Maker Language",
                    "Hyper Text Preprocessor",
                    "Hyper Text Multiple Language",
                    "Hyper Text Markup Language",
                ],
            },
            {
                id: 2,
                question: "Que signifie CSS ?",
                answer: "Cascading stylesheet",
                options: [
                    "Common Style Sheet",
                    "Cascading stylesheet",
                    "Cascading style sheet",
                    "Cascading stylesheets",
                ],
            },
            {
                id: 3,
                question: "Que signifie HTTP ?",
                answer: "Hypertext transfert protocol",
                options: [
                    "Hypertext transfert protocol",
                    "Hyper transfert protocol",
                    "Hyper transfert text protocol",
                    "ABR",
                ],
            },
            {
                id: 4,
                question: "Que signifie FTP ?",
                answer: "File transfert protocol",
                options: [
                    "File transfered protocol",
                    "Finaly text protocol",
                    "File transfert protocol",
                    "Fuck text protocol",
                ],
            },
            {
                id: 5,
                question: "Que signifie SQL ?",
                answer: "Structure Query Language",
                options: [
                    "Structure Query Language",
                    "Submit Query Language",
                    "Structure Query Lang",
                    "Sub Query Language",
                ],
            },
        ];

        showQuestions(0);
        questionCounter(0);
        startTimer(15);
        startTimeLine(0);

        btnNext.style.display = "none";

        function nextQuestion() {
            if (question_count < questions.length - 1) {
                question_count++;
                showQuestions(question_count);
                questionCounter(question_count);

                // clear the last interval when user click on the nex btn
                clearInterval(counter);
                startTimer(timeValue);

                clearInterval(counterLine);
                startTimeLine(widthTimeLineValue);

                btnNext.style.display = "none";
            } else {
                // showResultBox();
            }
        }

        btnNext.addEventListener("click", nextQuestion);

        function showQuestions(index) {
            const question_text = document.querySelector("#que_text");
            let question_tag = `<span>${questions[index].question}</span>`;
            let answers = "";

            questions[index].options.forEach((answer) => {
                answers += `<div class="option dark:bg-dark-secondary dark:text-gray-100">
            <span>${answer}</span>
        </div>`;
            });

            question_text.innerHTML = question_tag;
            option_list.innerHTML = answers;

            const options = option_list.querySelectorAll(".option");

            options.forEach((option) => {
                option.setAttribute("onclick", "optionUserAnswer");
            });
        }

        function questionCounter(index) {
            bottomQuestionCount.innerHTML = `<p>${index + 1}</p> / <p>${questions.length}</p>`;
        }

        function optionUserAnswer(answer) {
            // clear the last interval when user click on the nex btn
            // and stop the counter
            clearInterval(counter);

            clearInterval(counterLine);

            let userAnswer = answer.textContent;
            let correctAnswer = questions[question_count].answer;
            let AllOptions = Array.from(option_list.children);

            if (userAnswer.trim() === correctAnswer) {
                userScore += 1;
                answer.classList.add("correct");
                answer.insertAdjacentHTML(
                    "beforeend",
                    `<div class="icon tick"><i class="fa fa-check"></i></div>`
                );
            } else {
                answer.classList.add("incorrect");
                answer.insertAdjacentHTML(
                    "beforeend",
                    `<div class="icon cross"><i class="fa fa-times"></i></div>`
                );

                AllOptions.forEach((opt) => {
                    if (opt.textContent.trim() === correctAnswer) {
                        opt.classList.add("correct");
                        opt.insertAdjacentHTML(
                            "beforeend",
                            `<div class="icon tick"><i class="fa fa-check"></i></div>`
                        );
                    }
                });
            }

            AllOptions.forEach((opt) => {
                opt.classList.add("disabled");
            });

            btnNext.style.display = "block";
        }

        function startTimer(time) {
            counter = setInterval(timer, 1000);

            function timer() {
                timeCounter.textContent = time;
                time--;

                if (time < 9) {
                    let addZero = timeCounter.textContent;
                    timeCounter.textContent = `0${addZero}`;
                }

                if (time < 0) {
                    clearInterval(counter);
                    timeCounter.textContent = "00";
                }
            }
        }

        function startTimeLine(time) {
            counterLine = setInterval(timer, 29);

            console.log(timeLine);

            function timer() {
                time += 1;
                timeLine.style.width = `${time}px`;

                if (time > 599) {
                    clearInterval(counterLine);
                    nextQuestion()
                }
            }
        }


    </script>
@endsection
