

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





 <div class="all_worker-profile">

      <div class="worker-resumes">

        <h2>Showing All Resumes</h2>

        <h3>Home / Resumes</h3>

      </div>



      <div class="all_workers">

        <div class="d-flex flex-row">

        <div class="sidebar">

            <form action="/action_page.php">

            <div class="lightbox resume_button">

              <button type="button">Get Resume Alerts</button>

            </div>

            <div class="lightbox resume_bar">

              <div class="overview">

                  <ul>

                      Search by Keywords

                      <li class="search_bar">

                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <path d="M17.7949 17.2215L13.4021 12.9193C14.494 11.6333 15.1518 9.98197 15.1518 8.18266C15.1518 4.09127 11.7533 0.762695 7.57596 0.762695C3.39855 0.762695 0 4.09127 0 8.18266C0 12.2738 3.39855 15.6021 7.57596 15.6021C9.41306 15.6021 11.0993 14.9579 12.4123 13.8885L16.8053 18.1908C16.9419 18.3247 17.1211 18.3916 17.3001 18.3916C17.4792 18.3916 17.6583 18.3247 17.795 18.1908C18.0683 17.9231 18.0683 17.4892 17.7949 17.2215ZM1.39966 8.18266C1.39966 4.84713 4.17032 2.1335 7.57596 2.1335C10.9815 2.1335 13.7521 4.84713 13.7521 8.18266C13.7521 11.5179 10.9815 14.2313 7.57596 14.2313C4.17032 14.2313 1.39966 11.5179 1.39966 8.18266Z" fill="#696969"/>

                            </svg>

                            <input class="left_search" type="search" placeholder=" By Resumes">                

                      </li>

                Location



                <li class="search_bar"><svg width="15" height="20" viewBox="0 0 15 20" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M7.49969 0C3.36429 0 0 3.36474 0 7.50058C0 10.4558 1.23725 13.4451 3.578 16.1455C5.3263 18.1623 7.05891 19.305 7.13188 19.3527C7.24358 19.4257 7.37168 19.4622 7.49978 19.4622C7.62779 19.4622 7.75589 19.4257 7.86767 19.3527C7.94055 19.305 9.67343 18.1623 11.4217 16.1455C13.7627 13.4451 15 10.4558 15 7.50058C14.9999 3.36474 11.6353 0 7.49969 0ZM7.49969 17.9644C6.12035 16.9366 1.34464 12.9808 1.34464 7.50058C1.34464 4.10617 4.10572 1.34464 7.49969 1.34464C10.8939 1.34464 13.6553 4.10617 13.6553 7.50058C13.6553 12.9808 8.87911 16.9366 7.49969 17.9644Z" fill="#696969"/>

                    </svg>

                    <input class="left_search" type="search" placeholder=" city or postcode">

                    </li>

                    Radius around selected destination

                    <li><input type="range" min="1" max="100" value="50" class="slider" id="myRange"></li>

                    Category

                    <li class="search_bar">

                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <path d="M17.4727 3.23633H12.7046V2.18839C12.7046 1.01428 11.7494 0.059082 10.5753 0.059082H7.42475C6.25068 0.059082 5.29545 1.01428 5.29545 2.18839V3.23633H0.527344C0.236109 3.23633 0 3.47244 0 3.76367V13.3438C0 14.7758 1.16511 15.9409 2.59717 15.9409H15.4028C16.8349 15.9409 18 14.7758 18 13.3438V3.76367C18 3.47244 17.7639 3.23633 17.4727 3.23633ZM10.1965 10.1182C10.1965 10.7779 9.65974 11.3147 9 11.3147C8.34026 11.3147 7.80346 10.7779 7.80346 10.1182V8.92162H10.1965V10.1182ZM10.7239 7.86693H7.27611C6.98488 7.86693 6.74877 8.10304 6.74877 8.39428V9.35218C3.68216 8.6866 1.38333 6.69753 1.08756 4.29102H16.9124C16.6166 6.69753 14.3178 8.6866 11.2512 9.35221V8.39431C11.2512 8.10304 11.0151 7.86693 10.7239 7.86693ZM6.3501 2.18839C6.3501 1.59583 6.8322 1.11377 7.42472 1.11377H10.5752C11.1678 1.11377 11.6499 1.59583 11.6499 2.18839V3.23633H6.35006V2.18839H6.3501ZM16.9453 13.3438C16.9453 14.1943 16.2533 14.8862 15.4028 14.8862H2.59717C1.74667 14.8862 1.05469 14.1943 1.05469 13.3438V7.01049C1.48043 7.61929 2.02936 8.18148 2.69251 8.67883C3.84166 9.54069 5.24457 10.139 6.77141 10.4343C6.92561 11.5264 7.86596 12.3694 9 12.3694C10.134 12.3694 11.0744 11.5264 11.2286 10.4343C12.7554 10.139 14.1583 9.54069 15.3075 8.67883C15.9706 8.18148 16.5196 7.61926 16.9453 7.01049V13.3438Z" fill="#696969"/>

                            </svg>

                                <select class="category" name="cars" id="cars">

                                  <option value="volvo">Choose a Category...</option>

                                  <option value="saab">Saab</option>

                                  <option value="opel">Opel</option>

                                  <option value="audi">Audi</option>

                                </select>  

                    </li>

                    Candidate Gender

                    <li class="search_bar">

                        <select class="category" name="cars" id="cars">

                            <option value="volvo">Male</option>

                            <option value="saab">Male</option>

                            <option value="opel">Female</option>

                            <option value="audi">Others</option>

                          </select>  

                    </li>

                    <li>Date Posted</li>

                   

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle1" value="Bike">

                        <label for="vehicle1">Last Hour</label><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle2" value="Car">

                        <label for="vehicle2"> Last 24 Hours</label><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3"> Last 7 Days</label><br><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3">Last 14 Days</label><br><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3"> Last 30 Days</label><br><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3"> All</label><br><br>

                    </li><br>

                    <li> Experience</li>

                   

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle1" value="Bike">

                        <label for="vehicle1">0-2 Years</label><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle2" value="Car">

                        <label for="vehicle2">10-12 Years</label><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3">12-16 Years</label><br><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3">16-20 Years</label><br><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3">20-25 Years</label><br><br>

                    </li>

                    <li class="view_btn">

                        <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <path d="M4 0H5V9H4V0Z" fill="#1967D2"/>

                            <path d="M4.37114e-08 5L0 4L9 4V5L4.37114e-08 5Z" fill="#1967D2"/>

                            </svg>

                           <a>View more</a>

                          </li><br>

                    <li> Education Levels</li>

                   

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle1" value="Bike">

                        <label for="vehicle1">Certificate</label><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle2" value="Car">

                        <label for="vehicle2">Diploma</label><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3"> Associate Degree</label><br><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3"> Bachelor Degree</label><br><br>

                    </li>

                    <li class="chk_box">

                        <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">

                        <label for="vehicle3"> Master’s Degree</label><br><br>

                    </li>

                    <li class="view_btn">

                        <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <path d="M4 0H5V9H4V0Z" fill="#1967D2"/>

                            <path d="M4.37114e-08 5L0 4L9 4V5L4.37114e-08 5Z" fill="#1967D2"/>

                            </svg>

                           <a>View more</a>

                    </li><br>

                    </ul>

              </div>

              </div>

        </form>

        </div>

          <div class="content">

              <div class="row top_category">

                  <div class="col-md-8">

                 <h5> Showing <b>41-60</b> of <b>944</b> resumes</h5>

                </div>

                <div class="col-md-2">

                        <select class="category" name="cars" id="recent">

                          <option value="volvo">Most Recent</option>

                          <option value="saab">Saab</option>

                          <option value="opel">Opel</option>

                          <option value="audi">Audi</option>

                        </select>  

                    </div>

                    <div class="col-md-2">

                <select class="category" name="cars" id="show">

                  <option value="volvo">Show 10</option>

                  <option value="saab">Saab</option>

                  <option value="opel">Opel</option>

                  <option value="audi">Audi</option>

                </select>  

            </div>

              </div>

            <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Darlene Robertson</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>



              <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Wade Warren</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>



              <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Leslie Alexander</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>



              <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Floyd Miles</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>



              <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Jerome Bell</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>



              <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Cameron Williamson</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>



              <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Robert Fox</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>

              

              <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Esther Howard</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>



              <div class="media profile">

                <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-dark" alt="Avatar">

                <div class="media-body">

                  <h1>Annette Black</h1>

                  <ul>

                    <li class="designer">UI Designer</li>

                    <li><svg width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M6.49973 0C2.91572 0 0 2.91611 0 6.50051C0 9.06172 1.07228 11.6525 3.10093 13.9927C4.61613 15.7407 6.11772 16.731 6.18096 16.7723C6.27777 16.8356 6.38879 16.8673 6.49981 16.8673C6.61075 16.8673 6.72177 16.8356 6.81865 16.7723C6.88181 16.731 8.38364 15.7407 9.89884 13.9928C11.9276 11.6525 13 9.06172 13 6.50051C12.9999 2.91611 10.0839 0 6.49973 0ZM6.49973 15.5691C5.30431 14.6783 1.16535 11.25 1.16535 6.50051C1.16535 3.55868 3.55829 1.16535 6.49973 1.16535C9.44139 1.16535 11.8346 3.55868 11.8346 6.50051C11.8346 11.25 7.69523 14.6783 6.49973 15.5691Z" fill="#696969"/>

                        </svg>

                        London, UK</li>

                    <li><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="M19.9719 10.1321C19.9719 10.132 19.9719 10.1319 19.9718 10.1318L16.1958 0.650402C16.1156 0.448946 15.8873 0.350599 15.6858 0.430739C15.6857 0.430788 15.6855 0.430837 15.6854 0.430935L0.366301 6.53084C0.303827 6.55783 0.249648 6.60092 0.209259 6.65569C0.0818582 6.72189 0.00137412 6.85293 0 6.99647V17.2042C0 17.421 0.175789 17.5968 0.392605 17.5968H16.882C17.0988 17.5968 17.2746 17.421 17.2746 17.2042V11.6292L19.7528 10.6422C19.9542 10.5619 20.0523 10.3335 19.9719 10.1321ZM16.4894 16.8116H0.785211V7.38908H16.4894V16.8116ZM6.55062 6.60583L13.1244 3.98637C13.7111 4.60305 14.524 4.95355 15.3752 4.95689L16.0309 6.60583H6.55062ZM17.2746 10.7859V6.99647C17.2746 6.77966 17.0988 6.60387 16.882 6.60387H16.8757L16.0438 4.51442C16.0346 4.497 16.0238 4.48041 16.0116 4.46495C15.9695 4.27587 15.7944 4.14685 15.6013 4.16265C14.8094 4.23484 14.0346 3.90122 13.5429 3.27615C13.4206 3.12514 13.2055 3.0876 13.0392 3.1882C13.0206 3.19041 13.0021 3.19385 12.9838 3.19841L4.95821 6.39422C4.86109 6.4323 4.7834 6.50783 4.74267 6.60387H2.30538L15.6116 1.30566L19.0975 10.0588L17.2746 10.7859Z" fill="#696969"/>

                        </svg>

                        $99 / hour</li>

                  </ul>

                  <span class="badge_button">App</span>

                  <span class="badge_button">Design</span>

                  <span class="badge_button">Digital</span>

                </div>

                <div class="bookmark">

                 <button>View Profile</button>

                </div>

              </div>

              <div class="ps_bar">

                  <h5>Showing 36 of 497 resumes</h5>

              <progress id="file" value="32" max="100"> 32% </progress>

              <ul>

                  <li><u>Show M</u>ore</li>

              </ul>

            </div>

        </div>

        </div>

      </div>

    </div>

      <div class="job-footer d-flex justify-content-between">

        <img src="{{ url()->asset('public/images/newdesign/Logo-Main-Index-(white) 3.png') . getPictureVersion() }}" alt="Logo">

        <div class="d-flex job-count">

          <div class="d-flex">

            <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-grey" alt="Avatar">

            <div>

              <h3>1124</h3>

              <p>Job Listings</p>

            </div>

          </div>

          <div class="d-flex">

            <img src="{{ url()->asset('public/images/newdesign/img.png') . getPictureVersion() }}" class="bg-grey" alt="Avatar">

            <div>

              <h3>421</h3>

              <p>Resumes Posted</p>

            </div>

          </div>

        </div>

      </div>

    </div>



















@endsection