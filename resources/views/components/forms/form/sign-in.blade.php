<form action="{{route('login.authenticate')}}" method="POST">
  @csrf
    <h1 class="h3 mb-3 fw-normal">Gerenciamento</h1>
    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email"/>
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" />
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
</form>
