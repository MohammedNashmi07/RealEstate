
{{-- sweet alert  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
{{-- jquery cdn  --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- core:js -->
<script src="{{asset('assets/vendors/core/core.js')}}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{asset('assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{asset('assets/js/dashboard-dark.js')}}"></script>
<!-- End custom js for this page -->
{{-- select2 --}}
<script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2.js')}}"></script>

<script>

    const toastMixin = Swal.mixin({
    toast: true,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    },
    customClass: {
    container: 'dark-mode-toast', // Add a custom CSS class
  },
  });


    @if (session()->has('message.success'))
        @if (session('message.success') == '1')
            toastMixin.fire({
                icon: 'success',
                animation: true,
                title: "{{ session('message.message') }}"
            });
        @else
            toastMixin.fire({
                icon: 'error',
                animation: true,
                title: "{{ session('message.message') }}"
            });
        @endif
    @endif


</script>


