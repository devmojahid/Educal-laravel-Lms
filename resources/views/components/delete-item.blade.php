<div>
    @push('scripts')
    <script>
        (function ($) {
        "use strict";
            $(document).ready(function() {
                $(document).on('click', '.delete_item', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Once Delete, This will be Permanently Delete!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let itemId = $(this).data('item_id');
                            $.ajax({
                                url: '{{ $route }}',
                                method: 'post',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    id: itemId
                                },
                                success: function(res) {
                                    if (res.status == 'success') {
                                        $('.table').load(location.href + ' .table');
                                        Swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                    }
                                }
                            });
                        }
                    })
                })
            });
        })(jQuery);
    </script>
    @endpush
</div>