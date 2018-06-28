<form role="search" method="get" action="<?php echo home_url('/'); ?>">
    <input type="search" class="form-control" placeholder="اضغط هنا لتبدأ بحث ..." value="<?php echo get_search_query() ?>" name="s" title="search" />
    <input class="screen-reader-text" type="submit" id="search-submit" value="ابحث" />
</form>