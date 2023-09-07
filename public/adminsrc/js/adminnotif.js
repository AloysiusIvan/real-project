$(document).ready(function(){
    function schedule(){
        $.ajax({
            url: '/notifadmin',
            type: 'GET',
            success: function(response) {
                if(response.data.length > 0){
                    Push.create('Ada '+response.data.length+' pengguna yang belum checkout!', {
                        body: 'Harap diingatkan'
                    });
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        showCloseButton: true
                    });
                    Toast.fire({
                        icon: 'warning',
                        title: 'Ada '+response.data.length+' pengguna yang belum checkout!'
                    });
                } else {
                    console.log("OK!");
                }
            }
        });
        $.ajax({
            url: '/notifadmin5min',
            type: 'GET',
            success: function(response) {
                if(response.data.length > 0){
                    Push.create('Pengguna tinggal 5 menit!', {
                        body: 'Harap diingatkan'
                    });
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        showCloseButton: true
                    });
                    Toast.fire({
                        icon: 'warning',
                        title: 'Pengguna tinggal 5 menit!'
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