$(document).ready(function(){
    function schedule(){
        $.ajax({
            url: '/notifuser',
            type: 'GET',
            success: function(response) {
                if(response.data > 0){
                    Push.create('Waktu Anda Sudah Selesai!', {
                        body: 'Harap segera check-out'
                    });
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        showCloseButton: true
                    });
                    Toast.fire({
                        icon: 'warning',
                        title: 'Waktu Anda Sudah Selesai!'
                    });
                } else {
                    console.log("OK!");
                }
            }
        });
        $.ajax({
            url: '/notifuser5min',
            type: 'GET',
            success: function(response) {
                if(response.data.length > 0){
                    Push.create('Waktu Tersisa 5 Menit!', {
                        body: 'Harap bersiap check-out'
                    });
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        showCloseButton: true
                    });
                    Toast.fire({
                        icon: 'warning',
                        title: 'Waktu Tersisa 5 Menit!'
                    });
                } else {
                    console.log("OK!");
                }
            }
        });
    }
    schedule();
    setInterval(schedule, 60000);
});