$(".delete").on("click", function () {
    const idToDelete = $(this).data('id');
    Swal.fire({
        icon: "question",
        title: "Confirme sua ação!",
        text: `Deseja apagar o cliente de id ${idToDelete}`,
        confirmButtonText: "Sim",
        showCancelButton: true,
        cancelButtonText: "Não"
    })
        .then((res) => {
            if (res.isConfirmed) {
                $.ajax({
                    url: `http://localhost/prime-results/deleteClient/${idToDelete}`,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function (res) {
                        console.log(res);
                        if (res.status == false) {
                            Swal.fire({
                                icon: "error",
                                title: "Erro ao apagar o cliente!",
                                text: res.message,
                                confirmButtonText: "Ok"
                            }).then(() => {
                                $(".row-" + idToDelete).remove();
                            })
                        }
                        else {
                            Swal.fire({
                                icon: "success",
                                title: "Item apagado!",
                                text: `Cliente apagado com sucesso!`,
                                confirmButtonText: "Ok"
                            }).then(() => {
                                $(".row-" + idToDelete).remove();
                            })
                        }
                    }
                });
            }
        });
});