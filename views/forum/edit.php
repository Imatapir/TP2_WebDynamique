<h1>Forum Edit</h1>
<form action="?controller=forum&function=update" method="post">
            <input type="hidden" name="id" value="<?=  $data['forum']['forum_id']; ?>">
            <label for="forum_title">Title</label>
            <input type="text" id="forum_title" name="forum_title" value="<?=  $data['forum']['forum_title']; ?>" >
            <label for="forum_article">Article</label>
            <textarea id="forum_article" name="forum_article"><?= $data['forum']['forum_article']; ?></textarea>
            <input type="submit" value="Update">
        </form>