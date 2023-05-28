@extends('dashboard.layouts.dashboard')

@section('title')
    Test TinyMCE Rich Editor
@endsection

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/9fdxmwc8bgyw07t5mlpf6rt09hdcxgln0ce5e3jniqd1emb0/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endpush

@section('content')
    <div class="dashboard-padding-responsive">
        <div class="md:w-9/12">
            <form action="/simpan-catatan" method="post">
                @csrf
                <textarea name="catatan" id="catatan" class="h-[800px]">
                    Welcome to TinyMCE!
                 </textarea>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <script>
                tinymce.init({
                    selector: '#catatan',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ]
                });
            </script>
        </div>
    </div>
@endsection
