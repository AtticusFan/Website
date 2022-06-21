    <button class="scrollToTop" id="myBtn"><i class="fa fa-angle-double-up" style="font-size:32px"><b></b></i></button>
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollToTop').fadeIn();
                } else {
                    $('.scrollToTop').fadeOut();
                }
            });
            $('.scrollToTop').click(function () {
                $('html, body').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });

        });
    </script>