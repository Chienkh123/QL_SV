

function showProductItems(){  
    $.ajax({
        url:"./adminView/viewAllProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCategory(){  
    $.ajax({
        url:"./adminView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showSizes(){  
    $.ajax({
        url:"./adminView/viewSizes.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showProductSizes(){  
    $.ajax({
        url:"./adminView/viewProductSizes.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCustomers(){
    $.ajax({
        url:"./adminView/viewCustomers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./adminView/viewAllOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showStudents(){
    $.ajax({
        url:"./adminView/viewAllStudents.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id){
    $.ajax({
       url:"./controller/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

function ChangePay(id){
    $.ajax({
       url:"./controller/updatePayStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Payment Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}


//add product data
function addItems(){
    var p_name=$('#p_name').val();
    var p_desc=$('#p_desc').val();
    var p_price=$('#p_price').val();
    var category=$('#category').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    var fd = new FormData();
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url:"./controller/addItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

//edit product data
function itemEditForm(id){
    $.ajax({
        url:"./adminView/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function edit_student(id){
    $.ajax({
        url:"./adminView/editStudentForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update product after submit
function updateItems(){
    var product_id = $('#product_id').val();
    var p_name = $('#p_name').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'./controller/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
        $('form').trigger('reset');
        showProductItems();
      }
    });
}

//delete product data
function itemDelete(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"./controller/deleteItemController.php",
                method:"post",
                data:{record:id},
                success:function(data){
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                      });
                    $('form').trigger('reset');
                    showProductItems();
                }
            });
        }
      });
}
//edit student data
function Delete_student(id) {
  Swal.fire({
    title: "Xóa",
    text: "Bạn có muốn xóa không!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "OK",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "./controller/deleteStudentController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
          Swal.fire({
            title: "Xóa!",
            text: "Xóa thành công.",
            icon: "success",
          });
          $("form").trigger("reset");
          showStudents();
        },
      });
    }
  });
}

function Delete_user(id) {
    Swal.fire({
      title: "Xóa",
      text: "Bạn có muốn xóa không!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "OK",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "./controller/deleteUserController.php",
          method: "post",
          data: { record: id },
          success: function (data) {
            Swal.fire({
              title: "Xóa!",
              text: "Xóa thành công.",
              icon: "success",
            });
            $("form").trigger("reset");
            showCustomers();
          },
        });
      }
    });
  }
  


//delete cart data
function cartDelete(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"./controller/deleteCartController.php",
                method:"post",
                data:{record:id},
                success:function(data){
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                      });
                    $('form').trigger('reset');
                    showMyCart();
                }
            });
        }
      });
}

function eachDetailsForm(id){
    $.ajax({
        url:"./view/viewEachDetails.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"./controller/catDeleteController.php",
                method:"post",
                data:{record:id},
                success:function(data){
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                      });
                    $('form').trigger('reset');
                    showCategory();
                }
            });
          
        }
      });

   
}

//delete size data
function sizeDelete(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"./controller/deleteSizeController.php",
                method:"post",
                data:{record:id},
                success:function(data){
                    Swal.fire({
                        title: "Xóa thành công",
                        icon: "success"
                      });
                    $('form').trigger('reset');
                    showSizes();
                }
            });
        }
      });

   
}


//delete variation data
function variationDelete(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"./controller/deleteVariationController.php",
                method:"post",
                data:{record:id},
                success:function(data){
                    Swal.fire({
                        title: "Xóa thành công",
                        icon: "success"
                      });
                    $('form').trigger('reset');
                    showProductSizes();
                }
            });
          
        }
      });

   
}

//edit variation data
function variationEditForm(id){
    $.ajax({
        url:"./adminView/editVariationForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update variation after submit
function updateVariations(){
    var v_id = $('#v_id').val();
    var product = $('#product').val();
    var size = $('#size').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('product', product);
    fd.append('size', size);
    fd.append('qty', qty);
   
    $.ajax({
      url:'./controller/updateVariationController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showProductSizes();
      }
    });
}

//update student

function update_Student(){
    var id = $('#id').val();
    var masv = $('#masv').val();
    var hoten = $('#hoten').val();
    var lop = $('#lop').val();
    var email = $('#email').val();
    var ngaysinh = $('#ngaysinh').val();
    var sdt = $('#sdt').val();
    var gioitinh = $('.gioitinh').val();
    var fd = new FormData();
    fd.append('id', id);
    fd.append('masv', masv);
    fd.append('hoten', hoten);
    fd.append('lop', lop);
    fd.append('email', email);
    fd.append('ngaysinh', ngaysinh);
    fd.append('sdt', sdt);
    fd.append('gioitinh', gioitinh);
   
    $.ajax({
        url:'./controller/updateStudentController.php',
        method:'post',
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
          alert('Update Success.');
          $('form').trigger('reset');
          showStudents();
        }
      });
}
function search(id){
    $.ajax({
        url:"./controller/searchController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            // Clear the existing HTML content
            $('.eachCategoryProducts').html('');

            if (data === "No matching students found.") {
                // Handle case when no matching students are found
                $('.eachCategoryProducts').html('<p>No matching students found.</p>');
            } else {
                // Parse the returned HTML content and append it to the container
                $('.eachCategoryProducts').append($(data));
            }
        }
    });
}


function quantityPlus(id){ 
    $.ajax({
        url:"./controller/addQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}
function quantityMinus(id){
    $.ajax({
        url:"./controller/subQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function checkout(){
    $.ajax({
        url:"./view/viewCheckout.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function removeFromWish(id){
    $.ajax({
        url:"./controller/removeFromWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Removed from wishlist');
        }
    });
}


function addToWish(id){
    $.ajax({
        url:"./controller/addToWishlist.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Added to wishlist');        
        }
    });
}