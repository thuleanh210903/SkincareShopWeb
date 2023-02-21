<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách danh mục sản phẩm | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('admin.layouts.lib')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  @include('admin.layouts.navigation')
    <main class="app-content">
      <!-- <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item">Quản lý nội bộ</li>
          <li class="breadcrumb-item"><a href="#">Tạo mới</a></li>
        </ul>
      </div> -->
      @if ($errors->any())
  <div>
      @foreach ($errors->all() as $error)
          <h3 style="color: red;">
           {{ $error }}
      </h3>
      @endforeach
  </div>
     
 @endif
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Tạo mới danh mục sản phẩm</h3>
            <div class="tile-body">
              
              <form class="row" method="post" action="{{URL::to('/save-category-product')}}">
                {{ csrf_field() }}
                <div class="form-group col-md-4">
                  <label class="control-label">Tên danh mục</label>
                  <input class="form-control" type="text" name="name_category_product">
                </div>
                <!-- <div class="form-group col-md-4">
                  <label class="control-label">Mô tả</label>
                  <input class="form-controll" type="text" name="MoTa" >
                </div> -->
                <!-- <div class="form-group col-md-4">
                  <select name="HienThi">
                    <option>Ẩn</option>
                    <option>Hiện</option>
                  </select>
                </div> -->
                <!-- <div class="form-group col-md-4">
                        <label for="exampleSelect1" class="control-label">Chức vụ</label>
                        <select class="form-control" id="exampleSelect1">
                          <option>-- Chọn chức vụ --</option>
                          <option>Bán hàng</option>
                          <option>Tư vấn</option>
                          <option>Dịch vụ</option>
                          <option>Thu Ngân</option>
                          <option>Quản kho</option>
                          <option>Bảo trì</option>
                          <option>Kiểm hàng</option>
                          <option>Bảo vệ</option>
                          <option>Tạp vụ</option>
                        </select>
                      </div> -->
                      <!-- <div class="form-group col-md-4">
                            <label class="control-label">Nhập lý do</label>
                            <textarea class="form-control" rows="4"></textarea>
                          </div> -->
                  <div class="form-group col-md-4">
                      <label for="exampleSelect1" class="control-label">Tình trạng</label>
                      <select class="form-control" id="exampleSelect1" name="show">
                        <option>-- Ẩn/ Hiện --</option>
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                      </select>
                    </div> 
                  
            <div class="tile-footer">
            </div>
          </div>
          <button class="btn btn-save" type="submit" name="add_category_product">Lưu lại</button>
          <a class="btn btn-cancel" href="/doc/table-data-banned.html">Hủy bỏ</a>
        </div>
</form>
    </main>

 <!--
  MODAL
-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">

    <div class="modal-body">
      <div class="row">
        <div class="form-group  col-md-12">
          <span class="thong-tin-thanh-toan">
            <h5>Tạo trình trạng mới</h5>
          </span>
        </div>
        <div class="form-group col-md-12">
          <label class="control-label">Nhập tình trạng</label>
          <input class="form-control" type="text" required>
        </div>
      </div>
      <BR>
      <button class="btn btn-save" type="button">Lưu lại</button>
      <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
      <BR>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
<!--
MODAL
-->



</body>

</html>