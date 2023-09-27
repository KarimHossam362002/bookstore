@extends('layout')
@section('title', 'Books | Contact')
@section('content')
    <main>
        <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
            <div class="page-top__overlay"></div>
            <div class="position-relative">
                <div class="page-top__title mb-3">
                    <h2>تواصل معنا</h2>
                </div>
                <div class="page-top__breadcrumb">
                    <a class="text-gray" href="{{ route('home.index') }}">الرئيسية</a> /
                    <span class="text-gray">تواصل معنا</span>
                </div>
            </div>
        </section>

        <section class="section-container py-5">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">اتصل بنا</h6>
                            <p class="contact__item-text m-0">01063888667</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">راسلنا علي الايميل</h6>
                            <p class="contact__item-text m-0">eraasoft@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">العنوان</h6>
                            <p class="contact__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="contact__item h-100 d-flex align-items-center gap-2">
                        <div class="contact__icon">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <div>
                            <h6 class="contact__item-title m-0">دعم متواصل</h6>
                            <p class="contact__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-container contact d-md-flex align-items-center mb-3">
            <div class="contact__side w-50">
                <h4 class="mb-3">يسعدنا تواصلك معنا في أى وقت</h4>
                <p>إذا كنت تواجه أي مشكلة أو ترغب في إسترجاع أو إستبدال المنتج لا تتردد أبدأ بالتواصل معنا في أي وقت. كل
                    ماعليك هو ملئ النموذج التالي ببيانات صحيحة وسنقوم بمراجعة طلبك في أسرع وقت.</p>
                    {{-- Form start --}}
                <form class="contact__form" action="{{ route('contactmessage.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                    <div class="d-flex gap-3 mb-3">

                        {{-- name --}}
                        <div class="w-50">
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="name">الاسم<span class="required">*</span></label>
                            <input class="contact__input" name="name" id="name" type="text">
                        </div>
                        {{-- phone --}}
                        <div class="w-50">
                            @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="phone">رقم الهاتف<span class="required">*</span></label>
                            <input class="contact__input" id="phone" name="phone" type="text">
                        </div>
                    </div>
                    {{-- email --}}
                    <div class="mb-3">
                        @error('email')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="email">البريد الالكتروني<span class="required">*</span></label>
                        <input class="contact__input" id="email" name="email" type="text">
                    </div>
                    {{-- subject --}}
                    <div class="mb-3">
                        @error('subject')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="reason">سبب التواصل<span class="required">*</span></label>
                        <select class="contact__input" id="reason" name="subject">
                            <option value="">- اضغط هنا لاختيرا السبب -</option>
                            <option value="استفسار">استفسار</option>
                            <option value="استبدال">استبدال</option>
                            <option value="استرجاع">استرجاع</option>
                            <option value="استعجال اوردر">استعجال اوردر</option>
                            <option value="اخري">اخري</option>
                        </select>
                    </div>
                    {{-- content --}}
                    <div>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="reason">نص الرسالة<span class="required">*</span></label>
                        <textarea class="contact__input" name="content" id=""></textarea>
                    </div>
                    <button type="submit" class="primary-button w-100 rounded-2">ارسال الطلب</button>
                </form>
            </div>
            <div class="contact__side w-50 text-center">
                <img class="w-100" src="{{ asset('assets/images/contact-1.png') }}" alt="">
            </div>
        </section>

        <div class="section-container my-5 px-4">
            <div class="contact__map"></div>
        </div>
    </main>
@endsection
