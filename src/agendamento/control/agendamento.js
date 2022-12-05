function iniciaModal(modalID) {
    const modal = document.getElementById(modalID);
    if(modal) {
    modal.classList.add('mostrar');
    modal.addEventListener('click', (e) => {
        if(e.target.id == modalID || e.target.className == 'fechar') {
            modal.classList.remove('mostrar');
            document.location.reload(true);
            e.preventDefault();
        }
    });
 }
}

function mostraPDF(pdfID) {
    const pdf = document.getElementById(pdfID);
    if(pdf) {
    pdf.classList.add('mostrar');
    pdf.addEventListener('click', (e) => {
    });
    Swal.fire({
        title: 'Concluido',
        text: 'Sua consulta já foi agendada! Clique no botão ao lado para gerar sua ficha de agendamento!',
        icon: 'success',
        confirmButtonText: 'Ok'
      })
 }
 trat = $('#tratamento').val();

 if (trat == 'null'){
    $('#button-agendar').prop('disabled', true);
}else{
    $('#button-agendar').prop('disabled', false);
}}

    const select0 = document.getElementById('grid-item0')
    const select1 = document.getElementById('grid-item1')
    const select2 = document.getElementById('grid-item2')
    const select3 = document.getElementById('grid-item3')
    const select4 = document.getElementById('grid-item4')
    const select5 = document.getElementById('grid-item5')
    const select6 = document.getElementById('grid-item6')
    const select7 = document.getElementById('grid-item7')
    const select8 = document.getElementById('grid-item8')
    const select9 = document.getElementById('grid-item9')
    const select10 = document.getElementById('grid-item10')
    const select11 = document.getElementById('grid-item11')
    const select12 = document.getElementById('grid-item12')
    const select13 = document.getElementById('grid-item13')
    const select14 = document.getElementById('grid-item14')
    const select15 = document.getElementById('grid-item15')
    const select16 = document.getElementById('grid-item16')
    const select17 = document.getElementById('grid-item17')
    const select18 = document.getElementById('grid-item18')
    const select19 = document.getElementById('grid-item19')
    const select20 = document.getElementById('grid-item20')
    const select21 = document.getElementById('grid-item21')
    const select22 = document.getElementById('grid-item22')
    const select23 = document.getElementById('grid-item23')
    const select24 = document.getElementById('grid-item24')
    const select25 = document.getElementById('grid-item25')
    const select26 = document.getElementById('grid-item26')
    const select27 = document.getElementById('grid-item27')
    const select28 = document.getElementById('grid-item28')
    const select29 = document.getElementById('grid-item29')
    const select30 = document.getElementById('grid-item30')
    const select31 = document.getElementById('grid-item31')
    const select32 = document.getElementById('button-agendar')
    select0.addEventListener('click', () => iniciaModal('modal-info'));
    select1.addEventListener('click', () => iniciaModal('modal-info'));
    select2.addEventListener('click', () => iniciaModal('modal-info'));
    select3.addEventListener('click', () => iniciaModal('modal-info'));
    select4.addEventListener('click', () => iniciaModal('modal-info'));
    select5.addEventListener('click', () => iniciaModal('modal-info'));
    select6.addEventListener('click', () => iniciaModal('modal-info'));
    select7.addEventListener('click', () => iniciaModal('modal-info'));
    select8.addEventListener('click', () => iniciaModal('modal-info'));
    select9.addEventListener('click', () => iniciaModal('modal-info'));
    select10.addEventListener('click', () => iniciaModal('modal-info'));
    select11.addEventListener('click', () => iniciaModal('modal-info'));
    select12.addEventListener('click', () => iniciaModal('modal-info'));
    select13.addEventListener('click', () => iniciaModal('modal-info'));
    select14.addEventListener('click', () => iniciaModal('modal-info'));
    select15.addEventListener('click', () => iniciaModal('modal-info'));
    select16.addEventListener('click', () => iniciaModal('modal-info'));
    select17.addEventListener('click', () => iniciaModal('modal-info'));
    select18.addEventListener('click', () => iniciaModal('modal-info'));
    select19.addEventListener('click', () => iniciaModal('modal-info'));
    select20.addEventListener('click', () => iniciaModal('modal-info'));
    select21.addEventListener('click', () => iniciaModal('modal-info'));
    select22.addEventListener('click', () => iniciaModal('modal-info'));
    select23.addEventListener('click', () => iniciaModal('modal-info'));
    select24.addEventListener('click', () => iniciaModal('modal-info'));
    select25.addEventListener('click', () => iniciaModal('modal-info'));
    select26.addEventListener('click', () => iniciaModal('modal-info'));
    select27.addEventListener('click', () => iniciaModal('modal-info'));
    select28.addEventListener('click', () => iniciaModal('modal-info'));
    select29.addEventListener('click', () => iniciaModal('modal-info'));
    select30.addEventListener('click', () => iniciaModal('modal-info'));
    select31.addEventListener('click', () => iniciaModal('modal-info'));
    select32.addEventListener('click', () => mostraPDF('pdf-info'));

    //Funcao que gera PDF
    function gerarPdf() {
        // Instanciar o jsPDF
        var doc = new jsPDF();
    
        // Texto que deve estar no PDF
        doc.text('Testizinho do Igor', 10, 10);
    
        // Gera o PDF
        doc.save('FichaDeAgendamento.pdf');
    }

//Le documento e habilita funcoes 
$(document).ready(function(){
    iniciaModal()
    mostraPDF()
});