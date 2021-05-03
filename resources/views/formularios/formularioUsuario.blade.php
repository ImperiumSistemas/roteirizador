<div class="row">

  <div class="col s12">
    <div class="input-field">

        <input type="text" value="{{isset($pe->nome) ? $pe->nome : '' }}" name="name"  required >
        <label>NOME</label>
    </div>

    <div class="input-field">
      <input type="email" name="email" value="{{isset($email) ? $email : ''}}" required>
      <label>E-MAIL</label>

    </div>

    <div class="input-field">
      <input type="password" name="password" required>
      <label>SENHA</label>
    </div>
  </div>
</div>
