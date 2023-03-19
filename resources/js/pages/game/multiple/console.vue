<template>
    <result-multi-game @close="closeResult" v-if="resultBox" :game="games"/>
    <div
        class="bg-blue-700 backdrop-blur-lg bg-gradient-to-bl from-dark-secondary via-my-indigo to-dark h-200 relative rounded-b-full w-full top-0">
        <h3 class="text-gray-100 text-md rounded-md flex items-center gap-2 justify-center pt-4">
            <i class="fa fa-clock"></i>
            <span id="timer_sec">{{ gamesOptions.timer_sec }}</span>
        </h3>
    </div>
    <div class="h-screen absolute flex justify-center w-full">
        <section class="md:w-600 w-400">
            <!--            question head-->
            <div class="dark:bg-dark-secondary dark:text-gray-100 p-4 rounded-md text-center relative">
                <div class="bg-my-indigo py-2 px-4 rounded-full absolute flex items-center"
                     style="top: -20px;left: 50%;transform: translateX(-50%)">
                    Question
                    <span id="total_que" class="flex items-center mx-2">{{ gamesOptions.total_quest_count }}</span>
                </div>
                <h3 class="text-lg my-4" id="que_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Architecto, dolores
                    explicabo pariatur quidem saepe totam voluptatum. At fuga mollitia reprehenderit ?</h3>
                <div class="bg-my-indigo h-2 w-full absolute bottom-0 left-0 rounded-md" id="time_line"
                     :style="{width: gamesOptions.time_line}"></div>
            </div>
            <!--                      answers-->
            <div class="mt-4 grid md:grid-cols-2 grid-cols-1 md:gap-1" id="option_list"></div>
            <!--                        bottom-->
            <div class="w-full flex items-center justify-center mt-4">
                <button class="bg-my-indigo py-2 px-4 text-gray-100 rounded-full" id="btn_next_question"
                        @click="nextQuestion" v-if="gamesOptions.nextBtn">suivant
                </button>
            </div>
        </section>
    </div>
</template>

<script setup>
import {onMounted, ref, defineProps} from "vue";
import {useGame} from "../../../services";
import ResultMultiGame from "../../../components/resultMultiGame.vue";

const gamesOptions = ref({
    "index": 0,
    "counter": 0,
    "timeCounter": 0,
    "question_count": 0,
    "counterLine": 0,
    "widthTimeLineValue": 0,
    "userScore": 0,
    "question_text": "",
    "total_quest_count": "0/0",
    "time_line": "",
    "timer_sec": 0,
    "timeValue": 15,
    "option_list": "",
    "nextBtn": false
})
let questions = ref([
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
]);
const resultBox = ref(false)

const {sendResult, games, getGame} = useGame()

onMounted(() => {
    showQuestions(gamesOptions.value.index);
    questionCounter(gamesOptions.value.index);
    startTimer(15);
    startTimeLine(0);
})

function startTimer(time) {
    gamesOptions.value.counter = setInterval(timer, 1000);

    function timer() {
        gamesOptions.value.timer_sec = time
        time--;

        if (time < 9) {
            let addZero = gamesOptions.value.timer_sec;
            gamesOptions.value.timer_sec = `0${addZero}`;
        }

        if (time < 0) {
            clearInterval(gamesOptions.value.counter);
            gamesOptions.value.timer_sec = "00";
        }
    }
}

function startTimeLine(time) {
    gamesOptions.value.counterLine = setInterval(timer, 29);

    function timer() {
        time += 1;
        gamesOptions.value.time_line = `${time}px`;

        if (time > 599) {
            clearInterval(gamesOptions.value.counterLine);
            nextQuestion()
        }
    }
}

function showQuestions(index) {
    const question_text = document.querySelector("#que_text");
    let option_list = document.querySelector("#option_list");
    let question_tag = `<span>${questions.value[index].question}</span>`;
    let answers = "";

    questions.value[index].options.forEach((answer) => {
        answers += `<div class="option dark:bg-dark-secondary dark:text-gray-100">
            <span>${answer}</span>
        </div>`;
    });

    question_text.innerHTML = question_tag;
    option_list.innerHTML = answers;

    // const options = option_list.querySelectorAll(".option");
    //
    // options.forEach((option) => {
    //     option.setAttribute("click", "optionUserAnswer(this)");
    // });
}

function questionCounter(index) {
    gamesOptions.value.total_quest_count = `${index + 1} / ${questions.value.length}`;
}

function optionUserAnswer(answer) {

    const question_count = gamesOptions.value.question_count
    let option_list = document.querySelector("#option_list");

    // clear the last interval when user click on the nex btn
    // and stop the counter
    clearInterval(gamesOptions.value.counter);

    clearInterval(gamesOptions.value.counterLine);

    let userAnswer = answer.textContent;
    let correctAnswer = questions.value[question_count].answer;
    let AllOptions = Array.from(option_list.children);

    if (userAnswer.trim() === correctAnswer) {
        gamesOptions.value.userScore += 1;
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

        gamesOptions.value.nextBtn = true
    }

    AllOptions.forEach((opt) => {
        opt.classList.add("disabled");
    });

    btnNext.style.display = "block";
}

function nextQuestion() {
    if (gamesOptions.value.question_count < questions.value.length - 1) {
        gamesOptions.value.question_count++;
        showQuestions(gamesOptions.value.question_count);
        questionCounter(gamesOptions.value.question_count);

        // clear the last interval when user click on the nex btn
        clearInterval(gamesOptions.value.counter);
        startTimer(gamesOptions.value.timeValue);

        clearInterval(gamesOptions.value.counterLine);
        startTimeLine(gamesOptions.value.widthTimeLineValue);

        gamesOptions.value.nextBtn = false
    } else {
        resultBox.value = true
        // showResultBox();
    }
}

function closeResult() {
    const userScore = gamesOptions.value.userScore
    const gameId = 1
    resultBox.value = false
}
</script>
