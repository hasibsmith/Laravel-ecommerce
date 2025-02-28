<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
              </li>
              <li class="nav-item">
                <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
              </li>
            </ul>
            <div>
              <div class="btn-wrapper">
                <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
              </div>
            </div>
          </div>
          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
              <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row">

                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Categories</h4>
                          <p class="card-description"> Category form  </p>

                        
                          {{-- Category form --}}

                          <form action=" {{route('categories.store')}} " method="POST" class="forms-sample" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                              <label for="exampleInputUsername1">Category Name</label>
                              <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="name">
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category Image</label>
                              <input type="file" name="image"  class="form-control" id="exampleInputEmail1" placeholder="file">
                            </div>
                    
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                      
                          </form>
                        </div>
                      </div>
                    </div>

               
                       {{-- Category form end --}}


                  </div>
                </div>
         
              </div>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->

</div>
<!-- main-panel ends -->
</div>