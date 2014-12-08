<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>[Demo] Tìm Kiếm Dữ Liệu Với PHP Kết Hợp Ajax jQuery - 2CwebVN</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="2cwebvn" />
    <link href="../favicon.png" rel="icon" type="image/x-icon" >
    <link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.watermark.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#faq_search_input").watermark("Nhập Từ Cần Tìm Kiếm");	// Watermart cho khung nhập
            $("#faq_search_input").keyup(function()
            {
                var faq_search_input = $(this).val();   		// Lấy giá trị search của người dùng
                var dataString = 'keyword='+ faq_search_input;	// Lấy giá trị làm tham số đầu vào cho file ajax-search.php
                if(faq_search_input.length < 2)
                {
                    $('#searchresultdata').hide();
                    $('span#faq_category_title').html(faq_search_input);
                }
                if(faq_search_input.length>=2)					// Kiểm tra giá trị người nhập có > 3 ký tự hay ko
                {
                    $.ajax({
                        type: "GET",      						// Phương thức gọi là GET
                        url: "ajax-search.php",  				// File xử lý
                        data: dataString,						// Dữ liệu truyền vào
                        beforeSend:  function() {				// add class "loading" cho khung nhập
                            $('input#faq_search_input').addClass('loading');
                        },
                        success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
                        {
                            $('#searchresultdata').html(server_response).show();  	// Hiển thị dữ liệu vào thẻ div #searchresultdata
                            $('span#faq_category_title').html(faq_search_input);	// Hiển thị giá trị search của người dùng

                            if ($('input#faq_search_input').hasClass("loading")) {		// Kiểm tra class "loading"
                                $("input#faq_search_input").removeClass("loading");		// Remove class "loading"
                            }
                        }
                    });
                }
                return false;		// Không chuyển trang
            });
        });
    </script>

</head>
<body class="faq">
<div class="container" id="content"><!-- END #content   -->

    <center><h3><strong>Tìm Kiếm Sản Phẩm Được Bảo Hành</h3></strong></center>
    <p class="back"><a href="login.php" target="_blank"><strong>Quản trị hệ thống</strong></a> </p><br/>
    <p class="goiy col-lg-8 col-lg-offset-2">Gợi Ý: Tìm với từ khóa bằng số điện thoại hoặc tên của quý khách</p><br/>
    <div class="rows">
        <div id="prod-content" class="col-lg-8 col-lg-offset-2"><!-- #prod-content   -->
            <div class="prod-subsubhead">
                <h5 id="faq_title"> <strong>Tìm Kiếm Với Từ Khóa : </strong> <span id="faq_category_title">Keyword </span> </h5>
            </div>

            <div class="prod-subcontent">
                <div class="faqsearch">
                    <div class="faqsearchinputbox">
                        <!-- Khung Search  -->
                        <input  name="query" type="text" id="faq_search_input"/>
                        <!-- END Khung Search   -->
                    </div>
                </div>
                <div id="searchresultdata" class="faq-articles"> </div>
            </div>
        </div><!-- END #prod-content   -->
    </div>

</div><!-- END #content   -->
</body>
</html>