@if(session()->has('message'))
    <script type="text/javascript">
        swal({
            title: "{{ session('message.title') }}",
            text: "{{ session('message.message') }}",
            type: "{{ session('message.level') }}",
            timer: 2000,
            showConfirmButton: false});
    </script>
@endif

@if(session()->has('message_overlay'))
    <script type="text/javascript">
        swal({
            title: "{{ session('message_overlay.title') }}",
            text: "{{ session('message_overlay.message') }}",
            type: "{{ session('message_overlay.level') }}",
            confirmButtonText : 'Okay'
        });
    </script>
@endif
