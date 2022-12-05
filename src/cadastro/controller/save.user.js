$(document).ready(function() {

    $('.btn-salvar').click(function(e) {
        e.preventDefault()

        let dados = $('#form-dados').serialize()

        dados += `&operacao=${$('.btn-salvar').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            data: dados,
            url: 'src/cadastro/model/save-user.php',
            success: function(dados) {
                Swal.fire({
                        title: 'KGAGENDA',
                        text: dados.mensagem,
                        icon: dados.tipo,
                        confirmButtonText: 'OK'
                    })
                    // // $('#modal-tipo').modal('hide')
                    // $('#table-tipo').DataTable().ajax.reload()
            }
        })
    })

})