<?php
require_once("config/constants.php");
include('templates/header-login.php')
?>
<?php
$id= $_GET['tour_id'];
  $sql= "SELECT * FROM tours, restaurants, hotels, tourguides WHERE tours.hotel_id=hotels.hotel_id AND tours.res_id=restaurants.res_id AND tours.tour_guide_id=tourguides.tour_guide_id AND tour_id= $id;";
  $query= mysqli_query($conn,$sql);
  $row= mysqli_fetch_assoc($query);  
?>
<main role="main">
    <div class="tour-detail">

        <div class="entry-head">

            <section class="section-01">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-md-6 col-12 left">
                            <div class="warp-mark">
                                <i class="fal fa-ticket"></i><label>NDSGN907-029-121121VN-P</label>
                            </div>
                            <h1 class="title"><?php echo $row['tour_name']?></h1>
                            <div class="short-rating">
                                <div class="s-rate">
                                    <span>9.08</span>
                                    <div class="s-comment">
                                        <h4>Tuyệt vời</h4>
                                        <p>379 nhận xét</p>
                                    </div>
                                </div>
                                <div class="s-wishlist">
                                    <i class="fas fa-heart"></i><label>126</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 right">
                            <div class="group-price">
                                <div class="sale-price">
                                    <p><span class="price"><?php echo $row['price_per_person']?></span>/ khách</p>
                                </div>
                                <div class="saving">
                                </div>
                            </div>
                            <div class="group-add-cart">
                                <a href="http://localhost/webDatTour/booking.php?tour_id=<?php echo $row['tour_id'] ?>"
                                    class="add-to-cart">
                                    <i class="fal fa-shopping-cart"></i>
                                    <label>
                                        Đặt ngay
                                    </label>
                                </a>
                                <a href="#" class="add-to-group" data-bs-toggle="modal" data-bs-target="#supportModal">
                                    <label>Liên hệ tư vấn</label>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="section-02">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12 left">
                            <div class="image">
                                <img src=<?php echo $row['image_1']?>
                                    class="img-fluid" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 right">
                            <div class="row gy-4">
                                <div class="col-md-12 col-sm-12 small">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="image">
                                                <img src=<?php echo $row['image_2']?>
                                                    class="img-fluid" alt="image">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="image">
                                                <img src=<?php echo $row['image_3']?>
                                                    class="img-fluid" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 big">
                                    <div class="image">
                                        <img src=<?php echo $row['image_4']?>
                                            class="img-fluid" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <div class="tab-panels">
            <div class="overview active">

                <section class="section-03 mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-12 left">
                                <p class="s-title-03 tour-des"><?php echo $row['description']?></p>
                                <div class="box-code d-lg-none">
                                    <div class="d-flex flex-column">
                                        <span>Mã tour:</span>
                                        <span class="fw-bold">NDSGN907-029-121121VN-P</span>
                                    </div>
                                    <i class="icon icon--ticket"></i>
                                </div>
                                <div class="box-order">
                                    <div class="time">
                                        <p>Khởi hành <b>12/11/2021</b></p>
                                        <p>Thời gian <b><?php echo $row['day_count']?></b></p>
                                        <p>Nơi khởi hành <b>TP. Hồ Chí Minh</b></p>
                                        <p>
                                            Số chỗ còn nhận <b><?php echo $row['max']?></b>
                                        </p>
                                    </div>
                                    <div class="calendar">
                                        <div class="calendar-box">
                                            <i class="icon icon--calendar"></i>
                                            <label><a href="/tim-tour/NDSGN907/ket-qua-tim-kiem.aspx"> Ngày
                                                    khác</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-support">
                                    <label>Quý khách cần hỗ trợ?</label>
                                    <div class="group-contact">
                                        <a href="https://webcall.talking.vn/frame-click-to-call/new?code=tCEZl1-MKPuA6JU-czVAScCb0pPkHmPt"
                                            onclick="javascript:window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=375,height=667');return false;"
                                            target="_blank" class="phone">
                                            <i class="icon icon--phone"></i>
                                            <p>Gọi miễn phí <br>qua internet</p>
                                        </a>
                                        <a href="mailto:info@vietravel.com" class="mail">
                                            <i class="icon icon--mail"></i>
                                            <p>Gửi yêu cầu <br>hỗ trợ ngay</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-12 right">
                                <div class="group-services">
                                    <div class="item">
                                        <i class="icon icon--calendar"></i>
                                        <label>Thời gian</label>
                                        <p><?php echo $row['day_count']?></p>
                                    </div>
                                    <div class="item">
                                        <i class="icon icon--map"></i>
                                        <label>Điểm tham quan</label>
                                        <p><?php echo $row['places']?></p>
                                    </div>
                                    <div class="item">
                                        <i class="icon icon--fire"></i>
                                        <label>Ẩm thực</label>
                                        <p></p>
                                    </div>
                                    <div class="item">
                                        <i class="icon icon--hotel"></i>
                                        <label>Khách sạn</label>
                                        <p><?php echo $row['hotel_name']?> </p>
                                    </div>
                                    <div class="item">
                                        <i class="icon icon--tour"></i>
                                        <label>Phương tiện di chuyển</label>
                                        <p>Máy bay Vietnam Airlines hạng Thương Gia</p>
                                    </div>
                                    <div class="item">
                                        <i class="icon icon--sparkle"></i>
                                        <label>Dịch vụ đi kèm</label>
                                    </div>
                                </div>
                                <div class="box-map hardCode d-none">
                                    <div class="addess">
                                        <i class="icon icon--location-marker"></i>
                                        <label>VinWonder, Đ. Phú Quốc, Việt Nam</label>
                                    </div>
                                    <div class="map">
                                        <i class="icon icon--map"></i>
                                        <label>VinWonder, Đ. Phú Quốc, Việt Nam</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>






            </div>
            <div class="map-route">

                <section class="section-06 mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <h2 class="mb-4">Lịch trình</h2>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section-07 mb-5">
                    <div class="container">
                        <div class="row" style='justify-content: right;'>
                        <?php echo $row['travel_schedule']?>
                        </div>
                    </div>
                </section>


                <section class="section-08 mb-5">
                    <div class="container-xl">
                        <div class="row">
                            <div class="col-md-6 col-12 right">
                                <h2 class="tt mt-3">Thông tin hướng dẫn viên</h2>
                                <div class="table-price">
                                    <div class="more-info more-info-2">
                                        <div class="block">
                                            <span>HDV dẫn đoàn</span>
                                            <div id="divThongTinHDV">
                                                <div class="info" style="width:100%">
                                                    <p><?php echo $row['name']?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <span>HDV tiễn</span>
                                            <div id="divThongTinHDVTien">
                                                <div class="info" style="width:100%">
                                                    <p><?php echo $row['name']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="note-info">


            </div>
            <div class="customer-comments">


            </div>
        </div>
        <div class="related d-none d-lg-block">

            <section class="section-11" id="divTourGoiY">
                <div class="container">
                    <div class="row">
                        <h2>Có thể Quý khách sẽ thích</h2>
                        <div class="products">
                            <div class="product">
                                <div class="product-inner">
                                    <div class="product-image">
                                        <a
                                            href="/tourNDSGN905-029-201121VN-P/nha-trang-trai-nghiem-golf-du-thuyen-ngam-hoang-hon-an-lam-bay-chuong-trinh-nghi-duong-tai-an-lam-retreats-ninh-van-bay-cung-hang-khong-vietnam-airlines-hang-thuong-gia.aspx">
                                            <img src="https://media.travel.com.vn/destination/tf_200724040240_477695.jpg"
                                                alt="image">
                                        </a>
                                        <a href="#" class="wishlist-button"><i class="icon icon--heart"></i></a>
                                        <div class="s-rate">
                                            <span>9.28</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <span class="meta"> 20/11/2021 </span>
                                        <h3 class="product-title">
                                            <a href="/tourNDSGN905-029-201121VN-P/nha-trang-trai-nghiem-golf-du-thuyen-ngam-hoang-hon-an-lam-bay-chuong-trinh-nghi-duong-tai-an-lam-retreats-ninh-van-bay-cung-hang-khong-vietnam-airlines-hang-thuong-gia.aspx"
                                                title="Nha Trang - Trải Nghiệm Golf - Du Thuyền Ngắm Hoàng Hôn An Lâm Bay - Chương trình nghỉ dưỡng tại An Lam Retreats Ninh Van Bay - Cùng hàng không Vietnam Airlines hạng Thương Gia">Nha
                                                Trang - Trải Nghiệm Golf - Du Thuyền Ngắm Hoàng Hôn An Lâm Bay - Chương
                                                trình nghỉ dưỡng tại An Lam Retreats Ninh Van Bay - Cùng hàng không
                                                Vietnam Airlines hạng Thương Gia</a>
                                        </h3>
                                        <p class="des">Nơi khởi hành TP. Hồ Chí Minh</p>
                                        <div class="row">
                                            <div class="btn-book col-5">
                                                <a id="btnDatNgay"
                                                    href="/Booking/TourBooking?tourId=1cca2620-51dc-4388-a82a-d89791eef22f"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="icon icon--shopping p-1"></i><label>Đặt ngay</label>
                                                </a>
                                            </div>
                                            <div class="group-price col-7">
                                                <div class="sale-price">
                                                    <span class="price">23,990,000 ₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <div class="mb-total d-none">
        <div class="total">
            <i class="icon icon--chevron-up"></i>

        </div>
        <div class="group-btn">

            <div class="summary">
                <div class="group-price">
                    <span class="price"> 24,990,000₫</span>
                </div>
                <span class="rating"><i class="icon icon--star"></i> 9.3</span>
            </div>
            <a type="button" href="/Booking/TourBooking?tourId=965c5d09-b690-4307-9bd9-defc52da3968"
                class="btn-order">Tiếp tục</a>
        </div>
    </div>


    <div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form id="form-support" action="/Comment/TuVan" method="post"><input name="__RequestVerificationToken"
                    type="hidden"
                    value="lSRz8uG-Iaj_dt9QH37I1LeHQAuye9noferAuQyC2BMQ9DbARUIYY5vs9v0LsEqjeEkRCEtfvJR12GVfef78h7mE3-GxvdZC2j8-tJa749A1">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">GỬI THÔNG TIN TƯ VẤN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Quý khách vui lòng nhập thông tin bên dưới, Vietravel sẽ liên hệ
                            lại sau ít phút
                        </p>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="form-label">Họ tên<span class="required-star">*</span></label>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Nhập họ tên của Quý khách" value="" name="Fullname" required="">
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Điện thoại<span
                                        class="required-star">*</span></label>
                                <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại"
                                    value="" name="Telephone" required="">
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email<span class="required-star">*</span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                    name="Email" required="">
                            </div>
                            <div class="col-12">
                                <label for="note" class="form-label">
                                    Thông tin cần tư vấn
                                </label>
                                <textarea id="note" rows="3" class="form-control" name="NoiDung"
                                    placeholder="Quý khách cần tư vấn về vấn đề gì" required=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Gửi đi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>

<?php
include('templates/footer.php')
?>