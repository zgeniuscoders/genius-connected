<template>
    <dashboard>
        <div class="grid grid-cols-custom relative">
            <main class="m-2 h-90vh">
                <chat-box v-if="hasChatId" :id="props.id"/>
                <div class="flex items-center justify-center h-screen flex-col" v-else>
                    <i class="fa fa-message text-6xl dark:text-gray-400 mb-4"></i>
                    <p class="dark:text-gray-400 text-2xl">Commencer a discuter maitenant...</p>
                </div>
            </main>
            <chat-player-list @routerLoad="routerLoad"/>
        </div>
    </dashboard>
</template>

<script setup>
import Dashboard from "../../layouts/dashboard.vue";
import ChatBox from "../../components/chatBox.vue";

import {onMounted, ref} from "vue";
import {useRoute} from "vue-router";
import ChatPlayerList from "../../components/chatPlayerList.vue";

const routeParams = ref({});
const hasChatId = ref(false)
const props = ref({id: ""})

function routerLoad(id) {
    props.value.id = id
    hasChatId.value = true
}

onMounted(() => {
    const route = useRoute()
    routeParams.value = route.params
    console.log(routeParams.value)
    if (routeParams.value.id) {
        routerLoad(routeParams.value.id)
    }
})
</script>

