<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {
            "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
<style>
    label.error {
        display: inline-block;
        color:red;
        width: 200px;
    }

</style>
<!--end::Web font -->

<!--begin::Page Vendors Styles -->
<link href="{{asset('admin/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />



<!--end::Page Vendors Styles -->

<!--begin::Base Styles -->
<link href="{{asset('admin/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

<!--RTL version:<link href="{{asset('admin/assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
<link href="{{asset('admin/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

<!--RTL version:<link href="{{asset('admin/assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->

<!--end::Base Styles -->
<link rel="shortcut icon" href="{{asset('admin/assets/demo/default/media/img/logo/favicon.ico')}}" />
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-37564768-1', 'auto');
    ga('send', 'pageview');
</script>
