import { reactive, toRefs } from 'vue';
import usePokemon from './usePokemon';
import axios from 'axios';

const { userPreference } = usePokemon();
export default function usePokemonInteract() {
    const state = reactive({
        isLoading: true,
        process: {
            loading: false,
            action: '',
        },
        pokemon: {
            id: null,
            name: null,
            sprites: {
                back_default: null,
                back_shiny: null,
                front_default: null,
                front_shiny: null,
            },
            types: [],
            url: null,
        },
    });

    const get = async (url: string) => {
        state.isLoading = true;

        await axios.get(url)
        .then((response) => {
            state.pokemon = response.data;
            state.isLoading = false;
        })
        .catch((error) => {
            console.log(error);
        });
    }

    const resetProcess = () => {
        state.process = {
            loading: false,
            action: "",
        };
        userPreference();
    }

    const setAsLike = async () => {
        state.process.loading = true;
        state.process.action = 'like';

        await axios.post(__root_url + '/pokemon/like', {
            pokemon_id: state.pokemon.id,
        })
        .then((response) => {
            resetProcess();
        })
        .catch((error) => {
            console.log(error);
        });
    }

    const setAsHate = async () => {
        state.process.loading = true;
        state.process.action = 'hate';

        await axios.post(__root_url + '/pokemon/hate', {
            pokemon_id: state.pokemon.id,
        })
        .then((response) => {
            resetProcess();
        })
        .catch((error) => {
            console.log(error);
        });
    }

    const setAsFavorite = async () => {
        state.process.loading = true;
        state.process.action = 'favorite';

        await axios.post(__root_url + '/pokemon/favorite', {
            pokemon_id: state.pokemon.id,
        })
        .then((response) => {
            resetProcess();
        })
        .catch((error) => {
            console.log(error);
        });
    }

    return {
        ...toRefs(state),
        get,
        setAsLike,
        setAsHate,
        setAsFavorite,
    }
}