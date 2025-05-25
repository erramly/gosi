<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المؤسسة العامة للتأمينات الاجتماعية</title>
    <link rel="icon" type="image/png" href="https://cdn.gosi.gov.sa/gptscripts/favicon-48x48.png" sizes="48x48">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        li,
        div {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>

<body>
    <div style="
        position: fixed;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 50px;
        height: 100px;
        background-color: #08001c;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    ">
        <!-- Icon -->
        <img decoding="async" src="/images/Asset-1.png" alt="icon"
            style="width: 18px; height: 18px; margin-bottom: 10px;">
        <!-- Vertical Text -->
        <span style="
            color: white;
            font-size: 14px;
            font-weight: 100;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        ">
            رأي
        </span>
    </div>
    <div style="position: fixed; bottom: 20px; left: 15px; z-index: 999;">
        <!-- Wrapper to position bubble over image -->
        <div style="position: relative; width: 50px; height: 50px;">
            <!-- Speech bubble -->
            <div style="
                position: absolute;
                top: -5px;
                left: 45px;
                background-color: #001f61;
                color: white;
                padding: 9px 14px 9px 14px;
                font-size: 14px;
                border-radius: 20px 0 20px 0;
                white-space: nowrap;
                font-weight: 500;
                line-height: 1;
            ">
                اسأل أمين
            </div>
            <!-- Green circle + image -->
            <div style="
                width: 60px;
                height: 60px;
                background-color: #00bf00;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
            ">
                <img decoding="async" src="/images/AmeenLogo.png" alt="أمين"
                    style="width: 50px; height: 50px; border-radius: 50%;">
            </div>
        </div>
    </div>
    <div
        style="background: linear-gradient(90deg, #007bff, #0063ff); padding: 16px 15px; color: white; font-size: 14px; display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 40px; text-align: center;">

        <!-- Text -->
        <div style="font-size: 12px;font-weight: 500;">
            لتجربة أفضل .. حمل تطبيق gosi الجديد
        </div>

        <!-- Button -->
        <div>
            <a href="https://www.gosi.gov.sa/ar/MobileApp" target="_blank"
                style="background-color: #001f61; color: white; padding: 8px 12px; border-radius: 6px; font-size: 12px; text-decoration: none;">
                حمله الآن
            </a>
        </div>
    </div>
    <div
        style="background-color: #01004e; padding: 10px 15px; display: flex; flex-direction: row; justify-content: space-between; align-items: center;">

        <!-- Logo aligned RIGHT and clickable -->
        <div style="display: flex; align-items: center;">
            <a href="https://www.gosi.gov.sa/ar" target="_blank" style="display: inline-block;">
                <img decoding="async" src="/images/1.png" alt="gosi logo" style="height: 60px;">
            </a>
        </div>


        <!-- Menu + Login aligned LEFT -->
        <div style="display: flex; align-items: center; gap: 10px;">
            <a href="https://www.gosi.gov.sa/ar"
                style="background-color: #00bf00; color: black; padding: 6px 15px; border-radius: 3px; font-size: 14px; text-decoration: none;">تسجيل
                الدخول</a>

            <!-- 4-line hamburger menu -->
            <div
                style="display: flex; flex-direction: column; justify-content: space-between; height: 20px; cursor: pointer;">
                <span style="background-color: white; height: 2px; width: 30px;"></span>
                <span style="background-color: white; height: 2px; width: 30px;"></span>
                <span style="background-color: white; height: 2px; width: 30px;"></span>
                <span style="background-color: white; height: 2px; width: 30px;"></span>
            </div>
        </div>

    </div>
    <div
        style="background-color: #ffffff; border-radius: 12px; padding: 0; margin: 60px 15px; box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.08); overflow: hidden;">

        <!-- Green Top with Check IMAGE -->
        <div style="background-color: #00bf00; padding: 6px;display: flex;justify-content: center;">
            <img decoding="async" src="/images/2.png" alt="تم التحقق" style="width: 45px;">
        </div>

        <!-- Message -->
        <div id="certificate-message" style="background-color: #f3f4f5;text-align: right; padding: 20px;">
            @if($file)
                <p style="margin: 0 0 25px; font-size: 16px; color: #424242;">تم التحقق من الشهادة وهي صالحة وسارية المفعول
                </p>
            @endif
            <div style="text-align: right;">
                @if($file)
                    <a href="{{ asset('storage/' . $file) }}" target="_blank"
                        style="background-color: #00bf00; color: black; padding: 10px 25px; border-radius: 10px; font-size: 14px; text-decoration: none;">
                        تنزيل نسخة من الشهادة
                    </a>
                @else
                    <p style="color: red;">لم يتم العثور على الشهادة.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full flex justify-items-start" dir="rtl" style="text-align: left;">
        <a href="/"
            style="display: inline-block; background-color: #80df80; color: white; padding: 8px 20px; border-radius: 5px; text-decoration: none; font-size: 14px; margin-bottom: 60px;">
            العودة للصفحة الرئيسية
        </a>
    </div>
    <div
        style="direction: rtl; font-family: 'Ping AR + LT', sans-serif; padding: 80px 20px; color: #001f61; text-align: right;">

        <!-- Logo -->
        <!-- GOSI Footer Section (Right-Aligned) -->
        <div
            style="direction: rtl; font-family: 'Ping AR + LT', sans-serif; padding: 30px 20px; color: #001f61; text-align: right;">

            <!-- Logo -->
            <div style="margin-bottom: 20px;">
                <img decoding="async" src="/images/GOSILogo.eb4de07c6f398bc1-1568x1050-1.png"
                    alt="شعار التأمينات الاجتماعية" style="max-width: 100px; height: auto;">
            </div>

            <!-- الرقم المجاني -->
            <div style="margin-bottom: 10px; font-size: 15px;">الرقم المجاني</div>
            <div style="color: #00bf00; font-size: 20px; font-weight: Meduim; margin-bottom: 25px;">8001243344</div>

            <!-- قنوات التواصل الاجتماعي -->
            <div style="margin-bottom: 10px; font-size: 15px;">قنوات التواصل الاجتماعي</div>
            <div style="display: flex; justify-content: flex-start; gap: 15px; margin-bottom: 25px;">

                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" viewBox="0 0 512 512">
                        <path fill="#00004E"
                            d="M255.2,7.8c46.2,0.5,87.8,11.9,125.1,34c36.8,21.7,67.4,52.5,88.9,89.4c22,37.5,33.3,79.4,33.8,125.8  c-1.3,63.5-21.3,117.8-60.1,162.8c-38.8,45-88.4,72.8-139.8,83.5V325.2h48.6l11-70H289v-45.8c-0.4-9.5,2.6-18.8,8.5-26.3  c5.9-7.5,16.2-11.4,31.1-11.8H373v-61.3c-0.6-0.2-6.7-1-18.1-2.4c-13-1.5-26.1-2.3-39.2-2.4c-29.6,0.1-53,8.5-70.3,25.1  c-17.2,16.6-26,40.5-26.4,71.9v53.2h-56v70h56v178.1c-63.1-10.7-112.8-38.5-151.5-83.5S8.7,320.6,7.4,257.1  c0.5-46.4,11.8-88.4,33.8-125.8c21.5-36.9,52.1-67.7,88.9-89.4C167.3,19.6,209,8.3,255.2,7.8L255.2,7.8z" />
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" viewBox="0 0 1226.4 1226.4">
                        <path fill="#00004E"
                            d="M727.3,519.3L1174.1,0h-105.9L680.3,450.9L370.5,0H13.2l468.5,681.8L13.2,1226.4h105.9l409.6-476.2l327.2,476.2  h357.3L727.3,519.3L727.3,519.3z M582.4,687.8l-47.5-67.9L157.2,79.7h162.6l304.8,436l47.5,67.9l396.2,566.7H905.7L582.4,687.8  L582.4,687.8z" />
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" viewBox="0 0 512 512">
                        <g>
                            <path fill="#00004E"
                                d="M464.5,0h-417C21.3,0,0,21.3,0,47.5c0,0,0,0,0,0v417C0,490.7,21.3,512,47.5,512h0h417    c26.2,0,47.5-21.3,47.5-47.5l0,0v-417C512,21.3,490.7,0,464.5,0C464.5,0,464.5,0,464.5,0z M174.5,405.2c0,6-4.8,10.8-10.8,10.8    c0,0,0,0,0,0h-46c-6,0-10.8-4.8-10.8-10.8c0,0,0,0,0-0.1V212.4c0-6,4.8-10.8,10.8-10.8c0,0,0,0,0,0h46c6,0,10.8,4.9,10.8,10.8    V405.2z M140.7,183.3c-24.1,0-43.6-19.5-43.6-43.6S116.6,96,140.7,96s43.6,19.5,43.6,43.6S164.8,183.3,140.7,183.3z M415,405.9    c0,5.5-4.4,9.9-9.9,9.9c0,0,0,0-0.1,0h-49.5c-5.5,0-9.9-4.4-9.9-9.9c0,0,0,0,0-0.1v-90.3c0-13.5,4-59.1-35.3-59.1    c-30.4,0-36.6,31.2-37.8,45.2v104.3c0,5.4-4.4,9.9-9.8,9.9h-47.8c-5.5,0-9.9-4.4-9.9-9.9c0,0,0,0,0,0V211.5c0-5.5,4.4-9.9,9.9-9.9    c0,0,0,0,0,0h47.8c5.5,0,9.9,4.5,9.9,9.9v16.8c11.3-17,28-30,63.7-30c79.1,0,78.5,73.8,78.5,114.4L415,405.9z" />
                        </g>
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25px" viewBox="0 0 682 682">
                        <path fill="#00004E"
                            d="M647.2,181.2c-7.4-27.4-29-49-56.4-56.4c-50-13.7-250.2-13.7-250.2-13.7s-200.1,0-250.2,13.2  c-26.9,7.4-49,29.5-56.4,56.9C21,231.2,21,335,21,335s0,104.3,13.2,153.8c7.4,27.4,29,49,56.4,56.4c50.6,13.7,250.2,13.7,250.2,13.7  s200.1,0,250.2-13.2c27.4-7.4,49-29,56.4-56.4c13.2-50,13.2-153.8,13.2-153.8S660.9,231.2,647.2,181.2z M276.9,430.8V239.1  L443.4,335L276.9,430.8z" />
                    </svg>
                </a>

            </div>



            <!-- أدوات سهولة الوصول -->
            <div style="margin-bottom: 10px; font-size: 15px;">أدوات سهولة الوصول</div>
            <div>
                <a href="#"
                    style="display: inline-flex; align-items: center; gap: 5px; border: 2px solid #00bf00; padding: 6px 12px; border-radius: 8px; color: #001f61;font-weight: 200; text-decoration: none; font-size: 14px;">

                    الدعم الفني بلغة الإشارة
                    <img decoding="async" src="/images/Asset-3.png" alt="إشارة" style="width: 18px;">
                </a>

            </div>

            <div style="text-align: right; direction: rtl; font-size: 15px;">
                <p style="margin-top: 10px;">تطبيقات الجوال</p>

                <div style="margin-bottom: 10px;">
                    <a href="#" style="display: block; margin-bottom: 8px;">
                        <img decoding="async" src="/images/5.jpg" alt="Download on App Store" style="height: 45px;">
                    </a>

                    <a href="#" style="display: block; margin-bottom: 12px;">
                        <img decoding="async" src="/images/6.jpg" alt="Get it on Google Play" style="height: 45px;">
                    </a>
                </div>

                <div>
                    <img decoding="async" src="/images/4.jpg" alt="مسجلة لدى هيئة الحكومة الرقمية"
                        style="width: 200px; height: auto;">
                </div>
            </div>

            <div style="text-align: right; direction: rtl; font-size: 15px; margin-top: 20px;">
                <p style="margin-bottom: 20px;">
                    <img decoding="async" src="https://cdn.gosi.gov.sa/gptscripts/arrow-icon.3af9fd8ffa5b48e8.svg"
                        alt="arrow" style="height: 12px; margin-right: 5px; vertical-align: middle;">
                    عن المؤسسة
                </p>

                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">عن المؤسسة</li>
                    <li style="margin-bottom: 10px;">الأخبار و الفعاليات</li>
                    <li style="margin-bottom: 10px;">اتفاقية الاستخدام</li>
                    <li style="margin-bottom: 10px;">الخصوصية وسرية البيانات</li>
                    <li style="margin-bottom: 10px;">سياسة حرية المعلومات</li>
                    <li style="margin-bottom: 10px;">سياسة أمن المنصة</li>
                    <li style="margin-bottom: 10px;">اتفاقية مستوى الخدمة</li>
                    <li>الشروط والأحكام</li>
                </ul>
            </div>

            <div style="text-align: right; direction: rtl; font-size: 15px; margin-top: 20px;">
                <p style="margin-bottom: 20px;">
                    <img decoding="async" src="https://cdn.gosi.gov.sa/gptscripts/arrow-icon.3af9fd8ffa5b48e8.svg"
                        alt="arrow" style="height: 12px; margin-right: 5px; vertical-align: middle;">
                    الدعم والمساندة
                </p>

                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">اتصل بنا</li>
                    <li style="margin-bottom: 10px;">الأسئلة الشائعة</li>
                    <li style="margin-bottom: 10px;">المشاركة الإلكترونية</li>
                    <li style="margin-bottom: 10px;">بلاغ عن فساد</li>
                    <li style="margin-bottom: 10px;">خريطة الموقع</li>
                    <li>التوظيف</li>
                </ul>
            </div>

            <div style="text-align: right; direction: rtl; font-size: 15px; margin-top: 20px;">
                <p style="margin-bottom: 20px;">
                    <img decoding="async" src="https://cdn.gosi.gov.sa/gptscripts/arrow-icon.3af9fd8ffa5b48e8.svg"
                        alt="arrow" style="height: 12px; margin-right: 5px; vertical-align: middle;">
                    روابط مهمة
                </p>

                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">وزارة المالية</li>
                    <li style="margin-bottom: 10px;">وزارة الموارد البشرية والتنمية الاجتماعية</li>
                    <li style="margin-bottom: 10px;">البوابة الوطنية للتعاملات الإلكترونية</li>
                    <li style="margin-bottom: 10px;">الجمعية الدولية للضمان الاجتماعي (ISSA)</li>
                    <li style="margin-bottom: 10px;">منصة المشاركة الإلكترونية</li>
                    <li style="margin-bottom: 10px;">الإستراتيجية الوطنية للبيانات و الذكاء الاصطناعي</li>
                    <li>منصة البيانات المفتوحة</li>
                </ul>
            </div>

        </div>

        <div style="text-align: right; direction: rtl; font-size: 15px; margin-top: 10px;">
            <div>تاريخ آخر تحديث للبيانات</div>
            <div id="today-date" style="color: #00bf00; font-weight: bold; margin-top: 5px;">05-20-2025</div>
        </div>

        <script>
            const today = new Date();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const yyyy = today.getFullYear();
            const formattedDate = `${mm}-${dd}-${yyyy}`;
            document.getElementById('today-date').textContent = formattedDate;
        </script>





    </div>
    <div
        style="background-color: #00004f; width: 100%; padding: 10px 0; text-align: center; color: white; font-size: 12px; direction: rtl;">
        جميع الحقوق محفوظة للمؤسسة العامة للتأمينات الاجتماعية © <span id="footer-year">2025</span>
    </div>
    <div id="preloader"
        style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgb(0, 0, 72); display: flex; align-items: center; justify-content: center; z-index: 99999; overflow: hidden; transition: opacity 0.5s ease; opacity: 1;">
        <img src="/images/logoloading.gif" alt="Loading..." style="width: 300px;">
    </div>


    <script>
        window.addEventListener("load", function () {
            const preloader = document.getElementById("preloader");

            setTimeout(() => {
                preloader.style.opacity = "0";

                // بعد انتهاء الانتقال، نُخفي العنصر
                setTimeout(() => {
                    preloader.style.display = "none";
                }, 500); // نفس مدة transition في CSS
            }, 3000); // انتظار 3 ثواني قبل الإخفاء
        });
    </script>


</body>

</html>