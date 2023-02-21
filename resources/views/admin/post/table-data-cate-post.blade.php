<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách danh mục sản phẩm | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  @include('admin.layouts.lib')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">


  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="/mananger"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  @include('admin.layouts.navigation')
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách danh mục bài viết</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">

                <a class="btn btn-add btn-sm" href="{{URL::to('/add-category-post')}}" title="Thêm"><i class="fas fa-plus"></i>
                  Tạo mới danh mục bài viết</a>
              </div>
              <div class="col-sm-2">
                <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i> Xóa tất cả </a>
              </div>
            </div>

            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th width="10"><input type="checkbox" id="all"></th>
                  <th>Tên danh mục</th>
                  <th>Ẩn/ Hiện</th>
                  <th>Mô tả</th>
                  <th>Tính năng</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $all_category_post as $cate_po)
                <tr>
                  <td width="10"><input type="checkbox" name="check1" value="1"></td>
                 
                  <td>{{ $cate_po -> cate_post_name  }}</td>
                  <td style="text-align: center;">
                    <?php
                    if($cate_po->cate_post_status==0){
                      echo 'Ẩn';
                    }else{
                      echo 'Hiện';
                    }
                    ?>
                  </td>
                  <td>{{ $cate_po -> cate_post_desc }}</td>
                  <td><a class="btn btn-primary btn-sm trash" type="button" title="Xóa"  href="{{URL::to('/delete-category-post/'.$cate_po->id_cate_post)}}" onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')"><i class="fas fa-trash-alt"></i>
                    </a>
                    <a class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" href="{{URL::to('/edit-category-post/'.$cate_po->id_cate_post)}}"><i class="fas fa-edit"></i></a>
                    <!-- data-toggle="modal" data-target="#ModalUP" -->
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript">
    $('#sampleTable').DataTable();
  </script>
  <script>
    // function deleteRow(r) {
    //   var i = r.parentNode.parentNode.rowIndex;
    //   document.getElementById("myTable").deleteRow(i);
    // }
    // jQuery(function() {
    //   jQuery(".trash").click(function() {
    //     swal({
    //         title: "Cảnh báo",

    //         text: "Bạn có chắc chắn là muốn xóa đơn hàng này?",
    //         buttons: ["Hủy bỏ", "Đồng ý"],
    //       })
    //       .then((willDelete) => {
    //         if (willDelete) {
    //           swal("Đã xóa thành công.!", {

    //           });
    //         }
    //       });
    //   });
    // });
    oTable = $('#sampleTable').dataTable();
    $('#all').click(function(e) {
      $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
      e.stopImmediatePropagation();
    });

    //EXCEL
    // $(document).ready(function () {
    //   $('#').DataTable({

    //     dom: 'Bfrtip',
    //     "buttons": [
    //       'excel'
    //     ]
    //   });
    // });


    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
    //In dữ liệu
    var myApp = new function() {
      this.printTable = function() {
        var tab = document.getElementById('sampleTable');
        var win = window.open('', '', 'height=700,width=700');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();
      }
    }
    //     //Sao chép dữ liệu
    //     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

    // copyTextareaBtn.addEventListener('click', function(event) {
    //   var copyTextarea = document.querySelector('.js-copytextarea');
    //   copyTextarea.focus();
    //   copyTextarea.select();

    //   try {
    //     var successful = document.execCommand('copy');
    //     var msg = successful ? 'successful' : 'unsuccessful';
    //     console.log('Copying text command was ' + msg);
    //   } catch (err) {
    //     console.log('Oops, unable to copy');
    //   }
    // });


    //Modal
    $("#show-emp").on("click", function() {
      $("#ModalUP").modal({
        backdrop: false,
        keyboard: false
      })
    });
  </script>
  <!-- 
  Modal -->
  <!-- <div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa thông tin danh mục sản phẩm</h5>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label class="control-label">ID danh mục </label>
              <input class="form-control" type="number" value="71309005">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Tên danh mục</label>
              <input class="form-control" type="text" required value="" name="TenDanhMuc">
            </div>


            <BR>
            <button class="btn btn-save" type="submit">Lưu lại</button>
            <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
            <BR>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div> -->
</body>

</html>