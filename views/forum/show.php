<div class="article-container">
    <div class="article-header">
        <h1><?= $data['forum_title'] ?></h1>
        <span class="article-meta">Par <strong><?= $data['user_pseudonyme'] ?></strong> — <?= $data['forum_date'] ?></span>
    </div>
    <div class="article-body">
        <p><?= $data['forum_article'] ?></p>
    </div>
    <?php if(isset($_SESSION['fingerPrint']) && $_SESSION['user_id'] == $data['user_id']){ ?>
    <div class="article-actions">
        <a href="?controller=forum&function=edit&id=<?= $data['forum_id'] ?>" class="btn">Edit</a>
        <form action="?controller=forum&function=delete" method="post">
            <input type="hidden" name="id" value="<?= $data['forum_id'] ?>">
            <input type="submit" value="Delete" class="btn-danger">
        </form>
    </div>
    <?php } ?>
</div>