<template>
  <section class="register">
    <form class="form mt-4">
      <!-- Este campo não é para preencher -->
      <input type="text" placeholder="Não Preencher!" class="hidden" id="subscribe" name="subscribe">

      <div class="form--group--inline">
        <div class="form--group md:w-1/2 md:mb-0">
          <label class="label" for="name">Nome</label>
          <input class="input" id="name" type="text" placeholder="Francisco" autofocus>
          <p class="error"></p>
        </div>

        <div class="form--group md:w-1/2">
          <label class="label" for="surname">Apelido</label>
          <input class="input" id="surname" type="text" placeholder="Martins">
          <p class="error"></p>
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="label" for="email">E-Mail</label>
          <input class="input" id="email" type="email" placeholder="f.martins@exemplo.com">
          <p class="error"></p>
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="label" for="password">Password</label>
          <input class="input" id="password" type="password" placeholder="******************">
          <p class="error"></p>
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="label" for="password_confirmation">Confirmar Password</label>
          <input class="input" id="password_confirmation" type="password" placeholder="******************">
          <p class="error"></p>
        </div>
      </div>

      <div>
        <button type="submit" class="btn btn-submit btn-block">REGISTAR</button>
      </div>
    </form>
  </section>
</template>