import { reactive, toRefs } from 'vue';
import axios from 'axios';

export default function useTrainer() {
    const state = reactive({
        isLoading: false,
        user: {
            id: 0,
            first_name: null,
            last_name: null,
            birthdate: null,
            email: null,
        },
        passcode: {
            password: null,
            password_confirmation: null,
        },
        errors: {
            first_name: false,
            last_name: false,
            birthdate: false,
            email: false,
            password: false,
        }
    });

    const get = async () => {
        state.isLoading = true;

        await axios.get('/user/current')
        .then((response) => {
            // state.pokemon = response.data;
            // console.log(response.data);
            state.user = response.data.data;
            state.isLoading = false;
        })
        .catch((error) => {
            console.log(error);
        });
    }
    
    const updateDetails = async () => {
        reset();
        state.isLoading = true;

        await axios.post('/user/update', state.user)
        .then((response) => {
            state.isLoading = false;
            // state.trainers = response.data.data;
            console.log(response.data.data);
        })
        .catch((error) => {
            let errors = error.response.data.errors;
            errorValidation(errors);
            state.isLoading = false;
        });
    }

    const updatePassword = async () => {
        reset();
        state.isLoading = true;

        await axios.post('/user/password/change', state.passcode)
        .then((response) => {
            
            state.isLoading = false;
            // state.trainers = response.data.data;
            // console.log(response.data.data);
        })
        .catch((error) => {
            let errors = error.response.data.errors;
            errorValidation(errors);
            state.isLoading = false;
        });
    }

    const errorValidation = (errors: object) => {
        Object.keys(errors).forEach(key => {
            console.log(key, errors[key]);
            if (key == 'first_name') {
                state.errors.first_name = true;
            }
            if (key == 'last_name') {
                state.errors.last_name = true;
            }
            if (key == 'birthdate') {
                state.errors.birthdate = true;
            }
            if (key == 'email') {
                state.errors.email = true;
            }
            if (key == 'password') {
                state.errors.password = true;
            }
        });
    }

    const reset = () => {
        state.errors = {
            first_name: false,
            last_name: false,
            birthdate: false,
            email: false,
            password: false,
        }
    }

    return {
        ...toRefs(state),
        get,
        updateDetails,
        updatePassword,
    }
}