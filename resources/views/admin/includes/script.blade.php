    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin-assets') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('admin-assets') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('admin-assets') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('admin-assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('admin-assets') }}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin-assets') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin-assets') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin-assets') }}/assets/js/dashboards-analytics.js"></script>


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('admin-assets/assets/dropify/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'blockQuote', 'insertTable', 'imageUpload', 'undo', 'redo'
                ],
                ckfinder: {
                    uploadUrl: '/path/to/your/upload-endpoint' // Replace with your server-side upload URL
                },
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    console.log(editor.getData()); // Log the editor's content whenever it changes
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
