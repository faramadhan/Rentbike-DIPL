const flashData = $('.flash-data').data('flashdata');

if (flashData){
    Swal.fire({
        title:'Data Motor Berhasil',
        text: 'Berhasil' + flashData,
        type:'success'
    });
}