<template>
    <div class="navbar w-100 h-100 p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 px-4">
            <a class="navbar-brand" href="#">Sistema Votação - Gremio Estudantil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Votar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
  name: 'AppNavBar',
};
</script>

<style>

</style>