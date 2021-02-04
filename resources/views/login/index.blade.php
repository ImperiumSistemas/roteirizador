@include('includes.header')

<div class="row">
  <h2><center> TELA DE LOGIN </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="{{route('loginEntrar')}}" >
        {{ csrf_field() }}

        <div class="input-field">
          <input type="text" name="email">
          <label>E-MAIL</label>
        </div>

        <div class="input-field">
          <input type="password" name="senha">
          <label>SENHA</label>
        </div>


        <button class="btn deep-orange">ENTRAR</button>

      </form>
  </div>
</div>


@include('includes.footer')
