const phone_mask = (event) => {
    let input = event.target
    input.value = handle_input(input.value)
}

const handle_input = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
}

const cnpj_mask = (event) => {
    let input = event.target
    input.value = handle_cnpj_input(input.value)
}

const handle_cnpj_input = (value) => {
    if (!value) return ""
    value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
    return value
}

const cpf_mask = (event) => {
    let input = event.target
    input.value = handle_cnpj_input(input.value)
}

const handle_cpf_input = (value) => {
    if (!value) return ""
    value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    return value
}

const cep_mask = (event) => {
    let input = event.target
    input.value = handle_cep_input(input.value)
}

const handle_cep_input = (value) => {
    if (!value) return ""
    value = value.replace(/(\d{5})(\d{3})/, '$1-$2');
    return value
}
