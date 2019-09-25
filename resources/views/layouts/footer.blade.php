<footer>
  <div class="container">

    <!--footer links-->
    {{-- <div class="footer-links">
      <div class="row">
        <div class="col-sm-6 footer-left">
          <a href="#">Sitemap</a> &nbsp; | &nbsp; <a href="#">Privacy policy</a> | &nbsp; <a href="#">Guest book</a>
        </div>
        <div class="col-sm-6 footer-right">
          <a href="#">Gallery</a> &nbsp; | &nbsp; <a href="#">Reservations</a> | &nbsp; <a href="#">Help center</a>
        </div>
      </div>
    </div> --}}

    <!--footer social-->

    <div class="footer-social">
      <div class="row">
        <div class="col-sm-12 text-center hidden">
          <a href="" class="footer-logo"><img src="{{asset("colina/assets/images/logo.png")}}" alt="Alternate Text" /></a>
        </div>
        <div class="col-sm-12 icons">
          {{-- <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul> --}}
        </div>
        <div class="col-sm-12 copyright">
          <small>Copyright &copy; 2018 &nbsp; | &nbsp; NextBeux</small>
        </div>
        <div class="col-sm-12 text-center">
          <img src="assets/images/logo-footer.png" alt="" />
        </div>
      </div>
    </div>
  </div>
</footer>

</div> <!--/wrapper-->

<!--JS files-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset("colina/js/jquery.min.js")}}"></script>
<script src="{{asset("colina/js/jquery-ui.js")}}"></script>
<script src="{{asset("colina/js/jquery.bootstrap.js")}}"></script>
<script src="{{asset("colina/js/jquery.magnific-popup.js")}}"></script>
<script src="{{asset("colina/js/jquery.owl.carousel.js")}}"></script>
<script src="{{asset("colina/js/main.js")}}"></script>
<!-- jQuery -->
<!-- Bootstrap -->
<script src="{{asset("portal/vendors/bootstrap/dist/js/bootstrap.min.js")}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset("portal/build/js/custom.min.js")}}"></script>

<!-- Datatables -->
<script src="{{asset("portal/vendors/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("portal/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js")}}"></script>
 {{-- <script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.flash.min.js")}}"></script>
 --}}<script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")}}"></script>
 <script src="{{asset("portal/vendors/datatables.net-scroller/js/dataTables.scroller.min.js")}}"></script>
 <!-- Include this after the sweet alert js file -->
 @include('sweet::alert')
 @stack('scripts')