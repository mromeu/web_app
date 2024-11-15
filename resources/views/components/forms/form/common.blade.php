<form
    action= {{ $model ? route('common.update', $model->id) : route('common.store') }}
    method="POST"
    class="row g-3"
    >
  @csrf
    <x-forms.elements.input
        col="col-md-6"
        type="text"
        id="common_table_name"
        name="common_table_name"
        placeholder="Nome da configuração"
        :value="$model->common_table_name ?? ''"
        />

    <x-forms.elements.input
        col="col-md-6"
        type="text"
        id="common_table_db_name"
        name="common_table_db_name"
        placeholder="Nome da tabela"
        :value="$model->common_table_db_name ?? ''"
        />

    <x-forms.elements.input
        type="hidden"
        id="common_table_id"
        name="common_table_id"
        :value="$model->id ?? ''"
        />

    <x-forms.elements.button-group
        index="commons"
        />
</form>
