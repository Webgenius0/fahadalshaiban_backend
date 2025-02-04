<script src="{{ asset('frontend') }}/js/jquery-3.7.1.min.js"></script>
<script src="{{ asset('frontend') }}/js/plugins.js"></script>
<script src="{{ asset('frontend') }}/js/main.js"></script>
<!-- toster css -->
 
<!-- toster scrippt -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('success'))
  toastr.options = {
    "closeButton": true,
    "progressBar": true
  }
  toastr.success("{{ Session::get('success') }}");
@endif

@if(Session::has('info'))
  toastr.options = {
    "closeButton": true,
    "progressBar": true
  }
  toastr.info("{{ Session::get('info') }}");
@endif

@if(Session::has('warning'))
  toastr.options = {
    "closeButton": true,
    "progressBar": true
  }
  toastr.warning("{{ Session::get('warning') }}");
@endif

@if(Session::has('error'))
  toastr.options = {
    "closeButton": true,
    "progressBar": true
  }
  toastr.error("{{ Session::get('error') }}");
@endif

</script>
@stack('script')