<!-- ==== All Js Links ==== -->
<script src="{{ asset('frontend') }}/js/jquery-3.7.1.min.js"></script>
<script src="{{ asset('frontend') }}/js/plugins.js"></script>
<script src="{{ asset('frontend') }}/js/main.js"></script>

<script>
    $(document).ready(function() {
        $("select").niceSelect();
    });
</script>
@stack('script')