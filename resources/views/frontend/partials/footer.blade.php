<div class="divider20"></div>
<footer class="footer">
    <hr style="margin-bottom: 12px; margin-top: 0px; padding-top: 0px">
    <div class="container">
        <div class="row">
            <p class="text-muted pull-left">COPYRIGHT &copy; 2016 Events</p>
            <p style="display: none">Suitcase graphic by <a href="http://www.freepik.com/">Freepik</a> from <a href="http://www.flaticon.com/">Flaticon</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>. Made with <a href="http://logomakr.com" title="Logo Maker">Logo Maker</a></p>
            <div class="pull-right">
                <ul class="social-network social-circle">
                    <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<script src="/assets/frontend/js/jquery.js"></script>
<script src="/assets/frontend/js/bootstrap.js"></script>
{{--<script src="/assets/frontend/js/bootstrap-datepicker.js"></script>--}}
{{--<script src="/assets/frontend/js/summernote.min.js"></script>--}}
<script type="text/javascript" src="/assets/frontend/js/jssor.slider.mini.js"></script>
{{--<script src="/assets/frontend/js/jquery.confirm.js"></script>--}}
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="/assets/frontend/js/bootstrap-filestyle.js"> </script>
<script>
    toastr.options = {
        "closeButton": true,
        "closeButton": true,
        "positionClass": "toast-bottom-right",
        "progressBar": true,
        "preventDuplicates": true,
    };
</script>
{!! Toastr::render() !!}
@yield('scripts')
</body>
</html>