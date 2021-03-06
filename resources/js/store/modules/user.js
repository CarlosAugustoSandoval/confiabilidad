import axios from 'axios'
import {SNACKBAR} from './general'
export const CURRENT_USER = 'CURRENT_USER'
export default {
	state: {
        currentUser: null,
        currentRol: null
	},
	getters: {
	},
	mutations: {
        [CURRENT_USER]: (state, data) => {
            state.currentUser = data
            state.currentRol = data.roles[0] ? data.roles[0].id : null
        },
	},
	actions: {
        [CURRENT_USER]: ({commit, dispatch}) => {
            return new Promise(() => {
                axios.post('usuarios/current')
                    .then(response => {
                        commit(CURRENT_USER, response.data.currentUser)
                    })
                    .catch(error => {
                        commit(SNACKBAR, {color: 'error', message: `al recuperar el usuario actual`, error: error})
                    })
            })
        }
	}
}
