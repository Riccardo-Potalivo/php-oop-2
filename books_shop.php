<?php
include __DIR__ . '/Views/header.php';
include __DIR__ . '/Model/Books.php';
$books = Books::fetchAll();

?>

<section class="container">
    <h2>Books</h2>
    <div class="row">
        <?php foreach ($books as $book) {
            $book->printCard($book->formatCard());
        } ?>
    </div>
</section>

<?php
include __DIR__ . '/Views/footer.php';
?>