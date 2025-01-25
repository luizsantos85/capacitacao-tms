@if(isset($createUser) && $createUser)
<div class="form-group">
    <label for="email">Nome</label>
    <input type="text" class="form-control" id="name" placeholder="Nome" name="name" required>
</div>
@endif

<div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" placeholder="Seu e-mail" name="email" required>
</div>
<div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" placeholder="Sua senha" name="password" required>
</div>

<button type="submit" class="btn btn-primary btn-block">{{isset($createUser) && $createUser ? 'Criar' : 'Entrar'}}</button>
<div class="text-center mt-3">
    <a href="{{ isset($createUser) && $createUser ? route('login') : route('user')}}" class="text-muted">
        {{isset($createUser) && $createUser ? 'Já possui uma conta?' : 'Não possui uma conta?'}}
    </a>
</div>
