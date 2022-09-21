<template>
  <div class="vote-screen bg-secondary vh-100">
    <div
      class="
        row
        px-4
        py-4
        justify-content-center
        align-items-center
        h-100
        bg-light
      "
    >
      <div class="card mb-3" style="max-width: 540px">
        <div class="row g-0 align-items-center justify-content-center">
          <div class="col-md-4">
            <img
              :src="
                candidate?.president?.image == null
                  ? 'https://www.ifmg.edu.br/ourobranco/noticias/inscricoes-e-eleicoes-para-o-gremio-estudantil-1/gremio.png/@@images/7b8d865d-6f2d-4495-8bf3-ee9a80d2f53e.png'
                  : candidate?.president?.image
              "
              class="img-fluid rounded-start"
              alt="..."
            />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">
                Vote na chapa para presidente do Gremio
              </h5>
              <div class="input-group">
                <select
                  class="form-select"
                  id="inputGroupSelect04"
                  aria-label="Example select with button addon"
                  v-model="selectedPlate"
                  @change="fetchOne(selectedPlate)"
                >
                  <option value="-1" selected>Selecione a chapa</option>
                  <option
                    v-for="plates in platesList"
                    :key="plates.id"
                    :value="plates.id"
                  >
                    {{ plates.name }}
                  </option>
                </select>
                <button
                  class="btn btn-outline-secondary"
                  type="button"
                  @click.prevent="submitForm(selectedPlate, formCPF)"
                >
                  Votar
                </button>
              </div>
              <div class="input-group my-3">
                <span class="input-group-text" id="inputGroup-sizing-default"
                  >CPF</span
                >
                <input
                  type="text"
                  class="form-control"
                  aria-label="Sizing example input"
                  aria-describedby="inputGroup-sizing-default"
                  v-model="formCPF"
                />
              </div>
              <p class="card-text" v-show="candidate">
                <span>Nome do candidato: {{ candidate?.president?.name }}</span
                ><br />
                <span>Nome do vice: {{ candidate?.vice_president?.name }}</span>
              </p>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import plates from "../services/plates";
import { ref, onMounted } from "vue";

export default {
  setup() {
    let platesList = ref([]);
    const selectedPlate = ref(-1);
    const formCPF = ref("");
    const candidate = ref("");
    async function fetchData() {
      const response = await plates.getAll();
      platesList.value = response.data;
    }
    async function fetchOne(id) {
      candidate.value = undefined;
      if (id != -1) {
        const response = await plates.getOne(id);
        candidate.value = response.data;
      }
    }
    async function submitForm(id, cpf) {
      if (id == -1 || id == null) {
        alert("Selecione uma chapa.");
      } else {
        try {
          const response = await plates.vote(id, cpf);
          alert(response.data.message);
          return response.data.message;
        } catch (error) {
          alert(error.response.data.message);
        }
      }
    }
    onMounted(async () => {
      await fetchData();
    });
    return {
      platesList,
      candidate,
      selectedPlate,
      fetchOne,
      submitForm,
      formCPF,
    };
  },
};
</script>

<style>
</style>