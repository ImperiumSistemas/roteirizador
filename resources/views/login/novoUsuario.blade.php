@include('includes.header')

<div class="row">
  <h2><center> CADASTRO DE USUARIO </center></h2>
</div>

<div class="container">
  <div class="row">
      <form class="" method="post" action="" >
        {{ csrf_field() }}

        <div class="input-field">
          <input type="text" name="email">
          <label>E-MAIL</label>
        </div>

        <div class="input-field">
          <input type="password" name="senha">
          <label>SENHA</label>
        </div>

        <div class="input-field">
          <input type="password" name="confirmacaoSenha">
          <label>SENHA</label>
        </div>

        <button class="btn deep-orange">CADASTRAR</button>

      </form>
    
  </div>
</div>


@include('includes.footer')
