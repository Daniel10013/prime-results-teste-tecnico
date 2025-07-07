$("#cep").on('change', function () {
    $.get(`https://viacep.com.br/ws/${$(this).val()}/json`)
        .then((res) => {
            console.log(res);
            $("#endereco").val(res.logradouro);
            $("#bairro").val(res.bairro);
            $("#cidade").val(res.localidade);
            $("#estado").val(res.estado);
        })
        .catch((err) => {
            Swal.fire({
                title: 'Erro!',
                text: 'CEP inválido',
                icon: 'error',
                confirmButtonText: 'Fechar'
            }).then(() => {
                $(this).val('').focus();
                clearInputs();
            });
        })
})

function clearInputs() {
    $("#endereco").val('');
    $("#bairro").val('');
    $("#cidade").val('');
    $("#estado").val('');
}

function validateForm(form) {
    const inputs = form.find('input');
    let formIsValid = true;
    inputs.each(function (){
        if ($(this).val().trim() == '') {
            console.log($(this).val());
            formIsValid = false;
        }
    })
    return formIsValid;
}

$("button[type=submit]").on('click', (e) => {
    const form = $("form");
    if (validateForm(form) == false) {
        e.preventDefault();
        Swal.fire({
            title: 'Erro!',
            text: 'Preencha todos os campos corretamente!',
            icon: 'error',
            confirmButtonText: 'Fechar'
        });
        return;
    }
})