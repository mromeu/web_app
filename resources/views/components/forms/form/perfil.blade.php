<form
    action= {{ $model ? route('perfil.update', $model->id) : route('perfil.store') }}
    method="POST"
    class="row g-3"
    >
  @csrf
    <x-forms.elements.input
        col="col-md-12"
        type="text"
        id="perfil_nome"
        name="perfil_nome"
        placeholder="Nome"
        :value="$model->perfil_nome ?? ''"
        />

    <x-forms.elements.select 
        col="col-md-12"
        name="active" 
        id="active"
        label="Ativo"
        :options="[0 => 'Não', 1 => 'Sim']" 
        :selected="isset($model) && $model->active == 0 ? 0 : 1"
    />        


    <x-forms.elements.checkbox
        id="perfil_admin"
        name="perfil_admin"
        label='Perfil de administrador?'
        :checked="isset($model) && $model->perfil_admin == 1"
        />        

    <x-forms.elements.input
        type="hidden"
        id="id"
        name="id"
        :value="$model->id ?? ''"
        />
    @isset($permissoes)
    <h3>Permissões</h3>
        <div class="form-group">
            @foreach($permissoes as $permissao)
                <div class="form-check">
                    <input
                        type="checkbox"
                        name="permissoes[]"
                        value="{{ $permissao->id }}"
                        id="permission_{{ $permissao->id }}"
                        class="form-check-input"
                        {{ $model->permissoes->contains($permissao->id) ? 'checked' : '' }}
                    >
                    <label for="permission_{{ $permissao->id }}" class="form-check-label">
                        {{ $permissao->permissao_nome }}
                    </label>
                </div>
            @endforeach
        </div>
    @endisset

    <x-forms.elements.button-group
        index="perfil"
        />
</form>
