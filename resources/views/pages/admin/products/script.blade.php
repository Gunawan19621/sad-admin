<script>
    CKEDITOR.replace('characteristics', {
        toolbar: [{
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                    'RemoveFormat'
                ]
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft',
                    'JustifyCenter', 'JustifyRight'
                ]
            },
            {
                name: 'styles',
                items: ['Styles', 'Format']
            },
            {
                name: 'tools',
                items: ['Maximize']
            },
        ],
        filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('testing_note', {
        toolbar: [{
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                    'RemoveFormat'
                ]
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft',
                    'JustifyCenter', 'JustifyRight'
                ]
            },
            {
                name: 'styles',
                items: ['Styles', 'Format']
            },
            {
                name: 'tools',
                items: ['Maximize']
            },
        ],
        filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('food_pairing', {
        toolbar: [{
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                    'RemoveFormat'
                ]
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft',
                    'JustifyCenter', 'JustifyRight'
                ]
            },
            {
                name: 'styles',
                items: ['Styles', 'Format']
            },
            {
                name: 'tools',
                items: ['Maximize']
            },
        ],
        filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('description_product', {
        toolbar: [{
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                    'RemoveFormat'
                ]
            },
            {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft',
                    'JustifyCenter', 'JustifyRight'
                ]
            },
            {
                name: 'styles',
                items: ['Styles', 'Format']
            },
            {
                name: 'tools',
                items: ['Maximize']
            },
        ],
        filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>
