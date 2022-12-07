<script>
    @if (session()->has('message'))
        var alert_type = "{{ session('type', 'info') }}";
        switch (alert_type) {
            case 'info':
                toastr.info("{{ session('message') }}")
                break;
            case 'success':
                toastr.success("{{ session('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ session('message') }}");
                break;
            case 'error':
                toastr.error("{{ session('message') }}");
                break;
        }
    @endif

    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    toastr.options = {
        "preventDuplicates": true
    }
</script>
