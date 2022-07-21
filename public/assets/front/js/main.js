/**
 * DXB Charity Website
 * Version: 1.1
 * Powerd by: DXB Charity
 * Developer: Mohammad Ayash
 * Copyrights 2022
 */
$(document).ready(function () {
  function readFileURL(input, output) {
    output.html("");
    for (let index = 0; index < input[0].files.length; index++) {
        if (input[0].files[index]) {
            var f = input[0].files[index];
            output.append('<div class="fileItem d-flex align-items-center p-2 def-border grey-bg mt-2"><div class="ps-2 fti"> <i class="fas fa-image not p-0 ms-0 me-2"></i> <span>' + f.name + '</span></div> </div> ');
        }
    }
//<div class="fdel" data-id="'+f.name+'" data-parent="#upload-area"><i class="fas fa-times not p-0 m-0"></i></div>
  }
  $(document).on("click", ".fileItem .fdel", function () {
    var inp = $(this).attr("data-parent");
   // var v = $(this).attr("data-id");
    fl = $(inp).find("input[type=file]");
   // var names = [];
    //for (var i = 0; i < fl.get(0).files.length; ++i) {
      //  if(fl.get(0).files[i].name == v){
      //      fl.get(0).files.splice(i, 1);
      //  }else{
      //      names.push(fl.get(0).files[i].name);
      //  }
   // }
    //console.log(names);
    //fl.val("");
    $(this).parents(".fileItem").remove();
  })
  function responsiveSquareFunc() {
    $(".square-responsive").each(function () {
      var w = $(this).width();
      $(this).height(w);
    });
  }
  let tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl, {
      container: "body",
    });
  });

  $('.items-view').on('click', function () {
    var tx = $(this).attr("data-view");
    var t = $("[data-" + tx + "]");
    t.each(function () {
      var tData = $(this).attr("data-" + tx + "");
      $(this).attr('class', tData);
      if ($(this).is(".square-responsive")) {
        $(this).change();
      }
    });
    $(".items-view").removeClass('main-text')
    $(this).addClass('main-text');
  })

  $('.open-menu').on('click', function () {
    var t = $(this).attr('data-target');
    $(t).toggleClass('show');
    $(this).toggleClass('show');
  });
  $('.close-menu-icon , .top-menu a').on('click', function () {
    $(this).parents('.top-menu').removeClass('show');
    $('.open-menu').removeClass("show");
  });
  $('.close-view-butn').click(function () {
    $(this).parents('.popup').fadeOut(500);
    $(this).parents('.popup').find("video ,iframe").remove();
    $(this).parents('.popup').find("img").removeAttr('src');
  });
  if ($(".select2")) {
    $(".select2").each(function () {
      $(this).select2();
    });

  }

  var fls = $('.files'),
    frm = $('.upload-area'),
    frmInp = $('.upload-area input[type=file]'),
    validFs = ['image/gif', 'image/jpeg', 'image/png', 'image/svg',
      'pplication/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/msword'];

  frmInp.on('dragover dragenter', function () {
    frm.addClass('is_dragging');
  })
    .on('dragleave dragend drop', function () {
      frm.removeClass('is_dragging');
    })
    .on('change', function () {
      var fs = $(this).prop('files');
      for (var f = 0; f < fs.length; f++) {
        //validate files
        var tp = fs[f]['type'];
        if (validFs.includes(tp)) {
          frm.removeClass('is_invalid');
          readFileURL($(this), fls);

        } else {
          frm.addClass('is_invalid');
        }

      }
    }
    );
  if ($(".zoomImage")) {
    $(".zoomImage").lightGallery();
  }
  responsiveSquareFunc();
  $(document).on("change", ".square-responsive", function () {
    responsiveSquareFunc();
  });
  $(window).on("resize", function () {
    responsiveSquareFunc();
  });
});
