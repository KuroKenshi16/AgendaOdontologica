//Função pega valor digitado no input 
function mostraHorario() {
    let qtd; 
    $('#qtd').change(function(){
        qtd = $('#qtd').val();
        duplicaElemento(qtd);

        //Não deixa o valor do input ser maior que 12
        if (qtd > 12){
            alert('A quantidade maxima são de 12 horários')
            duplicaElemento(qtd = 12)
            $('#qtd').val(12);
        }else{
        duplicaElemento(qtd);
        }
    });
};

//Função que replica box de horario
function duplicaElemento(qtd) {
    $('.horarios-grid').empty();
    for ( var i = 0, l = qtd; i < l; i++)
            {$('.horarios-grid').append(
                `<div class="panel">&nbsp Das &nbsp 
                    <input class="horario" type="time" min="09:00" max="18:00" required>
                    &nbsp as &nbsp 
                    <input class="horario" type="time" min="09:00" max="18:00" required>
                 </div>`
            )};
};

//Função que muda o dia selecionado alterando tambem os textos
function mudaDia(){
    $('.alter').each(function(key,value){
        
        let selectDia;
        selectDia = ($(this).attr('id'));

        let teste = `#${selectDia}`;

        $(`${teste}`).click(function(){
            let changeDay;
            let qtd;
            qtd = $('#qtd');
            changeDay = $(this).attr('data-nome');

            //Habilita input de qtd apenas quando um dia for selecionado 
            $('.changeDay').text(changeDay)
            qtd.removeAttr('disabled')
        })
    })
};

//Função que retorna o dia da semana e o mes em questao 
// function mostraSemana(){
//     let mes;
//     mes = $('#mes').val();

//     weekOfMonth(moment("01.07.2022"))
//     // console.log(moment().format('w'));
// };

// function weekOfMonth(m) {
//     // console.log(m)
//     // let teste;

//     return console.log(m.isoWeek() - moment(m).startOf('month').isoWeek() + 1)
//   };

//Le documento e habilita funcoes 
$(document).ready(function(){
    mostraHorario()
    // mostraSemana()
    mudaDia()
});