<script src="{{asset('public/dashboard/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    


    <script src="{{asset('public/dashboard/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('public/dashboard/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('public/dashboard/assets/js/widgets.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('public/dashboard/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/dashboard/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/dashboard/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
             switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                 case 'error':
                     toastr.error("{{ Session::get('message') }}");
                     break;
             }
            @endif
    </script>
    
    
    @yield('js')