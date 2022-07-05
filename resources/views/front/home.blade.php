@extends('front.index')

@section('content')
    
    <section class="main-header pos-relative" id="mainHeader">
      <div class="container-fluid p-0 bg-fx-img cover" style="background-image:url('imgs/headers/main.jpg')">
        <div class="container pos-relative zi-3 pt-150 pb-150">
          <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
              <h1 class="white-text f-w-700 f-huge text-center main-title">شيء صغير يجعل العالم أفضل</h1>
            </div>
          </div>
          <div class="row p-lg-0 ps-3 pe-3">
            <div class="search-wrapper mt-5">
              <form class="w-100 row ms-0 me-0 align-items-center" method="post">
                <div class="col-lg-5 col-10 search-input">
                  <div class="form-group w-100">
                    <input class="form-control w-100" type="search" placeholder="ابحث عن غرض...."><img src="imgs/icons/search.png">
                  </div>
                </div>
                <div class="col-lg-2 col-12">
                  <select class="select2 merge-select">
                    <option>  كل الأقسام              </option>
                    <option>  ملابس             </option>
                    <option>  ادوات منزلية             </option>
                    <option>  العاب             </option>
                    <option>  اثاث             </option>
                  </select>
                </div>
                <div class="col-lg-2 col-12">
                  <select class="select2 merge-select">
                    <option>  البلد              </option>
                    <option>  السعودية             </option>
                    <option>  مصر             </option>
                    <option>  سوريا  </option>
                  </select>
                </div>
                <div class="col-lg-2 col-12">
                  <select class="select2 merge-select">
                    <option>  المدينة              </option>
                    <option>  جازان             </option>
                    <option>  الرياض             </option>
                    <option>  جدة  </option>
                  </select>
                </div>
                <div class="col-lg-1 col-12 search-button text-lg-end">
                  <button class="not" type="submit"><span class="d-lg-none d-inline-block">ابحث  </span><span class="d-lg-inline-block d-none"><i class="fas fa-arrow-right"></i></span></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="main-items pos-relative pt-5 pb-5" id="mainItems">
      <div class="container pos-relative zi-3">
        <div class="row align-items-lg-center">
          <div class="col-lg-6 col-12">
            <div class="main-heading">
              <h2 class="f-extramedium f-w-700"><span class="d-inline-block me-3 main-text"> <i class="fas fa-th-large">                                       </i></span><span class="d-inline-block">الأغراض المتاحة   </span></h2>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="row ms-0 me-0 filters">
              <div class="col-xl-4 col-lg-4 offset-xl-1 offset-lg-1 col-12 mb-lg-0 mb-3">
                <label class="mb-2 f-w-500 f-normal">الأقسام</label>
                <select class="select2 grey-select">
                  <option>  كل الأقسام              </option>
                  <option>  ملابس             </option>
                  <option>  ادوات منزلية             </option>
                  <option>  العاب              </option>
                  <option>  اثاث                 </option>
                </select>
              </div>
              <div class="col-xl-4 col-lg-4 col-12 mb-lg-0 mb-3">
                <label class="mb-2 f-w-500 f-normal">عرض في الصفحة</label>
                <select class="select2 grey-select">
                  <option>  10             </option>
                  <option>  20            </option>
                  <option>  30                 </option>
                </select>
              </div>
              <div class="col-xl-3 col-lg-3 col-12 mb-lg-0 mb-3 text-lg-end">
                <label class="mb-2 f-w-500 f-normal text-lg-start">طريقة العرض</label>
                <div class="w-100 view-buttons"> <span class="d-inline-block f-extramedium main-text font-text me-3 mouse red-hover items-view" data-view="cols-view"><i class="fas fa-th"></i></span><span class="d-inline-block f-extramedium font-text mouse red-hover items-view" data-view="rows-view"><i class="fas fa-list"></i></span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4 col-md-6 col-12 item" data-cols-view="col-lg-4 col-md-6 col-12 item" data-rows-view="col-12 item">
            <div class="wrapper w-100 row ms-0 me-0"><a class="img over-hidden col-12 m-0 p-0 square-responsive" href="item.html" data-cols-view="col-12 m-0 p-0 over-hidden square-responsive img" data-rows-view="col-xl-2 col-lg-3 col-md-4 col-12 over-hidden square-responsive img"><img class="w-100 trans" src="imgs/items/1.jpg" alt="عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل"></a>
              <div class="col-12 m-0 p-0 cont" data-cols-view="col-12 m-0 p-0 cont" data-rows-view="col-xl-10 col-lg-9 col-md-6 col-12 cont">
                <div class="w-100 cont-wrapper p-3 def-border" data-cols-view="w-100 cont-wrapper p-3 def-border" data-rows-view="w-100 cont-wrapper p-3"><a class="d-block item-title f-medium f-w-500 black-text main-hover trans" href="item.html">
                     عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل                           </a>
                  <div class="item-country f-normal mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-map-marker-alt"></i></span><span class="dis-inline-block">
                       جازان - السعودية  </span></div>
                  <div class="item-actions row ms-0 me-0 align-items-lg-center mt-3">
                    <div class="col-md-8 col-12 action-buttons p-0"><a class="butn black-butn circle-butn phone" href="tel:0123456789" data-bs-toggle="tooltip" title="اضغط للاتصال"> <i class="fas fa-phone"></i></a><a class="butn black-butn circle-butn bordered ms-3 email" href="mailto:info@dxb-charity.com" data-bs-toggle="tooltip" title="اضغط لارسال رسالة"> <i class="fas fa-envelope"></i></a></div>
                    <div class="col-md-4 col-12 text-lg-end p-0">
                      <div class="item-country f-normal mt-lg-0 mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-tag"></i></span><span class="dis-inline-block">ملابس</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 item" data-cols-view="col-lg-4 col-md-6 col-12 item" data-rows-view="col-12 item">
            <div class="wrapper w-100 row ms-0 me-0"><a class="img over-hidden col-12 m-0 p-0 square-responsive" href="item.html" data-cols-view="col-12 m-0 p-0 over-hidden square-responsive img" data-rows-view="col-xl-2 col-lg-3 col-md-4 col-12 over-hidden square-responsive img"><img class="w-100 trans" src="imgs/items/2.jpg" alt="عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل"></a>
              <div class="col-12 m-0 p-0 cont" data-cols-view="col-12 m-0 p-0 cont" data-rows-view="col-xl-10 col-lg-9 col-md-6 col-12 cont">
                <div class="w-100 cont-wrapper p-3 def-border" data-cols-view="w-100 cont-wrapper p-3 def-border" data-rows-view="w-100 cont-wrapper p-3"><a class="d-block item-title f-medium f-w-500 black-text main-hover trans" href="item.html">
                     عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل                           </a>
                  <div class="item-country f-normal mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-map-marker-alt"></i></span><span class="dis-inline-block">
                       جازان - السعودية  </span></div>
                  <div class="item-actions row ms-0 me-0 align-items-lg-center mt-3">
                    <div class="col-md-8 col-12 action-buttons p-0"><a class="butn black-butn circle-butn phone" href="tel:0123456789" data-bs-toggle="tooltip" title="اضغط للاتصال"> <i class="fas fa-phone"></i></a><a class="butn black-butn circle-butn bordered ms-3 email" href="mailto:info@dxb-charity.com" data-bs-toggle="tooltip" title="اضغط لارسال رسالة"> <i class="fas fa-envelope"></i></a></div>
                    <div class="col-md-4 col-12 text-lg-end p-0">
                      <div class="item-country f-normal mt-lg-0 mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-tag"></i></span><span class="dis-inline-block">العاب</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 item" data-cols-view="col-lg-4 col-md-6 col-12 item" data-rows-view="col-12 item">
            <div class="wrapper w-100 row ms-0 me-0"><a class="img over-hidden col-12 m-0 p-0 square-responsive" href="item.html" data-cols-view="col-12 m-0 p-0 over-hidden square-responsive img" data-rows-view="col-xl-2 col-lg-3 col-md-4 col-12 over-hidden square-responsive img"><img class="w-100 trans" src="imgs/items/3.jpg" alt="عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل"></a>
              <div class="col-12 m-0 p-0 cont" data-cols-view="col-12 m-0 p-0 cont" data-rows-view="col-xl-10 col-lg-9 col-md-6 col-12 cont">
                <div class="w-100 cont-wrapper p-3 def-border" data-cols-view="w-100 cont-wrapper p-3 def-border" data-rows-view="w-100 cont-wrapper p-3"><a class="d-block item-title f-medium f-w-500 black-text main-hover trans" href="item.html">
                     عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل                           </a>
                  <div class="item-country f-normal mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-map-marker-alt"></i></span><span class="dis-inline-block">
                       جازان - السعودية  </span></div>
                  <div class="item-actions row ms-0 me-0 align-items-lg-center mt-3">
                    <div class="col-md-8 col-12 action-buttons p-0"><a class="butn black-butn circle-butn phone" href="tel:0123456789" data-bs-toggle="tooltip" title="اضغط للاتصال"> <i class="fas fa-phone"></i></a><a class="butn black-butn circle-butn bordered ms-3 email" href="mailto:info@dxb-charity.com" data-bs-toggle="tooltip" title="اضغط لارسال رسالة"> <i class="fas fa-envelope"></i></a></div>
                    <div class="col-md-4 col-12 text-lg-end p-0">
                      <div class="item-country f-normal mt-lg-0 mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-tag"></i></span><span class="dis-inline-block">اثاث</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 item" data-cols-view="col-lg-4 col-md-6 col-12 item" data-rows-view="col-12 item">
            <div class="wrapper w-100 row ms-0 me-0"><a class="img over-hidden col-12 m-0 p-0 square-responsive" href="item.html" data-cols-view="col-12 m-0 p-0 over-hidden square-responsive img" data-rows-view="col-xl-2 col-lg-3 col-md-4 col-12 over-hidden square-responsive img"><img class="w-100 trans" src="imgs/items/1.jpg" alt="عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل"></a>
              <div class="col-12 m-0 p-0 cont" data-cols-view="col-12 m-0 p-0 cont" data-rows-view="col-xl-10 col-lg-9 col-md-6 col-12 cont">
                <div class="w-100 cont-wrapper p-3 def-border" data-cols-view="w-100 cont-wrapper p-3 def-border" data-rows-view="w-100 cont-wrapper p-3"><a class="d-block item-title f-medium f-w-500 black-text main-hover trans" href="item.html">
                     عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل                           </a>
                  <div class="item-country f-normal mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-map-marker-alt"></i></span><span class="dis-inline-block">
                       جازان - السعودية  </span></div>
                  <div class="item-actions row ms-0 me-0 align-items-lg-center mt-3">
                    <div class="col-md-8 col-12 action-buttons p-0"><a class="butn black-butn circle-butn phone" href="tel:0123456789" data-bs-toggle="tooltip" title="اضغط للاتصال"> <i class="fas fa-phone"></i></a><a class="butn black-butn circle-butn bordered ms-3 email" href="mailto:info@dxb-charity.com" data-bs-toggle="tooltip" title="اضغط لارسال رسالة"> <i class="fas fa-envelope"></i></a></div>
                    <div class="col-md-4 col-12 text-lg-end p-0">
                      <div class="item-country f-normal mt-lg-0 mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-tag"></i></span><span class="dis-inline-block">ملابس</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 item" data-cols-view="col-lg-4 col-md-6 col-12 item" data-rows-view="col-12 item">
            <div class="wrapper w-100 row ms-0 me-0"><a class="img over-hidden col-12 m-0 p-0 square-responsive" href="item.html" data-cols-view="col-12 m-0 p-0 over-hidden square-responsive img" data-rows-view="col-xl-2 col-lg-3 col-md-4 col-12 over-hidden square-responsive img"><img class="w-100 trans" src="imgs/items/2.jpg" alt="عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل"></a>
              <div class="col-12 m-0 p-0 cont" data-cols-view="col-12 m-0 p-0 cont" data-rows-view="col-xl-10 col-lg-9 col-md-6 col-12 cont">
                <div class="w-100 cont-wrapper p-3 def-border" data-cols-view="w-100 cont-wrapper p-3 def-border" data-rows-view="w-100 cont-wrapper p-3"><a class="d-block item-title f-medium f-w-500 black-text main-hover trans" href="item.html">
                     عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل                           </a>
                  <div class="item-country f-normal mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-map-marker-alt"></i></span><span class="dis-inline-block">
                       جازان - السعودية  </span></div>
                  <div class="item-actions row ms-0 me-0 align-items-lg-center mt-3">
                    <div class="col-md-8 col-12 action-buttons p-0"><a class="butn black-butn circle-butn phone" href="tel:0123456789" data-bs-toggle="tooltip" title="اضغط للاتصال"> <i class="fas fa-phone"></i></a><a class="butn black-butn circle-butn bordered ms-3 email" href="mailto:info@dxb-charity.com" data-bs-toggle="tooltip" title="اضغط لارسال رسالة"> <i class="fas fa-envelope"></i></a></div>
                    <div class="col-md-4 col-12 text-lg-end p-0">
                      <div class="item-country f-normal mt-lg-0 mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-tag"></i></span><span class="dis-inline-block">العاب</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12 item" data-cols-view="col-lg-4 col-md-6 col-12 item" data-rows-view="col-12 item">
            <div class="wrapper w-100 row ms-0 me-0"><a class="img over-hidden col-12 m-0 p-0 square-responsive" href="item.html" data-cols-view="col-12 m-0 p-0 over-hidden square-responsive img" data-rows-view="col-xl-2 col-lg-3 col-md-4 col-12 over-hidden square-responsive img"><img class="w-100 trans" src="imgs/items/3.jpg" alt="عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل"></a>
              <div class="col-12 m-0 p-0 cont" data-cols-view="col-12 m-0 p-0 cont" data-rows-view="col-xl-10 col-lg-9 col-md-6 col-12 cont">
                <div class="w-100 cont-wrapper p-3 def-border" data-cols-view="w-100 cont-wrapper p-3 def-border" data-rows-view="w-100 cont-wrapper p-3"><a class="d-block item-title f-medium f-w-500 black-text main-hover trans" href="item.html">
                     عنوان الغرض يكتب هنا بالكامل عنوان الغرض يكتب هنا بالكامل                           </a>
                  <div class="item-country f-normal mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-map-marker-alt"></i></span><span class="dis-inline-block">
                       جازان - السعودية  </span></div>
                  <div class="item-actions row ms-0 me-0 align-items-lg-center mt-3">
                    <div class="col-md-8 col-12 action-buttons p-0"><a class="butn black-butn circle-butn phone" href="tel:0123456789" data-bs-toggle="tooltip" title="اضغط للاتصال"> <i class="fas fa-phone"></i></a><a class="butn black-butn circle-butn bordered ms-3 email" href="mailto:info@dxb-charity.com" data-bs-toggle="tooltip" title="اضغط لارسال رسالة"> <i class="fas fa-envelope"></i></a></div>
                    <div class="col-md-4 col-12 text-lg-end p-0">
                      <div class="item-country f-normal mt-lg-0 mt-3 f-w-500"><span class="d-inline-block me-2"> <i class="fas fa-tag"></i></span><span class="dis-inline-block">اثاث</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5 pagination">
          <div class="col-lg-6 col-12 links text-lg-start text-center">
            <div class="w-100 page-wrapper"><a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="#"><i class="fas fa-arrow-left"></i></a><a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="#">1</a><span class="d-inline-block p-3 f-semimedium main-bg white-text f-w-500">2</span><a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="#">3</a><a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="#">4</a><a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="#">5</a><a class="d-inline-block p-3 font-text f-semimedium f-w-500" href="#"><i class="fas fa-arrow-right"></i></a></div>
          </div>
          <div class="col-lg-6 col-12 page-form text-lg-start text-center mt-lg-0 mt-3">
            <div class="form-page-wrapper">
              <form class="d-inline-block float-lg-end text-start" method="get">
                <div class="form-group d-flex align-items-center pos-relative">
                  <div class="text-end me-3"><span>الذهاب للصفحة </span></div>
                  <div class="float-end">
                    <input class="form-control ps-3 pe-5" type="number" placeholder="3">
                    <button type="submit"><i class="not fas fa-arrow-right"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
