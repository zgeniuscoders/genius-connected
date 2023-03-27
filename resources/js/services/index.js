import {ref, reactive} from "vue";
import axios from "axios"

export function usePlayer() {

    const getPlayer = async (id) => {
        return await axios.get(`/api/players/${id}`)
    }

    const getPlayerGames = async () => {
        return await axios.get(`/api/player/get-player-games`)
    }

    const getPlayers = async () => {
        return await axios.get(`/api/players`)
    }
    const getCurrentPlayer = async () => {
        return await axios.get(`/api/player/current`)
    }

    return {
        getPlayers,
        getCurrentPlayer,
        getPlayer,
        getPlayerGames
    }
}

export function useGame() {
    let games = ref({})

    const getGame = async (id) => {
        return axios.get(`/api/games/${id}`)
    }
    const getGames = async () => {
        const res = axios.get(`/api/games`)
        return res
    }
    const joinGame = async (data) => {
        return await axios.post(`/api/games/join`, {
            "id": data.id,
            "slug": data.slug
        })
    }
    const createGame = async (data) => {
        return await axios.post(`api/games`, {
            'level': data.level,
            'name': data.gameName,
            'category': data.categories,
            'playerMax': data.playerMax,
            'isPrivate': data.isPrivate
        })
    }
    const sendResult = async (data) => {
        return await axios.post(`/api/games/send-result`, {
            'gameId': data.id,
            'bonus': data.score,
        }).then(res => {
            games.value = res.data.data
        })
    }

    return {
        games,
        getGame,
        getGames,
        createGame,
        joinGame,
        sendResult
    }
}

export function useCategory() {
    let categories = ref({})
    const getCategory = (id) => {
        axios.get(`api/category/${id}`).then(res => {
            categories.value = res.data.data
        })
    }
    const getCategories = () => {
        axios.get(`api/category`).then(res => {
            categories.value = res.data.data
        })
    }
    return {
        getCategories,
        getCategory,
        categories
    }
}

export function useLevel() {
    let levels = ref({})

    const getLevel = (id) => {
        axios.get(`api/level/${id}`).then(res => {
            levels.value = res.data.data
        })
    }

    const getLevels = () => {
        axios.get(`api/level`).then(res => {
            levels.value = res.data.data
        })
    }

    return {
        getLevels,
        getLevel,
        levels
    }
}

export function useQuestion() {

    let questions = reactive([])

    const getQuestions = async () => {
        await axios.get(`/api/questions`).then(res => {
            questions.value = res.data.data
        })
    }

    return {
        getQuestions,
        questions
    }

}

export function useChat() {

    const sendMessage = async (data) => {
        return await axios.post("/api/chat", {
            "message": data.message,
            "receiverId": data.receiverId
        })
    }

    const deleteMessage = async () => {
        return await axios.delete("/api/chat/delete")
    }

    const getMessage = async (id) => {
        return await axios.get(`/api/chat/${id}`)
    }

    const getMessages = async () => {
        return await axios.get(`/api/chat`)
    }

    return {
        sendMessage,
        getMessages,
        getMessage
    }
}
