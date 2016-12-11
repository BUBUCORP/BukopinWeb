  <style media="screen">
  .nicemodal-overlay{
  	z-index: 1000!important;
  }

  #catalog {
    margin-top: 20px;
  }
  #catalog a{
    color: #333;
  }
  #catalog .col-md-3 {
    padding: 10px;
  }
  #catalog a.thumbnail {
    border-radius: 0;
  }
  #catalog .title {
    font-size: 12px;
    font-weight: bold;
    min-height: 70px;
  }
  #catalog .title p {
    font-size: 10px;
    line-height: 12px;
    font-weight: 600;
  }
  #catalog .price {
    font-size: 12px;
    font-weight: bold;
    color: #31ae32;
    border-top: solid 1px #ddd;
    padding: 5px;
  }
  #catalog .price i {
    float: right;
    color: #333;
    font-size: 16px;
  }

  .product-single p {
      font-size: 14px;
  }

  .product-single ul {
    list-style: inherit;
    margin: 0 20px;
    font-size: 14px;
  }

  .product-single h1 {
    font-size: 25px;
  }

  .product-single .price {
    border-top: solid 1px #DDD;
    margin-top: 10px;
    font-size: 12px;
    margin-bottom: 5px;
  }

  .product-single .price h2 {
    color: #31ae32;
  }

  .product-single .price .arrow {
    color: #31ae32;
    font-weight: bold;
    font-size: 30px;
    line-height: 15px;
  }

  .btn.buy-now {
    font-size: 20px;
    background-color: #2196F3;
    color: white;
    border-radius: 0;
    margin-top: 20px;
  }

  .product-single .code .code-title {
    margin-top: 10px;
    background-color: #9E9E9E;
    color: #FFF;
    padding: 5px;
    text-align: center;
  }

  .product-single .code .code-product {
    background-color: #c7c7c7;
    color: #000;
    padding: 5px;
    text-align: center;
    font-size: 20px;
  }

  .product-single .faq {
    margin-top: 20px;
    background-color: #9E9E9E;
    color: #FFF;
    padding: 5px;
    text-align: center;
  }
.product-single .title h3 {
    color: #31ae32;
    font-weight: bold;
    font-size: 20px;
}
</style>

<?php foreach ($content as $key => $val) { ?>
	
<div class="modal-header "></div>
<div class="container-fluid catalog" style="margin-top: 20px;">
	<div class="row">
	<div class="col-md-12">

	
	<form name="productform" action="<?php echo site_url('page/submitproduct');?>" method="POST">
	<input type="hidden" name="id_post" value="<?=$val['id_post']?>">
	<input type="hidden" name="images" value="<?=$val['images']?>">
	<input type="hidden" name="title" value="<?=$val['title']?>">
	<input type="hidden" name="price" value="<?=$val['price']?>">
 	<input type="hidden" name="discount" value="<?=$val['discount']?>">	 		
 	<input type="hidden" name="kode" value="<?=$val['kode']?>">
	
    <div class="product-single modal-body">
      <div class="col-md-5">
        <a class="thumbnail" id="large-thumb">
          <img src="<?=$val['images']?>" alt="<?=$val['title']?>" />
        </a>

      </div>
      <div class="col-md-7">
        <div class="title">
          <h1><?=$val['title']?></h1>
          <h3><?=($refpage=="cicilan")?"Cicilan":"Diskon"?> <?=($val['discount']>0)?$val['discount']:0?>%</h3>
        </div>
		    <div class="row price">
    			<div class="col-md-12">			    				
            <?=$val['content']?>
    			</div>
        </div>
    </div> 
    </div>
    </form>   
</div>
</div>
</div>
<div class="modal-footer"></div>
<?php } ?>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('.small-thumb').on('click', function() {
          var img = $(this).data('img');
          $('#large-thumb').html('<img src="'+img+'" />');
          console.log(img);
        });
      });
    </script>