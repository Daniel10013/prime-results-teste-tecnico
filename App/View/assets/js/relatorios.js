$(".report-selection .option").on("click", function () {
    const activeOption = $(".active-option");
    if ($(this) == activeOption) {
        return;
    }
    activeOption.removeClass('active-option');
    $(this).addClass('active-option');
})

$('.user-report').on('click', () => {
    $('.bairro-report-content').hide();
    $('.maisdeum-report-content').hide();
    $('.user-report-content').show();
})

$('.bairro-report').on('click', () => {
    $('.user-report-content').hide();
    $('.maisdeum-report-content').hide();
    $('.bairro-report-content').show();
})

$('.maisdeum-report').on('click', () => {
    $('.user-report-content').hide();
    $('.bairro-report-content').hide();
    $('.maisdeum-report-content').show();
})

$(function () {
    $('#filtro-nome, #filtro-cpf').on('input', function () {
        //lower case para ignorar a diferenca de maiusculo e minusculo
        let nomeBusca = $('#filtro-nome').val().toLowerCase();
        let cpfBusca = $('#filtro-cpf').val().toLowerCase();

        //desktop
        $('table tbody tr').each(function () {
            let nome = $(this).find('td:nth-child(2)').text().toLowerCase();
            let cpf = $(this).find('td:nth-child(3)').text().toLowerCase();

            if (nome.includes(nomeBusca) && cpf.includes(cpfBusca)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        //mobile
        $('.mobile-table .table-row').each(function () {
            let nome = $(this).find('div:contains("Nome:")').text().toLowerCase();
            let cpf = $(this).find('div:contains("CPF:")').text().toLowerCase();

            if (nome.includes(nomeBusca) && cpf.includes(cpfBusca)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});