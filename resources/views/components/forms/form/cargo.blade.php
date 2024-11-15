<form
    action= {{ $model ? route('cargo.update', $model->id) : route('cargo.store') }}
    method="POST"
    class="row g-3"
    >
  @csrf
    <x-forms.elements.select
        name="cargo_superior_id"
        id="cargo_superior_id"
        label="Cargo superior"
        col="col-md-12"
        :options="$cargos"
        :selected="$model->cargo_superior_id ?? ''" />


    <x-forms.elements.input
        id="cargo_nome"
        name="cargo_nome"
        label="Cargo"
        type="text"
        col="col-md-6"
        :value="$model->cargo_nome ?? ''"  />

    <x-forms.elements.select
        id="cargo_lideranca"
        name="cargo_lideranca"
        label="Cargo de liderança"
        type="text"
        col="col-md-6"
        :selected="isset($model) && $model->cargo_lideranca == 0 ? 0 : 1"
        :options="[1 => 'Sim', 0 => 'Não']" />

    <x-forms.elements.select
        name="setor_id"
        id="setor_id"
        label="Setor"
        col="col-md-6"
        :options="$setores"
        :selected="$model->setor_id ?? ''" />

    <x-forms.elements.select
        name="perfil_id"
        id="perfil_id"
        label="Perfil"
        col="col-md-6"
        :options="$perfis"
        :selected="$model->perfil_id ?? ''" />

    <x-forms.elements.select
        col="col-md-12"
        name="active"
        id="active"
        label="Ativo"
        :options="[0 => 'Não', 1 => 'Sim']"
        :selected="isset($model) && $model->active == 0 ? 0 : 1"
    />

    <x-forms.elements.input
        type="hidden"
        id="id"
        name="id"
        :value="$model->id ?? ''"
        />

    <x-forms.elements.button-group
        index="cargo"
        />
</form>
