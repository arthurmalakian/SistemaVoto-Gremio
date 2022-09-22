import { http } from "./config"

export default {
    login: (email,password) => {
        return http.post(`login`, {
            email: email,
            password: password
        })
    },
    // logout: () => {
    //     return http.post(`logout`, {
    //         plate_id: id,
    //         cpf: cpf
    //     })
    // }
}