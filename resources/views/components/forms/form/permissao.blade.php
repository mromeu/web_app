<form
    action= {{ $model ? route('permissao.update', $model->id) : route('permissao.store') }}
    method="POST"
    class="row g-3"
    >
  @csrf
    <x-forms.elements.input
        col="col-md-12"
        type="text"
        id="permissao_slug"
        name="permissao_slug"
        placeholder="Nome"
        :value="$model->permissao_slug ?? ''"
        />

    <x-forms.elements.select
        name="user_id"
        id="user_id"
        label="Usuário"
        col="col-md-6"
        :options="$usuarios"
        :selected="$model->user_id ?? ''" />

    <x-forms.elements.select
        name="perfil_id"
        id="perfil_id"
        label="Perfil"
        col="col-md-6"
        :options="$perfis"
        :selected="$model->perfil_id ?? ''" />

    <x-forms.elements.select
        name="tipo_permissao_id"
        id="tipo_permissao_id"
        label="Tipo"
        col="col-md-6"
        :options="$permissoes"
        :selected="$model->tipo_permissao_id ?? ''" />

    <x-forms.elements.input
        type="hidden"
        id="id"
        name="id"
        :value="$model->id ?? ''"
        />

    <x-forms.elements.button-group
        index="permissao"
        />
</form>
