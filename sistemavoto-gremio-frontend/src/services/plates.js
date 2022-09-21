import { http } from "./config"

export default {
    getAll: () => {
        return http.get('plates')
    },
    getOne: (id) => {
        return http.get(`plates/${id}`)
    },
    vote: (id,cpf) => {
        return http.post(`vote`, {
            plate_id: id,
            cpf: cpf
        })
    }
}