import {ref} from "vue";
import axios from "axios"

export function usePlayer() {
    let players = ref({})

    const getPlayer = async (id) => {
        await axios.get(`/api/player/${id}`).then(res => {
            players.value = res.data.data
        })
    }
    const getPlayers = async () => {
        await axios.get(`/api/player`).then(res => {
            players.value = res.data.data
        })
    }
    const getCurrentPlayer = async () => {
        await axios.get(`/api/player/current`).then(res => {
            players.value = res.data.data
        })
    }

    return {
        players,
        getPlayers,
        getCurrentPlayer,
        getPlayer
    }
}

export function useGame() {
    let games = ref({})

    const getGame = async (id) => {
        await axios.get(`api/games/${id}`).then(res => {
            games.value = res
        })
    }
    const getGames = async () => {
        await axios.get(`api/games`).then(res => {
            games.value = res.data.data
        })
    }
    const joinGame = async (id) => {
        await axios.post(`api/games/join`, {
            "id": id
        })
    }
    const createGame = async (data) => {
        return await axios.post(`api/games`, {
            'level': data.level,
            'name': data.gameName,
            'category': data.categories,
            'playerMax': data.playerMax,
            'isPrivate': data.isPrivate
        }).then(res => {
            games.value = res.data.data
        })
    }
    const sendResult = async (data) => {
        return await axios.post(`api/games/send-result`, {
            'gameId': data.gameId,
            'bonus': data.bonus,
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
