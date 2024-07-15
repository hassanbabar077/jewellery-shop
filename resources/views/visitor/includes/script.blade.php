     <!-- scripts section -->
     <script src="{{ asset('visitor-assets') }}/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
     <script src="{{ asset('visitor-assets/plugins/owl-slider/jquery.js') }}"></script>
     <script src="{{ asset('visitor-assets/plugins/owl-slider/owl-slider.js') }}"></script>
     <script src="{{ asset('visitor-assets/custom.js') }}"></script>
     <script src="{{ asset('visitor-assets/plugins/toastr/toaster.js') }}"></script>
     <script src="{{ asset('visitor-assets/all.min.js') }}"></script>
     <script>
         @if (Session::has('message'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true
             }
             toastr.success("{{ session('message') }}");
         @endif

         @if (Session::has('error'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true
             }
             toastr.error("{{ session('error') }}");
         @endif

         @if (Session::has('info'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true
             }
             toastr.info("{{ session('info') }}");
         @endif

         @if (Session::has('warning'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true
             }
             toastr.warning("{{ session('warning') }}");
         @endif
     </script>
     <script>
         window.addEventListener('refresh-page', event => {
             window.location.reload(false);
         })
     </script>
