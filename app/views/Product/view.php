<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?= $breadcrumbs; ?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">
                        <?php if($gallery): ?>
                        <div class="flexslider">
                            <ul class="slides">
                                <?php foreach($gallery as $item): ?>
                                <li data-thumb="images/<?= $item->img; ?>">
                                    <div class="thumb-image"> <img src="/images/<?= $item->img; ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php else: ?>
                            <li data-thumb="images/<?= $product->img; ?>">
                                <div class="thumb-image"> <img src="/images/<?= $product->img; ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                            </li>
                        <?php endif; ?>
                        <!-- FlexSlider -->
                        <script src="/js/imagezoom.js"></script>
                        <script defer src="/js/jquery.flexslider.js"></script>
                        <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />

                        <script>
                            // Can also be used with $(document).ready()
                            $(window).load(function() {
                                $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                });
                            });
                        </script>
                    </div>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?= $product->title; ?></h2>
                            <div class="star-on">
                                <ul class="star-footer">
                                    <li><a href="/#"><i> </i></a></li>
                                    <li><a href="/#"><i> </i></a></li>
                                    <li><a href="/#"><i> </i></a></li>
                                    <li><a href="/#"><i> </i></a></li>
                                    <li><a href="/#"><i> </i></a></li>
                                </ul>
                                <div class="review">
                                    <a href="/#"> 1 customer review </a>

                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        <?php $curr = \bikeshop\App::$app->getProperty('currency');
                                $cats = \bikeshop\App::$app->getProperty('cats');
                        ?>
                            <h5 class="item_price" id="base-price" data-base="<?= floor($product->price / $curr['value']); ?>"><?= $curr['simbol_left']; ?><?= floor($product->price / $curr['value']); ?><?= $curr['simbol_right']; ?>
                                <?php if ($product->old_price): ?>
                                    <small>
                                        <?= $curr['simbol_left']; ?><del><?= floor($product->old_price / $curr['value']); ?></del><?= $curr['simbol_right']; ?>
                                    </small>
                                <?php endif; ?>
                            </h5>
                            <p><?= $product->description; ?></p>
                            <div class="available">
                                <?php if(!empty($modifications)): ?>
                                <ul>
                                    <li>Модификация:
                                        <select>
                                            <option>
                                                Выбрать модификацию
                                            </option>
                                        <?php foreach($modifications as $mod): ?>
                                            <option data-title="<?=$mod->title?>"
                                                    data-price="<?=$mod->price * $curr['value']?>"
                                                    value="<?=$mod->id?>"><?= $mod->title ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select></li>
                                    <div class="clearfix"> </div>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <ul class="tag-men">
                                <li><span>TAG</span>
                                    <span class="women1">: Women,</span></li>
                                <li><span>SKU</span>
                                    <span class="women1">: CK09</span></li>
                            </ul>
                            <a href="/#" class="add-cart item_add">ADD TO CART</a>

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="tabs">
                    <ul class="menu_drop">
                        <li class="item1"><a href="/#"><img src="/images/arrow.png" alt="">Description</a>
                            <ul>
                                <li class="subitem1"><a href="/#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="/#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="/#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="/#"><img src="/images/arrow.png" alt="">Additional information</a>
                            <ul>
                                <li class="subitem2"><a href="/#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="/#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="/#"><img src="/images/arrow.png" alt="">Reviews (10)</a>
                            <ul>
                                <li class="subitem1"><a href="/#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="/#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="/#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item4"><a href="/#"><img src="/images/arrow.png" alt="">Helpful Links</a>
                            <ul>
                                <li class="subitem2"><a href="/#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="/#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item5"><a href="/#"><img src="/images/arrow.png" alt="">Make A Gift</a>
                            <ul>
                                <li class="subitem1"><a href="/#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="/#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="/#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="latestproducts">
                    <?php if(!empty($related)): ?>
                    <h1>С этим товаром так же покупают</h1>
                    <div class="product-one">
                        <?php foreach($related as $viewedRelated):?>
                            <?php $curr = \bikeshop\App::$app->getProperty('currency')  ?>
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="product/<?=$viewedRelated['alias']?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$viewedRelated['img'];?>" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3><a href="product/<?=$viewedRelated['alias']?>"><?= $viewedRelated['title']; ?></a></h3>
                                        <p>Explore Now</p>
                                        <h4><a class="item_add" href="/#"><i></i></a> <span class=" item_price"><?= $curr['simbol_left']; ?><?= floor($viewedRelated['price'] / $curr['value']); ?><?= $curr['simbol_right']; ?></span>
                                            <?php if ($viewedRelated['old_price']): ?>
                                                <small>
                                                    <?= $curr['simbol_left']; ?><del><?= floor($viewedRelated['old_price'] / $curr['value']); ?></del><?= $curr['simbol_right']; ?>
                                                </small>
                                            <?php endif; ?>
                                        </h4>
                                    </div>
                                    <div class="srch">
                                        <?php if ($viewedRelated['old_price']): ?>
                                            <?php $discont = ($viewedRelated['old_price'] - $viewedRelated['price']) / $viewedRelated['old_price'] * 100; ?>
                                            <span><?= floor($discont); ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="latestproducts">
                        <?php if(!empty($products)): ?>
                    <h1>Недавно просмотренные товары</h1>
                    <div class="product-one">
                        <?php foreach($products as $viewedProducts):?>
                        <?php $curr = \bikeshop\App::$app->getProperty('currency')  ?>
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="product/<?=$viewedProducts->alias?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$viewedProducts->img;?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><a href="product/<?=$viewedProducts->alias?>"><?= $viewedProducts->title; ?></a></h3>
                                    <p>Explore Now</p>
                                    <h4><a class="item_add" href="/#"><i></i></a> <span class=" item_price"><?= $curr['simbol_left']; ?><?= floor($viewedProducts->price / $curr['value']); ?><?= $curr['simbol_right']; ?></span>
                                        <?php if ($viewedProducts->old_price): ?>
                                            <small>
                                                <?= $curr['simbol_left']; ?><del><?= floor($viewedProducts->old_price / $curr['value']); ?></del><?= $curr['simbol_right']; ?>
                                            </small>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <div class="srch">
                                    <?php if ($viewedProducts->old_price): ?>
                                        <?php $discont = ($viewedProducts->old_price - $viewedProducts->price) / $viewedProducts['old_price'] * 100; ?>
                                        <span><?= floor($discont); ?>%</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 single-right">
                <div class="w_sidebar">
                    <section  class="sky-form">
                        <h4>Catogories</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>
                            </div>
                        </div>
                    </section>
                    <section  class="sky-form">
                        <h4>Brand</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>Colour</h4>
                        <ul class="w_nav2">
                            <li><a class="color1" href="/#"></a></li>
                            <li><a class="color2" href="/#"></a></li>
                            <li><a class="color3" href="/#"></a></li>
                            <li><a class="color4" href="/#"></a></li>
                            <li><a class="color5" href="/#"></a></li>
                            <li><a class="color6" href="/#"></a></li>
                            <li><a class="color7" href="/#"></a></li>
                            <li><a class="color8" href="/#"></a></li>
                            <li><a class="color9" href="/#"></a></li>
                            <li><a class="color10" href="/#"></a></li>
                            <li><a class="color12" href="/#"></a></li>
                            <li><a class="color13" href="/#"></a></li>
                            <li><a class="color14" href="/#"></a></li>
                            <li><a class="color15" href="/#"></a></li>
                            <li><a class="color5" href="/#"></a></li>
                            <li><a class="color6" href="/#"></a></li>
                            <li><a class="color7" href="/#"></a></li>
                            <li><a class="color8" href="/#"></a></li>
                            <li><a class="color9" href="/#"></a></li>
                            <li><a class="color10" href="/#"></a></li>
                        </ul>
                    </section>
                    <section class="sky-form">
                        <h4>discount</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                            </div>
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-single-->


