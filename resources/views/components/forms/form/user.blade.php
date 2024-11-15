<form
    action= {{ $model ? route('user.update', $model->id) : route('user.store') }}
    method="POST"
    class="row g-3"
    >
  @csrf
    <x-forms.elements.input
        col="col-md-6"
        type="text"
        id="name"
        name="name"
        label="Nome"        
        placeholder="Nome"
        :value="$model->name ?? ''"
        />

    <x-forms.elements.input
        col="col-md-6"
        type="email"
        id="email"
        name="email"
        label="E-mail"        
        placeholder="E-mail"
        :value="$model->email ?? ''"
        />

    <x-forms.elements.select
        name="cargo_id"
        id="cargo_id"
        label="Cargo"
        col="col-md-6"
        :options="$cargos"
        :selected="$model->cargo_id ?? ''" />


    <x-forms.elements.input
        col="col-md-6"
        type="password"
        id="password"
        name="password"
        label="Senha"        
        placeholder="Password"

        />

    <x-forms.elements.input
        type="hidden"
        id="id"
        name="id"
        :value="$model->id ?? ''"
        />

    <x-forms.elements.button-group
        index="users"
        />
</form>
