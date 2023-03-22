<template>
    <result-multi-game @close="closeResult" v-if="resultBox" :id="routeParams.id"/>
    <div
        class="bg-blue-700 backdrop-blur-lg bg-gradient-to-bl from-dark-secondary via-my-indigo to-dark h-200 relative rounded-b-full w-full top-0">
        <h3 class="text-gray-100 text-md rounded-md flex items-center gap-2 justify-center pt-4">
            <i class="fa fa-clock"></i>
            <span id="timer_sec">{{ options.timer_sec }}</span>
        </h3>
    </div>
    <div class="h-screen absolute flex justify-center w-full">
        <section class="md:w-600 w-400" v-if="isMounted">
            <!--            question head-->
            <div class="dark:bg-dark-secondary dark:text-gray-100 p-4 rounded-md text-center relative">
                <div class="bg-my-indigo py-2 px-4 rounded-full absolute flex items-center"
                     style="top: -20px;left: 50%;transform: translateX(-50%)">
                    Question
                    <span id="total_que" class="flex items-center mx-2">{{
                            options.index + 1
                        }} / {{ questions.length }}</span>
                </div>
                <h3 class="text-lg my-4" id="que_text">{{ questions[options.index].question }}</h3>
                <div class="bg-my-indigo h-2 w-full absolute bottom-0 left-0 rounded-md" id="time_line"
                     :style="{width: options.time_line}"></div>
            </div>
            <!--                      answers-->
            <div class="mt-4 grid md:grid-cols-2 grid-cols-1 md:gap-1" id="option_list">
                <template v-for="answer in questions[options.index].answers" :key="answer.id">
                    <div class="option dark:bg-dark-secondary dark:text-gray-100"
                         @click="optionUserAnswer($event,answer.is_correct)">
                        <span>{{ answer.answer }}</span>
                    </div>
                </template>
            </div>
            <!--                        bottom-->
            <div class="w-full flex items-center justify-center mt-4">
                <button class="bg-my-indigo py-2 px-4 text-gray-100 rounded-full" id="btn_next_question"
                        @click="nextQuestion" v-if="options.nextBtn">suivant
                </button>
            </div>
        </section>
    </div>
</template>

<script setup>
import {onMounted, reactive, ref} from "vue";
import {useGame, useQuestion} from "../../../services";
import ResultMultiGame from "../../../components/resultMultiGame.vue";
import {useRoute} from "vue-router"
import axios from "axios";

let options = ref({
    "index": 0,
    "counter": 0,
    "timeCounter": 0,
    "counterLine": 0,
    "widthTimeLineValue": 0,
    "userScore": 0,
    "time_line": "",
    "timer_sec": 0,
    "timeValue": 15,
    "nextBtn": false
})
const resultBox = ref(false)
const questions = ref([])
const isMounted = ref(false)
const routeParams = ref({})

const {sendResult} = useGame()
// const {getQuestions, questions} = useQuestion()

onMounted(() => {

    const route = useRoute()
    routeParams.value = route.params

    axios.get(`/api/questions`).then(res => {
        questions.value = res.data.data
        isMounted.value = true
    })

    startTimer(15);
    startTimeLine(0);
})

function startTimer(time) {
    options.value.counter = setInterval(timer, 1000);

    function timer() {
        options.value.timer_sec = time
        time--;

        if (time < 9) {
            let addZero = options.value.timer_sec;
            options.value.timer_sec = `0${addZero}`;
        }

        if (time < 0) {
            clearInterval(options.value.counter);
            options.value.timer_sec = "00";
        }
    }
}

function startTimeLine(time) {
    options.value.counterLine = setInterval(timer, 29);

    function timer() {
        time += 1;
        options.value.time_line = `${time}px`;

        if (time > 599) {
            clearInterval(options.value.counterLine);
            nextQuestion()
        }
    }
}

function optionUserAnswer(el, isCorrect) {

    let answer = el.target.parentElement
    let option_list = document.querySelector("#option_list");

    clearInterval(options.value.counter);
    clearInterval(options.value.counterLine);

    let AllOptions = Array.from(option_list.children);

    if (isCorrect === 1) {
        options.value.userScore += 1;
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
            if (isCorrect === 1) {
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
    options.value.nextBtn = true
}

function nextQuestion() {
    if (options.value.index < questions.value.length - 1) {
        options.value.index++;

        // clear the last interval when user click on the nex btn
        clearInterval(options.value.counter);
        startTimer(options.value.timeValue);

        clearInterval(options.value.counterLine);
        startTimeLine(options.value.widthTimeLineValue);

        options.value.nextBtn = false
    } else {
        resultBox.value = true
        finish()
    }
}

function finish() {
    let id = routeParams.value.id
    let score = options.value.userScore
    sendResult({id, score})
}

function closeResult() {
    resultBox.value = false
}
</script>
