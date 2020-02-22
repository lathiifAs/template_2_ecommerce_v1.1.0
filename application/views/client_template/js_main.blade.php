  <!-- jquery plugins here-->
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ base_url('assets/client_template/js/jquery-1.12.1.min.js') }}"></script>

  <!-- popper js -->
  <script src="{{ base_url('assets/client_template/js/popper.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ base_url('assets/client_template/js/bootstrap.min.js') }}"></script>

  @if(!empty($js))
          @foreach ($js as $url_js)
          <script src="{{ base_url($url_js) }}"></script>
          @endforeach
  @endif

<!-- select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <!-- easing js -->
  <script src="{{ base_url('assets/client_template/js/jquery.magnific-popup.js') }}"></script>
  <!-- swiper js -->
  <script src="{{ base_url('assets/client_template/js/lightslider.min.js') }}"></script>
  <!-- swiper js -->
  <script src="{{ base_url('assets/client_template/js/mixitup.min.js') }}"></script>
  <script src="{{ base_url('assets/client_template/js/lightslider.min.js') }}"></script>
  <!-- particles js -->
  <script src="{{ base_url('assets/client_template/js/owl.carousel.min.js') }}"></script>

  <!-- slick js -->
  <script src="{{ base_url('assets/client_template/js/slick.min.js') }}"></script>
  <script src="{{ base_url('assets/client_template/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ base_url('assets/client_template/js/waypoints.min.js') }}"></script>
  <script src="{{ base_url('assets/client_template/js/contact.js') }}"></script>
  <script src="{{ base_url('assets/client_template/js/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ base_url('assets/client_template/js/jquery.form.js') }}"></script>
  <script src="{{ base_url('assets/client_template/js/jquery.validate.min.js') }}"></script>
  <script src="{{ base_url('assets/client_template/js/mail-script.js') }}"></script>
  <!-- custom js -->
  <script src="{{ base_url('assets/client_template/js/custom.js') }}"></script>

  <script>


  $('.select2').select2({
      theme: 'bootstrap4',
  });
  </script>
  @stack('ext_js')

<!-- jquery plugins here-->
    <!-- <script src="{{ base_url('assets/client_template/js/jquery-1.12.1.min.js') }}"></script> -->
    <!-- popper js -->
    <!-- <script src="{{ base_url('assets/client_template/js/popper.min.js') }}"></script> -->
    <!-- bootstrap js -->
    <!-- <script src="{{ base_url('assets/client_template/js/bootstrap.min.js') }}"></script> -->
    <!-- easing js -->
    <!-- <script src="{{ base_url('assets/client_template/js/jquery.magnific-popup.js') }}"></script> -->
    <!-- swiper js -->
    <!-- <script src="{{ base_url('assets/client_template/js/swiper.min.js') }}"></script> -->
    <!-- swiper js -->
    <!-- <script src="{{ base_url('assets/client_template/js/mixitup.min.js') }}"></script> -->
    <!-- particles js -->
    <!-- <script src="{{ base_url('assets/client_template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.nice-select.min.js') }}"></script> -->
    <!-- slick js -->
    <!-- <script src="{{ base_url('assets/client_template/js/slick.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/waypoints.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/contact.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.form.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.validate.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/mail-script.js') }}"></script> -->
    <!-- custom js -->
    <!-- <script src="{{ base_url('assets/client_template/js/custom.js') }}"></script> -->
</body>

</html>