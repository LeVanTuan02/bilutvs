<section class="content__main-filter">
    <form action="<?=DOMAIN?>/loc-phim/" class="content__main-filter-form" method="GET">
        <div class="content__main-filter-item">
            <select name="order" class="content__main-filter-control">
                <option value="">-- Sắp xếp --</option>
                <!-- <option value="">Mới cập nhật</option> -->
                <?php foreach($orderList as $key => $orderItem): ?>
                    <option value="<?=$key;?>"><?=$orderItem;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="content__main-filter-item">
            <select name="type" class="content__main-filter-control">
                <option value="">-- Loại --</option>
                <?php foreach($listType as $typeItem): ?>
                    <option value="<?=$typeItem['id'];?>"><?=$typeItem['type_name'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="content__main-filter-item">
            <select name="cate" class="content__main-filter-control">
                <option value="">-- Thể loại --</option>
                <?php foreach($listCategory as $cateItem): ?>
                    <option value="<?=$cateItem['id'];?>"><?=$cateItem['cate_name'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="content__main-filter-item">
            <select name="country" class="content__main-filter-control">
                <option value="">-- Quốc gia --</option>
                <?php foreach($listCountry as $countryItem): ?>
                    <option value="<?=$countryItem['id'];?>"><?=$countryItem['nation_name'];?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="content__main-filter-item">
            <select name="year" class="content__main-filter-control">
                <option value="">-- Năm --</option>
                <?php foreach(range(date('Y'), 1997) as $yearItem): ?>
                    <option value="<?=$yearItem;?>"><?=$yearItem;?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="content__main-filter-item">
            <input type="submit" value="Lọc Phim" class="content__main-filter-submit">
        </div>
    </form>
</section>