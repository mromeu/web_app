<form
    method="POST"
    class="row g-3"
    >
  @csrf
    <x-forms.elements.input
        col="col-md-6"
        type="text"
        id="name"
        name="code"
        placeholder="Nome"
        />

    <x-forms.elements.input
        col="col-md-6"
        type="text"
        id="code"
        name="code"
        placeholder="Código"
        />

    <x-forms.elements.input
        type="hidden"
        id="table_name"
        name="table_name"
        />

    <x-forms.elements.input
        type="hidden"
        id="id"
        name="id"
    />
</form>
