<link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
<script>
    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Write your newsletter content here...',
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link', 'image'],
                ['clean'],
            ],
        },
    });

    const initialBody = {!! json_encode($body) !!};
    if (initialBody) {
        quill.root.innerHTML = initialBody;
    }

    const htmlEditor  = document.getElementById('html-editor');
    const quillWrap   = document.getElementById('quill-editor');
    const toggleBtn   = document.getElementById('toggle-html');
    let htmlMode = false;

    toggleBtn.addEventListener('click', function () {
        htmlMode = !htmlMode;
        if (htmlMode) {
            htmlEditor.value = quill.root.innerHTML;
            quillWrap.classList.add('hidden');
            htmlEditor.classList.remove('hidden');
            toggleBtn.textContent = 'Visual Editor';
        } else {
            quill.root.innerHTML = htmlEditor.value;
            htmlEditor.classList.add('hidden');
            quillWrap.classList.remove('hidden');
            toggleBtn.textContent = '</> HTML Source';
        }
    });

    document.getElementById('newsletter-form').addEventListener('submit', function () {
        document.getElementById('body-input').value = htmlMode ? htmlEditor.value : quill.root.innerHTML;
    });
</script>
