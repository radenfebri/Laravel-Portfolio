<script src="{{ asset('template') }}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('template') }}/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('template') }}/js/main.js"></script>
<script src="{{ asset('template') }}/vendors/apexcharts/apexcharts.js"></script>
<script src="{{ asset('template') }}/js/pages/dashboard.js"></script>
<script src="{{ asset('template') }}/vendors/toastify/toastify.js"></script>
<script src="{{ asset('template') }}/js/extensions/toastify.js"></script>
<script src="{{ asset('template') }}/vendors/fontawesome/all.min.js"></script>
<script src="{{ asset('template') }}/vendors/choices.js/choices.min.js"></script>
<script src="{{ asset('template') }}/js/pages/form-element-select.js"></script>
<script src="{{ asset('template') }}/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<script src="{{ asset('template') }}/vendors/jquery/jquery.min.js"></script>
<script src="{{ asset('template') }}/vendors/summernote/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 120,
    })
    $("#hint").summernote({
        height: 100,
        toolbar: false,
        placeholder: 'type with apple, orange, watermelon and lemon',
        hint: {
            words: ['apple', 'orange', 'watermelon', 'lemon'],
            match: /\b(\w{1,})$/,
            search: function (keyword, callback) {
                callback($.grep(this.words, function (item) {
                    return item.indexOf(keyword) === 0;
                }));
            }
        }
    });

</script>


