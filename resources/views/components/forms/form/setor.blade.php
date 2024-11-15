<form
    action= {{ $model ? route('setor.update', $model->id) : route('setor.store') }}
    method="POST"
    class="row g-3"
    >
  @csrf
    <x-forms.elements.input
        col="col-md-12"
        type="text"
        id="setor_nome"
        name="setor_nome"
        placeholder="Nome"
        :value="$model->setor_nome ?? ''"
        />

    <x-forms.elements.input
        col="col-md-12"
        type="text"
        id="setor_codigo"
        name="setor_codigo"
        placeholder="Código"
        :value="$model->setor_codigo ?? ''"
        />

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
        index="setor"
        />
</form>
