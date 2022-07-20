<?php
require_once 'includes/header.php';
require_once 'server/classes/fetchdata.php';
require_once 'server/helper/timeago.php';
$fetchData = new FetchData;
?>
<main>
<!-- https://www.geeksforgeeks.org/how-to-display-recent-posts-in-dom-using-php-and-mysql/ -->
   <section>
      <div class="container-fluid">
         <div class="row py-3 min-vh-100" id="main-bg">
            <div class="col col-lg-3 col-md-12 col-sm-12 d-none d-lg-block py-1">
               <aside class="d-flex flex-column rounded friend-request py-3">
                  <div class="d-flex justify-content-between px-3">
                     <p class="text-light">Friend Request</p>
                     <p class="">
                        <a href="" class="nav-link text-primary">See All</a>
                     </p>
                  </div>
               </aside>
            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12 py-1">
               <div class="">
                  <div class="create-post-wrapper rounded p-3">
                     <form  method="post" class="needs-validation" id="makeapost" enctype="multipart/form-data" novalidate>
                        <div id="errorMSG" class="text-center">
								</div>
                        <div class="d-flex flex-row mb-3 flex-md-row rounded p-2 my-1 text-area-wrap">
                           <div class="py-2">
                              <div class="text-center profile">
                                 <img src="assets/imgs/dp.png" alt="user" class="rounded-circle  mx-auto d-block img-fluid">
                              </div>
                           </div>
                           <div class="w-100">
                              <textarea class="border-0 text-light w-100 mx-1 p-2" name="textcontent" cols="30" rows="4" placeholder="What's on your mind" style="outline:none;background: #1D2235; resize: none;" id="text"></textarea>
                           </div>
                        </div>
                        <div class="d-flex d-md-flex justify-content-between px-1">
                           <div class="row flex-grow-1">
                              <div class="col-lg-4 pt-1 col-md-12 col-sm-12">
                                 <label class="make-post border-0" for="getFile" style="cursor:pointer;">
                                    <i class="fa-solid fa-image fa-xl text-success"></i>
                                    <span class="text-light">Photo/Video</span>
                                 </label>
                              </div>
                              <div class="col-lg-8 col-md-12 col-sm-12">
                                 <input type="file" name="getFile" class="text-light form-control form-control-sm border-0" id="getFile" style="background:inherit;">
                              </div>
                           </div>
                           <div class="pt-1 flex-shrink-0">
                              <button class="make-post sendButton border-0" type="submit">
                                 <i class="fa-solid fa-circle-plus"></i>
                                 <span>Create Post</span>
                              </button>
                           </div>
                        </div>
                     </form>
                     
                  </div>
               </div>
               <div class="post-wrapper">
                  <div class="post-card py-4 text-light">
                     <?php 
                        $fetchResponse = $fetchData->fetchPostContent();
                        if(is_array($fetchResponse)){
                           if(isset($fetchResponse['status'])){
                              '<div class="alert alert-danger">'.print_r($fetchResponse['message']).'</div>';
                           }else {
                              foreach($fetchResponse as $row){
                                 $time = $row['time'];
                                 $date = $row['date'];
                                 $dateTime = $date.' '.$time;
                                 $timeAgo =strtotime($dateTime);
                                 // var_dump($dateTime);
                           
                        ?>
                     <hr class="my-2">
                     <div class="card text-light my-3" id="card-bg">
                        <div class="card-body">
                           <!-- <img src="..." class="card-img-top" alt="..."> -->
                           <div class="card-title d-flex flex-row mb-3 flex-md-row">
                              <div class="profile">
                                 <img src="assets/imgs/dp.png" alt="user" class="rounded-circle  mx-auto d-block img-fluid">
                              </div>
                              <div class="px-4 w-75 mx-2 d-flex flex-column">
                                 <div class=""> <span style="color:gray;">@</span> Godstime</div>
                                 <div class="text-secondary" style="font-size:0.9em">
                                    <?php  echo getTimeAgo($timeAgo);    ?>
                                 </div>
                              </div>
                           </div>
                           
                           
                           <p class="card-subtitle mb-2 text-white text-break" style="font-size:0.9em; text-align:justify;">

                              <?php
                                 $string = $row['post_content_text'];
                                 if (strlen($string) > 100) {
                                    echo substr($string, 0, 100).'... <a href="page.php">Read More</a>';
                                 } else {
                                    echo substr($string, 0, strlen($string));
                                 }
                                 
                              ?>
                           </p>
                           
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                           <div class="d-flex flex-row">
                              <a href="#" class="nav-link">
                                 <i class="fa-solid fa-thumbs-up text-primary"></i>
                                 <span>1K Likes</span>
                              </a>
                              <a href="#" class="nav-link px-3">
                                 <i class="fa-regular fa-comment text-primary"></i>
                                 <span>12 Comments</span>
                              </a>
                              <a href="#" class="nav-link px-3">
                                 <i class="fa-solid fa-share text-primary"></i>
                                 <span>Share</span>
                              </a>
                              </div>
                        </div>
                     </div>
                     <?php }}} ?>
                  </div>
               </div>
            </div>

            <div class="col col-lg-3 col-md-12 col-sm-12 d-none d-lg-block py-1">
               <aside class="d-flex flex-column rounded friend-request py-3">
                  <div class="d-flex justify-content-between px-3">
                     <p class="text-light">Friend Request</p>
                     <p class="">
                        <a href="" class="nav-link text-primary">See All</a>
                     </p>
                  </div>
               </aside>
            </div>
         </div>
      </div>
   </section>
</main>




<?php 
require_once 'includes/footer.php';
?>