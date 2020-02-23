<!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a
                    href="https://artdev.id">Art Developer</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ base_url('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ base_url('assets/js/lib/jquery.plugin.js') }}"></script>
    <script src="{{ base_url('assets/plugin/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ base_url('assets/plugin/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- costum js -->
        @if(!empty($js))
                @foreach ($js as $url_js)
                <script src="{{ base_url($url_js) }}"></script>
                @endforeach
        @endif
    <!-- apps -->
    <script src="{{ base_url('assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ base_url('assets/js/feather.min.js') }}"></script>
    <script src="{{ base_url('assets/plugin/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ base_url('assets/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ base_url('assets/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ base_url('assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ base_url('assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ base_url('assets/plugin/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ base_url('assets/plugin/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ base_url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ base_url('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ base_url('assets/js/pages/dashboards/dashboard1.min.js') }}"></script>
    <!-- parsing js external -->
    @stack('ext_js')
</body>

</html>