import { reactive, toRefs } from 'vue';
import axios from 'axios';

export default function useTrainer() {
    const state = reactive({
        isLoading: false,
        trainers: [],
    });

    const get = async () => {
        state.isLoading = true;

        await axios.get('/users')
        .then((response) => {
            state.isLoading = false;
            state.trainers = response.data.data;
            console.log(response.data.data);
        })
        .catch((error) => {
            console.log(error);
        });
    }

    return {
        ...toRefs(state),
        get,
    }
}