import { reactive, toRefs } from 'vue';
import axios from 'axios';

export default function usePokemon() {
    const state = reactive({
        isLoading: true,
        likedPokemons: [],
        hatedPokemons: [],
        favorite: {
            id: 0,
            name: "",
        },
        pokemons: [],
        pagination: {
            offset: 0,
            limit: 20,
            page: 1,
            next: null,
            previous: null,
            total: 0,
        }
    });

    const get = async () => {
        state.pokemons = [];

        await axios.get('https://pokeapi.co/api/v2/pokemon?offset=' + state.pagination.offset)
        .then((response) => {
            let data = response.data;

            state.pokemons = data.results;
            state.pagination.next = data.next;
            state.pagination.previous = data.previous;
            state.pagination.total = data.count;
        })
        .catch((error) => {
            console.log(error);
        });
    }

    const userPreference = async (trainer_id: number) => {
        state.isLoading = true;
        await axios.get('/pokemon/user-preference', { params: { user_id: trainer_id } })
        .then((response) => {
            let data = response.data.data;

            state.likedPokemons = data.likes;
            state.hatedPokemons = data.hates;
            state.favorite = data.favorite;
            state.isLoading = false;
        })
        .catch((error) => {
            console.log(error);
        });
    }

    const existInCategory = (data: { category: string, pokemon_id: number }) => {
        // if (data.category == "")
        console.log(data);
        let condition = false;
        switch(data.category) {
            case "like":
                for (var i = 0; i < state.likedPokemons.length; i++)
                {
                    if (state.likedPokemons[i]['id'] == data.pokemon_id)
                    {
                        condition = true;
                        break;
                    }
                }
                break;
            case "hate":
                for (var i = 0; i < state.hatedPokemons.length; i++)
                {
                    if (state.hatedPokemons[i]['id'] == data.pokemon_id)
                    {
                        condition = true;
                        break;
                    }
                }
                break;
            case "favorite":
                condition = state.favorite.id == data.pokemon_id;
                break;
        }

        return condition;
    }
    
    const paginate = () => {
        state.pagination.offset = (state.pagination.limit * state.pagination.page) - state.pagination.limit;
        get();
    }

    return {
        ...toRefs(state),
        get,
        userPreference,
        existInCategory,
        paginate,
    }
}