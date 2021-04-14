<div class="input-field">
  <select name="name">
    <option selected value="">NOME USUÁRIO</option>
    @foreach($pessoas as $pessoa)
      <option value="{{$pessoa->nome}}">{{$pessoa->nome}}</option>
    @endforeach
  </select>
</div>

<div class="input-field">
  <input type="email" name="email">
  <label>E-MAIL</label>
</div>

<div class="input-field">
  <input type="password" name="password">
  <label>SENHA</label>
</div>
