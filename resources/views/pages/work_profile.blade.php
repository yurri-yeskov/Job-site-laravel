

{{--

* JobClass - Job Board Web Application

* Copyright (c) BedigitCom. All Rights Reserved

*

* Website: https://bedigit.com

*

* LICENSE

* -------

* This software is furnished under a license and may be used and copied

* only in accordance with the terms of such license and with the inclusion

* of the above copyright notice. If you Purchased from CodeCanyon,

* Please read the full License from here - http://codecanyon.net/licenses/standard

--}}

@extends('layouts.master')



@section('content')

<div class="worker-profile">

  <div class="worker-banner">
    <div class="container container-max container-fluid">
    <div class="media">

      <img src="{{ url()->asset('public/images/newdesign/user-1.png') . getPictureVersion() }}" class="bg-grey" alt="Avatar">

      <div class="media-body">

        <h1>Darlene Robertson</h1>

        <ul>

          <li>UI Designer at Invision</li>

          <li>

            <svg width="14" height="17" viewbox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">

              <path d="M7.38938 0C3.80537 0 0.889648 2.91611 0.889648 6.50051C0.889648 9.06172 1.96193 11.6525 3.99058 13.9927C5.50577 15.7407 7.00737 16.731 7.07061 16.7723C7.16742 16.8356 7.27843 16.8673 7.38945 16.8673C7.5004 16.8673 7.61142 16.8356 7.7083 16.7723C7.77146 16.731 9.27329 15.7407 10.7885 13.9928C12.8173 11.6525 13.8896 9.06172 13.8896 6.50051C13.8896 2.91611 10.9735 0 7.38938 0ZM7.38938 15.5691C6.19396 14.6783 2.055 11.25 2.055 6.50051C2.055 3.55868 4.44794 1.16535 7.38938 1.16535C10.331 1.16535 12.7242 3.55868 12.7242 6.50051C12.7242 11.25 8.58488 14.6783 7.38938 15.5691Z" fill="#696969"/>

              <path d="M7.38936 3.91943C5.96685 3.91943 4.80957 5.07679 4.80957 6.49945C4.80957 7.92173 5.96685 9.07885 7.38936 9.07885C8.81187 9.07885 9.96906 7.92173 9.96906 6.49945C9.96906 5.07686 8.81179 3.91943 7.38936 3.91943ZM7.38936 7.91349C6.60942 7.91349 5.97493 7.27915 5.97493 6.49945C5.97493 5.71936 6.60942 5.08479 7.38936 5.08479C8.16921 5.08479 8.80371 5.71936 8.80371 6.49945C8.80371 7.27915 8.16921 7.91349 7.38936 7.91349Z" fill="#696969"/>

            </svg>

          London, UK</li>

          <li>

            <svg width="20" height="18" viewbox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

              <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

              <path d="M1.85063 14.1611C2.61288 14.3864 3.20934 14.9822 3.43558 15.7441C3.4852 15.9104 3.63816 16.0244 3.8117 16.0244C3.83206 16.0232 3.85228 16.0201 3.87216 16.0154C3.88978 16.0204 3.90779 16.0241 3.92594 16.0264H13.3485C13.3647 16.0243 13.3807 16.021 13.3964 16.0166C13.5925 16.0643 13.7902 15.944 13.838 15.7479C13.8381 15.7471 13.8383 15.7464 13.8384 15.7457C14.0641 14.983 14.6607 14.3864 15.4234 14.1607C15.6084 14.1042 15.7233 13.9199 15.6927 13.7289C15.698 13.7098 15.7017 13.6904 15.7041 13.6708V10.5299C15.7018 10.5103 15.6979 10.4908 15.6923 10.4718C15.7231 10.2808 15.6081 10.0964 15.423 10.04C14.6603 9.81437 14.0638 9.21756 13.8388 8.45464C13.782 8.26839 13.5959 8.15316 13.4038 8.18531C13.3857 8.18025 13.3672 8.17657 13.3485 8.17432H3.92594C3.90617 8.17667 3.88659 8.1806 3.86745 8.18609C3.67649 8.15567 3.49226 8.27055 3.43558 8.45542C3.20978 9.21801 2.61327 9.81437 1.85063 10.04C1.66567 10.0965 1.55073 10.2808 1.58131 10.4718C1.5762 10.4909 1.57252 10.5103 1.57031 10.5299V13.6708C1.57257 13.6892 1.57625 13.7075 1.58131 13.7254C1.54911 13.9176 1.66429 14.104 1.85063 14.1611ZM2.35552 10.6893C3.14387 10.3727 3.76871 9.74788 4.08534 8.95953H13.1887C13.5055 9.74788 14.1304 10.3727 14.9189 10.6893V13.5114C14.1308 13.8284 13.5061 14.4531 13.1891 15.2412H4.08534C3.76836 14.4531 3.14363 13.8284 2.35552 13.5114V10.6893Z" fill="#696969"/>

              <path d="M8.63688 14.4559C9.93788 14.4559 10.9925 13.4012 10.9925 12.1003C10.9925 10.7993 9.93788 9.74463 8.63688 9.74463C7.33589 9.74463 6.28125 10.7993 6.28125 12.1003C6.28253 13.4007 7.33643 14.4546 8.63688 14.4559ZM8.63688 10.5298C9.5042 10.5298 10.2073 11.2329 10.2073 12.1003C10.2073 12.9676 9.5042 13.6707 8.63688 13.6707C7.76957 13.6707 7.06646 12.9676 7.06646 12.1003C7.06646 11.2329 7.76957 10.5298 8.63688 10.5298Z" fill="#696969"/>

              <path d="M4.3184 12.689C4.64362 12.689 4.90731 12.4254 4.90731 12.1001C4.90731 11.7749 4.64362 11.5112 4.3184 11.5112C3.99318 11.5112 3.72949 11.7749 3.72949 12.1001C3.72949 12.4254 3.99318 12.689 4.3184 12.689ZM4.3184 11.9038C4.42681 11.9038 4.5147 11.9917 4.5147 12.1001C4.5147 12.2085 4.42681 12.2964 4.3184 12.2964C4.20999 12.2964 4.1221 12.2085 4.1221 12.1001C4.1221 11.9917 4.20999 11.9038 4.3184 11.9038Z" fill="#696969"/>

              <path d="M12.9561 12.689C13.2813 12.689 13.545 12.4254 13.545 12.1001C13.545 11.7749 13.2813 11.5112 12.9561 11.5112C12.6309 11.5112 12.3672 11.7749 12.3672 12.1001C12.3672 12.4254 12.6309 12.689 12.9561 12.689ZM12.9561 11.9038C13.0645 11.9038 13.1524 11.9917 13.1524 12.1001C13.1524 12.2085 13.0645 12.2964 12.9561 12.2964C12.8477 12.2964 12.7598 12.2085 12.7598 12.1001C12.7598 11.9917 12.8477 11.9038 12.9561 11.9038Z" fill="#696969"/>

            </svg>

          $35k - $45k</li>

          <li>

            <svg width="15" height="15" viewbox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">

              <path d="M12.8033 2.19668C11.3867 0.780147 9.50332 0 7.5 0C5.49668 0 3.61327 0.780147 2.19668 2.19668C0.780147 3.61327 0 5.49668 0 7.5C0 9.50332 0.780147 11.3867 2.19668 12.8033C3.61327 14.2199 5.49668 15 7.5 15C8.87147 15 10.2134 14.6263 11.3807 13.9192C11.6575 13.7515 11.746 13.3912 11.5783 13.1144C11.4107 12.8376 11.0503 12.7492 10.7736 12.9168C9.78935 13.513 8.65737 13.8281 7.5 13.8281C4.01065 13.8281 1.17188 10.9893 1.17188 7.5C1.17188 4.01065 4.01065 1.17188 7.5 1.17188C10.9893 1.17188 13.8281 4.01065 13.8281 7.5C13.8281 8.74772 13.4571 9.96223 12.7551 11.0123C12.5752 11.2813 12.6475 11.6452 12.9165 11.825C13.1856 12.0049 13.5494 11.9326 13.7293 11.6636C14.5606 10.4201 15 8.9804 15 7.5C15 5.49668 14.2199 3.61327 12.8033 2.19668Z" fill="#696969"/>

              <path d="M7.49999 2.22656C7.17637 2.22656 6.91405 2.48889 6.91405 2.8125V7.25731L4.76548 9.40588C4.53664 9.63469 4.53664 10.0057 4.76548 10.2345C4.87988 10.3489 5.02982 10.4061 5.1798 10.4061C5.32977 10.4061 5.47971 10.3489 5.59411 10.2345L7.9143 7.91432C8.0242 7.80445 8.08592 7.65539 8.08592 7.5V2.8125C8.08592 2.48889 7.8236 2.22656 7.49999 2.22656Z" fill="#696969"/>

            </svg>

          11 hours ago</li>

        </ul>

        <span class="badge badge-info">App</span>

        <span class="badge badge-info">Design</span>

        <span class="badge badge-info">Digital</span>

      </div>

    </div>

    <div class="media-action">

      <button type="button">Download Resume</button>

      <div class="bookmark">

        <svg width="9" height="14" viewbox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">

          <path d="M7.875 1.5H1.125C0.8125 1.5 0.546875 1.60938 0.328125 1.82812C0.109375 2.04687 0 2.3125 0 2.625V13.5L4.5 10.875L9 13.5V2.625C9 2.3125 8.89062 2.04687 8.67188 1.82812C8.45312 1.60938 8.1875 1.5 7.875 1.5ZM7.875 11.5312L4.5 9.5625L1.125 11.5312V2.76562C1.125 2.73438 1.14062 2.70312 1.17188 2.67188C1.20312 2.64063 1.23438 2.625 1.26562 2.625H7.73438C7.76562 2.625 7.79688 2.64063 7.82812 2.67188C7.85938 2.70312 7.875 2.73438 7.875 2.76562V11.5312Z" fill="#696969"/>

        </svg>

      </div>

    </div>
   </div>
  </div>



  <div class="resumes container container-max container-fluid worker-page">

    <h3 class="breadcrumb">Home / Resumes</h3>

    <div class="d-flex flex-row">

      <div class="content about_company">

        <h2>Candidates About</h2>

        <p>Hello my name is Nicole Wells and web developer from Portland. In pharetra orci dignissim, blandit mi semper, ultricies diam. Suspendisse malesuada suscipit nunc non volutpat. Sed porta nulla id orci laoreet tempor non consequat enim. Sed vitae aliquam velit. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam.</p/>
        <p>
        Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam. Mauris nec erat ut libero vulputate pulvinar.</p>

        <div class="exp-edu-block">

          <div class="experience-history">
            <h2>Experience History</h2>

            <div class="edu-history">

              <div class="edu-item d-flex blue">

                <div class="edu-content">

                  <div class="d-flex"><h3>Product Designer</h3><span class="badge bg-info color-blue">2012-2014</span></div>

                  <h4 class="color-blue">Spotify Inc.</h4>

                  <ul>
                    <li>Started and scaled design team to 6 product designers </li>
                    <li>Created a web application design system </li>
                    <li>Scaled business to $120m in ARR  </li>
                    <li>Built internal leveling system and career ladder </li>
                  </ul>

                </div>

              </div>

              <div class="edu-item d-flex">

                <div class="edu-content">

                  <div class="d-flex"><h3>Sr UX Engineer</h3><span class="badge bg-info color-blue">2008-2012</span></div>

                  <h4 class="color-blue">Dropbox Inc.</h4>

                  <ul>
                   <li>Started and scaled design team to 6 product designers </li>
                   <li>Created a web application design system</li>
                   <li>Scaled business to $120m in ARR </li>
                   <li>Built internal leveling system and career ladder</li>
                 </ul>

               </div>

             </div>
             <div class="edu-item d-flex yellow">

              <div class="edu-content">

                <div class="d-flex"><h3>Awards or Professional Achievements</h3></div>

                <ul>
                  <li>3x Awwwards SOTD </li>
                  <li>#1 for June 7th, 2015 on Product Hunt</li>
                </ul>

              </div>

            </div>
          </div>

        </div>
        <div class="education-history">
          <h2>Education History</h2>

          <div class="edu-history">

            <div class="edu-item d-flex">

              <div class="edu-content">

                <div class="d-flex"><h3>Bachlors in Fine Arts</h3><span class="badge bg-pink color-red">2012-2014</span></div>

                <h4>Modern College</h4>

                <ul>
                  <li>Computer Science – Software Design</li>
                </ul>

              </div>

            </div>

            <div class="edu-item d-flex">

              <div class="edu-content">

                <div class="d-flex"><h3>Computer Science</h3><span class="badge bg-pink color-red">2008-2012</span></div>

                <h4>Harvard University</h4>

                <ul>
                  <li>Design Graphic Communications</li>
                </ul>

              </div>

            </div>

          </div>
        </div>
      </div>
      <h2>References</h2>

      <div class="view-refrence"><button type="button" class="bg-blue color-white">View References</button></div>
      <div class="creator">
       <h2>Darlene Robertson, Creator Success</h2>
       <p class="creator-location">London, UK</p>
       <p>I highly recommend John for your assistant position. In his time at Pacific, he has shown the technical, organizational, and interpersonal skills that make for a truly exceptional administrative assistant. In particular, I know that you’re seeking someone with exceptional customer service and telephone skills, as well as the ability to get up to speed quickly with proprietary software. John offers all these skills, plus adaptability and grace under pressure.</p>
     </div>
     <div class="creator">
       <h2>Darlene Robertson, Creator Success</h2>
       <p class="creator-location">London, UK</p>
       <p>I highly recommend John for your assistant position. In his time at Pacific, he has shown the technical, organizational, and interpersonal skills that make for a truly exceptional administrative assistant. In particular, I know that you’re seeking someone with exceptional customer service and telephone skills, as well as the ability to get up to speed quickly with proprietary software. John offers all these skills, plus adaptability and grace under pressure.</p>
     </div>
   </div>

   <div>

    <div class="lightbox p-b-50">

      <h1>Contact Candidate</h1>

      <button type="button" class="w-100 bg-blue color-white">Contact Candidate</button>

    </div>

    <div class="lightbox">

      <div class="overview">

        <ul>

          <li>
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14" fill="none">
            <path d="M20 1.60237C20 0.717495 19.2825 0 18.3977 0H1.60235C0.717471 0 0 0.717495 0 1.60237V11.4404C0 12.3253 0.717471 13.0428 1.60235 13.0428H18.3977C19.2825 13.0428 20 12.3253 20 11.4404V1.60237ZM18.2607 1.73932V3.26122H1.73715V1.73932H18.2607ZM1.73715 11.3056V5.8702H18.2607V11.3056H1.73715ZM16.6388 8.47918C16.6388 8.95967 16.2496 9.34884 15.7691 9.34884H11.6426C11.1621 9.34884 10.7729 8.95967 10.7729 8.47918C10.7729 7.9987 11.1621 7.60952 11.6426 7.60952H15.7691C16.2474 7.60952 16.6388 7.9987 16.6388 8.47918Z" fill="#495057"/>
          </svg>

          <div class="overview-blk">

            <h3>Expected Salary</h3>

            <p>400 - 450$ Per Month</p>

          </div>

        </li>

        <li>

          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none">
            <path d="M19.4868 4.1896L10.3587 0.0766288C10.1305 -0.0255429 9.86743 -0.0255429 9.63917 0.0766288L0.511105 4.1896C0.206764 4.32655 0.00894031 4.62437 0.000244844 4.9548C-0.00845062 5.28523 0.215458 5.59175 0.513278 5.74392L1.30239 6.12434V9.17208C1.30239 9.4699 1.54587 9.7112 1.84586 9.7112C2.14585 9.7112 2.38933 9.4699 2.38933 9.17208V6.67431L3.69365 7.37214V11.0699C3.69365 11.2155 3.73278 11.359 3.81321 11.4829C3.89582 11.609 5.88056 14.5633 9.8783 14.5633C13.9891 14.5633 15.8847 11.5938 15.963 11.4677C16.0369 11.3481 16.0847 11.2112 16.0847 11.072V7.49604L19.5303 5.74392C19.8281 5.59392 20.0063 5.2874 19.9998 4.9548C19.9933 4.62437 19.789 4.32655 19.4868 4.1896ZM14.563 10.8351C14.1282 11.3677 12.6565 13.0525 9.88917 13.0525C7.19357 13.0525 5.65013 11.3721 5.21535 10.8264V8.14602L9.60657 10.3742C9.73048 10.4373 9.86526 10.4677 10 10.4677C10.1348 10.4677 10.2783 10.4351 10.4044 10.3742L14.5652 8.26995V10.8351H14.563ZM9.99786 8.63514L2.87192 5.02218L9.99786 1.81137L17.1238 5.02218L9.99786 8.63514ZM2.3828 10.4373C2.54367 10.5982 2.63715 10.8221 2.63715 11.0482C2.63715 11.2742 2.54367 11.4959 2.3828 11.659C2.22194 11.8177 1.99586 11.9112 1.7676 11.9112C1.53934 11.9112 1.31544 11.8177 1.1524 11.659C0.991529 11.4981 0.898053 11.2742 0.898053 11.0482C0.898053 10.8221 0.991529 10.6003 1.1524 10.4373C1.31544 10.2786 1.53934 10.1851 1.7676 10.1851C1.99586 10.1851 2.21976 10.2786 2.3828 10.4373Z" fill="#495057"/>
          </svg>



          <div class="overview-blk">

            <h3>Experience</h3>

            <p>2 Years</p>

          </div>

        </li>



        <li>

          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none">
            <path d="M7.78327 9.28894C10.3462 9.28894 12.4321 7.20516 12.4321 4.64444C12.4321 2.08372 10.3462 0 7.78327 0C5.22036 0 3.13441 2.08372 3.13441 4.64444C3.13441 7.20516 5.22036 9.28894 7.78327 9.28894ZM7.78327 1.75624C9.37686 1.75624 10.6737 3.05086 10.6737 4.64224C10.6737 6.23362 9.37686 7.5283 7.78327 7.5283C6.18969 7.5283 4.89284 6.23362 4.89284 4.64224C4.89284 3.05086 6.18969 1.75624 7.78327 1.75624ZM9.89779 9.72194C9.65601 9.64501 9.39224 9.67576 9.17683 9.80764L7.78327 10.6539L6.38971 9.80764C6.1721 9.67576 5.90834 9.64501 5.66875 9.72194C4.33893 10.144 0 11.7046 0 14.0653C0 14.551 0.39345 14.9445 0.879218 14.9445H14.6895C15.1753 14.9445 15.5687 14.551 15.5687 14.0653C15.5687 11.7046 11.2276 10.144 9.89779 9.72194ZM2.4706 13.1861C3.21574 12.6256 4.46643 11.9925 5.82482 11.5221L7.32608 12.4344C7.60743 12.6036 7.95691 12.6036 8.23826 12.4344L9.74173 11.5221C11.1001 11.9925 12.3508 12.6256 13.0959 13.1861H2.4706ZM20 12.5355C20 12.9003 19.7055 13.1861 19.3406 13.1861H16.4018C16.0369 13.1861 15.7424 12.8915 15.7424 12.5267C15.7424 12.1618 16.0369 11.8672 16.4018 11.8672H18.3581C18.0394 11.4276 17.503 11.0803 16.848 10.7199C16.5293 10.544 16.4128 10.1528 16.5886 9.83405C16.7645 9.51533 17.1645 9.39885 17.4832 9.57469C18.4262 10.0912 20 11.1529 20 12.5355ZM16.3029 6.71724C16.3029 5.75669 15.5204 4.97415 14.5576 4.97415C14.3224 4.97415 14.0917 5.02033 13.8784 5.11045C13.5421 5.25333 13.1553 5.09504 13.0146 4.75874C12.8717 4.42244 13.03 4.0356 13.3663 3.89493C13.7444 3.73447 14.1466 3.65312 14.5598 3.65312C16.2501 3.65312 17.6239 5.02694 17.6239 6.71504C17.6239 8.40313 16.2501 9.7769 14.5598 9.7769C13.6828 9.7769 12.8454 9.40104 12.2651 8.74383C12.0233 8.47127 12.0497 8.05364 12.3222 7.81406C12.5948 7.57227 13.0124 7.59865 13.252 7.87121C13.5839 8.24488 14.0609 8.46027 14.5598 8.46027C15.5182 8.46027 16.3029 7.67778 16.3029 6.71724Z" fill="#495057"/>
          </svg>
          <div class="overview-blk">

            <h3>Gender</h3>

            <p>Female</p>

          </div>

        </li>

        <li>

          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
            <path d="M10 11.7587C13.2283 11.7587 15.8543 9.12175 15.8543 5.87827C15.8543 2.63697 13.2283 0 10 0C6.77174 0 4.14565 2.63697 4.14565 5.87827C4.14783 9.12175 6.77391 11.7587 10 11.7587ZM10 1.73913C12.2696 1.73913 14.1152 3.59566 14.1152 5.87827C14.1152 8.16088 12.2696 10.0196 10 10.0196C7.73043 10.0196 5.88478 8.16088 5.88478 5.87827C5.88696 3.59566 7.73261 1.73913 10 1.73913ZM12.7109 12.3348C12.4239 12.2435 12.113 12.3065 11.8826 12.5L10 14.1L8.11739 12.5C7.88913 12.3065 7.57609 12.2413 7.28913 12.3348C6.07174 12.7239 0 14.813 0 17.8261C0 18.3065 0.38913 18.6957 0.869565 18.6957H19.1304C19.6109 18.6957 20 18.3065 20 17.8261C20 14.813 13.9283 12.7239 12.7109 12.3348ZM2.19565 16.9565C3.15435 15.9413 5.44783 14.8109 7.36522 14.1435L9.43696 15.9043C9.76087 16.1804 10.2391 16.1804 10.563 15.9043L12.6348 14.1435C14.5522 14.8109 16.8456 15.9413 17.8043 16.9565H2.19565Z" fill="#495057"/>
          </svg>



          <div class="overview-blk">

            <h3>Age </h3>

            <p>27 Years</p>

          </div>

        </li>



        <li>

          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M10 0C4.48696 0 0 4.48696 0 10C0 15.513 4.48696 20 10 20C15.513 20 20 15.513 20 10C20 4.48696 15.5152 0 10 0ZM10.7978 18.2218C10.75 18.2261 10.6522 18.2283 10.6522 18.2326V13.5239C11.7391 13.513 12.8152 13.4717 13.7304 13.4152C12.9065 15.9456 11.3804 17.6413 10.7978 18.2218ZM9.20218 18.2218C8.61957 17.6413 7.09348 15.9435 6.2674 13.4109C7.18913 13.4696 8.26087 13.513 9.34783 13.5239V18.2326C9.34783 18.2283 9.25 18.2261 9.20218 18.2218ZM1.73913 10C1.73913 9.44565 1.79565 8.90653 1.9 8.38262C2.37608 8.30001 3.29348 8.15868 4.58261 8.0326C4.47826 8.65651 4.41739 9.31522 4.41739 10.0022C4.41739 10.6891 4.47608 11.3435 4.57391 11.9652C3.30217 11.8391 2.38043 11.7 1.89782 11.6196C1.79565 11.0935 1.73913 10.5522 1.73913 10ZM5.72174 10C5.72174 9.26956 5.80217 8.57392 5.93478 7.9174C6.93043 7.84784 8.04348 7.79566 9.34783 7.78044V12.2174C8.04348 12.2022 6.92826 12.1478 5.92391 12.0761C5.79783 11.4261 5.72174 10.7326 5.72174 10ZM10.7891 1.77827C11.3696 2.37392 12.8848 4.09784 13.7152 6.58914C12.7978 6.53045 11.7391 6.48914 10.6522 6.4761V1.76522C10.6522 1.77174 10.7435 1.77392 10.7891 1.77827ZM9.34783 1.76739V6.4761C8.26087 6.48696 7.2 6.52827 6.28913 6.58479C7.12174 4.10001 8.63261 2.3761 9.21087 1.77827C9.25869 1.77392 9.34783 1.77174 9.34783 1.76739ZM10.6522 12.2196V7.78262C11.9565 7.79784 13.0652 7.85216 14.0674 7.9239C14.1978 8.57825 14.2783 9.27174 14.2783 10C14.2783 10.7348 14.2022 11.4283 14.0761 12.0826C13.0783 12.1522 11.9565 12.2043 10.6522 12.2196ZM15.4196 8.03695C16.6935 8.16304 17.6196 8.30216 18.1022 8.38477C18.2065 8.90651 18.2609 9.44783 18.2609 10C18.2609 10.5543 18.2043 11.0956 18.1 11.6174C17.6239 11.7 16.7109 11.8413 15.4239 11.9674C15.5239 11.3457 15.5826 10.6891 15.5826 9.99782C15.5826 9.31522 15.5239 8.66086 15.4196 8.03695ZM17.6935 6.99781C17.0783 6.90651 16.2043 6.79349 15.1174 6.69566C14.587 4.8261 13.6913 3.32173 12.913 2.26955C15.0978 3.09781 16.8435 4.8239 17.6935 6.99781ZM7.08695 2.27173C6.31086 3.32173 5.41521 4.82392 4.88478 6.69131C3.78695 6.78914 2.92174 6.90218 2.30869 6.99349C3.16087 4.82175 4.90434 3.09782 7.08695 2.27173ZM2.30652 13.0022C2.91956 13.0935 3.78478 13.2043 4.86522 13.3022C5.38261 15.1782 6.26087 16.6674 7.03696 17.7087C4.87609 16.8761 3.15217 15.1587 2.30652 13.0022ZM12.963 17.7087C13.737 16.6674 14.6152 15.1804 15.1326 13.3087C16.2217 13.213 17.0826 13.1 17.6913 13.0065C16.8457 15.1609 15.1239 16.8761 12.963 17.7087Z" fill="#495057"/>
          </svg>



          <div class="overview-blk">

            <h3>Language</h3>

            <p>English, German, Spanish</p>

          </div>

        </li>

      </ul>

    </div>

  </div>



  <div class="lightbox">

    <div class="skills">

      <h2>Worked Industries</h2>

      <div class="d-flex">

        <div class="skill">app</div>

        <div class="skill">administrative</div>

        <div class="skill">android</div>

        <div class="skill">wordpress</div>

        <div class="skill">design</div>

        <div class="skill">react</div>

      </div>

    </div>

  </div>

  <div class="lightbox overview">

    <h2>Darleens Technology Specifications</h2>

    <div class="profile">

      <div class="d-flex justify-content-between">

        <h3>CPU</h3>

        <p>Intel i9 9900k</p>

      </div>

      <div class="d-flex justify-content-between">

        <h3>Memory</h3>

        <p>32G DDR4</p>

      </div>

      <div class="d-flex justify-content-between">

        <h3>Graphics</h3>

        <p>Intel iris plus 640</p>

      </div>

      <div class="d-flex justify-content-between">

        <h3>Screens</h3>

        <div><p>2 x screen Resolution</p>

          <p>3000 x 2000 x 59 hertz</p></div>

        </div>

        <div class="d-flex justify-content-between">

          <h3>Harddrive</h3>

          <p>Size 475.81 GB</p>

        </div>

        <div class="d-flex justify-content-between">

          <h3>Operation Software</h3>

          <p>Windows 10 Pro</p>

        </div>

        <div class="d-flex justify-content-between">

          <h3>Intel Service<br/>Provider</h3>

          <p>TPG Internet Pty Ltd</p>

        </div>

        <div class="d-flex justify-content-between">

          <h3>IP Address</h3>

          <p>IP Address</p>

        </div>

        <button type="button" class="color-white bg-blue m-t-50">View Technology Specifications</button>

      </div>

    </div>

  </div>

</div>

</div>

<div class="job-footer d-flex justify-content-between">

  <img src="{{ url()->asset('public/images/newdesign/Logo-Main-Index-(white) 3.png') . getPictureVersion() }}" alt="Logo">

  <div class="d-flex job-count">

    <div class="job-countbox">

      <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-grey" alt="Avatar">

      <div class="job-title-box">

        <h3>1124</h3>

        <p>Job Listings</p>

      </div>

    </div>

    <div class="job-countbox">

      <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-grey" alt="Avatar">

      <div class="job-title-box">

        <h3>421</h3>

        <p>Resumes Posted</p>

      </div>

    </div>

  </div>

</div>

</div>

@endsection