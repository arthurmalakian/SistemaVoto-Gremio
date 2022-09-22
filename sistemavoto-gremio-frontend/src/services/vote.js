import { http } from "./config"

export default {
    vote: (id,cpf) => {
        return http.post(`vote`, {
            plate_id: id,
            cpf: cpf
        })
    }
}