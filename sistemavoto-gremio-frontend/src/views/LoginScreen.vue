<template>
  <div class="login-screen bg-secondary vh-100 pt-3">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-6 col-6 col-md-6">
        <div class="card mb-3">
          <img src="../assets/alunos.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title text-center">Login Admin</h5>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                aria-describedby="email-error"
                v-model="login"
              />
              <div
                id="email-error"
                class="form-text text-danger"
                v-if="formErrors?.errors?.email"
              >
                {{ formErrors?.errors?.email[0] }}
              </div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Senha</label>
              <input
                type="password"
                class="form-control"
                id="password"
                v-model="password"
                aria-describedby="password-error"
              />
              <div
                id="password-error"
                class="form-text text-danger"
                v-if="formErrors?.errors?.password"
              >
                {{ formErrors?.errors?.password[0] }}
              </div>
            </div>
            <div class="text-center">
              <button
                type="submit"
                class="btn btn-secondary"
                @click="submitForm(login, password)"
              >
                Login
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import auth from "../services/auth";
import { ref } from "vue";

export default {
  setup() {
    let formErrors = ref([]);
    const login = ref("");
    const password = ref("");
    async function submitForm(login, password) {
      if (login == null || password == null) {
        alert("Informe os dados de login.");
      } else {
        try {
          const response = await auth.login(login, password);
          alert(response.data.message);
          return response.data.message;
        } catch (error) {
          formErrors.value = error.response.data;
        }
      }
    }
    return {
      login,
      password,
      submitForm,
      formErrors,
    };
  },
};
</script>

<style>
</style>