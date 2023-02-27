import { reactive, toRefs } from 'vue';
import axios from 'axios';

export default function useNavigation() {
    const state = reactive({
        menus: [
            { name: 'Home', href: '/home', current: true },
            { name: 'My Pokemons', href: '/my-pokemons', current: false },
            { name: 'Trainers', href: '#', current: false },
            { name: 'News & Forums', href: '#', current: false },
        ]
    });

    const logout = async () => {
        // state.pokemons = [];

        await axios.post('/logout')
        .then((response) => {
            console.log(response);
        })
        .catch((error) => {
            console.log(error);
        });
    }

    return {
        ...toRefs(state),
        logout,
    }
}