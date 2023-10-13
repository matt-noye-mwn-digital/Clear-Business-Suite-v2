<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.tinyEditor',
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselector | bold italix | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    })
</script>
