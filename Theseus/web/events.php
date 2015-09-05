<?php include 'template/header.php'; ?>

<section>
<?php include 'eventsContent.php'; ?>
    <div class="paginationEvent">
        <div class="paginationEvent">
            <!--        affichage pagination-->
            <nav>
                <ul class="pager">
                    <li data-page="prev" class="previous previousEvent <?php if($page == 1) echo "disabled"; ?>"><a href>Précédente</a></li>
                    <li id="currentPage" class="active" data-nbpage="<?php echo $nbPage ?>" data-page="<?php echo $page ?>"><a><?php echo $page ?></a></li>
                    <li data-page="next "class="next nextEvent <?php if($page == $nbPage) echo "disabled"; ?>"><a href>Suivante</a></li>
                </ul>
            </nav>
            <!--        // fin pagination-->
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>