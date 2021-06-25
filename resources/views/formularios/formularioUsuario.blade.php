<div class="row">

  <div class="col s12">
    <div class="input-field">

        <input type="text" value="{{isset($pessoa->nome) ? $pessoa->nome : '' }}" name="name"  required >
        <label>NOME</label>
    </div>

    <div class="input-field">

        <input type="text" value="{{isset($pessoa->cpf) ? $pessoa->cpf : '' }}" name="name"  required >
        <label>CPF</label>
    </div>

    <div class="input-field">

        <input type="text" value="{{isset($pessoa->rg) ? $pessoa->rg : '' }}" name="name"  required >
        <label>RG</label>
    </div>

    <div class="input-field">
      <input type="email" name="email" value="{{isset($pessoa->email) ? $pessoa->email : '' }}" required>
      <label>E-MAIL</label>

    </div>

    <div class="input-field">
      <input type="password" name="password" required>
      <label>SENHA</label>
    </div>
  </div>
</div>
