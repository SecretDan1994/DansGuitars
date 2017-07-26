<div class="row" style="margin-bottom: 30px;">
    <div class="col-lg-12">
        <h1>Welcome to Dan's Guitars, an online marketplace for people to bid/auction guitars.</h1>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                  <img class="d-block img-fluid" src="media/carousel_images/acoustics.jpg" style="height:300px;" alt="First slide">
                </div>
                <div class="item">
                  <img class="d-block img-fluid" src="media/carousel_images/storepage_glasgow_1.jpg" style="height:300px;" alt="Second slide">
                </div>  
                <div class="item">
                  <img class="d-block img-fluid" src="media/carousel_images/storepage_glasgow_2.jpg" style="height:300px;" alt="Third slide">
                </div>                         
                <div class="item">
                  <img class="d-block img-fluid" src="media/carousel_images/storepage_glasgow_3.jpg" style="height:300px;" alt="Fourth slide">
                </div>                                              
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="row" id="panel-grid">
    <div class="col-lg-12">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #fff;">
                    <div class="col-lg-1 col-md-1 col-xs-1 thumb" style="width: 5%"></div>
                    <h1 class="page-header">Featured Guitars</h1>
                </div>
                <div class="panel-body" style="background-color: #fff; min-width: 700px;">
                    <div class="col-lg-12">
                        <?php foreach ($guitars as $guitar) : ?>
                            <?php if($guitar['price'] > 450) : ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                    <a class="thumbnail" style="background-color: #eee; margin-bottom: 10px;" href="<?php echo site_url('/guitars/'.$guitar['poster_name'].'/'.$guitar['slug']); ?>">
                                        <img class="guitar-thumb" style="height: 300px;" src="<?php echo site_url();?>static/img/guitars/<?php echo $guitar['guitar_image'];?>">
                                    </a>
                                    <h6><?php echo $guitar['title'];?> posted by <?php echo $guitar['poster_name'];?> on <?php echo $guitar['created_at'];?></h6>
                                    <p style="font-size: 150%;">$<?php echo $guitar['price'];?></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1>About Dan's Guitars</h1>
        <p class="alert alert-danger">Disclaimer: This website is not real and is just a model project for a dynamic website powered by CodeIgniter.</p>

        <p>The basic idea of this web application is that visitors of the site can register and create an account to add guitars to the website that they would like to put up for sale. This website uses form validation to get as much information about the guitar that the person is trying to sell. Once a guitar is posted, it is recorded in the database and other registered users can locate a guitar of their choice and place a bid on it with an attached comment to let the guitar owner know their thought process for the amount they chose to bid and the quantity of guitars they want to purchase.</p> 

        <p>If this were a real organization this website would be used as a marketplace for transactions of many musical instruments, accessories and other musical items. If the owner of the item agreed with a bid then they would click to accept the offer and from there a transaction would be organized. There would be a shopping cart option for people to add items to their cart and proceed to check out and have the item shipped to their address. Transactions would be done by credit card.</p> 
    </div>
</div>